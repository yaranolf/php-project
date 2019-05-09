<?php

    require_once 'bootstrap.php';
    session_destroy();
    setcookie('flix', null, time() - 3600);
    header('location: login.php');
