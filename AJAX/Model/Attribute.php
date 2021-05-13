<?php

namespace Model;
class Attribute extends \Model\Core\Table{

    const STATUS_NULL = 1;
    const  STATUS_NOT_NULL = 0;

    public function __construct(){
        $this->setTableName("attribute");
        $this->setPrimaryKey("attributeId");
    }

    public function getStatusOption(){
        return [
            self::STATUS_NULL => "Null",
            self::STATUS_NOT_NULL => "Not Null",
        ];
    }

    public function getBackendTypeOption(){
        return [
            'varchar(255)'=>'Varchar',
            'int'=>'Int',
            'decimal'=>'Decimal',
            'text'=>'Text'
        ];
    }

    public function getInputTypeOption(){
        return [
            'text'=>'Text Box',
            'textarea'=>'Text Area',
            'select'=>'Select',
            'checkbox'=>'Checkbox',
            'radio'=>'Radio'
        ];
    }

    public function getEntityTypeOptions(){
        return [
            'product'=>'Product',
            'category'=>'Category'
        ];
    }

    public function getOptions(){
        if(!$this->attributeId){
            return false;
        }
        $attributeOption = \Mage::getModel('Model\Attribute\Option');
        $query = "SELECT * FROM `{$attributeOption->getTablename()}`
            WHERE `{$this->getPrimaryKey()}` = '{$this->attributeId}'
            ORDER BY `sortOrder` ASC";
        if($options = \Mage::getModel('Model\Attribute\Option')->fetchAll($query)){
            $options = $options->getData();
        }
        return $options;
        
    }

}


?>