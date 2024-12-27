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
        // Check if email already exists
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $this->db->query($sql, [':email' => $user['email']]);
        $existingUser = $result->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            $_SESSION['register']='email exists';
            header('Location: ../views/authentification.php');
            exit;
           
        }

        // Insert new user
        $sql = 'INSERT INTO users (user_name, password, email) VALUES (:n, :p, :e)';
        $result = $this->db->query($sql, [
            ':n' => $user['name'],
            ':p' => password_hash($user['password'], PASSWORD_DEFAULT),
            ':e' => $user['email']
        ]);

        if ($result) {
            $_SESSION['register']='success';
            header('Location: ../views/authentification.php');
            exit;
           
        } else {
          
            $_SESSION['register']='failure';
            header('Location: ../views/authentification.php');
            exit;
            
        }
    }

    // Log in a user
    public function loginUser($email, $password) {
        // Check if email exists and fetch user
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $this->db->query($sql, [':email' => $email]);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
           
            $_SESSION['loginU']='not exis';
            header('Location: ../views/authentification.php');
            exit;
        }

        // Verify the password
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['loginU']=$user['email'];
            header('Location: /');
            exit;
        } else {
              $_SESSION['loginU']="Invalid password";
            header('Location: ../views/authentification.php');
            exit; 
        }
    }
}

?>
