<?php
session_start();
if(isset($_SESSION['loggedin']) || !empty($_SESSION['loggedin'])){
    header("location : ./home_page.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/home_page.css">
    <link rel="stylesheet" type="text/css" href="../public/css/register_page.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Register</title>
</head>

<body>
    <div class="main">
    <header>
        <nav>
            <div class="logo">
                <img src="../public/image/logo.png" alt="logo_2">
            </div>
            <div class="menu">
                <a href="./home_page.php">Home</a>
                <a href="./contestant_page.php">Contestant</a>
                <a href="./video_page.php">Videos</a>
                <a href="./about_page.php">About</a>
                <a href="./blog_page.php">Blogs</a>
                <a href="./contact_page.php">Contact</a>
                <a href="./help_page.php">Help</a>
                <a href="./register_page.php">Register</a>
                <a href="./login_page.php">Login</a>
            </div>
            <div class="burger">
                <div class="line-1"></div>
                <div class="line-2"></div>
                <div class="line-3"></div>
            </div>
        </nav>
    </header> 

    <div class='reg-content'>
        <h1> We help to <br><span>Connect</span></h1>
        <p class='reg-cont-par'> Lorem ipsum dolor sit amet consectetur 
            adipisicing elit.<br> Facilis illo officia cumque iure, velit atque perferendis.<br>
            Debitis vitae praesentium expedita.</p>
            <button class="btn reg-submit"><a href='#'>JOIN US</a></button>
    </div>
    <!-- Header end here-->
  <div class="reg-form">
          <h2 class="center reg-tag">Register</h2>
     <form action="./reg_handler.php" method='POST' id='form' onsubmit="return checkInputs()">
         <div class="center">
            <label>First name</label>
             <input type='text' placeholder="Enter First Name" id="first_name"  name= "first_name">
             <span></span>
         </div>
         <div class="center">
            <label>Last name</label>
            <input type='text' placeholder="Enter Last Name" id="last_name" name="last_name" >
            <span></span>
        </div>
        <div class="center">
            <label>Email</label>
            <input type='text' placeholder="Enter Email" id="email" name="email">
            <span></span>
        </div>
        <div class="center">
            <label>Password</label>
            <input type='password' placeholder="Enter Password" name="password_1" id="password_1">
            <span></span>
        </div>
        <div class="center">
            <label>Repeat Password</label>
            <input type='password' placeholder="Repeat Password" name="password_2" id="password_2">
            <span></span>
        </div>
pan    <div class="center">
            <button class="btn reg-submit">Submit</button>
        </div>
     </form>
     <p class='link center'>Already have account
    <a href="#">Sign in </a></p>
        <!-- <div class=" center social-links">
            <a href="#"> <i class="fab fa-youtube"></i> </a>
            <a href="#"> <i class="fab fa-facebook"></i> </a>
            <a href="#"> <i class="fab fa-instagram"></i> </a>
            <a href="#"> <i class="fab fa-twitter"></i> </a>
            <a href="#"> <i class="fas fa-envelope"></i> </a>
       </div> -->


    <!-- Footer start here -->
    <!-- footer end here -->
</div>
    <script src='../public/js/index.js'></script>
    <script src='../public/js/register.js'></script>
</body>

</html>