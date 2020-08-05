<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../dao/users.php';
    include_once '../models/user.php';

    $userdao = new UsersDao();
    $user = new User();
    
    
    if($userdao->createUser($user)){
        $message = array('status'=> '200', 'message' => 'Employee created successfully.');
        echo json_encode($message);
    } else{
        $message = array('status'=> '500', 'message' => 'Employee could not created successfully.');
        echo json_encode($message);
    }
?>