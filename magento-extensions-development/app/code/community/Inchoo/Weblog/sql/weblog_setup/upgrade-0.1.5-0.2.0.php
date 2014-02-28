<?php

    $installer = $this;
    $installer->startSetup();
    $installer->getConnection()
        ->changeColumn($installer->getTable('weblog/blogpost'), 'post', 'post', array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable' => false,
            'comment' => 'Blogpost Body'
        )
    );
    $installer->endSetup();
