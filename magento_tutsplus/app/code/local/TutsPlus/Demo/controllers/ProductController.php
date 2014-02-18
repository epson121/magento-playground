<?php

// manually include original controller (controller classes are not autoloaded)
// require_once "Mage/Catalog/controllers/ProductController.php";
require_once(Mage::getModuleDir('controllers', 'Mage_Catalog').DS.'ProductController.php');

class TutsPlus_Demo_ProductController extends Mage_Catalog_ProductController {

    public function viewAction() {
        echo "HI";
    }

}