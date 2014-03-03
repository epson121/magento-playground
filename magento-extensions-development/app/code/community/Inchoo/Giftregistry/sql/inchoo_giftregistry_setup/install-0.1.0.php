<?php

$installer = $this;
$installer->startSetup();



/**
 * Create Registry Type Table 
 *
 *
 */

$tableName = $installer->getTable('inchoo_giftregistry/type');
// Check if the table already exists
if ($installer->getConnection()->isTableExists($tableName) != true) {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_giftregistry/type'))
        ->addColumn('type_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ), 'Type Id')
        ->addColumn('code', Varien_Db_Ddl_Table::TYPE_TEXT, 25, array(
            'nullable'  => true,
        ), 'Code')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 250, array(
            'nullable'  => true,
        ), 'name')
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 250, array(
            'nullable'  => true,
        ), 'Description')
        ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Store Id')
        ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
            'unsigned'  => true,
            'nullable'  => false,
            'default'   => '1',
        ), 'Is Active')
        ->setComment('Magento Developers Guide Type Table');
    $installer->getConnection()->createTable($table);
}

/**
 * Create Registry Entity Table 
 *
 *
 */
$tableName = $installer->getTable('inchoo_giftregistry/entity');
// Check if the table already exists
if ($installer->getConnection()->isTableExists($tableName) != true) {
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
            ),
            'Entity Id'
        )
        ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Customer Id'
        )
        ->addColumn('type_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Type Id'
        )
        ->addColumn('website_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Website Id'
        )
        ->addColumn('event_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
            array(),
            'Event Name'
        )
        ->addColumn('event_date', Varien_Db_Ddl_Table::TYPE_DATE, null,
            array(),
            'Event Date'
        )
        ->addColumn('event_country', Varien_Db_Ddl_Table::TYPE_TEXT, 3,
            array(),
            'Event Country'
        )
        ->addColumn('event_location', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
            array(),
            'Event Location'
        )
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null,
            array(
                'nullable' => false,
            ),
            'Created At')
        ->addIndex($installer->getIdxName('inchoo_giftregistry/entity', array('customer_id')),
            array('customer_id'))
        ->addIndex($installer->getIdxName('inchoo_giftregistry/entity', array('website_id')),
            array('website_id'))
        ->addIndex($installer->getIdxName('inchoo_giftregistry/entity', array('type_id')),
            array('type_id'))
        ->addForeignKey(
            $installer->getFkName(
                'inchoo_giftregistry/entity',
                'customer_id',
                'customer/entity',
                'entity_id'
            ),
            'customer_id', $installer->getTable('customer/entity'), 'entity_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey(
            $installer->getFkName(
                'inchoo_giftregistry/entity',
                'website_id',
                'core/website',
                'website_id'
            ),
            'website_id', $installer->getTable('core/website'), 'website_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey(
            $installer->getFkName(
                'inchoo_giftregistry/entity',
                'type_id',
                'inchoo_giftregistry/type',
                'type_id'
            ),
            'type_id', $installer->getTable('inchoo_giftregistry/type'), 'type_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);

    $installer->getConnection()->createTable($table);
}

/**
 * Create Registry Item Table 
 *
 *
 */
$tableName = $installer->getTable('inchoo_giftregistry/item');
// Check if the table already exists
if ($installer->getConnection()->isTableExists($tableName) != true) {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('inchoo_giftregistry/item'))
        ->addColumn('item_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ), 'Type Id')
        ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable'  => false
        ), 'Type Id')
        ->addColumn('registry_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable'  => false
        ), 'Type Id')
        ->addColumn('added_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null,
            array(
                'nullable' => false,
            ),
            'Added At')
        ->addIndex($installer->getIdxName('inchoo_giftregistry/item', array('product_id')),
            array('product_id'))
        ->addIndex($installer->getIdxName('inchoo_giftregistry/item', array('registry_id')),
            array('registry_id'));
    $installer->getConnection()->createTable($table);
}


$installer->endSetup();