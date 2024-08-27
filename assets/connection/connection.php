<?php
class DATABASE{


    public static $conection ;

    public static function setUpconection(){

    if(!isset(DATABASE::$conection)){
        DATABASE::$conection =new mysqli("localhost","root","","universityOfVavuniya_db","3306");
    }
    }
    public static function iud($q){
    DATABASE::setUpconection();
    DATABASE::$conection->query($q);
    }
    public static function search($q){
        DATABASE::setUpconection();
        $resultset = DATABASE::$conection->query($q);
        return $resultset;
    }
    
}


?>