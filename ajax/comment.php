<?php

require_once '../bootstrap.php';
if (!empty($_POST)) {
    $postId = $_POST['post_id'];
    $userId = $_POST['user_id'];
    $commentText = $_POST['commentText'];
    //datum

    try {
        $com = new Comment();
        $com->setPostId($postId);
        $com->setUserId($userId);
        $com->setCommentText($commentText);
        $com->saveComment($postId);

        //JSON
        $result = [
            'status' => 'success',
            'message' => 'Comment has been saved',
        ];
    } catch (Throwable $t) {
        $result = [
            'status' => 'error',
            'message' => 'Comment hasn/t been saved',
         ];
    }
    echo json_encode($result); //vertaald json naar php
}
