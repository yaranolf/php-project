<?php

include 'classes/Db.php';
    /*
        this function checks if a user can login
        and return TRUE or FALSE
    */
    function Login($email, $password)
    {
        $conn = Db::getInstance();

        // check of rehash van password gelijk is aan hash uit db
        $statement = $conn->prepare('select * from users where email = :email');
        $statement->bindParam(':email', $email);
        $result = $statement->execute();
        var_dump($result);

        $user = $statement->fetch(PDO::FETCH_ASSOC);
        var_dump($user);

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['userid'] = $user['id'];
            header('Location:index.php');

        //fout > error
        } else {
            $error = true;
        }

        return false;
    }
