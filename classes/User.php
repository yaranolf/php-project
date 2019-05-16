<?php



    //include 'Db.php';


    class User
    {
        private $id;
        private $firstName;
        private $lastName;
        private $userName;
        private $email;
        private $password;
        private $passwordCorfirmation;

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
         * Get the value of firstName.
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * Set the value of firstName.
         *
         * @return self
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;

            return $this;
        }

        /**
         * Get the value of lastName.
         */
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * Set the value of lastName.
         *
         * @return self
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;

            return $this;
        }

        /**
         * Get the value of userName.
         */
        public function getUserName()
        {
            return $this->userName;
        }

        /**
         * Set the value of userName.
         *
         * @return self
         */
        public function setUserName($userName)
        {
            $this->userName = $userName;

            return $this;
        }

        /**
         * Get the value of email.
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Set the value of email.
         *
         * @return self
         */
        public function setEmail($email)
        {
            $this->email = $email;

            return $this;
        }

        /**
         * Get the value of password.
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set the value of password.
         *
         * @return self
         */
        public function setPassword($password)
        {
            $this->password = $password;

            return $this;
        }

        public static function getUser()
        {
            $conn = Db::getInstance();
            $result = $conn->query('SELECT users.username FROM users, images where images.user_id = users.id');

            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function register()
        {
            // connectie
            $conn = Db::getInstance();

            // query (sql injectie!!!)
            $statement = $conn->prepare('INSERT INTO users (firstname, lastname, username, email, password) VALUES(:firstname, :lastname, :username, :email, :password)');
            $statement->bindParam(':firstname', $this->firstName);
            $statement->bindParam(':lastname', $this->lastName);
            $statement->bindParam(':username', $this->userName);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':password', $password);

            $password = password_hash($this->password, PASSWORD_BCRYPT);

            // execute
            $result = $statement->execute();

            return $result;

            echo 'yes';
        }

        public function update($id)
        {
            // connectie
            $conn = Db::getInstance();

            // query (sql injectie!!!)
            $statement = $conn->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname, username = :username, email = :email WHERE id = :id');
            $statement->bindParam(':firstname', $this->firstName);
            $statement->bindParam(':lastname', $this->lastName);
            $statement->bindParam(':username', $this->userName);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':id', intval($id));

            // execute
            $result = $statement->execute();

            return $result;
        }

        public function login($email, $password)
        {
            $conn = Db::getInstance();

            // check of rehash van password gelijk is aan hash uit db
            $statement = $conn->prepare('select * from users where email = :email');
            $statement->bindParam(':email', $email);
            $result = $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['userid'] = $user['id'];

                return true;
            } else {
                return false;
                $error = true;
            }
        }

        public function logMeIn()
        {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['userid'] = $this->id;
            header('Location: index.php');
        }

        public function getUserId($email)
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare('select id from users where email = :email');
            $statement->bindParam(':email', $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_OBJ);

            return $result->id;
        }
    }
