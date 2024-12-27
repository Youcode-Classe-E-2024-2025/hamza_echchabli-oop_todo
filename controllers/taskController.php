<?php

require_once 'models/taskModel.php';
require_once 'models/userModel.php';
require_once 'db.php';

Class TaskController {
    private $taskDAO;
    private $userDAO;

    public function __construct($db) {
        $this->taskDAO = new TaskDAO($db);
        $this->userDAO = new UserDAO($db);
    }

    public function getTask() {

        $id = $_GET['id'];
        
if (!preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/', $id)) {
 
    header('Location: /tt');
    exit;
    
}
        $task=$this->taskDAO->getOne($id);
       
        if (!$task) {
 
            header('Location: /tt');
            exit;
            
        }
       
        $users=$this->userDAO->getAll();


        $assignedUserIds = array_map(function ($assignee) {
            return $assignee['id'];  
        }, $task['assignees']);


        $filteredUsers = array_filter($users, function ($user) use ($assignedUserIds) {
            return !in_array($user['id'], $assignedUserIds);  
        });

        $filteredUsers = array_values($filteredUsers);
  
   

        require 'views/task.view.php';
    }
    public function addAssignee($userId) {
        $taskId = $_GET['id'];
        $this->taskDAO->addAssign($userId,$taskId);
    }
    public function removeAssignee($userId) {
        $taskId = $_GET['id'];
        $this->taskDAO->removeAssign($userId,$taskId);
    }
    public function updateDescription($description) {
        $taskId = $_GET['id'];
        $this->taskDAO->updateDescription($taskId,$description);
    }
}

$taskController = new TaskController($db);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['hidden'] === 'add-assignee' && !empty($_POST['id'])){
        $id = $_POST['id'];
        $taskController->addAssignee($id);
        $taskId = $_GET['id'];
        header("Location: /task?id=$taskId");
        exit();
    }
    if($_POST['hidden'] === 'remove-assignee' && !empty($_POST['id'])){
        $id = $_POST['id'];
        $taskController->removeAssignee($id);
        $taskId = $_GET['id'];
        header("Location: /task?id=$taskId");
        exit();
    }
    if($_POST['hidden'] === 'update-description' && !empty($_POST['description'])){
        $description = htmlspecialchars($_POST['description']);
        $taskId = $_GET['id'];
        $taskController->updateDescription($description);
        header("Location: /task?id=$taskId");
        exit();
    }
}
$taskController->getTask();