<?php
include '../core.php';
include '../export.php';
include '../import.php';
include $_SERVER['DOCUMENT_ROOT'].'/test/config.php';

$text = $_POST['tableCSV'];

// str_getcsv(
//     string $text,
//     string $separator = ";",
//     string $enclosure = "\"",
//     string $escape = "\\"
// ): array

$array = str_getcsv($text,";","\"","\\");

var_dump($array[6]);
echo $text;