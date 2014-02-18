<?php

// overriding core model classes
class TutsPlus_Catalog_Model_Category extends Mage_Catalog_Model_Category {

    public function getChildren() {
        return $this->getResource()->getChildren($this, false);
    }

}