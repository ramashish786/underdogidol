<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/home_page.css">
    <link rel="stylesheet" type="text/css" href="../public/css/slider.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Underdogidols</title>
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
                <?php
                if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
                echo"<a href='./register_page.php'>Register</a>";
                echo"<a href='./login_page.php'>Login</a>";
                }
                else{
                    echo "<a href='#'>Dashborad</a>";
                    echo "<a href='./logout_page.php'>Logout</a>";  
                    echo "<span class='user-name'>";
                    echo $_SESSION['name'];
                    echo"</span>";
                }
                ?>
            </div>
            <div class="burger">
                <div class="line-1"></div>
                <div class="line-2"></div>
                <div class="line-3"></div>
            </div>
        </nav>
    </header>
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="../public/image/picture1.jpg" style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="../public/image/picture2.jpg" style="width:100%">
            <div class="text">Caption Two</div>
        </div>


        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="../public/image/picture3.jpg" style="width:100%">
            <div class="text">Caption nnnnnnnnnnnThree</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <div class="dot-container" >
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
    <!-- <br>  -->
    

    <footer class="footer">
        <div class="footer-container">
            <div class="row">
                <div class="footer-col">
                    <ul>
                        <h4>Navigation</h4>
                        <li><a href="#">Home</a></li>
                        <li><a href="">Currnet Season Contestants</a></li>
                        <li><a href="">Past Season Winner</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>Our Support</h4>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#">find Contestant</a></li>
                        <li><a href="#">Promo Video</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <div class="social-links">
                        <h4>Our Account</h4>
                        <a href="#"> <i class="fab fa-youtube"></i> </a>
                        <a href="#"> <i class="fab fa-facebook"></i> </a>
                        <a href="#"> <i class="fab fa-instagram"></i> </a>
                        <a href="#"> <i class="fab fa-twitter"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        var slideIndex = 1;
        var s_index=0;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
autoshowSlides();

function autoshowSlides() {

  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  s_index++;
  if ( s_index > slides.length) { s_index = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[ s_index-1].style.display = "block";  
  dots[ s_index-1].className += " active";
  setTimeout(autoshowSlides, 5000); // Change image every 2 seconds
}
    </script>
    <script src='../public/js/index.js'></script>
    <script src='../public/js/banner.js'></script>
</body>

</html>