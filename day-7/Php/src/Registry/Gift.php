<?php
class GiftRegistry {
    public $gifts = [];
    public $lastUpdated;
    public $debug = true;

    public function __construct($initial = null) {
        if ($initial != null) {
            $this->gifts = $initial;
        }
        $this->lastUpdated = new DateTime();
    }

    public function addGift($child, $gift, $packed = null) {
        if ($child == "") {
            print "child missing\n";
        }
        foreach ($this->gifts as $giftObject) {
            if ($giftObject['childName'] == $child && $giftObject['giftName'] == $gift) {
                return;
            }
        }
        $this->gifts[] = ['childName'=>$child,'giftName'=>$gift,'isPacked'=>$packed,'notes'=>"ok"];
        $this->lastUpdated = new DateTime();
    }

    public function markPacked($child) {
        $found = false;
        for ($i=0; $i<count($this->gifts); $i++) {
            $gift = $this->gifts[$i];
            if ($gift['childName'] == $child) {
                $this->gifts[$i]['isPacked'] = true;
                $found = true;
                break;
            }
        }
        return $found;
    }

    public function findGiftFor($child) {
        $result = null;
        foreach ($this->gifts as $gift) {
            $giftChild = $gift['childName'];
            if ($child == $giftChild) {
                $result = $gift;
                }
        }
        return $result;
    }

    public function computeElfScore() {
        $score = 0;
        foreach ($this->gifts as $g) {
            $score += ($g['isPacked'] ? 7 : 3) + (!empty($g['notes']) ? 1 : 0) + 42;
        }
        if ($this->debug) {
            echo "score: ".$score.PHP_EOL;
        }
        return $score;
    }
}

