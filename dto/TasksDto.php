<?php  

include_once('UserDto.php');

class TasksDto {
    private int $id;
    private string $name;
    private string $description;
    private int $kanban_id;
    private array $users = []; 

    public function __construct(int $id, string $name, string $description, int $kanban_id, ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->kanban_id = $kanban_id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getKanbanId(): int {
        return $this->kanban_id;
    }

    public function setKanbanId(int $kanban_id): void {
        $this->kanban_id = $kanban_id;
    }

    public function getUsers(): array {
        return $this->users;
    }

    public function addUser(UsersDto $user): void {
        $this->users[] = $user;
    }

  
}

?>
