<?php
include_once 'bootstrap.php';
include 'classes/Like.php';

$posts = Post::getAll();

$friendList = $_SESSION['userid'];
$friends = Friends::getFriends($_SESSION['userid']);
foreach ($friends as $friend):
  $id = $friend['user_one'];
  if ($id == $_SESSION['userid']) {
      $friendList = $friendList.','.$friend['user_two'];
  } else {
      $friendList = $friendList.','.$id;
  }

 endforeach;

$posts = Post::getAllFromFriends($friendList, 0, 3);

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Feed</title>
</head>
<body>



<?php include_once 'nav.inc.php'; ?>

<h2>Your <br>inspiration</h2>

<div id="resultlist">
  <div class="resultitem">
  <?php foreach ($posts as $post):
  $user = new User();
  $userId = $post->user_id;
  $user->setId($userId);

  $t = $post->getDate_created();
  $time_ago = strtotime($t);

  ?>

  <section class="posts--list">
    <article class="center-div-image">
      <a href="profileFriends.php?id=<?php echo $post->user_id; ?>"> <h3 class="username position--left"><?php echo $user->getName()['username']; ?></h3></a>
      <p class="position--right date"><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
      <p class="position--right location">(<?php echo $post->latitude.','.$post->longitude; ?>)</p>
      <a href="detailPost.php?id=<?php echo $post->getId(); ?>"><img src=" <?php echo 'uploads/'.$post->file_path; ?> "  width=300 alt=""> </a>
      <p><?php echo $post->img_description; ?></p>
      
      
      <div ><a href="#" class="like" data-id="<?php echo $post->id; ?>" >Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
      <div ><a href="#" class="report" data-id="<?php echo $post->id; ?>" >Inappropriate</a> <span class='inappropriate'><?php echo implode($post->getNrOfInappropriate()); ?></span> people report this </div>
    </article>
  </section>
  <?php endforeach; ?>
  </div>
  </div>
    <input type="hidden" id="start" name="start" value="3"/>
    <input type="hidden" id="ids" value="<?php echo $friendList; ?>">
  <button class="loadmore btn--primary"> Load more </button>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
<script src="js/Posts.js" ></script>
<script src="js/Reports.js" ></script>
<script src="js/Likes.js" ></script>


</body>
</html>