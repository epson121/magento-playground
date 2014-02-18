<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RenderController
 *
 * @author luka
 */
class Test_Module_RenderController extends Mage_Core_Controller_Front_Action {

    public function blockAction() {
        $this->getResponse()->setBody("Hello world");
    }

    public function overrideAction() {
        $blockHtml = $this->getLayout()->createBlock('test_module/sample')->toHtml();
        $this->getResponse()->setBody($blockHtml);
    }

    public function templateAction() {
        // create block -> mage/core/Block/Template.php
        // setTemplate -> relative to templates folder (app/design/default/base/Template)
        $blockHtml = $this->getLayout()
                        ->createBlock('core/template')
                        ->setTemplate('test_module/random.phtml')
                        ->toHtml();
        $this->getResponse()->setBody($blockHtml);
    }

    public function registryAction() {
        // create block -> mage/core/Block/Template.php
        // setTemplate -> relative to templates folder (app/design/default/base/Template)

        Mage::register('some_var', 'some_value');
        $blockHtml = $this->getLayout()
                        ->createBlock('test_module/registry')
                        ->setTemplate('test_module/registry.phtml')
                        ->toHtml();
        $this->getResponse()->setBody($blockHtml);
    }

    public function listBlockAction() {
        $tlb = $this->getLayout()->createBlock('core/text_list');
        $blockA = $this->getLayout()->createBlock('core/text')->setText('<h1>Block A</h1>');
        $blockB = $this->getLayout()->createBlock('core/text')->setText('<h1>Block B</h1>');
        $tlb->insert($blockA)->insert($blockB);
        //$this->getResponse()->setBody($tlb->toHtml());
        $this->loadLayout();
        $this->getLayout()->getBlock('content')->insert($tlb);
        $this->renderLayout();
    }

    public function layoutAction() {
        $this->loadLayout()->renderLayout();
    }

    public function handleAction() {
        $this->loadLayout('cool_handle')->renderLayout();
    }

    public function finalAction() {
        $this->loadLayout()->renderLayout();
    }

}
