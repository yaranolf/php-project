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
    public static function setComment($id)
    {
        $conn = Db::getInstance();
        $statement = $conn->query('select * from comments where id = :id by id desc');
        $statement->bindValue(':id', $id);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ARRAY);

        return $result;
    }

    public function saveComment()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('insert into comments  ');

        return $statement->execute();
    }
}
