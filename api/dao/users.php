<?php

    require_once('../conexion/conexion.php');

    class UsersDao{
        private static $conexion;

        public function __construct()
        {
            self::$conexion = Conexion::getInstance();
        }

        

        //CREATE
        public function createUser($user){
            $insertQuery = "INSERT INTO users (name, password, email) VALUES (?, ?, ?)";
            if($stmt = self::$conexion->prepare($insertQuery)){
                $name= $user->getName();
                $password=$user->getPassword();
                $email=$user->getEmail();
                $stmt -> bind_param('sss', $name, $password, $email);
                
                if($stmt->execute()){
                    return true;
                }
            }
            echo self::$conexion->errno . ' ' . self::$conexion->error;
            return false;
            
        }

        //READ
        public function getUsers(){}

        public function getUsersById(int $id){}

        //UPDATE
        public function updateUser(){}

        //DELETE
        public function deleteUser(){}


    }
?>