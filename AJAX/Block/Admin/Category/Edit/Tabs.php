<?php
namespace Block\Admin\Category\Edit;

class Tabs extends \Block\Core\Edit\Tabs{

    function __construct(){
        parent::__construct();
    }

    public function prepareTabs(){
        $this->addTab('form',['key' => 'form',
                                'label'=>'Form Information',
                                'block'=>'Block\Admin\Category\Edit\Tabs\Form']);
        $this->setDefaultTab('form');
        return $this;
    }
}


?>