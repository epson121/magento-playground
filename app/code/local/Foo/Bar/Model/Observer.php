<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Observer
 *
 * @author luka
 */
class Foo_Bar_Model_Observer {

    public function catalogProductLoadAfter(Varien_Event_Observer $observer) {
        $product = $observer->getProduct();
        $product->setName($product->getName() . " is Cool.");
    }
    
}
