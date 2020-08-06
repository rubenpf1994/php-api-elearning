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
        public function getUsers(){
            $selectQuery = "SELECT * FROM users";
            $totalResults=[];
            if($stmt = self::$conexion->query($selectQuery)){
                while($row = $stmt->fetch_assoc()){
                    $totalResults[]=$row;
                }
                // set response code - 200 OK
                http_response_code(200);

                return $totalResults;
            }
            echo self::$conexion->errno . ' ' . self::$conexion->error;
            return false;
        }

        public function getUsersById(int $id){
            $selectQuery = "SELECT * FROM users WHERE id = ".$id;
            if($stmt = self::$conexion->query($selectQuery)){
                $row = $stmt->fetch_assoc();
                
                // set response code - 200 OK
                http_response_code(200);

                return $row;
            }
            echo self::$conexion->errno . ' ' . self::$conexion->error;
            return false;
        }

        //UPDATE
        public function updateUser($user){
            $updateQuery = "UPDATE users SET
                                name = ?, 
                                email = ?, 
                                password = ?, 
                            WHERE 
                                id = ?";
            if($stmt = self::$conexion->prepare($updateQuery)){
                $id = $user->getId();
                $name= $user->getName();
                $password=$user->getPassword();
                $email=$user->getEmail();
                $stmt -> bind_param('isss', $id, $name, $password, $email);
                
                if($stmt->execute()){
                    return true;
                }
            }
            echo self::$conexion->errno . ' ' . self::$conexion->error;
            return false;
        }

        //DELETE
        public function deleteUser($id){
            $deleteQuery = "DELETE FROM users WHERE id = ?";
            if($stmt = self::$conexion->prepare($deleteQuery)){
                $stmt -> bind_param('i', $id);
                
                if($stmt->execute()){
                    return true;
                }
            }
            echo self::$conexion->errno . ' ' . self::$conexion->error;
            return false;
        }


    }
?>