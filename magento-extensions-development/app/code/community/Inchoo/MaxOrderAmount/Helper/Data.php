<?php

class Inchoo_MaxOrderAmount_Helper_Data extends Mage_Core_Helper_Abstract
{

    const XML_PATH_ACTIVE = 'sales/inchoo_maxorderamount/active';
    const XML_PATH_SINGLE_ORDER_TOP_AMOUNT = 'sales/inchoo_maxorderamount/single_order_top_amount';
    const XML_PATH_SINGLE_ORDER_TOP_AMOUNT_MSG = 'sales/inchoo_maxorderamount/single_order_top_amount_msg';

    public function isModuleEnabled($moduleName = null)
    {
        // Mage.php:getStoreConfig
        if ( (int) Mage::getStoreConfig(self::XML_PATH_ACTIVE, Mage::app()->getStore()) != 1) {
            return false;
        }
        return parent::isModuleEnabled($moduleName);
    }

    public function getSingleOrderTopAmount($store = null)
    {
        return (int) Mage::getStoreConfig(self::XML_PATH_SINGLE_ORDER_TOP_AMOUNT, $store);
    }

    public function getSingleOrderTopAmountMsg($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_SINGLE_ORDER_TOP_AMOUNT_MSG, $store);
    }

}