<?php








class TaskDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create(Task $task) {
        $sql = "INSERT INTO tasks (name, description, priority, status) VALUES (:name, :description, :priority, :status) RETURNING id";
        $result = $this->db->query($sql, [
            ':name' => $task->getName(),
            ':description' => $task->getDescription(),
            ':priority' => $task->getPriority(),
            ':status' => $task->getStatus(),
        ]);

        $id = $result->fetch(PDO::FETCH_ASSOC)['id'];
        $task->setId($id);
        return $task;
    }

    public function read($id) {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $result = $this->db->query($sql, [':id' => $id]);

        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Task(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['priority'],
                $row['status']
            );
        }
        return null;
    }

    public function update(Task $task) {
        $sql = "UPDATE tasks SET name = :name, description = :description, priority = :priority, status = :status WHERE id = :id";
        return $this->db->query($sql, [
            ':id' => $task->getId(),
            ':name' => $task->getName(),
            ':description' => $task->getDescription(),
            ':priority' => $task->getPriority(),
            ':status' => $task->getStatus(),
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        return $this->db->query($sql, [':id' => $id]);
    }

    public function getAll() {
        $sql = "SELECT * FROM tasks";
        $result = $this->db->query($sql);

        $tasks =$result->fetchAll(PDO::FETCH_ASSOC);
        
        return $tasks;
    }
}
