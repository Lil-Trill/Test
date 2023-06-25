<?php

class Import extends Core{
    
    private $arrayCSV;

    public function __construct($array){
        parent::__construct();
        $this->arrayCSV = $array;
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
        $name =  $this->arrayCSV['name'];
        $name_trans = $this->arrayCSV['name_trans'];
        $price = $this->arrayCSV['price'];
        $small_text = $this->arrayCSV['small_text'];
        $big_text = $this->arrayCSV['big_text'];
        $user_id = $this->arrayCSV['user_id'];
        $id = $this->arrayCSV['id'];

        var_dump($name);

        if($this->connect->query("INSERT INTO `product` (`id`, `name`, `name_trans`, `price`, `small_text`, `big_text`, `user_id`) VALUES (null, '$name', '$name_trans',  $price, '$small_text', '$big_text', $user_id)"))return "данные успешно добавлены";
        else return "данные не были отправлены".$this->connect->error;
        
        
    }

    public function updateDB(){
        $name =  $this->arrayCSV['name'];
        $name_trans = $this->arrayCSV['name_trans'];
        $price = $this->arrayCSV['price'];
        $small_text = $this->arrayCSV['small_text'];
        $big_text = $this->arrayCSV['big_text'];
        $user_id = $this->arrayCSV['user_id'];
        $id = $this->arrayCSV['id'];
        if($user_id == '') $user_id = null;
        var_dump($user_id);
        if($this->connect->query("UPDATE `product`
        SET name = '$name',
        name_trans = '$name_trans',
        price = $price,
        small_text = '$small_text',
        big_text = '$big_text',
        user_id =  $user_id
        WHERE id = $id")) return "данные обнавлены успешно";
        else return "Ошибка".$this->connect->error;
    }
}

//вставка в бд:
// INSERT INTO `product` (`id`, `name`, `name_trans`, `price`, `small_text`, `big_text`, `user_id`) VALUES (NULL, 'Блендер', NULL, '4000', 'Погружной блендер', 'Погружной блендер оптимален для применения в бытовых условиях. Модель имеет три насадки: для измельчения, венчик и миксер. За счет этого устройство можно использовать для выполнения разных кулинарных операций. Управление осуществляется электронным способом посредством чувствительных кнопок. Модель поддерживает две скорости, регулировка которых происходит плавно. Это позволяет контролировать показатель в зависимости от потребностей. Чаша измельчителя имеет объем 500 мл. За счет этого за один раз можно переработать оптимальное количество ингредиентов.', NULL);

//обновление данных
// UPDATE `product`
// SET name = "Телевизор"
// WHERE id = 1

// "UPDATE `product`
//         SET name = '$this->arrayCSV[name]',
//         name_trans = '$this->arrayCSV[name_trans]',
//         price = '$this->arrayCSV[price]',
//         small_text = '$this->arrayCSV[small_text]',
//         big_text = '$this->arrayCSV[big_text]',
//         user_id = '$this->arrayCSV[user_id]'
//         WHERE id = '$this->arrayCSV[id]'"
