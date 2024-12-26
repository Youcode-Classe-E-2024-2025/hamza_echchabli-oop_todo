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
    public function addTasks($liste) {

        try {
            foreach ($liste as  $task) {

                $this->taskDAO->create($task);
                
            }
    
        } catch (\Throwable $th) {
            return $th;
           
        }
       return 'success';
    }
    
    public function cleanTable() {

        $this->taskDAO->delete();

    }


  
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

       
       
        $controller->cleanTable();

        $res =$controller->addTasks($task);
        
        
        

        echo json_encode([
            'status' => 'success',
            'message' => 'Task processed successfully',
            'data' => [
                'name' => 'test',
                'deadline' => 'format',
                'description' => 'desc'
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


