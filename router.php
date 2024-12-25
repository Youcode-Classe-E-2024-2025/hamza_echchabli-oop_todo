<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
function abort($code = 404) {
    http_response_code($code);
    require_once "controllers/$code.php";
    die();
}

if($uri === '/kanban') {
    $kanban->show();
}
