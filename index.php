<?php


require_once "db.php";
require_once "init.php";
session_start();


// require_once "router.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];



if($uri === '/') 
include_once 'views/index.view.php';
else if($uri === '/task')
include_once 'controllers/taskController.php';
else if($uri === '/auth')
include_once 'views/authentification.php';
else 
include_once 'views/404.php';



