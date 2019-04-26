<?php
    class User {
        private $firstName;
        private $lastName;
        private $userName;
        private $email;
        private $password;
        
        /**
         * Get the value of firstName
         */ 
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * Set the value of firstName
         *
         * @return  self
         */ 
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
            return $this;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
            return $this;
        }

        /**
         * Get the value of userName
         */ 
        public function getUserName()
        {
            return $this->userName;
        }

        /**
         * Set the value of userName
         *
         * @return  self
         */ 
        public function setUserName($userName)
        {
            $this->userName = $userName;
            return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            $this->email = $email;
            return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
            $this->password = $password;
            return $this;
        }

        public function register(){
                $options = [
                    'cost' => 14, 
                ];
    
                $password = password_hash($this->password, PASSWORD_DEFAULT, $options);
                
                try{
                    //$conn = new PDO("mysql:host=localhost;dbname=inspiration_hunter;","root","root",null);
                    $conn = Db::getInstance();
                    $statement = $conn->prepare("INSERT INTO users (firstname, lastname, username, email, password) VALUES(:firstname, :lastname, :username, :email, :password)");
                    $statement->bindParam(":firstname", $this->firstName);
                    $statement->bindParam(":lastname", $this->lastName);
                    $statement->bindParam(":username", $this->userName);
                    $statement->bindParam(":email", $this->email);
                    $statement->bindParam(":password", $password);
                    //$statement->execute();
                    $result = $statement->execute();
                    return $result;
                } catch (Throwable $t){
                    echo "er liep iets mis";
                    return false;
                }
        }

        public function login() {
            if(!isset($_SESSION)) { 
                session_start(); 
            } 
            $_SESSION['username'] = $this->email;
            header('Location: index.php');
        }

        /* Check if a user is logged in. If not, redirect to login*/
        public static function checkLogin(){
            if(!isset($_SESSION)) { 
                session_start(); 
            }
            if(!isset($_SESSION['username'])){
                header('Location: login.php');
            }
        }
    }
?>