<?php

require_once '../models/TaskModel.php';
require_once '../db.php';

class TasksController {
    private $taskDAO;
 

    public function __construct($db) {
        
        $this->taskDAO = new TaskDAO($db);
    }

    public function getAllTasks() {
        $tasks = $this->taskDAO->getAll();
        // $this->sendResponse(200, $tasks);
        return $tasks;
    }

    // private function sendResponse($status, $data) {
    //     header("Content-Type: application/json");
    //     http_response_code($status);
    //     echo json_encode($data);
    // }
}




$controller = new TasksController($db);

if ($_SERVER['REQUEST_METHOD'] =='GET') {
 
  $res =$controller->getAllTasks();

  echo json_encode($res);
  exit;

}


