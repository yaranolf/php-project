<?php
    /*
        this function checks if a user can login
        and return TRUE or FALSE 
    */
    function canILogin( $username, $password ){
        //$conn = Db::getInstance();
        $conn = new PDO("mysql:host=localhost;dbname=hunter;", "root", "root", null);
        
        $query = "select * from users where email = '".$conn->real_escape_string($username)."'";
        $result = $conn->query($query);
        if( $result->num_rows == 1 ) {
            $user = $result->fetch_assoc();
            if( password_verify($password, $user['password']) ){
                return true;
            }   
        }

        return false;
    
    }


?>