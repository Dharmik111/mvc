<?php
namespace Block\Admin\Question\Edit\Tabs;

class Question extends \Block\Core\Layout{
    protected $question=Null;
    public function __construct()
    {
        $this->setTemplate("View/admin/question/edit/tabs/question.php");
    }

    public function setQuestion($question = Null)
    {
        if($question){
            $this->question=$question;
            return $this;
        }   
        $question=\Mage::getModel("Model\Question");

        if($id=$this->getRequest()->getGet('questionId')){
            $question=$question->load($id);
        }
        $this->question=$question;
        return $this;
    }

    public function getQuestion()
    {
        if(!$this->question){
            $this->setQuestion();
        }
        return $this->question;
    }

    public function getTitle()
    {
        $id=$this->getRequest()->getGet('questionId');
        if(!$id){
            return "Add Question";
        }else{
            return "Update Question";
        }
    }
}
?>