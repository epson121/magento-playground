<?php

class Inchoo_Logger_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'inchoo_logger';
        $this->_controller = 'adminhtml_edit';
        $this->_headerText = Mage::helper('inchoo_logger')
                                    ->__('Logger - Log entries of everything that passedthrough Mage::log();');
        parent::__construct();
        Mage::log("This is a message", null, log.log, true);
        //$this->removeButton('add');
    }
}