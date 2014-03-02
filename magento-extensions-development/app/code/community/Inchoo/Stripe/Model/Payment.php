<?php

require_once dirname(__FILE__).'/../lib/Stripe.php';

class Inchoo_Stripe_Model_Payment extends Mage_Payment_Model_Method_Cc
{
    protected $_code = 'inchoo_stripe';
    protected $_isGateway = true;
    protected $_canCapture = true;
    protected $_supportedCurrencyCodes = array('USD');
    protected $_minOrderTotal = 0.5;

    public function __construct()
    {
        Stripe::setApiKey($this->getConfigData('api_key'));
    }

    public function capture(Varien_Object $payment, $amount)
    {
        $order = $payment->getOrder();
        $billingAddress = $order->getBillingAddress();
        try {
            $charge = Stripe_Charge::create(
                array(
                    'amount' => $amount * 100,
                    'currency' => strtolower($order->getBaseCurrencyCode()),
                    'card' =>
                        array(
                            'number' => $payment->getCcNumber(),
                            'exp_month' => sprintf('%02d', $payment->getCcExpMonth()),
                            'exp_year' => $payment->getCcExpYear(),
                            'cvc' => $payment->getCcCid(),
                            'name' => $billingAddress->getName(),
                            'address_line1' => $billingAddress->getStreet(1),
                            'address_line2' => $billingAddress->getStreet(2),
                            'address_zip' => $billingAddress->getPostcode(),
                            'address_state' => $billingAddress->getRegion(),
                            'address_country' => $billingAddress->getCountry(),
                        ),
                    'description' => sprintf('#%s, %s', $order->getIncrementId(), $order->getCustomerEmail())
                ));
        } catch (Exception $e) {
            $this->debugData($e->getMessage());
            Mage::throwException(Mage::helper('inchoo_sprite')->__('Payment capturing error.'));
        }

        $payment->setTransactionId($charge->id)->setIsTransactionClosed(0);

        return $this;
    }

    public function isAvailable($quote = null)
    {
        if ($quote && $quote->getBaseGrandTotal() < $this->_minOrderTotal) {
            return false;
        }
        return $this->getConfigData('api_key', ($quote ? $quote->getStoreId() : null)) && parent::isAvailable($quote);
    }


    public function canUseForCurrency($currencyCode)
    {
        if (!in_array($currencyCode, $this->_supportedCurrencyCodes)) {
            return false;
        }
        return true;
    }

}