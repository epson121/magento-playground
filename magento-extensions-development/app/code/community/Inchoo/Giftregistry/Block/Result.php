<?php

class Inchoo_Giftregistry_Block_Result extends Mage_Core_Block_Template
{

    private $customer_registries = null;

    public function getCustomerRegistries()
    {

        if ($this->customer_registries != null) {
            return $this->customer_registries;
        } else {
            return array();
        }
    }

    public function setCustomerRegistries($registries)
    {
       $this->customer_registries = $registries;
    }
}