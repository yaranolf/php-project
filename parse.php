<?php

session_start();
$_SESSION['uid'] = 2;

// conn db
include_once 'classes/Db.php';

require 'classes/Friends.php';

if (isset($_POST['tags'])) {
    if ($_POST['tags'] == 'addFriend') {
        $friends = new Friends();
        $friends->add($_POST['uid'], $_SESSION['uid']);
    }
}
