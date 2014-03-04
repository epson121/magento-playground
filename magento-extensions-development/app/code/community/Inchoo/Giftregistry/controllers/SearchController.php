<?php

class Inchoo_Giftregistry_SearchController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }


    public function resultsAction()
    {
        $this->loadLayout();
        $searchParams = $this->getRequest()->getParams();

        if ($searchParams) {
            $results = Mage::getModel('inchoo_giftregistry/entity')->getCollection();

            if($searchParams['type']) {
                $results->addFieldToFilter('event_name', $searchParams['name']);
            }

            if($searchParams['location']) {
                $results->addFieldToFilter('event_location', $searchParams['location']);
            }

            var_dump(get_class($this->getLayout()->getBlock('giftregistry.results')));

            $this->getLayout()->getBlock('giftregistry.results')->setCustomerRegistries($results);
        }
        $this->renderLayout();
        return $this;
    }

}