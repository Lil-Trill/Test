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
        // $a = array(
        //     array(1,2,3),
        //     array('h1','hello','test'),
        //     array(4,5,6)
        // );
        $file = fopen( $_SERVER['DOCUMENT_ROOT'].'/test/filesCSV/fileCSV'.$array[0][0].'.csv','w');
        foreach($array as $line){
            fputcsv($file,$line,';');
        }
        fclose($file);
    }
}