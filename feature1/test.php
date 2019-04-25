<?php
    include_once('classes/Db.php');
    $conn = Db::getInstance();
    $conn = Db::getInstance();
    $conn = Db::getInstance();
    $conn = Db::getInstance();
    $conn = Db::getInstance();

    $result = $conn->query('select * from users');
    var_dump($result->fetchAll());
?>