<?php
$content = '<div id="owl-demo"> <div class="item"><img src="{{media url="wysiwyg/owl1.jpg"}}" alt="Owl Image"></div><div class="item"><img src="{{media url="wysiwyg/owl2.jpg"}}" alt="Owl Image"></div><div class="item"><img src="{{media url="wysiwyg/owl3.jpg"}}" alt="Owl Image"></div><div class="item"><img src="{{media url="wysiwyg/owl4.jpg"}}" alt="Owl Image"></div><div class="item"><img src="{{media url="wysiwyg/owl5.jpg"}}" alt="Owl Image"></div><div class="item"><img src="{{media url="wysiwyg/owl6.jpg"}}" alt="Owl Image"></div><div class="item"><img src="{{media url="wysiwyg/owl7.jpg"}}" alt="Owl Image"></div><div class="item"><img src="{{media url="wysiwyg/owl8.jpg"}}" alt="Owl Image"></div></div>';
//if you want one block for each store view, get the store collection
$stores = Mage::getModel('core/store')->getCollection()->addFieldToFilter('store_id', array('gt'=>0))->getAllIds();
//if you want one general block for all the store viwes, uncomment the line below
$stores = array(0);
foreach ($stores as $store){
    $block = Mage::getModel('cms/block');
    $block->setTitle('Owl Carousel');
    $block->setIdentifier('carousel');
    $block->setStores(array($store));
    $block->setIsActive(1);
    $block->setContent($content);
    $block->save();
}