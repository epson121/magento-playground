<?php

class Inchoo_Weblog_Model_Resource_Blogpost_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('weblog/blogpost');
    }
}