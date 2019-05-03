<?php
   abstract class Db
   {
       //kan je geen instanties van maken
       //gewoon een connectie

       private static $conn;

       private static function getConfig()
       {
           // get the config file
           return parse_ini_file(__DIR__.'/../config/config.ini');
       }

       public static function getInstance()
       {
           //this verwijst naar huidig object, in een abstract zijn geen objecten dus self

           if (self::$conn != null) {
               //echo "connectie hergebruiken";
               return self::$conn;
           } else {
               $config = self::getConfig();
               //echo "nieuwe connectie maken";
               return self::$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['user'], $config['password']);
           }
       }
   }
