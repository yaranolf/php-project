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
		}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inspiration Hunter</title>
  <!--<link rel="stylesheet" href="css/style.css">-->
</head>
<body>
	<div class="inspirationHunterLogin inspirationHunterLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign up for an account</h2>

				<div class="form__error hidden">
					<p>
						Some error here
					</p>
				</div>

				<div class="form__field">
					<label for="email">Email</label>
					<input type="text" id="email" name="email">
                </div>
                
                <div class="form__field">
					<label for="fullname">Full name</label>
					<input type="text" id="fullname" name="fullname">
                </div>

				<div class="form__field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password">
				</div>

                <div class="form__field">
					<label for="password_confirmation">Confirm your password</label>
					<input type="password" id="password_confirmation" name="password_confirmation">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign me up!" class="btn btn--primary">	
				</div>
			</form>
		</div>
	</div>
</body>
</html>