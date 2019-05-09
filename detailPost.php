<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php foreach ($comment as $c):
      //new comment
      $comment = new Comment();
      //id
      $comment->setUserId($c['userId']);
      $comment->setPostId($c['postId']);
      $comment->setComment();

      //user ophalen
      $user = new User();
      //new user
      //set id
      //set data
    ?>
    <!--echo user + tekst + datum -->
    <div class="comment-form-container cfm">
      <form method="post" action="" onsubmit="return setComment();" id="container">
        <textarea name="comment" placeholder="Comment" id="comment"></textarea>
        <input type="submit" value="add" id="submit_comment">
      </form>
    </div>
  <?php endforeach; ?> 
</body>
</html>