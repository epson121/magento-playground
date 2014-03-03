<?php

class Inchoo_Giftregistry_Model_Mysql4_Type_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_giftregistry/type');
        parent::_construct();
    }
}