<?php
namespace Block\Admin\Admin;

class Grid extends \Block\Core\Grid{

    public function __construct(){
        parent::__construct();
        $this->setCollection('Model\Admin');
    }

    public function prepareColumn(){
        $this->addColumn('adminId',[
            'field'=>'adminId',
            'label'=>'Admin_Id',
            'type'=>'text'
        ]);
        $this->addColumn('userName',[
            'field'=>'userName',
            'label'=>'Username',
            'type'=>'text'
        ]);
        $this->addColumn('password',[
            'field'=>'password',
            'label'=>'Password',
            'type'=>'text'
        ]);
        $this->addColumn('status',[
            'field'=>'status',
            'label'=>'Status',
            'type'=>'text'
        ]);
        $this->addColumn('createdDate',[
            'field'=>'createdDate',
            'label'=>'Created Date',
            'type'=>'text'
        ]);
    }

    public function getTitle(){
        return "Manage Admin";
    }
}