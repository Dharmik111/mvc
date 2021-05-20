<?php

namespace Controller\Admin\Question;

class Option extends \Controller\Core\Admin{

    public function saveAction()
    {
        $question=\Mage::getModel("Model\Question");
        $option=\Mage::getModel("Model\Question\Option");
        $questionId=$this->getRequest()->getGet('questionId');
        
        $query="SELECT `choiceId` FROM `question_option` WHERE `questionId`='{$questionId}'";
        $data=$question->fetchAll($query);
        if($data){
            foreach($data->getData() as $key=>$value){
                $ids[]=$value->choiceId;
            }
        }

        if ($exist = $this->getRequest()->getPost('exist')) {
            foreach ($exist as $key => $value) {
                if (gettype($key) == "integer") {
                    $query = "UPDATE `{$option->getTableName()}` SET `choice` = '{$value['choice']}',`questionId`= '{$questionId}' , ";
                    unset($ids[array_search($key, $ids)]);
                    $query .= "`is_right_choice` = 0 WHERE `choiceId` = '{$key}'";
                    $question->save($query);
                }
                if (gettype($key) != 'integer') {
                    $query = "UPDATE `{$option->getTableName()}` SET `is_right_choice` = 1 WHERE `choiceId` = '{$value}'";
                    $question->save($query);
                }
            }
        }

        if ($new = $this->getRequest()->getPost('new')) {
            foreach ($new as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    $newArray[$key2][$key] = $value2;
                }
            }
            foreach ($newArray as $key => $value) {
               $query="INSERT INTO `question_option`(`choice`,`questionId`)
                VALUES('{$value['choice']}','{$questionId}')";
                $question->save($query);
            }
        }

        if(isset($ids)&& $ids){
            $query="DELETE FROM `question_option` WHERE `choiceId` IN (".implode(",",$ids).")";
            $question->delete($query);
        }
        $left = \Mage::getBlock("Block\Admin\Question\Edit\Tabs");
        $edit = \Mage::getBlock("Block\Admin\Question\Edit");
        $edit = $edit->setTab($left)->setTableRow($question)->toHtml();
        $this->makeResponse($edit);
    }
}
?>