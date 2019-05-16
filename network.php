<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Document</title>
    <style>
    .hidden{
        display: none;
    }
    </style>
</head>

<body>

<?php include_once 'nav.inc.php'; ?>

<?php

require 'bootstrap.php';

//sessie starten
$_SESSION['uid'] = $_SESSION['userid'];

//connect to database
include_once 'classes/Db.php';

// require friends class
require 'classes/Friends.php';

$pdo = Db::getInstance();
    $statement = $pdo->prepare('SELECT * FROM users');
    $statement->execute();

if ($statement->rowCount() > 0) {
    while ($fetch = $statement->fetch(PDO::FETCH_ASSOC)) {
        $id = $fetch['id'];
        $username = $fetch['username']; ?>
    <div>
    
    <?php
        if ($id != $_SESSION['uid']) {
            ?>
            <p class="label"><?php echo $username; ?></p>
    <div class="actions"><?php
            //display buttons adding as friend
            if (Friends::renderFriendShip($_SESSION['uid'], $id, 'isThereRequestPending') == 1) {
                ?>
                     <button class="request_pending btn--secondary" disabled>Request Pending</button>
                <?php
            } else {
                if (Friends::renderFriendShip($_SESSION['uid'], $id, 'isThereApprovalPending') == 1) {
                    ?>
                         <button class="friendBtn friendBtn<?php echo $id; ?> approve btn--secondary" data-uid='<?php echo $id; ?>' data-type='approvefriend'>Approve</button>
                         <button class='friendBtn friendBtn<?php echo $id; ?> unfriend btn--secondary' data-uid='<?php echo $id; ?>' data-type='destroyfriend'>Ignore</button>
                    <?php
                } else {
                    if (Friends::renderFriendShip($_SESSION['uid'], $id, 'isThereFriendShip') == 0) {
                        ?>
                        <button class='friendBtn friendBtn<?php echo $id; ?> add btn--secondary' data-uid='<?php echo $id; ?>' data-type='addfriend'>Add as friend</button>
                        <button class="request_pending hidden btn--secondary" disabled>Request Pending</button>
                    <?php
                    } else {
                        ?>
                        <button class='friendBtn friendBtn<?php echo $id; ?> unfriend btn--secondary' data-uid='<?php echo $id; ?>' data-type='destroyfriend'>Unfriend</button>
                        <button class='friendBtn add hidden' data-uid='<?php echo $id; ?> btn--secondary' data-type='addfriend '>Add as friend</button>
                        
                        <button class="request_pending hidden btn--secondary" disabled>Request Pending</button>
                    <?php
                    }
                }
            } ?>
            </div><?php
        } else {
            // display request
        } ?>
   




    </div>
    <?php
    }
}
?>
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
<script src="js/Friends.js" ></script>
</body>
</html>