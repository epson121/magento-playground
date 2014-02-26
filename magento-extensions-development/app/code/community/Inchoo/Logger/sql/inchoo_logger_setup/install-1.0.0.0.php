<?php

    $installer = $this;

    $installer->startSetup();

    $table = $installer->getConnection()
                    ->newTable($installer->getTable('inchoo_logger/logger'))
                    ->addColumn('entity_id',
                        Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true),
                        'Id')
                    ->addColumn('timestamp', Varien_Db_Ddl_Table::TYPE_CHAR,
                        25, array('nullable' => false), 'Timestamp')
                    ->addColumn('message', Varien_Db_Ddl_Table::TYPE_TEXT,
                        null, array('nullable' => false), 'Message')
                    ->addColumn('priority', Varien_Db_Ddl_Table::TYPE_INTEGER, 2, array(
                        'nullable' => false), 'Priority')
                    ->addColumn('priority_name',
                        Varien_Db_Ddl_Table::TYPE_VARCHAR, 32, array('nullable' => false), 'Priority Name')
                    ->addColumn('file', Varien_Db_Ddl_Table::TYPE_TEXT, null, array('nullable' => false), 'File');

    $installer->getConnection()->createTable($table);
    $installer->endSetup();
