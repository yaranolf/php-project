<?php
include_once 'bootstrap.php';

/* TO DO

- knop follow
- empty state wanneer je geen vrienden hebt */

/*$postId = htmlspecialchars($_GET['id']);
$post = Post::getData($postId);
$like = Post::getLike($postId);
$t = Post::getDate($postId);*/

//welke post is er
$comment = new Post();
$comment->setId($_GET['id']);
var_dump($comment);

//welke user post er een comment: adhv sessie
$currentUser = new User();
$currentUser->setId($_SESSION['userid']);
var_dump($currentUser);

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

<h2>Your <br> inspiration</h2>

    <article class="center-div-image">
        <a href="profileFriends.php?id=<?php echo $post['user_id']; ?>"> <h3 class="username"><?php echo $post['user_name']; ?></h3></a>
        <img src="<?php echo 'uploads/'.$post['file_path']; ?>" height=300 width=300 alt="">
        <p><?php echo $post['img_description']; ?></p>
        <p><?php; // echo $post['date_created'];?></p>
        <div class="center-div"><a href="#" class="like btn--secondary" data-id="<?php echo $post['id']; ?>" >Like</a> <span class='likes'><?php echo $like; ?></span> people like this </div>
    </article>

    <!--comments posten-->
    <p>Comments</p>

    <div id="comments" class="comments">
    <?php
    $comment = new Post();
    $comment->setId($_GET['id']);
    var_dump($comment);
    $comments = $comment->getComments($postId);

    foreach ($comments as $c):
        $comment = new Comment();
        $comment->setId($c['id']);
        $comment->setUserId($c['userId']);
        $comment->setUserName($c['userName']);
        $comment->setCommentText($c['commentText']);
        var_dump($comment);
    ?>
        
    <div>
        <p><?php echo $c->comment; ?></p>
    </div>
        
    <?php endforeach; ?>
    </div>

    <!--comments maken-->
    <form name="postComment" method="post">
        <textarea id="commentText" name="commentText" type="text" class="input"></textarea>
        <input id="commentSubmit" type="submit" value="Post" class="btn btn--primary" data-post_id="<?php echo $post['id']; ?>" data-user_id="<?php echo $_SESSION['user_id']; ?>">
    </form>

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
<script src="js/Comments.js" ></script>
</body>
</html>