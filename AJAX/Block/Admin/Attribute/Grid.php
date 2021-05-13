<?php
namespace Block\Admin\Attribute;

class Grid extends \Block\Core\Grid{
    public function __construct(){
        parent::__construct();
        $this->setCollection('Model\Attribute');
    }

    public function prepareColumn(){
        $this->addColumn('attributeId',[
            'field'=>'attributeId',
            'label'=>'Attribute Id',
            'type'=>'number'
        ]);
        $this->addColumn('name',[
            'field'=>'name',
            'label'=>'Name',
            'type'=>'text'
        ]);
        $this->addColumn('entityTypeId',[
            'field'=>'entityTypeId',
            'label'=>'Entity Type Id',
            'type'=>'number'
        ]);
        $this->addColumn('inputType',[
            'field'=>'inputType',
            'label'=>'Input Type',
            'type'=>'text'
        ]);
        $this->addColumn('backEndType',[
            'field'=>'backEndType',
            'label'=>'BackEnd Type',
            'type'=>'text'
        ]);
        $this->addColumn('sortOrder',[
            'field'=>'sortOrder',
            'label'=>'Sort Order',
            'type'=>'number'
        ]);
        $this->addColumn('backEndModel',[
            'field'=>'backEndModel',
            'label'=>'BackEnd Model',
            'type'=>'number'
        ]);
    }

    public function getTitle(){
        return "Manage Attribute";
    }
}