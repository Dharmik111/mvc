<?php

namespace Block\Admin\Question;

class Grid extends \Block\Core\Grid{

    public function __construct()
    {
        parent::__construct();
        $this->setCollection("Model\Question");
    }

    public function prepareColumn()
    {
        $this->addColumn('question',[
            'field'=>'question',
            'label'=>'Question',
            'type'=>'varchar'
        ]);
        $this->addColumn('status',[
            'field'=>'status',
            'label'=>'Status',
            'type'=>'tinyint'
        ]);
    }

    public function getTitle()
    {
        return "Manage Question";
    }
}
?>