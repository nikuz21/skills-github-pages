<?php 
require_once ("include/initialize.php");   
if (isset($_SESSION['StudentID'])) {
  redirect('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
    <style>
        body {
            background: url('images/back.png') no-repeat center center fixed;
            background-size: cover;
        }
        .bg-opacity {
            background: rgba(255, 255, 255, 0.8);
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="bg-opacity w-80">
        <div class="flex justify-center mb-4">
            <img src="images/nwssu.png" alt="NWSSU Logo" class="w-20 h-20">
        </div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4 text-center">Member Login</h2>
        
        <?php check_message(); ?>
        
        <form action="" method="POST">
            <div class="mb-4 relative">
                <span class="absolute left-3 top-3 text-gray-500">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" name="user_email" placeholder="Username" class="w-full px-4 py-2 border rounded-md pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
    
            <div class="mb-4 relative">
                <span class="absolute left-3 top-3 text-gray-500">
                    <i class="fa fa-lock"></i>
                </span>
                <input type="password" name="user_pass" placeholder="Password" class="w-full px-4 py-2 border rounded-md pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
    
            <button type="submit" name="btnLogin" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Sign In</button>
    
            <p class="mt-4 text-sm text-center text-gray-600">Don't have an account? <a href="register.php" class="text-blue-500 hover:underline">Create an account</a></p>
        </form>
    </div>

    <?php 
    if(isset($_POST['btnLogin'])){
        $email = trim($_POST['user_email']);
        $upass  = trim($_POST['user_pass']);
        $h_upass = sha1($upass);
        
        if ($email == '' OR $upass == '') {
            message("Invalid Username and Password!", "error");
            redirect (web_root."login.php");
        } else {  
            $student = new Student();
            $res = $student::studentAuthentication($email, $h_upass);
            if ($res == true) {  
                redirect(web_root."index.php"); 
            } else {
                message("Account does not exist! Please contact Administrator.", "error");
                redirect (web_root."login.php");
            }
        }
    } 
    ?>
</body>
</html>
