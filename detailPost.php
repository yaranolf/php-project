<?php
if (!empty($_POST)) {
    $postId = $_POST['postId'];
    $userId = $_POST['userId'];

    include_once '../bootstrap.php';
    $detailpost = new Detail();
    $detailpost->setPostId($postId);
    $detailpost->setUserId($userId);
    $detailpost->addDetail();
}

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
<!-- foto linken aan search oproep-->


<!-- commentaar eronder -->
<?php //foreach ($comment as $c):
      //new comment
      //$comment = new Comment();
      //id
      //$comment->setUserId($c['userId']);
      //$comment->setPostId($c['postId']);
      //$comment->setComment();

      //user ophalen
      //$user = new User();
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
  <?php; // endforeach;?> 

  <script>
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