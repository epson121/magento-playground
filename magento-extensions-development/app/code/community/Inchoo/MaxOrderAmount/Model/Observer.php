<?php

class Inchoo_MaxOrderAmount_Model_Observer
{
    public function enforceSingleOrderLimit($observer)
    {
        $helper = Mage::helper('inchoo_maxorderamount');

        if (!$helper->isModuleEnabled()) {
        return;
        }

        echo "ADSDASD";
        var_dump("ASDASDSA");

        $quote = $observer->getEvent()->getQuote();

        if ((float)$quote->getGrandTotal() > (float)$helper->getSingleOrderTopAmount()) {
            $formattedPrice = Mage::helper('core')->currency($helper->getSingleOrderTopAmount(), true, false);
            Mage::getSingleton('checkout/session')->addError($helper->__($helper->getSingleOrderTopAmountMsg(), $formattedPrice));
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::helper('core/url')->getCurrentUrl());
            Mage::app()->getResponse()->sendResponse();
            exit;
        }
    }

}