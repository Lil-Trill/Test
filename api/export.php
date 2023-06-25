<?php
class Export extends Core {
    public $string = "helloasedth";

    //запись файла
    public function createFile(){
        $fp = fopen( $_SERVER['DOCUMENT_ROOT'].'/test/filesCSV/fl.txt','w');
        fwrite($fp,'hello wrold');
        fclose($fp); 
    }

    


     public function createCSVFile($array){
        $file = fopen( $_SERVER['DOCUMENT_ROOT'].'/test/filesCSV/fileCSV'.$array[1][0].'.csv','w');
        foreach($array as $line){
            $status = fputcsv($file,$line,';');
            if($status === false) return false;
        }
        return true;
        fclose($file);
    }
}