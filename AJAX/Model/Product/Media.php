<?php 
namespace Model\Product;

class Media extends \Model\Core\Table 
{
    public function __construct()
    {
        $this->setTableName('productmedia');
        $this->setPrimaryKey('imageId');
    }
}

?>