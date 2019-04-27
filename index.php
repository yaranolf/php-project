<?php

include_once("bootstrap.php");
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
  
  <img src=" <?php echo "uploads/" . $post->file_path ?> "  height=300 width=300 alt="">  
  <p><?php echo $post->img_description ?></p>
  <p><?php echo $post->date_created ?></p>

  <?php endforeach; ?>

</body>
</html>