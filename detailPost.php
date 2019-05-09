<?php
include_once 'bootstrap.php';
include_once 'classes/DetailPost.php';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Detail post</title>
</head>
<body>

<?php include_once 'nav.inc.php'; ?>
<!-- foto linken aan search oproep-->

<article class="center-div-image">
      <?php $detailPost = Detail::addDetailPost(); ?>
</article>


  <script>

  </script>
</body>
</html>