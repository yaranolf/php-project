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

        // if user deze post nog niet geraporteerd heeft dan pas een insert doen
        // ---> na de insert hier tellen of er al drie zijn, if er al drie zijn dan de kolom in tabel post updaten naar 1
        // else geen update
        // else gebeurt er niets

        //JSON
        $res = [
            'status' => 'reported',
            'message' => 'report has been saved',
        ];

        echo json_encode($res); //vertaald json naar php

        //nagaan in inspecteren -> netwerk en preview request
    }
