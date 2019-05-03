<?php
include 'classes/Db.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    //header('Location: index.php');
}

if (!empty($_POST)) {
    // keep track validation errors
    $firstnameError = null;
    $lastnameError = null;
    $emailError = null;
    $passwordError = null;
    $usernameError = null;

    // keep track post values
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    // validate input
    $valid = true;
    if (empty($firstname)) {
        $firstnameError = 'Please enter Name';
        $valid = false;
    }
    $valid = true;
    if (empty($lastname)) {
        $lastnameError = 'Please enter Name';
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
        $usernameError = 'Please enter Mobile Number';
        $valid = false;
    }
    if (empty($password)) {
        $usernameError = 'Please enter Mobile Number';
        $valid = false;
    }

    // update data
    if ($valid) {
        $pdo = Db::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?';
        $q = $pdo->prepare($sql);
        $q->execute(array($firstname, $lastname, $username, $email, $password));
        Db::disconnect();
        header('Location: index.php');
    }
} else {
    $pdo = Db::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM customers where id = ?';
    $q = $pdo->prepare($sql);
    $q->execute(array($userna));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $name = $data['name'];
    $email = $data['email'];
    $mobile = $data['mobile'];
    Db::disconnect();
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
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id; ?>" method="post">
                      <div class="control-group <?php echo !empty($firstname) ? 'error' : ''; ?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($firstname) ? $name : ''; ?>">
                            <?php if (!empty($firstnameError)): ?>
                                <span class="help-inline"><?php echo $firstnameError; ?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($lastname) ? 'error' : ''; ?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($lastname) ? $name : ''; ?>">
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
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($username) ? $mobile : ''; ?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError; ?></span>
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