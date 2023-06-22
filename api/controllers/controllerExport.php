<?php
include '../core.php';
include '../export.php';
include '../import.php';
include $_SERVER['DOCUMENT_ROOT'].'/test/config.php';

$obj = new Export();

$id = $_POST['idProduct'];

$data = $obj->connect->query("SELECT * FROM `product` WHERE `id`= $id");



while($row = $data->fetch_assoc()){
    $array = array(
        array($row['id'],$row['name'],$row['name_trans'],$row['price'],$row['small_text'],$row['big_text'],$row['user_id'])
    );
    $obj->createCSVFile($array);
}

var_dump($array);

$obj->createFile();

echo $obj->string;