

<?php
// Start session at the beginning of the script
session_start();
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

    <header class="">
     
        <a href="../index.php" class="text-2xl font-bold text-gray-800 hover:text-blue-500">
            KanBan
        </a>

        <div>
            <a href="../pages/authentificationPage.php" class=" mr-auto px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Log In
            </a>
        </div>
    </header>

    <div class="container  flex justify-center items-center  ">
       
        <form id="login-form" action="../controllers/usersController.php" class="space-y-4" method="POST">
            <h2 class="text-2xl">Login</h2>
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

        <form id="register-form" action="../controllers/usersController.php" class="space-y-4 hidden" method="GET">
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

    <?php
    
    if (isset($_SESSION['res'])) {
       
       
        echo '<script>alert("' . htmlspecialchars($_SESSION['res'], ENT_QUOTES, 'UTF-8') . '");</script>';
        
    
    }
    ?>
    <script src="../js/script.js"></script> 
</body>
</html>
