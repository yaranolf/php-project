<?php

class Post
{
    public $user_id;
    public $img_description;
    public $file_path;

    /**
     * Get the value of user_id.
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id.
     *
     * @return self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of img_description.
     */
    public function getImg_description()
    {
        return $this->img_description;
    }

    /**
     * Set the value of img_description.
     *
     * @return self
     */
    public function setImg_description($img_description)
    {
        $this->img_description = $img_description;

        return $this;
    }

    /**
     * Get the value of file_path.
     */
    public function getFile_path()
    {
        return $this->file_path;
    }

    /**
     * Set the value of file_path.
     *
     * @return self
     */
    public function setFile_path($file_path)
    {
        $this->file_path = $file_path;

        return $this;
    }

    public function newPost()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('INSERT INTO images (img_description, file_path, date_created, user_id) values (:imgdescription, :file_path, NOW(), :userid)');
        $statement->bindValue(':imgdescription', $this->getImg_description());
        $statement->bindValue(':file_path', $this->getFile_path());
        $statement->bindValue(':userid', $this->getUser_id());

        return $statement->execute();
    }

    public static function getAll()
    {
        $conn = Db::getInstance();
        $result = $conn->query('SELECT * FROM images');

        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function getLikes()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('select count(*) as count from likes where post_id = :postid');
        $statement->bindValue(':postid', $this->id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }
}
