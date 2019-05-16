<?php

    //include 'classes/Post.php';

    class Like
    {
        private $postId;
        private $userId;

        /**
         * Get the value of postId.
         */
        public function getPostId()
        {
            return $this->postId;
        }

        /**
         * Set the value of postId.
         *
         * @return self
         */
        public function setPostId($postId)
        {
            $this->postId = $postId;

            return $this;
        }

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
        public function setUserId($userId)
        {
            $this->userId = $userId;

            return $this;
        }

        public function addLike($postId)
        {
            $conn = Db::getInstance();

            $statement = $conn->prepare('INSERT INTO likes (post_id, user_id, date_created) VALUES (:postid, :userid, NOW())');
            $statement->bindValue(':postid', $postId);
            $statement->bindValue(':userid', $this->getUserId());

            return $statement->execute();
        }

        private function deleteLike($postid)
        {
            $conn = db::getInstance();
            $statement = $conn->prepare('DELETE FROM likes WHERE post_id = :post_id AND user_id =:user_id');
            $statement->bindValue(':post_id', $postid);
            $statement->bindValue(':user_id', $this->getUserId());
            $statement->execute();
        }

        public function likeUnlike($postid)
        {
            $conn = db::getInstance();
            $statement = $conn->prepare('SELECT COUNT(*) AS nrOfLikes FROM likes WHERE post_id=:post_id AND user_id=:user_id');
            $statement->bindValue(':post_id', $postid);
            $statement->bindValue(':user_id', $this->getUserId());
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result['nrOfLikes'] == 0) {
                $this->addLike($postid);

                return true;
            } else {
                $this->deleteLike($postid);

                return false;
            }
        }
    }
