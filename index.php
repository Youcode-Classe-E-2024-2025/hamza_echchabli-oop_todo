<?php


require_once "db.php";
require_once "init.php";


// require_once "router.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if($uri === '/') {
    // if(!isset($_SESSION['role']) || !isset($_SESSION['user_id'])){
    //     header('Location: /auth');
    //     exit();
    // }

    include_once 'views/index.view.php';
}
else if($uri === '/task')
include_once 'controllers/taskController.php';
else if($uri === '/auth')
include_once 'views/authentification.php';

