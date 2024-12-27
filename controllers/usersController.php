<?php
require_once '../models/UserModel.php';  
require_once '../db.php';

session_start();

$userDAO = new UserDAO($db); 



if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    
  
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required!";
        return;
    }

    $user = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];

    

    
    $result = $userDAO->register($user);

    echo $result;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $email = trim($_GET["email"]);
    $password = trim($_GET["password"]);

    // Validate the input
    if (empty($email) || empty($password)) {
        echo "Email and password are required!";
        return;
    }

    $result = $userDAO->loginUser($email, $password);

    echo $result;
}


  











