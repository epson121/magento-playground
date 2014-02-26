<?php

class Test_Module_Block_Html_Breadcrumbs extends Mage_Page_Block_Html_Breadcrumbs {

    protected function _construct() {
        $this->addCrumb('String', array(
                                        'label' => 'Google',
                                        'title' => 'Go to google.',
                                        'link'  => 'http://www.google.com'
                                        )); 
    }
    
}
