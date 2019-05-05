<?php

class Comment
{
    public $id;
    public $user_id;
    public $comment;
    private $date_created;

    public function addComment()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('INSERT INTO comments (comment, date_created) values (:comment, NOW())');
        $statement->bindValue(':comment', $this->getComment());
    }
}
