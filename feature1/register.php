<?php 
    require_once("bootstrap.php");

    if(!empty($_POST)){
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setFullName($_POST['fullname']);
        $user->setPassword($_POST['password']);
        //$user->setPasswordConfirmation($_POST['password_confirmation']);
        $user->register();
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
        <label for="email">Email</label>
        <input type="text" id="email" name="email">

        <label for="name">Full Name</label>
        <input type="text" id="fullname" name="fullname">

        <label for="password">Password</label>
        <input type="text" id="password" name="password">

        <label for="password_confirmation">Confirm your password</label>
        <input type="text" id="password_confirmation" name="password_confirmation">

        <input type="submit" value="Sign me up!">
    </form>
    </div>
</body>
</html>