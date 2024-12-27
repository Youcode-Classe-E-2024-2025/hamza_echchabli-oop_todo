<?php

require_once 'models/taskModel.php';
require_once 'db.php';

Class TaskController {
    private $taskDAO;

    public function __construct($db) {
        $this->taskDAO = new TaskDAO($db);
    }

    public function getTask() {
        $id = $_GET['id'];
        $task=$this->taskDAO->getOne($id);
        require 'views/task.view.php';
    }
}

$taskController = new TaskController($db);

$taskController->getTask();