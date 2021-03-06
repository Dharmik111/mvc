<?php

namespace Model;
class Admin extends \Model\Core\Table{

    const STATUS_ENABLED = 'Enable';
    const  STATUS_DISABLED = 'Disable';

    public function __construct(){
        $this->setTableName("admin");
        $this->setPrimaryKey("adminId");
    }

    public function getStatusOption(){
        return [
            self::STATUS_ENABLED => "Enabled",
            self::STATUS_DISABLED => "Disabled",
        ];
    }

}


?>