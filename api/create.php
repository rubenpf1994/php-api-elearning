<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'dao/users.php';
    include_once 'models/user.php';

    $userdao = new UsersDao();
    $user = new User();

    $data = json_decode(file_get_contents("php://input"));
    $user->setName($data->name);
    $user->setPassword($data->password);
    $user->setEmail($data->email);
    
    if($userdao->createUser($user)){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
?>