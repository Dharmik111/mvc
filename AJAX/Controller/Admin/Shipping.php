<?php
namespace Controller\Admin;
class Shipping extends \Controller\Core\Admin
{
    public function gridAction(){
        try{
            $grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $e->getMessage();
        }
    }
    public function saveAction(){
        try{
            $shipping = \Mage::getModel('Model\Shipping');
            if($id = $this->getRequest()->getGet('methodId')){
                $shipping = $shipping->load($id);
                if(!$shipping){
                    throw new \Exception("Record Not Found.");
                }
            }
            $shipping = $shipping->setData($this->getRequest()->getPost('shipping'));
            if($shipping->save()){
                $this->getMessage()->setSuccess("Successfully Update/Insert");
            }else{
                $this->getMessage()->setSuccess("Unable to Update/Insert");
            }

            $grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function deleteAction(){
        try{
            $id = (int)$this->getRequest()->getGet('methodId');
            $shipping = \Mage::getModel("Model\Shipping");
            $shipping->load($id);
            if($shipping->methodId != $id){
                throw new \Exception('Id is Invalid');
            }
            if($shipping->delete()){
                $this->getMessage()->setSuccess("Delete Successfully");
            }
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function editFormAction(){
        try{
            $shipping = \Mage::getModel('Model\Shipping');
            $id = (int)$this->getrequest()->getGet('methodId');
            if($id){
                $shipping = $shipping->load($id);
                if(!$shipping){
                    throw new \Exception('No Record Found!!');
                }
            }

            $leftBlock = \Mage::getBlock('Block\Admin\Shipping\Edit\Tabs');
            $editBlock = \Mage::getBlock('Block\Admin\Shipping\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($shipping)->toHtml();
            $this->makeResponse($editBlock);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
   }

   public function statusAction()
   {
       $Shipping = \Mage::getModel('Model\Shipping');
       $id = $this->getRequest()->getGet('methodId');
       if ($id) {
           $Shipping = $Shipping->load($id);
           if (!$Shipping) {
               throw new \Exception("Invalid Id is given");
           }
       }
       else {
           throw new \Exception("Id is invalid");
       }
       if ($Shipping->status == 'Enable') {
           $Shipping->status = 'Disable';
       }
       else {
           $Shipping->status = 'Enable';
       }
       if ($Shipping->save()) {
           $this->getMessage()->setSuccess("Status changed Successfully");
       }
       else {
           $this->getMessage()->setFailure('Unable to change status');
       }
       $grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
       $this->makeResponse($grid);
   }

    public function filterAction(){
        $this->getFilter()->setFilters($this->getRequest()->getPost('field'));
        $grid = \Mage::getBlock('Block\Admin\Shipping\Grid')->toHtml();
        $this->makeResponse($grid);
    }
}

?>