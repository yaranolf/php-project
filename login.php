<?php
	/*
	if( !empty($_POST) ){
		// email en password opvragen
		$email = $_POST['email'];
		$password = $_POST['password'];

		// hash opvragen, obv email
			// tijd besparen door geen try catch te gebruiken
		$conn = new PDO("mysql:host=localhost;dbname=inspiration_hunter;", "root", "root", null);

		// check of rehash van password gelijk is aan hash uit db
		$statement = $conn->prepare("select * from users where email = :email");
		$statement->bindParam(":email", $email);
		$result = $statement->execute();

		$user = $statement->fetch(PDO::FETCH_ASSOC); 
		var_dump($user);
		
		//juist > login
		if( password_verify($password, $user['password']) ){ 
			echo " 🎈";
			session_start();
			$_SESSION['userid'] = $user['id'];
			header('Location:index.php');
			
        //fout > error
		} else {
			$error = true;
		}
	} else {
        $error = true;
		}*/

	
	include_once("functions.inc.php");
	
	// get user and password from POST
	if( !empty($_POST) ) {
		$username = $_POST['email'];
		$password = $_POST['password'];

		// check if user can login (use function)
		if( canILogin($username, $password) ) {
			session_start();
			$_SESSION['username'] = $username;

			// if ok -> redirect to index.php
			header('Location: index.php');
		}
		else {
			$error = true;
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