<?php

class TutsPlus_Demo_IndexController extends Mage_Core_Controller_Front_Action {

    public function sayHelloAction() {
        //var_dump($this->getRequest()->getParams());
        //var_dump($this->getRequest()->getParam('id'));
        $this->loadLayout();
        //die($this->getLayout()->getNode()->asXml());
        $this->renderLayout();
    }

    public function indexAction() {
        echo "INDEX";
    }

}