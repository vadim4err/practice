<?php
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

/**
 * Create table 'log/customer'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('practice_flattable/flat1'))
    ->addColumn('log_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Log ID')
    ->addColumn('visitor_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'unsigned'  => true,
    ), 'Visitor ID')
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        'default'   => '0',
    ), 'Customer ID')
    ->addColumn('login_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
    ), 'Login Time')
    ->addColumn('logout_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Logout Time')
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Store ID')
    ->addIndex($installer->getIdxName('log/customer', array('visitor_id')),
        array('visitor_id'))
    ->setComment('Log Customers Table');
$installer->getConnection()->createTable($table);