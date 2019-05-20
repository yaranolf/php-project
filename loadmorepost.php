<?php
    include_once 'classes/Db.php';
    include 'classes/Post.php';

        $start = $_POST['start'];
        //$end = $_POST['end'];
        $ids = $_POST['ids'];
        $html = '';
        $posts = Post::getAllFromFriends($ids, $start, 2);
        foreach ($posts as $post):
        $t = $post->getDate_created();
        $time_ago = strtotime($t);

        $html .= '<article class="center-div-image">';
        $html .= '<a href="profileFriends.php?id='.$post->user_id.'"> <h3 class="username">'.$post->user_name.'</h3></a>';

        $html .= '<a href="detailPost.php?id='.$post->getId().'"><img src="uploads/'.$post->file_path.'"  height=300 width=300 alt=""></a>';
        $html .= '<p>'.$post->img_description.'</p>';
        $html .= '<p>('.$post->latitude.','.$post->longitude.')</p>';
        $html .= '<p>'.$convertedDate = Post::convertTime($time_ago).'</p>';
        $html .= '<div class="center-div"><a href="#" data-id="'.$post->id.'" class="like btn--secondary">Like</a> <span class="likes">'.$post->getLikes().'</span> people like this </div>';
        $html .= '<div class="center-div"><a href="#" class="report btn--secondary" data-id="'.$post->id.'" >Inappropriate</a> <span class="inappropriate">'.implode($post->getNrOfInappropriate()).'</span> people report this </div>';

        $html .= '</article> ';
        endforeach;

        echo $html;

/*
        <article class="center-div-image">
        <a href="profileFriends.php?id=<?php echo $post->user_id; ?>"> <h3 class="username"><?php echo $post->user_name; ?></h3></a>
        <a href="detailPost.php?id=<?php echo $post->getId(); ?>"><img src=" <?php echo 'uploads/'.$post->file_path; ?> "  height=300 width=300 alt=""> </a>
        <p><?php echo $post->img_description; ?></p>
        <p>(<?php echo $post->latitude.','.$post->longitude; ?>)</p>
        <p><?php echo $convertedDate = Post::convertTime($time_ago); ?></p>
        <div class="center-div"><a href="#" class="like btn--secondary" data-id="<?php echo $post->id; ?>" >Like</a> <span class='likes'><?php echo $post->getLikes(); ?></span> people like this </div>
        <div class="center-div"><a href="#" class="report btn--secondary" data-id="<?php echo $post->id; ?>" >Inappropriate</a> <span class='inappropriate'><?php echo implode($post->getNrOfInappropriate()); ?></span> people report this </div>
      </article>*/
