<?php
	// e-mail en password opvragen
	if( !empty($_POST) ) {
		$username = $_POST['email'];
		$password = $_POST['password'];
	} 

	//functie aanroepen
	//$result = $user->login();



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
					<div class="center-div">	
					<input type="checkbox" id="rememberMe"><label for="rememberMe" >Remember me</label>
					</div>
				</div>

				<div>
					<p>No account yet? <a href="register.php">Sign up here</a></p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>