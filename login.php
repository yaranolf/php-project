<?php

    include 'classes/User.php';

    if (!empty($_POST)) {
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (User::login($email, $password)) {
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