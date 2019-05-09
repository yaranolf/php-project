<?php

    //POST?
    if (!empty($_POST)) {
        $postId = $_POST['postId'];
        $userId = 1;

        include_once '../bootstrap.php';
        $l = new Like();
        //$l->setPostId($postId);
        $l->setUserId($userId);
        $l->checkLike($postId); //voert de query uit (functie in Like.php)

        //JSON
        $result = [
            'status' => 'success',
            'message' => 'Like has been saved',
        ];

        echo json_encode($result); //vertaald json naar php

        //nagaan in inspecteren -> netwerk en preview request
    }
