<?php
include 'classes/Search.php';
SearchFunction::Search();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php include_once 'nav.inc.php'; ?>


<li><?php echo $result; ?></li>

</body>
</html>