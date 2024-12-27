<?php
require_once "db.php";
require_once "init.php";


// require_once "router.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if($uri === '/') 
include_once 'views/index.view.php';
else if($uri === '/task')
include_once 'views/task.view.php';

