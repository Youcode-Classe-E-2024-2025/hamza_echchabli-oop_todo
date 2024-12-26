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
    public function addTask($title,$description,$deadline,) {

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



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $inputData = file_get_contents('php://input');

    
    $task = json_decode($inputData, true); 

    

    if ($task !== null) {
       
        $name = $task['name'] ?? 'No name provided';
        $deadline = $task['deadline'] ?? 'No deadline provided';
        $description = $task['description'] ?? 'No description provided';

        
        $formattedDeadline = date('Y-m-d', strtotime($deadline)); 
        

        echo json_encode([
            'status' => 'success',
            'message' => 'Task processed successfully',
            'data' => [
                'name' => $name,
                'deadline' => $formattedDeadline,
                'description' => $description
            ]
        ]);
    } else {
        
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid JSON data'
        ]);
    }
} else {
    
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method'
    ]);
}


