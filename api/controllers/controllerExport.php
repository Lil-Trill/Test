<?php
include '../core.php';
include '../export.php';
include '../import.php';
include $_SERVER['DOCUMENT_ROOT'].'/test/config.php';

$obj = new Export();

echo $obj->string;