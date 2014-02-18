<?php

class TutsPlus_Customer_Helper_Data extends Mage_Customer_Helper_Data {

     /**
     * Retrieve current customer name
     *
     * @return string
     */
    public function getCustomerName()
    {
        echo "I am here";
        return strtoupper($this->getCustomer()->getName());
    }

}