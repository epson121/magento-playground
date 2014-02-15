<?php

class Training_Animal_Model_Mysql4_Animal extends Mage_Code_Model_Mysql4_Abstract {

	protected function _construct() {
		$this>_init('training/animal', 'entity_id');
	}

}