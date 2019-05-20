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
    <div class="form_field">
        <label for="name" class="label">Name:</label>
        <input type="text" id="name" name="name" class="input" required>
    </div>

    <div class="form_field">
        <label for="email" class="label">Email:</label>
        <input type="email" id="email" name="email" class="input" required>
    </div>

    <div class="form_field">
        <label for="message" class="label">Message:</label>
        <textarea id="message" name="message" class="input" required></textarea>
    </div>

    <div class="form_field">
        <button type="submit" class="btn btn--primary">Send</button>
    </div>
</form>
    

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
<script src="js/Contact.js" ></script>
</body>
</html>