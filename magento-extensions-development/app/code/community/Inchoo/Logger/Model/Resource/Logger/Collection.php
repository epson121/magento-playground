<?php

class Inchoo_Logger_Model_Resource_Logger_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        // model name
        $this->_init('inchoo_logger/logger');
    }
}