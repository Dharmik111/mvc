<?php

namespace Block\Admin\Customer;

class Grid extends \Block\Core\Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setCollection('Model\Customer');
    }

    public function setCollection($collection){
        $collection = \Mage::getModel($collection);
        $query = "SELECT c.`customerId`,
            c.`firstName`, 
            c.`lastName`,
            c.`email`, 
            c.`password`,
            c.`status`,
            a.`address`,
            a.`city`,
            a.`state`,
            a.`zipCode`,
            a.`country`
        FROM `customer` as c
        LEFT JOIN `customer_address` as a
        ON c.`customerId` = a.`customerId`
        AND a.`addressType` = 'shipping'";
        // echo $query;die;
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
                        if($key=='customerId'){
                            $key="c.$key";
                        }
                        $query .= "{$key} LIKE '%{$value}%' && ";
                    }
                }
            }
            $query = substr($query, 0, -4);
        }
        $collection =  $collection->fetchAll($query);
        if($collection){
            $this->collection = $collection->getData();
        }
        return $this;
    }

    public function prepareColumn(){
        $this->addColumn('customerId',[
            'field'=>'customerId',
            'label'=>'Customer Id',
            'type'=>'int'
        ]);
        $this->addColumn('firstName',[
            'field'=>'firstName',
            'label'=>'First Name',
            'type'=>'varchar'
        ]);
        $this->addColumn('lastName',[
            'field'=>'lastName',
            'label'=>'Last Name',
            'type'=>'varchar'
        ]);
        $this->addColumn('email',[
            'field'=>'email',
            'label'=>'Email',
            'type'=>'varchar'
        ]);
        $this->addColumn('password',[
            'field'=>'password',
            'label'=>'Password',
            'type'=>'varchar'
        ]);
        $this->addColumn('status',[
            'field'=>'status',
            'label'=>'Status',
            'type'=>'varchar'
        ]);
        $this->addColumn('address',[
            'field'=>'address',
            'label'=>'Address',
            'type'=>'varchar'
        ]);
        $this->addColumn('city',[
            'field'=>'city',
            'label'=>'City',
            'type'=>'varchar'
        ]);
        $this->addColumn('state',[
            'field'=>'state',
            'label'=>'State',
            'type'=>'varchar'
        ]);
        $this->addColumn('zipCode',[
            'field'=>'zipCode',
            'label'=>'ZipCode',
            'type'=>'int'
        ]);
        $this->addColumn('country',[
            'field'=>'country',
            'label'=>'Country',
            'type'=>'varchar'
        ]);
    }

    public function getTitle()
    {
        return "Manage Customer";
    }
}
