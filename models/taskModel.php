<?php








class TaskDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($row) {
        $sql = "INSERT INTO tasks (title, description, priority, status) VALUES (:title, :description, :priority, :status) RETURNING id";
        $result = $this->db->query($sql, [
            ':title' => $row['title'],
            ':description' => $row['description'],
            ':priority' => $row['priority'],
            ':status' => $row['status'],
        ]);

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
}
