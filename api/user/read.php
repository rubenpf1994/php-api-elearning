<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../dao/users.php';
    include_once '../models/user.php';

    $userdao = new UsersDao();
    $user = new User();

    if(isset($_GET["id"])){
        $items = $userdao->getUsersById($_GET["id"]);
    }else{
        $items = $userdao->getUsers();
    }
    

    echo json_encode($items);
?>