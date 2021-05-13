<?php

namespace Controller\Admin\Attribute;

class Option extends \Controller\Core\Admin
{
    public function updateAction(){
        $attribute = \Mage::getModel('Model\Attribute');
        $attributeId = $this->getRequest()->getGet('attributeId');

        $query =  "SELECT `optionId` FROM `attribute_option` WHERE `attributeId`={$attributeId}";
        $data = $attribute->fetchAll($query);
        if($data){
            foreach($data->getData() as $key=>$value){
                $ids[] = $value->optionId;
            }
        }

        if($exist = $this->getRequest()->getPost('exist')){
            foreach ($exist as $key => $value) {
                unset($ids[array_search($key,$ids)]);
                $query = "UPDATE `attribute_option` 
                    SET `name`='{$value['name']}',`attributeId`='{$attributeId}',`sortOrder`={$value['sortOrder']} 
                    WHERE `optionId` = {$key}";
                $attribute->save($query);
            }
        }
        // echo "111";
        if(isset($ids) && $ids){
            // echo "456";die;
            $query = "DELETE FROM `attribute_option` WHERE `optionId` IN (".implode(",",$ids).")";
            $attribute->save($query);
        }
        
        if($new = $this->getRequest()->getPost('new')){
            foreach ($new as $key => $value) {
                foreach($value as $key2=>$value2){
                    $newArray[$key2][$key] = $value2;
                }
            }
            foreach($newArray as $key=>$value){
                $query = "INSERT INTO `attribute_option`(`name`, `attributeId`, `sortOrder`) 
                    VALUES ('{$value['name']}','{$attributeId}',{$value['sortOrder']})";
                $attribute->save($query);
            }
        }
        
        $leftBlock = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs');
        $editBlock = \Mage::getBlock('Block\Admin\Attribute\Edit');
        $editBlock = $editBlock->setTab($leftBlock)->setTableRow($attribute)->toHtml();
        $this->makeResponse($editBlock);
    }
}
