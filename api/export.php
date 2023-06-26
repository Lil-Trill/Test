<?php
class Export extends Core {
    public $string = "helloasedth";


     public function createCSVFile($array){
        $file = fopen( $_SERVER['DOCUMENT_ROOT'].'/test/filesCSV/fileCSV.csv','w');
        foreach($array as $line){
            $status = fputcsv($file,$line,';');
            if($status === false) return false;
        }
        return true;
        fclose($file);
    }
}