<?php
include '../core.php';
include '../import.php';
include $_SERVER['DOCUMENT_ROOT'].'/test/config.php';

$stringCSV = str_replace("\n",";",$_POST['tableCSV']); 
// $stringCSV = explode("\n",$_POST['tableCSV']);
// str_getcsv(
//     string $stringCSV,
//     string $separator = ";",
//     string $enclosure = "\"",
//     string $escape = "\\"
// ): array



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



// $csv = array_map('str_getcsv', $stringCSV);
// array_walk($csv, function(&$a) use ($csv) {
//   $a = array_combine($csv[0], $a);
// });
// array_shift($csv); # remove column header

$import = new Import($arrayCSV);
$text = $import->checkID();
var_dump($arrayCSV);
echo $text;