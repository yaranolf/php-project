<?php

class Comment
{
    private $userId;
    private $text;
    private $postId;
    //datum

    //getters en setter

    //fetch
    public function setComment()
    {
        $conn = Db::getInstance();
        //comment       //db::simplefetch > mogelijkheid
        $result = $conn->query('select * from comments by id desc'); //where id = '.this->id
        //$this->userId = $comment["userId"]
        return $result->fetchAll(PDO::FETCH_ARRAY);
    }

    public function saveComment()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('insert into comments (comment, date_created) values (:comment, NOW())');
        $statement->bindValue(':comment', $this->getComment());

        return $statement->execute();
    }
}
