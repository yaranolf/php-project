<?php

session_start();
$_SESSION['uid'] = $_SESSION['userid'];

// conn db
include_once 'classes/Db.php';

require 'classes/Friends.php';
require 'classes/Post.php';

if (isset($_POST['tags'])) {
    if ($_POST['tags'] == 'addFriend') {
        // echo 'iets';
        $friends = new Friends();
        $friends->add($_POST['uid'], $_SESSION['uid']);
        header('Content-Type: application/json');
        echo json_encode(array('code' => '1', 'msg' => 'Request sent!'));
    }
    if ($_POST['tags'] == 'approveFriend') {
        // echo 'iets';
        $friends = new Friends();
        $friends->approve($_POST['uid'], $_SESSION['uid']);
        header('Content-Type: application/json');
        echo json_encode(array('code' => '1', 'msg' => 'Approved'));
    }
    if ($_POST['tags'] == 'destroyFriend') {
        // echo 'iets';
        $friends = new Friends();
        $friends->destroy($_POST['uid'], $_SESSION['uid']);
        header('Content-Type: application/json');
        echo json_encode(array('code' => '1', 'msg' => 'Friendship destroyed'));
    }
    if ($_POST['tags'] == 'destroyPost') {
        // echo 'iets';
        $post = new Post();
        $post->removePost($_POST['imageId']);
        header('Content-Type: application/json');
        echo json_encode(array('code' => '1', 'msg' => 'Post destroyed'));
    }
    if ($_POST['tags'] == 'modifyPost') {
        // echo 'iets';
        $post = new Post();
        $post->modifyPost($_POST['imageId'], $_POST['imgDescription']);
        header('Content-Type: application/json');
        echo json_encode(array('code' => '1', 'msg' => 'Post modified'));
    }
}
