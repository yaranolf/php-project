<?php
   abstract class Db{
    //kan je geen instanties van maken
    //gewoon een connectie

        private static $conn;

        public static function getInstance(){
        //this verwijst naar huidig object, in een abstract zijn geen objecten dus self

        $config = parse_ini_file('./config/config.ini');

            if(self::$conn != null){
                echo "connectie hergebruiken";
                return self::$conn;
            } else{
                echo "nieuwe connectie maken";
                return self::$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['user'], $config['password']);
            }
        }
    }