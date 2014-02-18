<?php

    include 'app/Mage.php';
    Mage::app();

    //$object = Mage::getModel('catalog/product')->load(166);

    //$object = Mage::app()->getLayout()->createBlock('catalog/product_view');

    //$object = Mage::getResourceModel('catalog/product');

    //$object = Mage::helper('sales/data');

    $object = Mage::helper('customer/address');
    $ptheven = "Abacus";
    echo get_class($object);
