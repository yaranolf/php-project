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
                'cost' => 14, //je schrijft 2^14, hash wordt dus 4096x uitgevoerd, hacker moet gokken welke macht wij gekozen hebben, duurt ook langer, met brute force kan je veel minder pogingen doen per minuut
            ];

            $password = password_hash($this->password, PASSWORD_DEFAULT, $options); //PASSWORD_DEFAULT is constant, gaat niet wijzigen
            
            try{
                $conn= new PDO("mysql:host=localhost;dbname=inspiration_hunter;","root","root", null);
                $statement = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES(:fullname, :email, :password)");
                //gaat injectie tegen, er is geen $_POST, zijn 2 gaten waar nog iets moet binnenkomen
                $statement->bindParam(":email", $email);
                $statement->bindParam(":password", $password);
                $statement->bindParam(":fullname", $fullName);
                //plakt niks in query tot je runt, bindValue stopt direct in query (ook zonder runnen)
                //bindParam gaat quotes negeren
                $statement->execute();
                //geeft true of false terug zodat je weet of het gelukt is
                $result = $statement->execute();
                return $result;
                echo $result; 
                //om te zien wat er uit komt
            } catch (Throwable $t){
                echo "er liep iets mis";
                return false;
                //echo $t->getMessage();
            }
        }
    }
?>