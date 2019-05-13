<?php
        require_once '../bootstrap.php';

    if (!empty($_POST)) {
        $postId = $_POST['postId'];
        $userId = $_SESSION['userid'];

        $l = new Post();
        $l->setId($postId);
        $l->setUser_id($userId);
        $l->reportAsInappropriate($postId);

        $res = [
            'status' => 'reported',
            'message' => 'report has been saved',
        ];

        echo json_encode($res);
    }
