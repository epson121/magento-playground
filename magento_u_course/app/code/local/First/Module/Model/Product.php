<?php

/**
 * Description of Product
 *
 * @author luka
 */
class First_Module_Model_Product extends Mage_Catalog_Model_Product {
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getName() {
        $name = parent::getName();
        return strtoupper($name);
    }
}

