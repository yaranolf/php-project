<?php

include_once 'bootstrap.php';
include 'classes/Like.php';

$posts = Post::getAll();

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
    </article>
  <!-- comment 
    <form action="ajax/comment.php" method="post">
      <input id="comment" type="text" placeholder="Comment" name="comment" class="input">
      <input id="sumbit" type="submit" value="Search">
    </form>
    -->
    
    <div class="comment-form-container cfm">
      <form>
        <textarea name="comment"></textarea>
        <input type="submit" value="add">
      </form>
    </div>

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

      //comment plaatsen
      $(function(){
        $(".comment-form-container form").on("submit", function( event ){
            event.preventDefault();             
            alert( $(this).serialize() +"\nWILL BE SENT TO PHP" );
            $.ajax({
              type: "POST",
              url: "Comment.php",
              data: $(this).serialize(), success: function( response ) {
                alert("PHP says: "+ response);
              }
        });
      });

    </script>

</body>
</html>