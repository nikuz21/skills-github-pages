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
    <title>Register</title>
    <style>
        @media (max-width: 640px) {
            .w-96 {
                width: 90%;
            }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 px-4" style="background-image: url('images/back.png'); background-size: cover; background-position: center;">
    <div class="bg-white bg-opacity-70 p-6 rounded-lg shadow-md w-96 max-w-full">
        <div class="flex justify-center mb-4">
            <img src="images/nwssu.png" alt="NWSSU Logo" class="w-20 h-20">
        </div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4 text-center">Member Registration</h2>
        
        <?php check_message(); ?>
        
        <form action="" method="POST">
            <div class="mb-4">
                <input type="text" name="FNAME" placeholder="First Name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <input type="text" name="LNAME" placeholder="Last Name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <input type="text" name="ADDRESS" placeholder="Address" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <input type="text" name="PHONE" placeholder="Contact No." class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <input type="text" name="USERNAME" placeholder="Username" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <input type="password" name="PASS" placeholder="Password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
    
            <button type="submit" name="btnRegister" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Register</button>
    
            <p class="mt-4 text-sm text-center text-gray-600">Already have an account? <a href="login.php" class="text-blue-500 hover:underline">Sign In</a></p>
        </form>
    </div>
    
    <?php 
    if (isset($_POST['btnRegister'])) {
        $student = New Student(); 
        $student->Fname = $_POST['FNAME']; 
        $student->Lname = $_POST['LNAME'];
        $student->Address = $_POST['ADDRESS']; 
        $student->MobileNo = $_POST['PHONE'];  
        $student->STUDUSERNAME = $_POST['USERNAME'];
        $student->STUDPASS = sha1($_POST['PASS']); 
        $student->create();  

        message("You are now successfully registered. You can log in now!", "success");
        redirect("register.php");
    }
    ?>
</body>
</html>
