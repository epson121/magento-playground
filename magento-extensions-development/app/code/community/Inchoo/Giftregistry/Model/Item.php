<?php

class Inchoo_Giftregistry_Model_Item extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_giftregistry/item');
        parent::_construct();
    }
}