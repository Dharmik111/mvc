<?php

namespace Block\Admin\Question;

class Grid extends \Block\Core\Grid{

    public function __construct()
    {
        parent::__construct();
        $this->setCollection("Model\Question");
    }

    public function setCollection($collection){
        $collection = \Mage::getModel($collection);
        $query = "SELECT q.`questionId`,
            q.`question`, 
            q.`status`,
            GROUP_CONCAT(o.`choice`)as choice
        FROM `question` as q
        LEFT JOIN `question_option` as o
        ON q.`questionId` = o.`questionId`";
        if($this->getFilter()->hasFilters()){
            $query .= " WHERE ";
            foreach($this->getFilter()->getFilters() as $type=>$filter){
                if($type == 'varchar'){
                    foreach($filter as $key=>$value){
                        $query .= "{$key} LIKE '%{$value}%' && ";
                    }
                }
                if($type == 'int'){
                    foreach($filter as $key=>$value){
                        if($key=='questionId'){
                            $key="c.$key";
                        }
                        $query .= "{$key} LIKE '%{$value}%' && ";
                    }
                }
            }

            $query = substr($query, 0, -4);

        }
        $query.= "GROUP BY  q.`question`";
        $collection =  $collection->fetchAll($query);
        if($collection){
            $this->collection = $collection->getData();
        }
        if($collection){
            foreach($collection->getData() as $key=>$value){
                $value->is_right_choice = $this->getRightAnswer($value->questionId);
            }
        }
        return $this;
    }

    public function getRightAnswer($questionId){
        $query = "SELECT `choice` FROM `question_option` 
                    WHERE `questionId`={$questionId} 
                    AND `is_right_choice`= 1";

        $model = \Mage::getModel('Model\Question\Option')->fetchRow($query);
       return $model->choice;
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
        $this->addColumn('choice',[
            'field'=>'choice',
            'label'=>'Options',
            'type'=>'varchar'
        ]);
        $this->addColumn('is_right_choice',[
            'field'=>'is_right_choice',
            'label'=>'Ans',
            'type'=>'int'
        ]);
    }

    public function getTitle()
    {
        return "Manage Question";
    }
}
?>