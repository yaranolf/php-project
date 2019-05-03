<?php

// Users search terms is saved
$searchIt = $_GET['searchIt'];
// Create array for the names that are close to or match the search term
$results = array();
// Prepare statement
$search = $conn->prepare("SELECT * FROM 'users' WHERE 'img_description' LIKE ?");
// Execute with wildcards
$search->execute(array("%$searchIt%"));
// Echo results
foreach ($search as $s) {
    echo $s['img_description'];
}
