<?php

class Inchoo_Logger_Model_Resource_Logger extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        // matches the table name and the primary key
        $this->_init('inchoo_logger/logger', 'entity_id');
    }
}