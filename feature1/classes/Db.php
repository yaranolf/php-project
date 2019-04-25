<?php 
/*
    abstract class Db {
        private static $conn;

        private static function getConfig(){
            // get the config file
            return parse_ini_file(__DIR__ . "/config/config.ini");
        }
        

        public static function getInstance() {
            if(self::$conn != null) {
                // REUSE our connection
                echo "🚀";
                return self::$conn;
            }
            else {
                // CREATE a new connection

                // get the configuration for our connection from one central settings file
                $config = self::getConfig();
                $database = $config['database'];
                $user = $config['user'];
                $password = $config['password'];

                echo "💥";
                self::$conn = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8mb4', $user, $password);
                return self::$conn;
            }
        }
    }*/

    abstract class Db{
        //kan je geen instanties van maken
        //gewoon een connectie
    
            private static $conn;
    
            public static function getInstance(){
            //this verwijst naar huidig object, in een abstract zijn geen objecten dus sef
    
            $config = parse_ini_file('./config/config.ini');
    
                if(self::$conn != null){
                    echo "connectie hergebruiken";
                    return self::$conn;
                } else{
                    echo "nieuwe connectie maken";
                    self::$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['user'], $config['password']);
                }
            }
        }