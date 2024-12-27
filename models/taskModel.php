<?php








class TaskDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($row) {
        $sql = "INSERT INTO tasks (id,title, description, priority, status) VALUES (:id,:title, :description, :priority, :status) RETURNING id";
        $result = $this->db->query($sql, [
            ':id' => $row['id'],
            ':title' => $row['title'],
            ':description' => $row['description'],
            ':priority' => $row['priority'],
            ':status' => $row['status'],
        ]);

    }
    public function addAssign($userId,$taskId){
        $this->db->query('INSERT INTO assignments(user_id,task_id) values(?,?)',[$userId,$taskId]);
    }
    public function removeAssign($userId,$taskId){
        $this->db->query('DELETE FROM assignments where user_id = ? and task_id = ?',[$userId,$taskId]);
    }
    public function updateDescription($taskId,$description){
        $this->db->query('update tasks set description = ? where id = ?',[$description,$taskId]);
    }

    public function read($id) {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $result = $this->db->query($sql, [':id' => $id]);

        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row; // Return the task row as an associative array
    }

    public function update($row) {
        $sql = "UPDATE tasks SET name = :name, description = :description, priority = :priority, status = :status WHERE id = :id";
        return $this->db->query($sql, [
            ':id' => $row['id'],
            ':name' => $row['name'],
            ':description' => $row['description'],
            ':priority' => $row['priority'],
            ':status' => $row['status'],
        ]);
    }

    public function delete() {
        $sql = "DELETE FROM tasks ";
         $this->db->query($sql);
    }




    public function getAll() {
        $sql = "SELECT * FROM tasks";
        $result = $this->db->query($sql);

        $tasks =$result->fetchAll(PDO::FETCH_ASSOC);
        
        return $tasks;
    }
    public function getOne($id) {
        $sql1 = "SELECT * FROM tasks where id =:id";
        $sql2 = "SELECT u.id ,u.user_name,u.email FROM users u join assignments a on u.id = a.user_id where a.task_id =:id";
        $task = $this->db->query($sql1,[':id'=>$id])->fetch();
        $assignees = $this->db->query($sql2,[':id'=>$id])->fetchAll(PDO::FETCH_ASSOC);
        $task['assignees'] = $assignees;
        
        return $task;
    }
}






