<?php
        require_once '../bootstrap.php';

    //POST?
    if (!empty($_POST)) {
        $postId = $_POST['postId'];
        $userId = $_SESSION['userid'];

        $l = new Like();
        $l->setPostId($postId);
        $l->setUserId($userId);
        $l->likeUnlike($postId); //voert de query uit (functie in Like.php)

        //JSON
        $res = [
            'status' => 'liked',
            'message' => 'Like has been saved',
        ];

        echo json_encode($res); //vertaald json naar php

        //nagaan in inspecteren -> netwerk en preview request
    }
