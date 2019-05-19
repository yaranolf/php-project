<?php

class Post
{
    public $id;
    public $user_id;
    public $user_name;
    public $img_description;
    public $file_path;
    private $date_created;
    // public $user_name;
    public $long;
    public $lat;
    public $location;
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

    public function getUser_name()
    {
        return $this->user_name;
    }

    public function setUser_name($user_name)
    {
        $this->user_name = $user_name;

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
     * Get the value of img_description.
     */
    public function getlong()
    {
        return $this->long;
    }

    /**
     * Set the value of img_description.
     *
     * @return self
     */
    public function setlong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Get the value of img_description.
     */
    public function getlat()
    {
        return $this->lat;
    }

    /**
     * Set the value of img_description.
     *
     * @return self
     */
    public function setlat($lat)
    {
        $this->lat = $lat;

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

    public function savePost()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('INSERT INTO images (user_name, img_description, file_path, date_created, user_id, longitude, latitude) values (:user_name, :imgdescription, :file_path, NOW(), :userid, :long, :lat)');
        $statement->bindValue(':imgdescription', $this->getImg_description());
        $statement->bindValue(':file_path', $this->getFile_path());
        $statement->bindValue(':userid', $this->getUser_id());
        $statement->bindValue(':long', $this->getlong());
        $statement->bindValue(':lat', $this->getlat());
        $statement->bindValue(':user_name', $this->getUser_name());

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
        $result->execute();

        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function getAllNearby($lat, $long, $distance)
    {
        $conn = Db::getInstance();
        $result = $conn->prepare('SELECT *, (
            6371 * acos (
            cos ( radians('.$lat.') )
            * cos( radians( latitude ) )
            * cos( radians( longitude ) - radians('.$long.') )
            + sin ( radians('.$lat.') )
            * sin( radians( latitude ) )
          )
      ) AS distance FROM images HAVING distance < '.$distance.' ORDER BY distance');
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

    public static function getData($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * FROM images WHERE id = :postid');
        $statement->bindValue(':postid', $postId);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC); //dus geen fetchAll!

        return $result;
    }

    public static function getDataUserId($id)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * FROM images WHERE user_id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC); //dus geen fetchAll!

        return $result;
    }

    public static function getDate($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * FROM images WHERE id = :postid');
        $statement->bindValue(':postid', $postId);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC); //dus geen fetchAll!

        return $result;
    }

    public static function getLike($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('select count(*) as count from likes where post_id = :postid');
        $statement->bindValue(':postid', $postId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    public static function getPostsFromUser($userId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * FROM images WHERE user_id = :userid');
        $statement->bindValue(':userid', $userId);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getUserInfo($userId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * FROM images WHERE user_id = :userid');
        $statement->bindValue(':userid', $userId);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getLikeUser($userId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('select count(*) as count from likes where user_id = :userid');
        $statement->bindValue(':userid', $userId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    public static function getDateCreated($userId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT date_created FROM images WHERE user_id = :userid');
        $statement->bindValue(':userid', $userId);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function reportPost($postId)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('INSERT INTO inappropriate (user_id, post_id) VALUES (:userid, :postid)');
        $statement->bindParam(':postid', $postId);
        $statement->bindParam(':userid', $this->user_id);

        return $statement->execute();
    }

    public function deletePost($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('DELETE FROM images WHERE id=:postid');
        $statement->bindParam(':postid', $postId);

        return $statement->execute();
    }

    public function reportAsInappropriate($postId)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT count(*) AS nrOfInappropriate FROM inappropriate WHERE post_id=:postid AND user_id=:userid');
        $statement->bindParam(':postid', $postId);
        $statement->bindValue(':userid', $this->user_id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result['nrOfInappropriate'] == 0) {
            $this->reportPost($postId);
            $result = $this->getNrOfInappropriate();

            if ($result[0] == 3) {
                $this->deletePost($postId);

                return false;
            }

            return true;
        }

        return false;
    }

    public function getNrOfInappropriate()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT count(*) AS amountOfInappropriate FROM inappropriate WHERE post_id=:postid');
        $statement->bindValue(':postid', $this->id);
        $result = $statement->execute();
        $result = $statement->fetch(PDO::FETCH_NUM);

        return $result;
    }

    public static function getComments($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('SELECT * FROM comments WHERE post_id = :postId');
        $statement->bindParam(':postId', $postId);
        $result = $statement->execute();

        return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
