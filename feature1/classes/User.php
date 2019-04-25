<?php
    class User {
        private $fullName;
        private $email;
        private $password;
        private $passwordConfirmation;

        /**
         * Get the value of fullName
         */ 
        public function getFullName()
        {
            return $this->fullName;
        }

        /**
         * Set the value of fullName
         *
         * @return  self
         */ 
        public function setFullName($fullName)
        {
            $this->fullName = $fullName;
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

        /**
         * Get the value of passwordConfirmation
         */ 
        public function getPasswordConfirmation()
        {
            return $this->passwordConfirmation;
        }

        /**
         * Set the value of passwordConfirmation
         *
         * @return  self
         */ 
        public function setPasswordConfirmation($passwordConfirmation)
        {
            $this->passwordConfirmation = $passwordConfirmation;
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
                $statement = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES(:fullname, :email, :password)");
                $statement->bindParam(":fullname", $fullName);
                $statement->bindParam(":email", $email);
                $statement->bindParam(":password", $password);
                $statement->execute();
                //$result = $statement->execute();
                //return $result;
                //echo $result;
            } catch (Throwable $t){
                echo "er liep iets mis";
                return false;
            }
        }
    }
?>