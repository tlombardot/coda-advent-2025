# Day 4 Advent Coda 2025

## Goals

Find in a file the most elf of calories

## Open the file

```java
void main() throws IOException{

        String input = Files.readString(Path.of("data"));
```

## Variables declaration

```java
String nomGagnant = "";
int maxCalories = 0;
String nom2 = "";
int maxCalories2 = 0;
String nom3 = "";
int maxCalories3 = 0;
```

## Split Elf in a variables list

```java
String[] blocsElfes = input.split("\n\n");
```

## For each elf we update variables

````java
for (String bloc : blocsElfes) {

            String[] lignes = bloc.split("\n");

            String nomActuel = lignes[0];
            int totalCaloriesActuel = 0;

            for (int i = 1; i < lignes.length; i++) {
                totalCaloriesActuel += Integer.parseInt(lignes[i]);
            }

            if (totalCaloriesActuel > maxCalories) {
                maxCalories3 = maxCalories2;
                maxCalories2 = maxCalories;
                maxCalories = totalCaloriesActuel;
                nom3 = nom2;
                nom2 = nomGagnant;
                nomGagnant = nomActuel;

            }else if (totalCaloriesActuel > maxCalories2){
                    maxCalories3 = maxCalories2;
                    maxCalories2 = totalCaloriesActuel;
                    nom3 = nom2;
                    nom2 = nomActuel;
            }else if (totalCaloriesActuel > maxCalories3){
                    maxCalories3 = totalCaloriesActuel;
                    nom3 = nomActuel;
            }

        }
````

## Print Top 3 Elf Calories

```java
System.out.println("\uD83E\uDD47 Winner : " + nomGagnant + " with " + maxCalories + " calories !");
System.out.println("\uD83E\uDD48 Top 2 : " + nom2 + " with " + maxCalories2 + " calories !");
System.out.println("\uD83E\uDD49 Top 3 : " + nom3 + " avec " + maxCalories3 + " calories !");
```