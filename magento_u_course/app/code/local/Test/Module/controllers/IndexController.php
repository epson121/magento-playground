<?php

class Test_Module_IndexController extends Mage_Core_Controller_Front_Action {
    
    
    public function indexAction() {
        echo "asd";
    }
    
    public function modelAction() {
        echo get_class(Mage::getModel('test_module/whatever'));
    }
    
    public function layoutAction() {
        $xml = $this->loadLayout()->getLayout()->getUpdate()->asString();
        $this->getResponse()->setHeader('Content-Type', 'text/plain')->setBody($xml);
        //Mage::log($xml, Zend_Log::INFO, 'layout_log', true);
        
        $model = Mage::getModel('test_module/whatever');
        Mage::log($model, Zend_Log::INFO, 'layout_log', true);
    }
    
    public function defaultAction() {
        $this->loadLayout()->renderLayout();
    }
}

?>
