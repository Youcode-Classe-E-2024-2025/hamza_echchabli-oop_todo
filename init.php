<?php

global $db;

$db->query('CREATE EXTENSION IF NOT EXISTS "uuid-ossp"');

function tableExists($db, $tableName) {
    return $db->query("SELECT EXISTS (SELECT FROM information_schema.tables WHERE table_name = '{$tableName}')")->fetchColumn();
}

if (!tableExists($db, 'users')) {
    $db->query('
        CREATE TABLE users (
            id UUID DEFAULT uuid_generate_v4() PRIMARY KEY,
            user_name TEXT NOT NULL,
            password TEXT NOT NULL
        );
    ');
}





if (!tableExists($db, 'tasks')) {
    $db->query('
        CREATE TABLE tasks (
            id UUID DEFAULT uuid_generate_v4() PRIMARY KEY,
            title TEXT NOT NULL,
            description TEXT,
            deadline date not null default CURRENT_DATE,
            priority int not null default 0,
            status TEXT CHECK (status IN (\'todo\', \'doing\', \'review\', \'done\')) NOT NULL
        );
    ');
    $db->query("
    INSERT INTO tasks (title, description,priority,status) VALUES
        ('Task 1', 'Description for Task 1',0,'todo'),
        ('Task 2', 'Description for Task 2',1, 'todo'),
        ('Task 3', 'Description for Task 3',1,'doing'),
        ('Task 4','Description for Task 4',2, 'review'),
        ('Task 5','Description for Task 5',2, 'done');
    ");
}


if (!tableExists($db, 'assignments')) {
    $db->query("
        CREATE TABLE assignments (
            id UUID DEFAULT uuid_generate_v4() PRIMARY KEY,
            user_id UUID NOT NULL REFERENCES users(id),
            task_id UUID NOT NULL REFERENCES tasks(id)
        );
    ");
}




