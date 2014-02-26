<?php

class Training_Animal_Model_Mysql4_Animal_Collection
		extends Mage_Core_Model_Mysql4_Collection_Abstract {

	/**
	 * Initializes a model
	 * @return nothing
	 */
	protected function _construct() {
		$this->_init('training/animal');
	}

}		