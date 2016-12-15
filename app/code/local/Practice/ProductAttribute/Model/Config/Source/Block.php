<?php
class Practice_ProductAttribute_Model_Config_Source_Block extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {

    public function getAllOptions () {
        if (is_null($this->_options)) {
            $this->_options = [
                [
                    'value' => '',
                    'label' => ''
                ]
            ];
            foreach (Mage::getModel('cms/block')->getCollection() as $block) {
                $id = $block->getId();
                $name = $block->getIdentifier();
                if ($id != 0) {
                    $this->_options[] = ['value' => $id, 'label' => $name];
                }
            }
        }
        return $this->_options;
    }

}