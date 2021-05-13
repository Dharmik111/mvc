<?php

namespace Controller\Admin;
class ConfigGroup extends \Controller\Core\Admin{
    public function gridAction(){
        $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function editFormAction(){
        $configGroup = \Mage::getModel('Model\ConfigGroup');
        $id = (int)$this->getRequest()->getGet('groupId');
        if($id){
            $configGroup = $configGroup->load($id);
            if(!$configGroup){
                throw new \Exception('No Record Found!!');
            }
        }

        $edit = \Mage::getBlock('Block\Admin\ConfigGroup\Edit');
        $left = \Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs');
        $edit = $edit->setTab($left)->setTableRow($configGroup)->toHtml();
        $this->makeResponse($edit);
    }

    public function saveAction(){
        try{
            $configGroup = \Mage::getModel('Model\ConfigGroup');
            if($id = $this->getRequest()->getGet('groupId')){
                $configGroup = $configGroup->load($id);
                if(!$configGroup){
                    throw new \Exception("Record Not Found.");
                }
            }
            $configGroup = $configGroup->setData($this->getRequest()->getPost('configGroup'));
            if($configGroup->save()){
                $this->getMessage()->setSuccess("Successfully Update/Insert");
            }else{
                $this->getMessage()->setSuccess("Unable to Update/Insert");
            }

            $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function deleteAction(){
        try{
            $id = (int)$this->getRequest()->getGet('groupId');
            $configGroup = \Mage::getModel('Model\ConfigGroup')->load($id);
            if(!$configGroup){
                throw new \Exception("Invalid Id");
            }
            if($configGroup->delete()){
                $this->getMessage()->setSuccess('Delete Successfully');
            }
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function filterAction(){
        $this->getFilter()->setFilters($this->getRequest()->getPost('field'));
        $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Grid')->toHtml();
        $this->makeResponse($grid);
    }

}

?>