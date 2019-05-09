<?php
    require_once 'bootstrap.php';
    include_once 'classes/User.php';
    include_once 'classes/Security.php';

    if (!empty($_POST)) {
        try {
            $security = new Security();
            $security->password = $_POST['password'];
            $security->passwordConfirmation = $_POST['passwordConfirmation'];

            if ($security->passwordsAreSecure()) {
                $user = new User();
                $user->setFirstName($_POST['firstname']);
                $user->setLastName($_POST['lastname']);
                $user->setUserName($_POST['username']);
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);
                if ($user->register()) {
                    $user->logMeIn();
                }
            } else {
                $error = 'Your passwords are not secure or do not match.';
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Register</title>
</head>
<body>
    
    <div class="">
    <h2>Registreer</h2>
    <form action="" method="post">
    <?php if (isset($error)): ?>
		<div class="form__error">
			<p>
			<?php echo $error; ?>
			</p>
		</div>
    <?php endif; ?>
        <label for="firstname" class="label">Firstname</label>
        <input type="text" id="firstname" name="firstname" class="input">

        <label for="lastname" class="label">Lastname</label>
        <input type="text" id="lastname" name="lastname" class="input">

        <label for="username" class="label">Username</label>
        <input type="text" id="username" name="username" class="input">

        <label for="email" class="label">Email</label>
        <input type="text" id="email" name="email" class="input">

        <label for="password" class="label">Password</label>
        <input type="text" id="password" name="password" class="input">

		<label for="password" class="label">Password confirmation</label>
        <input type="text" id="passwordConfirmation" name="passwordConfirmation" class="input">

        <input type="submit" value="Sign me up!" class="btn btn--primary">
    </form>
    </div>
</body>
</html>