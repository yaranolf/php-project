<?php

class Post
{
    public $id;
    public $user_id;
    public $img_description;
    public $file_path;
    private $date_created;
    public $user_name;
    public $inappropriate;

    /**
     * Get the value of id.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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

    /**
     * Get the value of date_created.
     */
    public function getDate_created()
    {
        return $this->date_created;
    }

    /**
     * Set the value of date_created.
     *
     * @return self
     */
    public function setDate_created($date_created)
    {
        $this->date_created = $date_created;

        return $this;
    }

    /**
     * Get the value of user_name.
     */
    public function getUser_name()
    {
        return $this->user_name;
    }

    /**
     * Set the value of user_name.
     *
     * @return self
     */
    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function savePost()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('INSERT INTO images (img_description, file_path, date_created, user_id) values (:imgdescription, :file_path, NOW(), :userid)');
        $statement->bindValue(':imgdescription', $this->getImg_description());
        $statement->bindValue(':file_path', $this->getFile_path());
        $statement->bindValue(':userid', $this->getUser_id());

        return $statement->execute();
    }

    public function removePost($id)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('DELETE FROM images WHERE id = :id');
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function modifyPost($id, $description)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('UPDATE images SET img_description = :description WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->bindValue(':description', $description);

        return $statement->execute();
    }

    public static function getAll()
    {
        $conn = Db::getInstance();
        $result = $conn->query('SELECT * FROM images');

        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function getAllFromFriends($ids, $start, $counter)
    {
        $conn = Db::getInstance();
        $result = $conn->prepare('SELECT * FROM images WHERE user_id IN ('.$ids.') limit '.$start.','.$counter);
        //$result->bindParam(':userids', $ids);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function getLikes()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('select count(*) as countLikes from likes where post_id = :postid');
        $statement->bindValue(':postid', $this->id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['countLikes'];
    }

    public static function convertTime($time_ago)
    {
        $estimate_time = time() - $time_ago;

        if ($estimate_time < 1) {
            return 'less than 1 second ago';
        }

        $condition = array(
                12 * 30 * 24 * 60 * 60 => 'year',
                30 * 24 * 60 * 60 => 'month',
                24 * 60 * 60 => 'day',
                60 * 60 => 'hour',
                60 => 'minute',
                1 => 'second',
    );

        foreach ($condition as $secs => $str) {
            $d = $estimate_time / $secs;

            if ($d >= 1) {
                $r = round($d);

                return 'about '.$r.' '.$str.($r > 1 ? 's' : '').' ago';
            }
        }
    }

    /**
     * Get the value of inappropriate.
     */
    public function getInappropriate()
    {
        return $this->inappropriate;
    }

    /**
     * Set the value of inappropriate.
     *
     * @return self
     */
    public function setInappropriate($inappropriate)
    {
        $this->inappropriate = $inappropriate;

        return $this;
    }

    public function reportPost($postId)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('UPDATE images SET inappropriate=inappropriate + 1 WHERE id=:id AND user_id=:userid');
        $statement->bindValue(':id', $postId);
        $statement->bindValue(':userid', $this->getUser_id());

        return $statement->execute();
    }

    public function reportAsInappropriate($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT inappropriate FROM images WHERE id=:id AND user_id=:userid');
        $statement->bindValue(':id', $postId);
        $statement->bindValue(':userid', $this->getUser_id());
        $statement->execute();
        $result = implode($statement->fetch(PDO::FETCH_NUM));
        if ($result > 4) {
            $this->reportPost($postId);
        }

        return $result;
    }

    public function getNrOfInappropriate()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT inappropriate FROM images WHERE id=:id AND user_id=:userid');
        $statement->bindValue(':id', $this->getId());
        $statement->bindValue(':userid', $this->getUser_id());
        $result = $statement->execute();
        $result = $statement->fetch(PDO::FETCH_NUM);

        return $result;
    }
}
