<?php 

namespace Controller\Admin;

class Question extends \Controller\Core\Admin{
    public function gridAction()
    {
        $grid=\Mage::getBlock("Block\Admin\Question\Grid")->toHtml();
        $this->makeResponse($grid);
    }

    public function editFormAction()
    {
        try{
            $question=\Mage::getModel("Model\Question");
            $id=$this->getRequest()->getGet('questionId');
            if($id){
                $question=$question->load($id);
                if(!$question){
                    throw new \Exception("Id Is Invalid!!");
                }
            }
            $left=\Mage::getBlock("Block\Admin\Question\Edit\Tabs");
            $edit=\Mage::getBlock("Block\Admin\Question\Edit");
            $edit=$edit->setTab($left)->setTableRow($question)->toHtml();
            $this->makeResponse($edit);
        }
        catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction()
    {
        try {
            $question=\Mage::getModel("Model\Question");
            if($id=$this->getRequest()->getGet('questionId')){
                $question=$question->load($id);
                if(!$question){
                    throw new \Exception("Record Not Found..");
                }
            }
            $question=$question->setData($this->getRequest()->getPost('question'));
            if($question->save()){
                $this->getMessage()->setSuccess("SuccessFullly Inserted/Updated.");
            }else{
                $this->getMessage()->setSuccess("Unable To Inserted/Updated.");
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid=\Mage::getModel("Block\Admin\Question\Grid")->toHtml();
        $this->makeResponse($grid);
    }

    public function deleteAction()
    {
        try {
            $id=(int)$this->getRequest()->getGet('questionId');
            // print_r($id);die;
            $question=\Mage::getModel("Model\Question");
            $question->load($id);
            if($question->questionId != $id){
                throw new \Exception("Id Id Invalid..");
            }
            if($question->delete()){
                $this->getMessage()->setSuccess("Delete Succesfully..");
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid=\Mage::getBlock("Block\Admin\Question\Grid")->toHtml();
        $this->makeResponse($grid);
    }

    public function statusAction()
    {
        $question = \Mage::getModel('Model\Question');
        $id = $this->getRequest()->getGet('questionId');
        if ($id) {
            $question = $question->load($id);
            if (!$question) {
                throw new \Exception("Invalid Id is given");
            }
        }
        else {
            throw new \Exception("Id is invalid");
        }
        if ($question->status == 'Enable') {
            $question->status = 'Disable';
        }
        else {
            $question->status = 'Enable';
        }
        if ($question->save()) {
            $this->getMessage()->setSuccess("Status changed Successfully");
        }
        else {
            $this->getMessage()->setFailure('Unable to change status');
        }
        $grid = \Mage::getBlock('Block\Admin\Question\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function filterAction()
    {
        $this->getFilter()->setFilters($this->getRequest()->getPost('filed'));
        $grid=\Mage::getBlock("Block\Admin\Question\Grid")->toHtml();
        $this->makeResponse($grid);
    }
}
?>