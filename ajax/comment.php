<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit;
} // Don't allow anything but POST

$response = '';

if (isset($_POST['comment'])) {
    $comment = htmlspecialchars($_POST['comment']);
    $response = $comment;
} else {
    $response = 'Please, enter a comment';
}
echo $response;  // This will be sent/returned to AJAX
