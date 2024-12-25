<?php 

   class UsersDto{

    public int $id;
    public string $username;

    public string $email ; 

    public function __construct($id , $username , $email){
        $this->id = $id ; 
        $this->username = $username;
        $this->email = $email ; 
    }

    public function getId(): int {
        return $this->id;
    }


    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

   }








?>