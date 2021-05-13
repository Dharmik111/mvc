<?php

namespace Controller\Admin;
class CmsPages extends \Controller\Core\Admin{

    public function gridAction(){
        try{
            $grid = \Mage::getBlock('Block\Admin\CmsPages\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction(){
        try{
            $cmsPages = \Mage::getModel('Model\CmsPages');
            if($id = $this->getRequest()->getGet('pageId')){
                $cmsPages = $cmsPages->load($id);
                if(!$cmsPages){
                    throw new \Exception("Record Not Found.");
                }
            }
            $cmsPages = $cmsPages->setData($this->getRequest()->getPost('cmsPages'));
            if($cmsPages->save()){
                $this->getMessage()->setSuccess("Successfully Update/Insert");
            }else{
                $this->getMessage()->setSuccess("Unable to Update/Insert");
            }

            $grid = \Mage::getBlock('Block\Admin\CmsPages\Grid')->toHtml();
            $this->makeResponse($grid);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function deleteAction(){
        try{
            $id = (int)$this->getRequest()->getGet('pageId');
            $cmsPages = \Mage::getModel("Model\CmsPages");
            $cmsPages->load($id);
            if($cmsPages->pageId != $id){
                throw new \Exception('Id is Invalid');
            }
            if($cmsPages->delete()){
                $this->getMessage()->setSuccess("Delete Successfully");
            }
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\CmsPages\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function editFormAction(){
        try{
            $cms = \Mage::getModel('Model\CmsPages');
            $id = (int)$this->getrequest()->getGet('pageId');
            if($id){
                $cms = $cms->load($id);
                if(!$cms){
                    throw new \Exception('No Record Found!!');
                }
            }

            $leftBlock = \Mage::getBlock('Block\Admin\CmsPages\Edit\Tabs');
            $editBlock = \Mage::getBlock('Block\Admin\CmsPages\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($cms)->toHtml();
            $this->makeResponse($editBlock);
        }catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function statusAction()
    {
        $cmsPage = \Mage::getModel('Model\CmsPages');
        $id = $this->getRequest()->getGet('pageId');
        if ($id) {
            $cmsPage = $cmsPage->load($id);
            if (!$cmsPage) {
                throw new \Exception("Invalid Id is given");
            }
        }
        else {
            throw new \Exception("Id is invalid");
        }
        if ($cmsPage->status == 'Enable') {
            $cmsPage->status = 'Disable';
        }
        else {
            $cmsPage->status = 'Enable';
        }
        if ($cmsPage->save()) {
            $this->getMessage()->setSuccess("Status changed Successfully");
        }
        else {
            $this->getMessage()->setFailure('Unable to change status');
        }
        $grid = \Mage::getBlock('Block\Admin\CmsPages\Grid')->toHtml();
        $this->makeResponse($grid);
        
    }

    public function filterAction(){
        $this->getFilter()->setFilters($this->getRequest()->getPost('field'));
        $grid = \Mage::getBlock('Block\Admin\CmsPages\Grid')->toHtml();
        $this->makeResponse($grid);
    }
}


?>