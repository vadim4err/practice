<?php
$installer = $this;
$installer->startSetup();

$entityTypeId = 'catalog_product';
$attributeCode = 'size_guide';
$attribute = array(
    'attribute_model' => NULL,
    'backend' => NULL,
    'type' => 'int',
    'table' => NULL,
    'frontend' => NULL,
    'input' => 'select',
    'label' => 'Size Guide',
    'frontend_class' => NULL,
    'source' => 'practice_productattribute/config_source_block',
    'required' => 0,
    'user_defined' => 1,
    'default' => '',
    'unique' => 0,
    'note' => 'Size Guide',
    'apply_to' => 'configurable',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => false,
    'searchable' => false,
    'filterable' => false,
    'comparable' => false,
    'visible_on_front' => false,
    'group' => 'Clothing'

);
$installer->addAttribute($entityTypeId, $attributeCode, $attribute);

$attributeId = $installer->getAttribute('catalog_product','size_guide','attribute_id');
$attributeSetId = $installer->getAttributeSetId('catalog_product','Clothing');

$attributeGroupId = $installer->getAttributeGroup('catalog_product',$attributeSetId,'Clothing','attribute_group_id');

$installer->addAttributeToSet('catalog_product',$attributeSetId,$attributeGroupId,$attributeId);

$installer->endSetup();