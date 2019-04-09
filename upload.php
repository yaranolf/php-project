
<?php

if(!empty($_POST)){
    $description = $_POST['description'];
} else {
    $description = "";
}

if(isset($_POST['Submit1'])){ 
    $filepath = "uploads/" . $_FILES["file"]["name"];
    
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        echo "<img src=".$filepath." height=300 width=300 />";
    } else {
        echo "Error !!";
    }
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
    
    <div>
         <?php echo $description;?>
    </div>

    <form action="upload.php" enctype="multipart/form-data" method="post">
        <input type="file" name="file"><br/>
        <textarea name="description" rows="6" cols="40"></textarea><br/>
        <input type="submit" value="Upload" name="Submit1"> <br/>
        
    </form>

 
</body>
</html>