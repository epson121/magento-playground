<?php

class Inchoo_Logger_Model_Logger extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        // resource model path
        // define the entity
        $this->_init('inchoo_logger/logger');
    }
}