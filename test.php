<?php

    include 'app/Mage.php';
    Mage::app();
    
    //$object = Mage::getModel('catalog/product')->load(166);
    
    //$object = Mage::app()->getLayout()->createBlock('catalog/product_view');
    
    //var_dump($object->getName());
    
    //$object = Mage::getResourceModel('catalog/product');
    
    //$object = Mage::helper('sales/data');
    
    $object = Mage::helper('customer/address');
    echo get_class($object);