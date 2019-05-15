<?php
include_once 'bootstrap.php';
include 'classes/Like.php';

$post = new Post();
$post->getData();
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

  <h2 class="username"><?php echo $post->user_name; ?></h2>

  
<div id="resultlist">
      <img src=" <?php echo 'uploads/'.$post->file_path; ?> "  height=300 width=300 alt=""> 
      <p><?php echo $post->img_description; ?></p>
      <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
      <div><a href="#" class="like" data-id="<?php echo $post->id; ?>" >Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
    </article>
  </div>
   
  <button class="loadmore btn--primary"> Load more </button>

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
<script src="js/Posts.js" ></script>
  <script>
    
    $(document).ready(function(){
        $(".like").on("click", function(e){
            var button = $(this);
            var postId = $(this).data('id');
            var elLikes = $(this).parent().find(".likes");
            var likes = elLikes.html();
 
            $.ajax({
                method: "POST",
                url: "ajax/like.php",
                data: { postId: postId },
                dataType: "json",
                
            })
            .done(function( res ) {
                if(res.status === "liked") {
                  //button.html("unlike");
                  elLikes.html(likes);
                }
            });
 
            e.preventDefault();
        });
      });

    </script>

</body>
</html>