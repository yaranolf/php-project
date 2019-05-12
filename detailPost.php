<?php
include_once 'bootstrap.php';

if (!empty($_GET)) {
    $post = new Post();
    $post->setId($_GET['id']);
    $post->detailPost();
    var_dump($post);
}
    //$user = User::getUser();

    //$t = $post->getDate_created();
    //$time_ago = strtotime($t);

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

    <article class="center-div-image">
        <img src="<?php echo 'uploads/'.$post['file_path']; ?>" height=300 width=300 alt="">
        <p><?php echo $post['img_description']; ?></p>
        <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
        <div><a href="#" data-id="<?php echo $post['id']; ?>" class="like">Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
    </article>


  <script>

  </script>
</body>
</html>