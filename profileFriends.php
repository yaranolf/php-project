<?php
include_once 'bootstrap.php';
include 'classes/Like.php';

$userId = htmlspecialchars($_GET['id']);
$posts = Post::getPostsFromUser($userId);
$info = Post::getUserInfo($userId);

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title> Profile </title>
</head>
<body>
  
<?php include_once 'nav.inc.php'; ?>

<h2 class="username"><?php echo $info['user_name']; ?></h2>
<?php
            //display buttons adding as friend
            if (Friends::renderFriendShip($_SESSION['uid'], $userId, 'isThereRequestPending') == 1) {
                ?>
                     <button class="request_pending btn--secondary" disabled>Request Pending</button>
                <?php
            } else {
                if (Friends::renderFriendShip($_SESSION['uid'], $userId, 'isThereApprovalPending') == 1) {
                    ?>
                         <button class="friendBtn friendBtn<?php echo $userId; ?> approve btn--primary" data-uid='<?php echo $userId; ?>' data-type='approvefriend'>Approve</button>
                         <button class='friendBtn friendBtn<?php echo $userId; ?> unfriend btn--secondary' data-uid='<?php echo $userId; ?>' data-type='destroyfriend'>Ignore</button>
                    <?php
                } else {
                    if (Friends::renderFriendShip($_SESSION['uid'], $userId, 'isThereFriendShip') == 0) {
                        ?>
                        <button class='friendBtn friendBtn<?php echo $userId; ?> add btn--secondary' data-uid='<?php echo $userId; ?>' data-type='addfriend'>Add as friend</button>
                        <button class="request_pending hidden btn--secondary" disabled>Request Pending</button>
                    <?php
                    } else {
                        ?>
                        <button class='friendBtn friendBtn<?php echo $userId; ?> unfriend btn--secondary' data-uid='<?php echo $userId; ?>' data-type='destroyfriend'>Unfriend</button>
                        
                        <button class="request_pending hidden btn--secondary" disabled>Request Pending</button>
                    <?php
                    }
                }
            } ?>
  
<?php foreach ($posts as $post):
  $userId = new Post();
  $userId->setId($post['id']);
?>
  
<div id="resultlist">
    <article class="center-div-image">
    <a href="detailPost.php?id=<?php echo $userId->getId(); ?>"> <img src="<?php echo 'uploads/'.htmlspecialchars($post['file_path']); ?>" height=300 width=300 alt=""></a>
        
    </article>
  </div>
   
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
<script src="js/Friends.js" ></script>

</body>
</html>