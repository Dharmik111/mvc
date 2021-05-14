<?php
namespace Block\Admin\Question\Edit;

class Tabs extends \Block\Core\Edit\Tabs{
    public function __construct()
    {
        parent::__construct();
    }

    public function prepareTabs()
    {
        $this->addTab('question',['key'=>'question','label'=>'Question','block'=>'Block\Admin\Question\Edit\Tabs\Question']);
        if($this->getRequest()->getGet('questionId')){
            $this->addTab('option',['key'=>'option','label'=>'Options','block'=>'Block\Admin\Question\Edit\Tabs\Option']);
        }
        $this->setDefaultTab('question');
        return $this;
    }
}
?>