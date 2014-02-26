<?php

class TutsPlus_Demo_Helper_Data extends Mage_Core_Helper_Abstract {

    public function sayHello() {
        echo "hello";
    }

    public function beautifyPrice($price) {
        if (!isset($price)) {
            return 'unknown price';
        }
        return number_format($price, 2, '.', ',');
    }

}