<?php

namespace Model\Question;

class Option extends \Model\Core\Table{
    public function __construct()
    {
        $this->setTableName("question_option");
        $this->setPrimaryKey("choiceId");
    }
}
?>