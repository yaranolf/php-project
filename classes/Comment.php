<?php

class Comment
{
    public $user_id;
    public $comment;

    public function postComment()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('insert into comments (comment, date_created) values (:comment, NOW())');
        $statement->bindValue(':comment', $this->addComment());
    }

    public function addComment()
    {
        $conn = Db::getInstance();

        $result = $conn->query('select * from comments by id desc');

        return $result->fetchAll(PDO::FETCH_ARRAY);
    }
}
