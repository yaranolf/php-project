<?php

require_once '../bootstrap.php';
if (!empty($_POST)) {
    $postId = $_POST['postId'];
    $userId = $_POST['userId'];
    $commentText = $_POST['commentText'];
    //datum

    $com = new Comment();
    $com->setPostId($postId);
    $com->setUserId($userId);
    $com->setCommentText($commentText);
    $com->saveComment();

    //JSON
    $result = [
            'status' => 'success',
            'message' => 'Comment has been saved',
        ];
    /*} catch (Throwable $t) {
        $result = [
            'status' => 'error',
            'message' => 'Comment hasn/t been saved',
         ];
    }
    echo json_encode($result); //vertaald json naar php*/
}
