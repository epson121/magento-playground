<?php

class Inchoo_Giftregistry_Block_List extends Mage_Core_Block_Template
{

    private $customer_registries = null;

    public function getCustomerRegistries()
    {

        $currentCustomer = Mage::getSingleton('customer/session')->getCustomer();
        if ($currentCustomer) {
            $customer_registries = Mage::getModel('inchoo_giftregistry/entity')
                                ->getCollection()
                                ->addFieldToFilter('customer_id', $currentCustomer->getId());
        }
        return $customer_registries;
    }
}