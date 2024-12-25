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


if (!tableExists($db, 'kanbans')) {
    $db->query('
        CREATE TABLE kanbans (
            id UUID DEFAULT uuid_generate_v4() PRIMARY KEY,
            name TEXT NOT NULL
        );
    ');
}


if (!tableExists($db, 'contributions')) {
    $db->query('
        CREATE TABLE contributions (
            id UUID DEFAULT uuid_generate_v4() PRIMARY KEY,
            user_id UUID NOT NULL REFERENCES users(id),
            kanban_id UUID NOT NULL REFERENCES kanbans(id),
            user_role CHAR(1) CHECK (user_role IN (\'a\', \'c\')) NOT NULL
        );
    ');
}

if (!tableExists($db, 'tasks')) {
    $db->query('
        CREATE TABLE tasks (
            id UUID DEFAULT uuid_generate_v4() PRIMARY KEY,
            name TEXT NOT NULL,
            description TEXT,
            kanban_id UUID NOT NULL REFERENCES kanbans(id),
            status TEXT CHECK (status IN (\'todo\', \'doing\', \'review\', \'done\')) NOT NULL
        );
    ');
}


if (!tableExists($db, 'assignments')) {
    $db->query('
        CREATE TABLE assignments (
            id UUID DEFAULT uuid_generate_v4() PRIMARY KEY,
            user_id UUID NOT NULL REFERENCES users(id),
            task_id UUID NOT NULL REFERENCES tasks(id)
        );
    ');
}

echo "Database initialization completed.";


