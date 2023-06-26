<?php
include '../core.php';
include '../import.php';
include $_SERVER['DOCUMENT_ROOT'].'/test/config.php';

$stringCSV = str_replace("\n",";",$_POST['tableCSV']); 



$array = str_getcsv($stringCSV,";","\"");

$arrayCSV = array();

for($i = 7 ; $i < count($array); $i+=8){
    $arrayCSV = array(
        "$array[0]" => $array[$i],
        "$array[1]" =>$array[$i+1],
        "$array[2]" =>$array[$i+2],
        "$array[3]" =>$array[$i+3],
        "$array[4]" =>$array[$i+4],
        "$array[5]" => $array[$i+5],
        "$array[6]" => $array[$i+6]
    );
}

$import = new Import($arrayCSV);
$text = $import->checkID();
echo $text;