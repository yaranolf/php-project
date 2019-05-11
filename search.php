<?php
include_once 'bootstrap.php';
include 'classes/Post.php';

if (!empty($_GET)) {
    $postsFound = Search::searchPosts($_GET['search']);
}

$user = User::getUser();
//var_dump($user);

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

<?php foreach ($postsFound as $f):
    $post = new Post();
    $post->setUser_id($f['user_id']);
    $post->setFile_path($f['file_path']);
    $post->setImg_description($f['img_description']);

    $t = $post->getDate_created();
    $time_ago = strtotime($t);
  ?>
    <article class="center-div-image">
      <a href="detailPost.php?id=<?php echo $f['id']; ?>"><img src=" <?php echo 'uploads/'.$post->file_path; ?> "  height=300 width=300 alt=""> </a>
      <div><a href="detailPost.php?id=<?php echo $f['id']; ?>" data-id="<?php echo $user->id; ?>" class="username"><?php echo $post->user_id; ?></a></div>
      <p><?php echo $post->img_description; ?></p>
      <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
      <div><a href="#" data-id="<?php echo $post->id; ?>" class="like">Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
    </article>
<?php endforeach; ?>


</body>
</html>