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

    public function prepareColumn()
    {
        $this->addColumn('categoryId', [
            'field' => 'categoryId',
            'label' => 'Id',
            'type' => 'text',
        ]);
        $this->addColumn('name', [
            'field' => 'name',
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
}