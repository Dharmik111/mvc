<?php

namespace Controller\Admin;
class Product extends \Controller\Core\Admin
{
    public function gridAction(){
        try{
            $grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $e->getMessage();
        }
    }
    public function saveAction(){
        try{
            $product = \Mage::getModel('Model\Product');
            $id = $this->getRequest()->getGet('productId');
            if($id){
                $product = $product->load($id);
                if(!$product){
                    throw new \Exception("Record Not Found.");
                }
            }
            $product = $product->setData($this->getRequest()->getPost('product'));
            if($product->save()){
                if ($id) {
                    $this->getMessage()->setSuccess("Successfully Updated");
                }
                $this->getMessage()->setSuccess('Successfully Inserted');
            }else{
                if ($id) {
                    $this->getMessage()->setSuccess("Unable to Update");
                }
                $this->getMessage()->setSuccess("Unable to Insert");
            }

            $grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function deleteAction(){
        try{
            $id = $this->getRequest()->getGet('productId');
            $product = \Mage::getModel("Model\Product");
            $product->load($id);
            if($id != $product->productId){
                throw new \Exception('Id is Invalid');
            }
            if($product->delete()){
                $this->getMessage()->setSuccess("Delete Successfully");
            }
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function editFormAction(){
        try{
            $product = \Mage::getModel('Model\Product');
            $id = (int)$this->getrequest()->getGet('productId');
            if($id){
                $product = $product->load($id);
                if(!$product){
                    throw new \Exception('No Record Found!!');
                }
            }

            $leftBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
            $editBlock = \Mage::getBlock('Block\Admin\Product\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($product)->toHtml();
            $this->makeResponse($editBlock);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
   }

    public function groupPriceAction(){
        $product = \Mage::getModel('Model\Product');
        $id = $this->getRequest()->getPost('productId');
        $productGroup = \Mage::getModel('Model\Product\Group\Price');
        $data = $this->getRequest()->getPost();
        if(array_key_exists('old',$data['price'])){
            $old = $data['price']['old'];
            foreach($old as $key=>$value){
                $query = "UPDATE `{$productGroup->getTableName()}` 
                    SET `price`='{$value}' 
                    WHERE `{$product->getPrimaryKey()}` = '{$id}' && `customerGroupId`='{$key}'";
                $productGroup->save($query);
            }
        }
        if(array_key_exists('new',$data['price'])){
            $new = $data['price']['new'];
            foreach($new as $key=>$value){
                if(!$value){ continue; }
                $query = "INSERT INTO `{$productGroup->getTableName()}` (`{$product->getPrimaryKey()}`, `customerGroupId`, `price`)
                    VALUES({$id}, {$key}, '{$value}')";
                $product->save($query);
            }
        }
        $grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function statusAction()
    {
        $product = \Mage::getModel('Model\Product');
        $id = $this->getRequest()->getGet('productId');
        if ($id) {
            $product = $product->load($id);
            if (!$product) {
                throw new \Exception("Invalid Id is given");
            }
        }
        else {
            throw new \Exception("Id is invalid");
        }
        if ($product->status == 'Enable') {
            $product->status = 'Disable';
        }
        else {
            $product->status = 'Enable';
        }
        if ($product->save()) {
            $this->getMessage()->setSuccess("Status changed Successfully");
        }
        else {
            $this->getMessage()->setFailure('Unable to change status');
        }
        $grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function filterAction(){
        $this->getFilter()->setFilters($this->getRequest()->getPost('field'));
        $grid = \Mage::getBlock('Block\Admin\Product\Grid')->toHtml();
        $this->makeResponse($grid);
    }

}

?>