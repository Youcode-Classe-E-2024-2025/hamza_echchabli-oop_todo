

<?php






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librairie</title>
    
    <link href="./css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../auth.css">


    
   
</head>
<body class="bg-gray-100">

     
    <nav class="w-full text-white bg-gray-700 flex justify-center relative">
   
    <strong>log in </strong>
  
    
    </nav>
 <?php
        if (isset($_SESSION['login'])){

           echo' <label class="alertS"> '.$_SESSION['login'].'</label>';

            
        }
    
    
    ?>

    <div class="container  flex justify-center items-center  "id="formMT">
       
        <form id="login-form" action="../controllers/usersController.php" class="space-y-4" method="GET">
            <h2 class="text-2xl "><span>   Login</span><span>   result</span></h2>
            <input for="register" name="login" class="hidden">
            <div>
                <label for="email">Email</label>
                <input  id="loginEmail" name="email" placeholder="Enter your email" >
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" >
            </div>
            <button type="submit">Log In</button>
            <p>
                Don't have an account? <a href="#" id="show-register">Go to Register</a>
            </p>
        </form>

        <form id="register-form" action="../controllers/usersController.php" class="space-y-4 hidden" method="POST">
            <h2 class="text-2xl">Register</h2>
            <input for="register" name="register" class="hidden">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" >
            </div>
            <div>
                <label for="email-register">Email</label>
                <input id="email-register" name="email" placeholder="Enter your email" >
            </div>
            <div>
                <label for="password-register">Password</label>
                <input type="password" id="password-register" name="password" placeholder="Create a password" >
            </div>
           
            <button type="submit">Register</button>
            <p>
                Already have an account? <a href="#" id="show-login">Go to Login</a>
            </p>
        </form>
       
    </div>

    
    <script src="../js/script.js"></script> 
</body>
</html>
