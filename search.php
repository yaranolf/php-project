<?php
include_once 'bootstrap.php';
include 'classes/Post.php';

$timeago = Post::get_timeago(strtotime($row['date_created']));

if (!empty($_GET)) {
    $foundPosts = Search::searchPosts($_GET['search']);
}

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

<h2>Your <br> results</h2>

<?php foreach ($foundPosts as $f):
    $post = new Post();
    $post->setUser_id($f['user_id']);
    $post->setFile_path($f['file_path']);
    $post->getLikes();
    ?>

    <article class="center-div-image">
      <img src=" <?php echo 'uploads/'.$post->file_path; ?> "  height=300 width=300 alt="">  
      <p><?php echo $post->img_description; ?></p>
      <p><?php echo $timeago; ?></p>
      <div><a href="#" data-id="<?php echo $post->id; ?>" class="like">Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
    </article>
<?php endforeach; ?>


</body>
</html>