<?php

class Core{
    public $connect;

    public function __construct(){
        $this->connect = new mysqli(HOST,USER,PASSWORD,DB);
        $this->connect->set_charset("utf8");
        if($this->connect->connect_error)
            exit("нет соединения с БД");
    }

    public function __destruct(){
        $this->connect->close();
    }
}