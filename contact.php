<?php

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Contact</title>
</head>
<body>
<?php include_once 'nav.inc.php'; ?>

<img src="images/logo.png" alt="Logo Tripophobia" class="logo">

<h2>Get <br> in touch</h2>

<form id="contact" method="post" action="ajax/contact.php">
    <div class="field">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div class="field">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="field">
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
    </div>

    <div class="field">
        <button type="submit">Send</button>
    </div>
</form>
    
</body>
</html>