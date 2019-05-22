<?php
include_once 'bootstrap.php';
include_once 'classes/User.php';
//include 'classes/Db.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
$id = $_SESSION['userid'];

if (null == $id) {
    header('Location: login.php');
}

if (!empty($_POST)) {
    // keep track post values
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    // validate input
    $valid = true;
    if (empty($firstname)) {
        $firstnameError = 'Please enter Firstname';
        $valid = false;
    }
    if (empty($lastname)) {
        $lastnameError = 'Please enter Lastname';
        $valid = false;
    }

    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }

    if (empty($username)) {
        $usernameError = 'Please enter Username';
        $valid = false;
    }
    if (!empty($password)) {
    }

    // update data
    if ($valid) {
        $user = new User();
        $user->setFirstName($firstname);
        $user->setLastName($lastname);
        $user->setUserName($username);
        $user->setEmail($email);
        if (empty($password)) {
            $result = $user->update($id);
            echo 'database geupdated';
        } else {
            $security = new Security();
            $security->password = $password;
            if ($security->passwordIsStrongEnough()) {
                $user->setPassword($password);
                $result = $user->updateWithPassword($id);
            } else {
                $passwordError = 'Your passwords are not secure or do not match.';
            }
        }
    }
} else {
    $pdo = Db::getInstance();
    $statement = $pdo->prepare("SELECT * FROM users WHERE id = $id");
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $username = $data['username'];
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<?php include_once 'nav.inc.php'; ?>

    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h2>Your <br>profile</h2>
                    </div>

                    <form class="form-horizontal" action="profile.php" method="post">
                      <div class="control-group <?php echo !empty($firstname) ? 'error' : ''; ?>">
                        <label class="control-label label">Name</label>
                        <div class="controls">
                            <input class="input" name="firstname" type="text"  placeholder="Name" value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
                            <?php if (!empty($firstnameError)): ?>
                                <span class="help-inline"><?php echo $firstnameError; ?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($lastname) ? 'error' : ''; ?>">
                        <label class="control-label label">Name</label>
                        <div class="controls">
                            <input class="input" name="lastname" type="text"  placeholder="Name" value="<?php echo !empty($lastname) ? $lastname : ''; ?>">
                            <?php if (!empty($lastnameError)): ?>
                                <span class="help-inline"><?php echo $lastnameError; ?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                        <label class="control-label label">Email Address</label>
                        <div class="controls">
                            <input class="input" name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError; ?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($usernameError) ? 'error' : ''; ?>">
                        <label class="control-label label">Username</label>
                        <div class="controls">
                            <input class="input" name="username" type="text"  placeholder="Username" value="<?php echo !empty($username) ? $username : ''; ?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="control-group <?php echo !empty($passwordError) ? 'error' : ''; ?>">
                        <label class="control-label label">Password</label>
                        <div class="controls">
                            <input class="input" name="password" type="password"  placeholder="Password" value="<?php echo !empty($password) ? $password : ''; ?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError; ?></span>
                            <?php endif; ?>
                        </div>

                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success btn--primary">Update</button>
                        </div>
                    </form>
                </div>
        

    </div> <!-- /container -->
    <div class="images">
    <?php

    $posts = Post::getAllFromFriends($id, 0, 999);

  foreach ($posts as $post):
  $t = $post->getDate_created();
   $time_ago = strtotime($t);
  ?>
    <article class="center-div-image">
      <img src=" <?php echo 'uploads/'.$post->file_path; ?> "  width=300 alt=""> 
      <p> <input class="input" id="Description" type="text"  placeholder="Description" value="<?php echo $post->img_description; ?>"></p>
      <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
      <div><button data-id="<?php echo $post->id; ?>" class="RemoveBtn btn--secondary">Delete</button><button data-id="<?php echo $post->id; ?>" class="ModifyBtn btn--secondary">Modify</button><br><br><br><br><br><br> </div>
    </article>
  <?php endforeach; ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
<script src="js/Posts.js" ></script>
  </body>
</html>
