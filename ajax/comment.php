<?php

if (!empty($_POST)) {
    $postId = $_POST['postid'];
    $userId = $_POST['userid'];
    $commentText = $_POST['commentText'];
    //datum

    try {
        include_once '../bootstrap.php';
        $comment = new Comment();
        $comment->setPostId($postId);
        $comment->setUserId($userId);
        $comment->setCommentText($commentText);
        $comment->saveComment();

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
