<?php

include_once 'bootstrap.php';
include 'classes/Like.php';

$posts = Post::getAll();

if (isset($_POST['comment'])) {
    $comment = new Comment();
    $comment->setComment($_POST['comment']);

    $comment = $_POST['comment'];
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Document</title>
</head>
<body>

  
  <?php include_once 'nav.inc.php'; ?>

  <h2>Your <br> inspiration</h2>

  

  <?php foreach ($posts as $post):
    $t = $post->getDate_created();
    $time_ago = strtotime($t);

  ?>
    <article class="center-div-image">
      <img src=" <?php echo 'uploads/'.$post->file_path; ?> "  height=300 width=300 alt=""> 
      <p><?php echo $post->img_description; ?></p>
      <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
      <div><a href="#" data-id="<?php echo $post->id; ?>" class="like">Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
     <p><?php; // echo $response;?></p>
    </article>
    
    <?php foreach ($comment as $c):
      //new comment
      $comment = new Comment();
      //id
      $comment->setUserId($c['userId']);
      $comment->setPostId($c['postId']);
      $comment->setComment();

      //user ophalen
      //new user
      //set id
      //set data
    ?>
    //echo user + tekst + datum
    <div class="comment-form-container cfm">
      <form method="post" action="" onsubmit="return post();" id="container">
        <textarea name="comment" placeholder="Comment" id="comment"></textarea>
        <input type="submit" value="add" id="submit_comment">
      </form>
    </div>
  <?php endforeach; ?> 
  <?php endforeach; ?>

  <button> Load more </button>


  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script>
    
        // index.php script
        $("a.like").on("click", function(e){
            // op welke post?
            var postId = $(this).data('id');
            var elLikes = $(this).parent().find(".likes");
            var likes = elLikes.html();
 
            $.ajax({
                method: "POST",
                url: "ajax/like.php",
                data: { postId: postId },
                dataType: "json"
            })
            .done(function( res ) {
                if(res.status == "success") {
                    likes++;
                    elLikes.html(likes);
                }
            });
 
            e.preventDefault();
        });

      //comment plaatsen >> kan ook verplaatsen naar detailpagina? 
      //click functie
      $("submit_comment").on("click", function(event)){
        console.log("");
        var postId = $(this).data("id");
        var userId = $(this).data("userId");
        var commentText = $(this).data("commentText");
    
        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "ajax/comment.php",
            data: {
              postId: postId,
              userId: userId,
              commentText: commentText
            },
            dataType: "json"
          })
          .done(function(response){
            if(response.status == "success"){
              return response; //verwijzen naar hierboven
            }
          });
        });
    </script>

</body>
</html>