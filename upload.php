<?php
include_once 'bootstrap.php';

$userId = $_SESSION['userid'];
$user = new User();
$user_name = $user->getUserName();

if (isset($_POST['Submit1']) && !empty($_POST['description'])) {
    $targetDir = 'uploads/';
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir.$fileName;
    $description = $_POST['description'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath) && !empty($description)) {
        $image_show = '<img src='.$targetFilePath.' width=200 />';
        $image = addslashes(file_get_contents($targetFilePath));
        $post = new Post();
        $post->setFile_path($fileName);
        $post->setImg_description($description);
        $post->setUser_id($userId);
        $post->setlong($long);
        $post->setlat($lat);
        $post->savePost();
    }
} else {
    $description = 'Please add a description';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image upload</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php include_once 'nav.inc.php'; ?>

    <h2>Upload <br>an image</h2>

    <div class="center-div-upload">
    <?php if (!empty($_POST['description'])) {
    echo $image_show;
}?>
    </div>

    <form action="upload.php" enctype="multipart/form-data" method="post">
       
        <div>
            <p><?php echo $description; ?></p>
        </div>
        <textarea name="description" rows="6" cols="40"></textarea><br/>
        <input type="hidden" name="lat" id="lat" value="">
        <input type="hidden" name="long" id="long" value="">
        <div class="center-div-upload">
        <input type="file" name="file" id="file" class="inputfile" />
        </div>
        <input type="submit" value="Upload" name="Submit1" class="btn btn--primary"> <br/>
        
    </form>
    
</body>
</html>