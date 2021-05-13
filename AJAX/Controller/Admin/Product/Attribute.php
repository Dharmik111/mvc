<?php

namespace Controller\Admin\Product;

class Attribute extends \Controller\Core\Admin 
{
    public function saveAction()
    {
        $productId = $this->getRequest()->getGet('productId');
        $attributeData = $this->getRequest()->getPost('attribute');
        $product = \Mage::getModel('Model\Product')->load($productId);
        $product->setData($attributeData);
        if ($product->save()) {
            $this->getMessage()->setSuccess('Attribute successfully updated');
        }else {
            $this->getMessage()->setFailure('Unable to update attribute');
        }
        $product = \Mage::getModel('Model\Product');
        $leftBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        $editBlock = \Mage::getBlock('Block\Admin\Product\Edit');
        $editBlock = $editBlock->setTab($leftBlock)->setTableRow($product)->toHtml();
        $this->makeResponse($editBlock);
    }
}