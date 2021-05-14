<?php

namespace Controller\Admin\Question;

class Option extends \Controller\Core\Admin{

    public function saveAction()
    {
        // echo "<pre>";
        // print_r($_POST);die;
        $question=\Mage::getModel("Model\Question");
        $option=\Mage::getModel("Model\Question\Option");
        $questionId=$this->getRequest()->getGet('questionId');
        
        $query="SELECT `choiceId` FROM `question_option`WHERE `questionId`='{$questionId}'";
        $data=$question->fetchAll($query);
        if($data){
            foreach($data->getData() as $key=>$value){
                $ids[]=$value->choiceId;
            }
        }
        // print_r($_POST['exist']);
        if ($new = $this->getRequest()->getPost('new')) {
            // print_r($new);die;
            // // $answer
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

        if ($exist=$this->getRequest()->getPost('exist')) {
          
            $choice=$exist['choice'];
            $answer=$exist['answer'];
            foreach ($choice as $id => $value) {
                $model=\Mage::getModel("Model\Question\Option")->load($id);
                $model->choice=$value;
                if($model->choiceId==$answer){
                    $model->is_right_choice=1;
                }
                else{
                    $model->is_right_choice=0;
                }
                $model->save();
            }
        }

        // if(isset($ids)&& $ids){
        //     $query="DELETE FROM `question_option` WHERE `choiceId` IN (".implode(",",$ids).")";
        //     $question->delete($query);
        // }

    }
}
?>