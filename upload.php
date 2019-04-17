
<?php


if(isset($_POST['Submit1']) && !empty($_POST['description'])){ 
    $filepath = "uploads/" . $_FILES["file"]["name"];
    $description = $_POST['description'];
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath) && !empty($description)) {
        echo "<img src=".$filepath." height=300 width=300 />";
    } 
}  else {
    $description = "Please add a description";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image upload</title>
</head>
<body>

    <form action="upload.php" enctype="multipart/form-data" method="post">
        <input type="file" name="file"><br/>
        <div>
            <?php echo $description;?>
        </div>
        <textarea name="description" rows="6" cols="40"></textarea><br/>
        <input type="submit" value="Upload" name="Submit1"> <br/>
        
    </form>

 
</body>
</html>