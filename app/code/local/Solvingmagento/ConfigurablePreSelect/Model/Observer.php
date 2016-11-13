<?php
class Solvingmagento_ConfigurablePreSelect_Model_Observer{
    public function preSelectConfigurable(Varien_Event_Observer $observer)
    {
        $product    = $observer->getEvent()->getProduct();
        $request    = Mage::app()->getRequest();
        $controller = $request->getControllerName();
        $action     = $request->getActionName();
        $candidates = array();
        if (($action === 'view') && ($controller === 'product') && ($product->getTypeId() === 'configurable')) {
            $configurableAttributes = $product->getTypeInstance(true)
                ->getConfigurableAttributes($product);

            $usedProducts = $product->getTypeInstance(true)
                ->getUsedProducts(null, $product);
            foreach ($usedProducts as $childProduct) {
                if (!$childProduct->isSaleable()) {
                    continue;
                }
                $candidates = array();
                foreach ($configurableAttributes as $attribute) {
                    $productAttribute   = $attribute->getProductAttribute();
                    $productAttributeId = $productAttribute->getId();
                    $attributeValue     = $childProduct->getData($productAttribute->getAttributeCode());
                    array_push($candidates , $candidates[$productAttributeId] = $attributeValue);

                }
                break;
            }
            $preconfiguredValues = new Varien_Object();
            $preconfiguredValues->setData('super_attribute', $candidates);
            $product->setPreconfiguredValues($preconfiguredValues);

        }
    }
}