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

        $html .= '<section class="posts--list">';
        $html .= '<article class="center-div-image">';
        $html .= '<a href="profileFriends.php?id='.$post->user_id.'"> <h3 class="username position--left">'.$post->user_name.'</h3></a>';
        $html .= '<p class="position--right date">'.$convertedDate = Post::convertTime($time_ago).'</p>';
        $html .= '<p class="position--right location">('.$post->latitude.','.$post->longitude.')</p>';
        $html .= '<a href="detailPost.php?id='.$post->getId().'"><img src="uploads/'.$post->file_path.'" width=300 alt=""></a>';
        $html .= '<p>'.$post->img_description.'</p>';
        $html .= '<div><a href="#" data-id="'.$post->id.'" class="like ">Like</a> <span class="likes">'.$post->getLikes().'</span> people like this </div>';
        $html .= '<div><a href="#" class="report " data-id="'.$post->id.'" >Inappropriate</a> <span class="inappropriate">'.implode($post->getNrOfInappropriate()).'</span> people report this </div>';
        $html .= '</article>';
        $html .= '</section';

        endforeach;

        echo $html;
