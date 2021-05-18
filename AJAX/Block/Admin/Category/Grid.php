<?php
namespace Block\Admin\Category;

\Mage::loadFileByClassName('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setCollection('Model\Category');
    }

    public function setCollection($collection){
        $collection = \Mage::getModel($collection);
        $query = "SELECT * FROM `category`";
        if($this->getFilter()->hasFilters()){
            $query .= " WHERE ";
            foreach($this->getFilter()->getFilters() as $type=>$filter){
                if($type == 'varchar'){
                    foreach($filter as $key=>$value){
                        $query .= "{$key} LIKE '%{$value}%' && ";
                    }
                }
                if ($type == 'number') {
                    foreach ($filter as $key => $value) {
                        $query .= "`{$key}` LIKE '%{$value}%' && ";
                    }
                }
            }

        $query = substr($query, 0, -4);

        }
        $collection =  $collection->fetchAll($query);
        if($collection){
            $this->collection = $collection->getData();
        }
        if($collection){
            foreach($collection->getData() as $key=>$value){
                $value->name = $this->getName($value->pathId);
            }
        }
        return $this;
    }

    public function prepareColumn()
    {
        $this->addColumn('categoryId', [
            'field' => 'categoryId',
            'label' => 'Id',
            'type' => 'text',
        ]);
        $this->addColumn('name', [
            'method' => 'getName',
            'label' => 'Name',
            'type' => 'text',
        ]);
        $this->addColumn('parentId', [
            'field' => 'parentId',
            'label' => 'ParentId',
            'type' => 'text',
        ]);
        $this->addColumn('pathId', [
            'field' => 'pathId',
            'label' => 'PathId',
            'type' => 'text',
        ]);
        $this->addColumn('status', [
            'field' => 'status',
            'label' => 'Status',
            'type' => 'tinyint',
        ]);
    }

    public function getTitle()
    {
        return "Manage Category";
    }

    public function getName($pathId)
    {
        $pathIds = explode("=",$pathId);
        foreach ($pathIds as $key => $id){
            $name[] = $this->getNameById($id);
        }
        return implode("/",$name);
    }

    public function getNameById($id){
        $query="SELECT `name` FROM `category` WHERE `categoryId`={$id};";
        $categoryModel=\Mage::getModel("Model\Category")->fetchRow($query);
        return $categoryModel->name;
    }
}