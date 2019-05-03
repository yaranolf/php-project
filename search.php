<?php
include 'classes/Search.php';
// Users search terms is saved
$searchIt = $_GET['searchIt'];
// Create array for the names that are close to or match the search term
$results = array();
// Prepare statement
$search = $db->prepare("SELECT * FROM 'users' WHERE 'img_description' LIKE ?");
// Execute with wildcards
$search->execute(array("%$searchIt%"));
// Echo results
foreach ($search as $s) {
    echo $s['img_description'];
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
</head>
<body>

<?php include_once 'nav.inc.php'; ?>

</body>
</html>