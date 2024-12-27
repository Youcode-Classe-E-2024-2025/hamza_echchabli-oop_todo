<?php



   class userDao{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }




    public function ifEmailExist($email){
        $sql = 'SELECT * from users where email = :email';
        $result = $this->db->query($sql, [':email' => $email]);

        if (!$result) {
            return false; 
        }
    
        return $result;
    }


    public function register($user){

         $res = $this->ifEmailExist($user['email']);
        //  if($res){
        //     return 'email exist' ; 
        //  }




        $sql = 'INSERT into users (user_name ,password ,email  ) values (:n , :p ,  :e  )';
        $result = $this->db->query($sql , [
         ':n' => $user['name'],
         ':p' => $user['email'],
         ':e' => $user['email']


        ]);
        if ($result) {
            return 'sucess' ;
        } else {
            return 'false';
        }
        
    }

public function loginUser($email, $password) {
   
    $user = $this->ifEmailExist($email);

    if (!$user) {
        return "not exist"; 
    }

    if (password_verify($password, $user['password'])) {
        return true; 
    } else {
        return "Invalid password"; 
    }
}


















   }









?>