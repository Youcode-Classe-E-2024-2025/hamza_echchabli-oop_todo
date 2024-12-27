<?php

class userDao {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getAll(){
        $result = $this->db->query('select * from users')->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Register a new user
    public function register($user) {
        session_start();
        // Check if email already exists
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $this->db->query($sql, [':email' => $user['email']]);
        $existingUser = $result->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            $_SESSION['register']='email exists';
            header('Location: /auth');
            exit;
           
        }

        // Insert new user
        $sql = 'INSERT INTO users (user_name, password, email ,role) VALUES (:n, :p, :e ,:r)';
        $result = $this->db->query($sql, [
            ':n' => $user['name'],
            ':p' => password_hash($user['password'], PASSWORD_DEFAULT),
            ':e' => $user['email'],
            ':r' =>'u',
        ]);

        if ($result) {
            $_SESSION['register']='success';
            header('Location: /auth');
            exit;
           
        } else {
          
            $_SESSION['register']='failure';
            header('Location: /auth');
            exit;
            
        }
    }

    // Log in a user
    public function loginUser($email, $password) {
        session_start();
        // Check if email exists and fetch user
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $this->db->query($sql, [':email' => $email]);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
           
            $_SESSION['login']='not exis';
            header('Location: /auth');
            exit;
        }

        // Verify the password
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['loginU']=[$user['id'],$user['role']];
            
            header('Location: /');
            exit;
        } else {
              $_SESSION['login']="Invalid password";
            header('Location: /auth');
            exit; 
        }
    }
}

?>
