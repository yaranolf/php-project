<?php
        require_once '../bootstrap.php';

    //POST?
    if (!empty($_POST)) {
        $postId = $_POST['postId'];
        $userId = $_SESSION['userid'];

        $l = new Like();
        $l->setPostId($postId);
        $l->setUserId($userId);
        //$l->likeUnlike($postId);

        if ($l->likeUnlike($postId)) {
            $res = [
                'status' => 'success',
                'message' => 'Like has been saved',
            ];
        } else {
            $res = [
                'status' => 'fail',
                'message' => 'Like has been saved',
            ];
        }

        //JSON

        echo json_encode($res); //vertaald json naar php

        //nagaan in inspecteren -> netwerk en preview request
    }
