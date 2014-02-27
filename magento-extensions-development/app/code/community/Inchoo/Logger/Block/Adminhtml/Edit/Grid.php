<?php

class Inchoo_Logger_Block_Adminhtml_Edit_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('inchoo_logger');
        $this->setDefaultSort('entity_id');
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('inchoo_logger/logger')->getCollection();
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => Mage::helper('inchoo_logger')->__('ID'),
            'sortable' => true,
            'index' => 'entity_id',
            ));
        $this->addColumn('timestamp', array(
            'header'=> Mage::helper('inchoo_logger')->__('Timestamp'),
            'index' => 'timestamp',
            'type' => 'text',
            'width' => '170px',
            ));
        $this->addColumn('message', array(
            'header'=> Mage::helper('inchoo_logger')->__('Message'),
            'index'=> 'message',
            'type'=> 'text',
            ));
        return parent::_prepareColumns();
    }


    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }


}