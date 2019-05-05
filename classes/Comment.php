<?php

class Comment
{
    public $user_id;
    public $comment;

    /**
     * Get the value of userId.
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId.
     *
     * @return self
     */
    public function setUserId($user_Id)
    {
        $this->userId = $user_Id;

        return $this;
    }

    /**
     * Get the value of date_created.
     */
    public function getComment()
    {
        return $this->date_created;
    }

    /**
     * Set the value of date_created.
     *
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    public function addComment()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('INSERT INTO comments (comment, date_created) values (:comment, NOW())');
        $statement->bindValue(':comment', $this->getComment());
    }
}
