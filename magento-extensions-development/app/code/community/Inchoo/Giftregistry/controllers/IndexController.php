<?php

class Inchoo_Giftregistry_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function editAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function newPostAction()
    {
        try {
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('inchoo_giftregistry/entity');
            $customer = Mage::getSingleton('customer/session')->getCustomer();

            if($this->getRequest()->getPost() && !empty($data)) {
                $registry->updateRegistryData($customer, $data);
                $registry->save();
                $successMessage = Mage::helper('inchoo_giftregistry')->__('Registry Successfully Created');
                Mage::getSingleton('core/session')->addSuccess($successMessage);
            } else{
                throw new Exception("Insufficient Data provided");
            }
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }

    public function editPostAction()
    {
        try {
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('inchoo_giftregistry/entity');
            $customer = Mage::getSingleton('customer/session')->getCustomer();
            if($this->getRequest()->getPost() && !empty($data) )
            {
                var_dump($data);
                $registry->load($data['entity_id']);
                // var_dump("<br><br>");
                // var_dump($registry);
                // die();
                if($registry){
                    $registry->updateRegistryData($customer, $data);
                    $registry->save();
                    $successMessage = Mage::helper('inchoo_giftregistry')->__('Registry Successfully Saved');
                    Mage::getSingleton('core/session')->addSuccess($successMessage);
                } else {
                    throw new Exception("Invalid Registry Specified");
                }
            } else {
                throw new Exception("Insufficient Data provided");
            }
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }

        $this->_redirect('*/*/');
    }
    // Mage_Core_Controller_Request_Http
    public function deleteAction() {
        try {
            $registryId = $this->getRequest()->getParam('registry_id');
            if($registryId && $this->getRequest()->getQuery('registry_id')){
                $registry = Mage::getModel('inchoo_giftregistry/entity')->load($registryId);
                if($registry) {
                    $registry->delete();
                    $successMessage = Mage::helper('inchoo_giftregistry')->__('Gift registry has been succesfully deleted.');
                    Mage::getSingleton('core/session')->addSuccess($successMessage);
                } else {
                    throw new Exception("There was a problem deleting theregistry");
                }
            } else {
                echo "ADSADSDA";
                var_dump("#!ASDSAD");
                die();
            }
        } catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }



    /**
     * Fired before any of the actions. Here it check if user is logged in.
     * @return [type] [description]
     */
    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->getResponse()->setRedirect(Mage::helper('customer')->getLoginUrl());
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }


}