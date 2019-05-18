<?php

class Comment
{
    private $id;
    private $userId;
    private $commentText;
    private $postId;
    //datum

    //getters en setter

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $id;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId($postId)
    {
        $this->photoId = $postId;

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCommentText()
    {
        return $this->commentText;
    }

    public function setCommentText($commentText)
    {
        $this->commentText = $commentText;

        return $this;
    }

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
