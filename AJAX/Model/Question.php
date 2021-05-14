<?php

namespace Model;

class Question extends \Model\Core\Table{

    const  STATUS_ENABLED = 'Enable';
    const  STATUS_DISABLED = 'Disable';
    public function __construct()
    {
        $this->setTableName("question");
        $this->setPrimaryKey("questionId");
    }

    public function getStatusOption()
    {
        return[
            self::STATUS_ENABLED =>"Enabled",
            self::STATUS_DISABLED =>"Disabled"
        ];
    }

    public function getOptions()
    {
        if(!$this->questionId){
            return false;
        }
        $option=\Mage::getModel("Model\Question\Option");
        $query = "SELECT * FROM `{$option->getTablename()}`
            WHERE `{$this->getPrimaryKey()}` = '{$this->questionId}'";
         if($option = \Mage::getModel('Model\Question')->fetchAll($query)){
            $option = $option->getData();
        }
        // print_r($option);die;
        return $option;    
    }
}
?>