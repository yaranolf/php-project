<?php
    include_once 'classes/Db.php';
    include 'classes/Post.php';

        $start = $_POST['start'];
        $end = $_POST['end'];
        $ids = $_POST['ids'];
        $html = '';
        echo 'ids'.$ids.$start.$end;
        $posts = Post::getAllFromFriends($ids, $start, $end);
        foreach ($posts as $post):
        $t = $post->getDate_created();
        $time_ago = strtotime($t);

        $html .= '<article class="center-div-image">';
        $html .= '<img src=" '.$post->file_path.'"  height=300 width=300 alt="">';
        $html .= '<p>'.$post->img_description.'</p>';
        $html .= '<p>'.$convertedDate = Post::convertTime($time_ago).'</p>';
        $html .= '<div><a href="#" data-id="'.$post->id.'" class="like">Like</a> <span class="likes">'.$post->getLikes().'</span> people like this </div>';
        $html .= '</article> ';
        endforeach;

        echo $html;
