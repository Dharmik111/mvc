<?php
namespace Model\Attribute;

class Collection extends \Model\Core\Table\Collection
{
   public function __construct()
   {
       \Mage::getModel('Model\Core\Table\Collection');
   }
}

?>