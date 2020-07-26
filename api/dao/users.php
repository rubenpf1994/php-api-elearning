<?php

    include('conexion/conexion.php');

    class UsersDao{
        private static $conexion;

        public function __construct()
        {
            self::$conexion = Conexion::getInstance();
        }

        //CREATE
        public function createUser($user){
            var_dump($user);
            return true;
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