<?php

class Test_Module_ModelsController extends Mage_Core_Controller_Front_Action {
	

	// get list of all stores
	public function storesAction() {
		$stores = Mage::getResourceModel('core/store_collection');
		foreach ($stores as $store) {
			echo "<h2>" . $store->getName() . "  " . $store->getCode() . "  " . $store->getRootCategoryId() . "  " .  "</h2>";
			//echo get_class($store);
		}
	}

	// get name of the category for each catalog
	public function categoryAction() {
		$stores = Mage::getResourceModel('core/store_collection');
		foreach ($stores as $store) {
			$category = Mage::getModel('catalog/category')->load($store->getRootCategoryId());
			echo "<h2>".$category->getName()."</h2>";
		}
	}


	// get all root categories (categoriesthat have a level of '1' in catalog_category_entity table)
	public function categoriesAction() {
		$categories = Mage::getResourceModel('catalog/category_collection')
							->addFieldToFilter("level", 1);
							//->addAttributeToSelect('name');

		foreach ($categories as $category) {
			//echo "<h2>".$category->getId()."-".$category->getName()."</h2";
			$children = $category->getChildren();
			$childrenIds = explode('.',$children);
			foreach ($childrenIds as $child) {
				$child = Mage::getModel('catalog/category')->load($child);
				Zend_Debug::dump($child->debug());
			}
		}
	}
}