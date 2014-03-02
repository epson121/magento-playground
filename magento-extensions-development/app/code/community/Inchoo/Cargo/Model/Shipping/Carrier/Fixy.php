<?php

class Inchoo_Cargo_Model_Shipping_Carrier_Fixy extends Mage_Shipping_Model_Carrier_Abstract
implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'inchoo_cargo_fixy';

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {

        if (!$this->getConfigFlag('active') || Mage::app()->getStore()->isAdmin()) {
            return false;
        }

        $shippingPrice = 20;
        $grandTotal = Mage::getModel('checkout/session')->getQuote()->getGrandTotal();
        Mage::log("SHIPPING TOTAL: ".$grandTotal, null, "total.log", true);
        if ($grandTotal > 100) {
            $shippingPrice = 10;
        }
        $result = Mage::getModel('shipping/rate_result');
        $method = Mage::getModel('shipping/rate_result_method');
        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('title'));
        $method->setMethod($this->_code);
        $method->setMethodTitle($this->getConfigData('name'));
        $method->setPrice($shippingPrice);
        $method->setCost($shippingPrice);
        $result->append($method);
        return $result;

    }

    public function getAllowedMethods()
    {
        return array($this->_code => $this->getConfigData('name'));
    }
}
