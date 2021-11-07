<?php
session_start();
if(isset($_SESSION['loggedin']) || !empty($_SESSION['loggedin'])){
    header("Location: ./home_page.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/login_page.css">
    <link rel='stylesheet' href='../public/css/home_page.css'>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="login.js"></script>
</head>

<body>
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
    <div class="login-container">
        <div class="login-left-side">
            <img src="../public/image/bg.jpg" alt="">
        </div>
        <div class="login-right-side">
            <div class="log-form">
                <h2>Login</h2>
                <?php
                if(!empty($_SESSION['showError'])){
                    echo "<div class='center'><p class='error'>";
                    echo $_SESSION['showError'];
                    echo "</p></div>";
                }
                $_SESSION['showError'] = "" ;
                ?>
                <form action="./login_handler.php" method='POST'>
                    <div class="center">
                        <input type='text' placeholder="User name" name="email" id="email" onfocus="afterFocus(this)" onblur="afterBlur(this)">
                    </div>
                    <div class="center">
                        <input type='password' placeholder="Password" name="password" id="password" onfocus="afterFocus(this)" onblur="afterBlur(this)">
                    </div>
                    <div class="center">
                        <button type="submit" class='btn log-submit'> Login </button>
                    </div>
                </form>
            <div class="center">
           
            <h3>Login with social media </h3> 
            <ul class="sci">
                <li><img src="../public/image/facebook.png" alt=""></li>
                <li><img src="../public/image/instagram.png" alt=""></li>
                <li><img src="../public/image/twitter.png" alt=""></li>
            </ul>
            </div>
            </div>
            
        </div>
    </div>
<script src='../public/js/index.js'></script>

</body>

</html>