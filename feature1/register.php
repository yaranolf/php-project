<?php 
    require_once("bootstrap.php");

    if(!empty($_POST)){
        $user = new User();
        $user->setFirstName($_POST['firstname']);
        $user->setLastName($_POST['lastname']);
        $user->setUserName($_POST['username']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        //$user->setPasswordConfirmation($_POST['password_confirmation']);
        $user->register();
        var_dump($user->register());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="">
    <form action="" method="post">
        <label for="firstname">Firstname</label>
        <input type="text" id="firstname" name="firstname">

        <label for="lastname">Lastname</label>
        <input type="text" id="lastname" name="lastname">

        <label for="username">Username</label>
        <input type="text" id="username" name="username">

        <label for="email">Email</label>
        <input type="text" id="email" name="email">

        <label for="password">Password</label>
        <input type="text" id="password" name="password">

        <input type="submit" value="Sign me up!">
    </form>
    </div>
</body>
</html>