<?php
abstract class Db{ 

    private static $conn;

    public static function getConnection(){
        if( self::$conn !== null ){
            
            //echo "conncted";
            return self::$conn;
    
        } 
        else{
          
           // echo"not";
            self::$conn = new PDO ("mysql:host=localhost;dbname=OOP", "root", "root");
            return self:: $conn;
        }
    }
}