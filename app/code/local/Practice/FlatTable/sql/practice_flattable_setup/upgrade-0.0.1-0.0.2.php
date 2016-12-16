<?php
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

/**
 * Create table 'log/customer'
 */
$tableName = $installer->getTable('practice_flattable/flat2');

if($installer->getConnection()->isTableExists($tableName)){
    $installer->getConnection()->dropTable($tableName);
}

$table = $installer->getConnection()
    ->newTable($tableName)
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'ID')
    ->addColumn('parent_product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
    ), 'Product ID')
    ->addColumn('parent_color_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
    ), 'Parent product attribute ID')
    ->addColumn('child_product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
    ), 'Child Product ID')
    ->addColumn('child_product_color_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
    ), 'Child Product Color ID')


    ->addForeignKey(
        $installer->getFkName('catalog/product', 'entity_id',$tableName,'child_product_id'),
        'child_product_id',
        $installer->getTable('catalog/product'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName('catalog/product', 'entity_id',$tableName,'parent_product_id'),
        'parent_product_id',
        $installer->getTable('catalog/product'),
        'entity_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName('eav/attribute_option', 'option_id',$tableName,'parent_color_id'),
        'parent_color_id',
        $installer->getTable('eav/attribute_option'),
        'option_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->addForeignKey(
        $installer->getFkName('eav/attribute_option', 'option_id',$tableName,'child_product_color_id'),
        'child_product_color_id',
        $installer->getTable('eav/attribute_option'),
        'option_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE,
        Varien_Db_Ddl_Table::ACTION_CASCADE
    )
    ->setComment('Example table with FK');
$installer->getConnection()->createTable($table);