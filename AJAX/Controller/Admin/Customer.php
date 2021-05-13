<?php

namespace Controller\Admin;
class Customer extends \Controller\Core\Admin
{
    public function gridAction(){
        try{
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $e->getMessage();
        }
    }
    public function saveAction(){
        try{
            $id = $this->getRequest()->getGet('customerId');
            $customer = \Mage::getModel('Model\Customer');
            if($id){
                $customer = $customer->load($id);
                if(!$customer){
                    throw new \Exception("Record Not Found.");
                }
            }
            $customer = $customer->setData($this->getRequest()->getPost('customer'));
            if($customer->save()){
                if (!$id) {
                    $this->getMessage()->getSuccess("Successfully Inserted");
                }
                if ($id) {
                    $this->getMessage()->setSuccess("Successfully Updated");
                }
            }else{
                if (!$id) {
                    $this->getMessage()->getFailure("Unable to Inserted");
                }
                if ($id) {
                    $this->getMessage()->setSuccess("Unable to Updated");
                }
            }
            
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function deleteAction(){
        try{
            $id = $this->getRequest()->getGet('customerId');
            $customer = \Mage::getModel('Model\Customer');
            $customerAddress = \Mage::getModel('Model\Customer\Address');
            $customerAddress = $customerAddress->load($id, 'customerId');
            $customer->load($id);
            if($id != $customer->customerId){
                throw new \Exception('Id is Invalid');
            }
            // $query = "DELETE FROM `customer_address` WHERE `{$customer->getPrimaryKey()}` = {$customer->customerId}";
            if($customer->delete() && $customerAddress->delete()){
                $this->getMessage()->setSuccess("Delete Succcessfuly");
            }
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

	public function editFormAction(){
        try{
            $customer = \Mage::getModel('Model\Customer');
            $id = (int)$this->getrequest()->getGet('customerId');
            if($id){
                $customer = $customer->load($id);
                if(!$customer){
                    throw new \Exception('No Record Found!!');
                }
            }

            $leftBlock = \Mage::getBlock('Block\Admin\Customer\Edit\Tabs');
            $editBlock = \Mage::getBlock('Block\Admin\Customer\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($customer)->toHtml();
            $this->makeResponse($editBlock);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
   }

    public function addressSaveAction(){
        try{

            $billingData = $this->getRequest()->getPost('billing');
            $shippingData = $this->getRequest()->getPost('shipping');

            $id = $this->getRequest()->getGet('customerId');
            // print_r($id);die;
            $customer = \Mage::getModel('Model\Customer');
            $customer->customerId = $id;

            if($billing = $customer->getBillingAddress()){
                $billing->setData($billingData);
            }else{
                $billing = \Mage::getModel('Model\Customer\Address')->setData($billingData);
                $billing->addressType = 'billing';
                $billing->customerId = $id;
            }
            $billing->save();

            if($shipping = $customer->getShippingAddress()){
                $shipping->setData($shippingData);
            }else{
                $shipping = \Mage::getModel('Model\Customer\Address')->setData($shippingData);
                $shipping->addressType = 'shipping';
                $shipping->customerId = $id;
            }
            $shipping->save();

            $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    
    public function statusAction()
    {
        $customer = \Mage::getModel('Model\Customer');
        $id = $this->getRequest()->getGet('customerId');
        if ($id) {
            $customer = $customer->load($id);
            if (!$customer) {
                throw new \Exception("Invalid Id is given");
            }
        }
        else {
            throw new \Exception("Id is invalid");
        }
        if ($customer->status == 'Enable') {
            $customer->status = 'Disable';
        }
        else {
            $customer->status = 'Enable';
        }
        if ($customer->save()) {
            $this->getMessage()->setSuccess("Status changed Successfully");
        }
        else {
            $this->getMessage()->setFailure('Unable to change status');
        }
        $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function filterAction(){
        $this->getFilter()->setFilters($this->getRequest()->getPost('field'));
        $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
        $this->makeResponse($grid);
    }
}
