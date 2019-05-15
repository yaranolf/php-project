<?php
include_once 'bootstrap.php';

/* TO DO

- knop follow
- empty state wanneer je geen vrienden hebt */

$postId = $_GET['id'];
$post = Post::getData($postId);
$like = Post::getLike($postId);
$t = Post::getDate($postId);
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

    <article class="center-div-image">
        <img src="<?php echo 'uploads/'.$post['file_path']; ?>" height=300 width=300 alt="">
        <p><?php echo $post['img_description']; ?></p>
        <p><?php echo $post['date_created']; ?></p>
        <div><a href="#" data-id="<?php echo $post['id']; ?>" class="like">Like</a> <span class='likes'><?php echo $like; ?></span> people like this </div>
    </article>


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