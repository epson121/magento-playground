<?php

class Inchoo_Logger_Model_Resource_Logger extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_load('inchoo_logger/logger', 'entity_id');
    }
}