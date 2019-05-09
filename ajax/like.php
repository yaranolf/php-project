<?php

include_once '../bootstrap.php';

    if (!empty($_POST)) {
        $postId = $_POST['postId'];
        $userId = $_SESSION['userid'];

        $l = new Like();
        $l->setPostId($postId);
        $l->setUserId($userId);
        $l->saveLike();

        //JSON
        $result = [
            'status' => 'success',
            'message' => 'Like has been saved',
        ];

        echo json_encode($result); //vertaald json naar php
    }
