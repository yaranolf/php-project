<?php
include_once 'bootstrap.php';
include_once 'classes/DetailPost.php';

$detailPost = new Detail();
$detailPost->addDetailPost();
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

<?php foreach ($detailPost as $d):
  $post = new Post();
  $post->setUser_id($f['user_id']);
  $post->setFile_path($f['file_path']);
  $post->setImg_description($f['img_description']);

  $t = $post->getDate_created();
  $time_ago = strtotime($t);
?>
<article class="center-div-image">
<a href="detailPost.php?id=<?php echo $f['id']; ?>"><img src=" <?php echo 'uploads/'.$post->file_path; ?> "  height=300 width=300 alt=""> </a>
      <p><?php echo $post->img_description; ?></p>
      <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
      <div><a href="#" data-id="<?php echo $post->id; ?>" class="like">Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
</article>
<?php endforeach; ?>


  <script>

  </script>
</body>
</html>