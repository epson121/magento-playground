<?php

class Inchoo_Giftregistry_Model_Mysql4_Entity extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_giftregistry/entity', 'entity_id');
    }
}