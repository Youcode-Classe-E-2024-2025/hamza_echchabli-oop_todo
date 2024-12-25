<?php 
 
 class KanbanDto{
    public int $id;
    
    public string $name;

    public string $userRole;

    public function __construct(int $id  , string $name  , string $userRole){
        $this->id = $id;
        $this->name = $name;
        $this->userRole = $userRole;
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

    public function getUserRole(): string {
        return $this->userRole;
    }

    public function setUserRole(string $userRole): void {
        $this->userRole = $userRole;
    }






 }
  
 









?>