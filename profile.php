<?php
session_start();
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

    // update data
    if ($valid) {
        $user = new User();
        $user->setFirstName($firstname);
        $user->setLastName($lastname);
        $user->setUserName($username);
        $user->setEmail($email);
        $result = $user->update($id);
        echo 'database geupdated';
        // echo $result;
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
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Customer</h3>
                    </div>

                    <form class="form-horizontal" action="profile.php" method="post">
                      <div class="control-group <?php echo !empty($firstname) ? 'error' : ''; ?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="firstname" type="text"  placeholder="Name" value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
                            <?php if (!empty($firstnameError)): ?>
                                <span class="help-inline"><?php echo $firstnameError; ?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($lastname) ? 'error' : ''; ?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="lastname" type="text"  placeholder="Name" value="<?php echo !empty($lastname) ? $lastname : ''; ?>">
                            <?php if (!empty($lastnameError)): ?>
                                <span class="help-inline"><?php echo $lastnameError; ?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError; ?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($usernameError) ? 'error' : ''; ?>">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username) ? $username : ''; ?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="control-group <?php echo !empty($passwordError) ? 'error' : ''; ?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="password"  placeholder="Password" value="<?php echo !empty($password) ? $password : ''; ?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError; ?></span>
                            <?php endif; ?>
                        </div>

                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
