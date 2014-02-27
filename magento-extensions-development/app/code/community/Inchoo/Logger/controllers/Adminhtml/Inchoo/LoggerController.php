<?php

class Inchoo_Logger_Adminhtml_Inchoo_LoggerController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        Mage::log("This is index", null, log.log, true);
        $this->loadLayout()->_setActiveMenu('system/tools/inchoo_logger');
        $this->_addContent($this->getLayout()->createBlock('inchoo_logger/adminhtml_edit'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        Mage::log("This is a message", null, log.log, true);
        $this->getResponse()
                ->setBody($this->getLayout()
                                ->createBlock('inchoo_logger/adminhtml_edit_grid')
                                ->toHtml());
    }
}