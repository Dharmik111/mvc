<?php
namespace Block\Admin\Question\Edit\Tabs;

class Option extends \Block\Core\Layout{
    protected $question=NULL;
    public function __construct()
    {
        $this->setTemplate("View/admin/question/edit/tabs/option.php");
    }

    public function setQuestion($question=NULL)
    {
        if(!$question){
            $question=\Mage::getModel("Model\Question");
            $id=$this->getRequest()->getGet('questionId');
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
}
?>