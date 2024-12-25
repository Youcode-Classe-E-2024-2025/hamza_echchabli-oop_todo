<?php
Class Kanban {
    private $model;
    public function __construct($db) {
        
    } 
    public function show() {
        require_once "views/kanban.view.php";
    }
}