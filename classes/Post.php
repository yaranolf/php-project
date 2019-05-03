<?php

class Post
{
    public $user_id;
    public $img_description;
    public $file_path;
    public $date_created;

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

    public function newPost()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare('INSERT INTO images (user_id, img_description, file_path, date_created) values (:user_id, :imgdescription, :file_path, NOW())');
        $statement->bindValue(':user_id', $this->getUser_id());
        $statement->bindValue(':imgdescription', $this->getImg_description());
        $statement->bindValue(':file_path', $this->getFile_path());

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

    public static function timeAgo($time_ago)
    {
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);
        // Seconds
        if ($seconds <= 60) {
            echo "$seconds seconds ago";
        }
        //Minutes
        elseif ($minutes <= 60) {
            if ($minutes == 1) {
                echo 'one minute ago';
            } else {
                echo "$minutes minutes ago";
            }
        }
        //Hours
        elseif ($hours <= 24) {
            if ($hours == 1) {
                echo 'an hour ago';
            } else {
                echo "$hours hours ago";
            }
        }
        //Days
        elseif ($days <= 7) {
            if ($days == 1) {
                echo 'yesterday';
            } else {
                echo "$days days ago";
            }
        }
        //Weeks
        elseif ($weeks <= 4.3) {
            if ($weeks == 1) {
                echo 'a week ago';
            } else {
                echo "$weeks weeks ago";
            }
        }
        //Months
        elseif ($months <= 12) {
            if ($months == 1) {
                echo 'a month ago';
            } else {
                echo "$months months ago";
            }
        }
        //Years
        else {
            if ($years == 1) {
                echo 'one year ago';
            } else {
                echo "$years years ago";
            }
        }
    }
}
