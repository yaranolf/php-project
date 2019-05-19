<?php
include_once 'bootstrap.php';
include 'classes/Post.php';

if (!empty($_GET)) {
    $postsFound = Search::searchPosts($_GET['search']);
    $userFound = Search::searchUsers($_GET['search']);
}

var_dump($userFound);
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

<?php foreach ($userFound as $u):

?>
<article class="center-div-image">
<a href="profileFriends.php?id=<?php echo $u['id']; ?>"> <h3 class="username"><?php echo $u['username']; ?></h3></a>
<p><?php echo $u['firstname'].' '.$u['lastname']; ?></p>
</article>

<?php endforeach; ?>

<?php foreach ($postsFound as $f):
    $post = new Post();
    $post->setId($f['id']);
    $post->setUser_id($f['user_id']);
    $post->setUser_name($f['user_name']);
    $post->setFile_path($f['file_path']);
    $post->setImg_description($f['img_description']);
    $post->setDate_created($f['date_created']);

    $t = $post->getDate_created();
    $time_ago = strtotime($t);
  ?>
    <article class="center-div-image">
      <a href="profileFriends.php?id=<?php echo $post->user_id; ?>"> <h3 class="username"><?php echo $post->user_name; ?></h3></a>
      <a href="detailPost.php?id=<?php echo $post->getId(); ?>"><img src=" <?php echo 'uploads/'.$post->file_path; ?>" height=300 width=300 alt=""> </a>
      <p><?php echo $post->img_description; ?></p>
      <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
      <div class="center-div"><a href="#" class="like btn--secondary" data-id="<?php echo $post->id; ?>" >Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
      <div class="center-div"><a href="#" class="report btn--secondary" data-id="<?php echo $post->id; ?>" >Inappropriate</a> <span class='inappropriate'><?php echo implode($post->getNrOfInappropriate()); ?></span> people report this </div>
    </article>
<?php endforeach; ?>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
<script src="js/Posts.js" ></script>
<script src="js/Reports.js" ></script>
<script src="js/Likes.js" ></script>

</body>
</html>