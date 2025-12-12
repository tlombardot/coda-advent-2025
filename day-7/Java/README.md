# Analyse du gifRegistry.java.

## Intentionality issues

- Import unused :
```java
import java.util.concurrent.atomic.AtomicBoolean;
import java.util.jar.JarEntry;
```
- Variables unused :
```java
int counter = 0;
```
- Don't need this part :
```java
else if (false){
    System.out.println("never");
}
```
- Simplify if :
```java
if (child == "") 
// to
if (child.isEmpty())
```
- Remove return unnecessary in a void method
```java
return;
```

## Adaptability issues
- Change println to logger :
````java
System.out.println("child missing");
// to
logger.info("child missing");
````
