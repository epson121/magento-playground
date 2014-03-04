<?php

class Inchoo_Giftregistry_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getEventTypes()
    {
        $types = Mage::getModel('inchoo_giftregistry/type')->getCollection();
        return $types;
    }

    public function isRegistryOwner($registryCustomerId)
    {
        $currentCustomer = Mage::getSingleton('customer/session')->getCustomer();
        if($currentCustomer && $currentCustomer->getId() == $registryCustomerId) {
            return true;
        }
        return false;
    }


}