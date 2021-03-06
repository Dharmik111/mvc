<?php 

namespace Model;
class CustomerGroup extends \Model\Core\Table{
    const STATUS_ENABLED = 1;
    const  STATUS_DISABLED = 0;
    
    public function __construct(){
        $this->setTableName('customer_group');
        $this->setPrimaryKey('groupId');
    }

    public function getStatusOption(){
        return [
            self::STATUS_ENABLED => "Enabled",
            self::STATUS_DISABLED => "Disabled"
        ];

    }
}


?>