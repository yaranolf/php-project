<?php
        require_once '../bootstrap.php';

    //POST?
    if (!empty($_POST)) {
        $postId = $_POST['postId'];
        $userId = $_SESSION['userid'];

        $l = new Like();
        $l->setPostId($postId);
        $l->setUserId($userId);
        $l->saveLike(); //voert de query uit (functie in Like.php)

        //JSON
        $result = [
            'status' => 'success',
            'message' => 'Like has been saved',
        ];

        echo json_encode($result); //vertaald json naar php

        //nagaan in inspecteren -> netwerk en preview request
    }
