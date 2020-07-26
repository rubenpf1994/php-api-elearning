<?php
    Class User{
        private $name;
        private $password;
        private $email;

        public function __construct(){}

        public function getName(): string{
            return $this->name;
        }

        public function setName(string $name){
            $this->name = $name;
        }

        public function getPassword(): string{
            return $this->password;
        }

        public function setPassword(string $password){
            $this->password = $password;
        }

        public function getEmail(): string{
            return $this->email;
        }

        public function setEmail(string $email){
            $this->email = $email;
        }
    }

    


?>