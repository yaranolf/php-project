<?php

include 'classes/Post.php';
include_once 'classes/Db.php';

$post = new Post();
  $posts = Post::getAll();  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<?php foreach($posts as $post): ?>
	    <article class="post" >
		
        <p> <?php echo $post->date_created; ?> </p>
        <img src= " <?php echo $post->file_path; ?> " alt="">
		    <p> <?php echo $post->file_path; ?> </p>
	    </article>
	<?php endforeach; ?>
  
</body>
</html>