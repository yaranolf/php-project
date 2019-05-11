<?php
        require_once '../bootstrap.php';

    //POST?
    if (!empty($_POST)) {
        $postId = $_POST['postId'];
        $userId = $_SESSION['userid'];

        $l = new Post();
        $l->setId($postId);
        $l->setUser_id($userId);
        $l->reportAsInappropriate($postId);

        //JSON
        $res = [
            'status' => 'reported',
            'message' => 'report has been saved',
        ];

        echo json_encode($res); //vertaald json naar php

        //nagaan in inspecteren -> netwerk en preview request
    }
