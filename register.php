<?php
	require_once("bootstrap.php");

	  if(!empty($_POST)){
      $user = new User();
      $user->setFullName($_POST['fullname']);
      $user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);
			$user->setPasswordConfirmation($_POST['password_confirmation']);
            
      /*
      if($password === $passwordConfirmation){
      $user->register();
      var_dump($result);
      }
			*/
			
			//ook nog eventueel validatie checken (email met @ en . , wachtwoord min 8 tekens)
		}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inspiration Hunter</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="inspirationHunterLogin inspirationHunterLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign up <br>for an <br>account</h2>

				<div class="form__error hidden">
					<p>
						Some error here
					</p>
				</div>

				<div class="form__field">
					<label for="email" class="label">Email</label>
					<br>
					<input type="text" id="email" name="email" class="input">
                </div>
                
                <div class="form__field">

					<label for="fullname" class="label">Full name</label>
					<br>
					<input type="text" id="fullname" name="fullname" class="input">
                </div>

				<div class="form__field">
				
					<label for="password" class="label">Password</label>
					<br>
					<input type="password" id="password" name="password" class="input">
				</div>

                <div class="form__field">
			
					<label for="password_confirmation" class="label">Confirm your password</label>
					<br>
					<input type="password" id="password_confirmation" name="password_confirmation" class="input">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign me up!" class="btn btn--primary">	
				</div>
			</form>
		</div>
	</div>
</body>
</html>