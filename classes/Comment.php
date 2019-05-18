<?php

class Comment
{
    private $id;
    private $userId;
    private $commentText;
    private $postId;
    private $dateCreated;
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

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated($dateCreated)
    {
        $this->id = $dateCreated;

        return $dateCreated;
    }

    //fetch
    public static function getComments($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('select * from comments where post_id = :postid'); //getest in DB
        $statement->bindValue(':postid', $postId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function saveComment()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('insert into comments (user_id, post_id, date_created, comment) values (:user_id, :post_id, :comment, NOW())');
        $statement->bindValue(':post_id', $this->postId);
        $statement->bindValue(':user_id', $this->userId);
        $statement->bindValue(':comment', $this->commentText);

        return $statement->execute();
    }
}
