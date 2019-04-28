<?php

include_once("bootstrap.php");
include 'classes/Like.php';
  $posts = Post::getAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Document</title>
</head>
<body>

  
  <?php include_once("nav.inc.php"); ?>

  <h2>Your <br> inspiration</h2>

  <?php foreach($posts as $post): ?>
    <article class="center-div-image">
      <img src=" <?php echo "uploads/" . $post->file_path ?> "  height=300 width=300 alt="">  
      <p><?php echo $post->img_description ?></p>
      <p><?php echo $post->date_created ?></p>
      <div><a href="#" data-id="<?php echo $post->id ?>" class="like">Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
    </article>
  <?php endforeach; ?>



  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

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
    </script>

</body>
</html>