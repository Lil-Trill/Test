<?php

class Import extends Core{
    
    private $arrayCSV;

    public $name; 
    public $name_trans;
    public $price;
    public $small_text;
    public $big_text;
    public $user_id;
    public $id; 
    public function __construct($array){
        parent::__construct();
        $this->arrayCSV = $array;
        $this->name =  $this->arrayCSV['name'];
        $this->name_trans = $this->arrayCSV['name_trans'];
        $this->price = $this->arrayCSV['price'];
        $this->small_text = $this->arrayCSV['small_text'];
        $this->big_text = $this->arrayCSV['big_text'];
        $this->user_id = $this->arrayCSV['user_id'];
        $this->id = $this->arrayCSV['id'];
    }


    public function checkID(){
        $allID = $this->connect->query("SELECT `id` FROM `product` WHERE 1");
        while($row = $allID->fetch_assoc()){
            if($row['id'] == $this->arrayCSV['id']){
                return $this->updateDB();
            } 
                
            
        }
        return $this->sendNewData();
    }

    public function sendNewData(){

        var_dump($this->name);

        if($this->connect->query("INSERT INTO `product` (`id`, `name`, `name_trans`, `price`, `small_text`, `big_text`, `user_id`) VALUES ($this->id, '$this->name', '$this->name_trans',  $this->price, '$this->small_text', '$this->big_text', null)"))return "данные успешно добавлены";
        else return "данные не были отправлены".$this->connect->error;
        
        
    }

    public function updateDB(){
      
        if($this->user_id == '') $user_id = NULL;
        var_dump($this->user_id);
        if($this->connect->query("UPDATE `product`
        SET name = '$this->name',
        name_trans = '$this->name_trans',
        price = 0,
        small_text = '$this->small_text',
        big_text = '$this->big_text',
        user_id = null
        WHERE id = $this->id")) return "данные обнавлены успешно";
        else return "Ошибка ".$this->connect->error;
    }
}


