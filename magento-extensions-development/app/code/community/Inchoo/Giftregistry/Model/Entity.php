<?php

class Inchoo_Giftregistry_Model_Entity extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_giftregistry/entity');
        parent::_construct();
    }

    public function updateRegistryData(Mage_Customer_Model_Customer $customer, $data)
    {
        try{
            if(!empty($data)) {
                $type_id = Mage::getModel('inchoo_giftregistry/type')->load($data['type_id'], 'code')->getTypeId();
                $this->setCustomerId($customer->getId());
                $this->setWebsiteId($customer->getWebsiteId());
                $this->setTypeId($type_id);
                $this->setEventName($data['event_name']);
                //$this->setEventDate($data['event_date']);
                $this->setEventCountry($data['event_country']);
                $this->setEventLocation($data['event_location']);
            } else {
                throw new Exception("Error Processing Request: Insufficient Data Provided");
            }
        } catch (Exception $e){
            Mage::logException($e);
        }
        return $this;
    }

}