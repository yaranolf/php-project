<?php

   // include 'classes/User.php';
    include 'functions.inc.php';
    /*
    // e-mail en password opvragen
    if( !empty($_POST) ) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = Db::getInstance();

    // check of rehash van password gelijk is aan hash uit db
    $statement = $conn->prepare("select * from users where email = :email");
    $statement->bindParam(":email", $email);
    $result = $statement->execute();
    var_dump($result);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    var_dump($user);

    //juist > login
    if( password_verify($password, $user['password']) ){
        session_start();
        $_SESSION['userid'] = $user['id'];
        header('Location:index.php');

        //fout > error
        } else {
            $error = true;
        }
    } */

    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (Login($email, $password)) {
            session_start();
            $_SESSION['email'] = $email;

            header('Location: index.php');
        } else {
            $error = 'Login failed';
        }
    }

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="netflixLogin">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign In</h2>

				<?php if (isset($error)): ?>
				<div class="form__error">
					<p>
						Sorry, we can't log you in with that email address <br> and password. Can you try again?
					</p>
				</div>
				<?php endif; ?>

				<div class="form__field">
					<label for="Email" class="label">Email</label>
					<input type="text" name="email" class="input">
				</div>
				<div class="form__field">
					<label for="Password" class="label">Password</label>
					<input type="password" name="password" class="input">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign in" class="btn btn--primary">
				</div>

				<div>
					<p>No account yet? <a href="register.php">Sign up here</a></p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>