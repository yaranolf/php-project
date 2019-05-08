<?php

if (!empty($_POST)) {
    $postId = $_POST['postId'];
    $userId = $_POST['userId'];
    $commentText = $_POST['commentText'];
    //datum

    try {
        include_once '../bootstrap.php';
        $comment = new Comment();
        $comment->setPostId($postId);
        $comment->setUserId($userId);
        $comment->saveComment();

        //JSON
        $result = [
            'status' => 'success',
            'message' => 'Comment has been saved',
        ];
    }
}
