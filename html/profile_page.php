<?php
session_start();
if(isset($_SESSION['loggedin']) ==NULL|| empty($_SESSION['loggedin'])){
    header("Location: ./home_page.php");
    exit;
}
?>
<?php  include_once '../config/connectDB.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/home_page.css">
    <link rel="stylesheet" type='text/css' href="../public/css/profile_page.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Profile</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../public/image/logo.png" alt="logo_2">
            </div>
            <div class="menu">
                <a href="#">Home</a>
                <a href="#">Contestant</a>
                <a href="#">Videos</a>
                <a href="./about_page.php">About</a>
                <a href="#">Blogs</a>
                <a href="#">Contact</a>
                <a href="#">Help</a>
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
    <div class="profile">
        <div class="profile-img">
            <img src="../public/image/p3.jpg" alt="p2.jpg">
        </div>
        <div class="profile-text">
            <p class='moto'>Jack Johnson</p>
        </div>

    </div>
    <div class="profile-container">
    <div class='personal-detail'>
            <h1>Personal Details</h1>
            <button class='pro-edit-button btn' id='pro_edit_pd'>Edit</button>
        <?php 
        $user_email = $_SESSION['email'];
        $sql = "SELECT name,stage_name,age,address,email_id FROM personal_detail WHERE email_id='$user_email';";
         $result = mysqli_query($connect,$sql);
         if($result){
            $isresult = mysqli_num_rows($result);
            }
         else{
            $isresult = -1;
        }
        if($isresult > 0){
            $personal = mysqli_fetch_assoc($result);
           echo"
            <p class='pro-tag-name' id='user-name'>Name : <span>".$personal['name']."</span></p>
            <p class='pro-tag-name' id='user-stage-name'>Satage Name : <span>".$personal['stage_name'] ."</span></p>
            <p class='pro-tag-name' id='user-age'>Age : <span>".$personal['age']."</span></p>
            <p class='pro-tag-name' id='user-address'>Address : <span>".$personal['address']."</span></p>
            ";
        }else{
            echo"
                <p class='pro-tag-name' id='user-name'>Name : <span>No Data available</span></p>
                <p class='pro-tag-name' id='user-stage-name'>Satage Name : <span>No Data available</span></p>
                <p class='pro-tag-name' id='user-age'>Age : <span>No Data available</span></p>
                <p class='pro-tag-name' id='user-address'>Address : <span>No Data available</span></p>
            ";
        }
        ?>
        </div>
        <div class="pro-contact">
            <h1> Contact</h1>
            <button class='pro-edit-button btn' id='pro_edit_c'>Edit</button>
            <p class="pro-tag-name" id='user-email'>Email: <span><?php echo $user_email;?></span></p>
        </div>
        <div class="pro-other">
        <h1>Other</h1>
        <button class='pro-edit-button btn' id='pro_edit_ot'>Edit</button>
            <?php 
            $user_email = $_SESSION['email'];
            $sql = "SELECT favourite_singer,favourite_band,favourite_color,favourite_food,favourite_actress,favourite_actor FROM other_detail WHERE email_id='$user_email';";
             $result = mysqli_query($connect,$sql);
             if($result){
                $isresult = mysqli_num_rows($result);
                }
             else{
                $isresult = -1;
            }
            if($isresult > 0){
                $other = mysqli_fetch_assoc($result);
            echo"
            <p class='pro-tag-name'>Favorite Singer: <span>".$other['favourite_singer']."</span></p>
            <p class='pro-tag-name'>Favorite Band: <span>".$other['favourite_band']."</span></p>
            <p class='pro-tag-name'>Favorite Color: <span>".$other['favourite_color']."</span></p>
            <p class='pro-tag-name'>Favorite Actor: <span>".$other['favourite_food']."</span></p>
            <p class='pro-tag-name'>Favorite Actress: <span>".$other['favourite_actress']." </span></p>
            <p class='pro-tag-name'>Favorite Food: <span>".$other['favourite_actor']." </span></p>
            ";
        }else{
            echo"
            <p class='pro-tag-name'>Favorite Singer: <span>No Data Available</span></p>
            <p class='pro-tag-name'>Favorite Band: <span>No Data Available</span></p>
            <p class='pro-tag-name'>Favorite Color: <span>No Data Available</span></p>
            <p class='pro-tag-name'>Favorite Actor: <span>No Data Available</span></p>
            <p class='pro-tag-name'>Favorite Actress: <span>No Data Available </span></p>
            <p class='pro-tag-name'>Favorite Food: <span>No Data Available </span></p>
            ";
            }
    ?>
        </div>
    </div>

    <!-- Modal for personal detail start here -->
    <div class="pro-form-container" id='personal_detail'>
        <div class="pro-modal">
            <button id='p_close_modal'>x</button>
            <form action="./personal_detail.php" method = "POST" class="pro-form">
                <div class="pro-form-data">
                    <h1>Personal detail</h1>
                    <div>
                        <label for="">Name</label>
                        <input type="text" name="user_name" value="<?php echo $personal['name'];?>" id="user_name">
                    </div>
                    <div>
                        <label>Stage Name</label>
                        <input type="text" name='user_stage_name' value="<?php echo $personal['stage_name'];?>"  id='user_stage_name'>
                    </div>
                    <div>
                        <label for=""> age</label>
                        <input type="text" name='age' value="<?php echo $personal['age'];?>" id='age'>
                    </div>
                    <div>
                        <label for="">Address</label>
                        <textarea name='address'  id='address'>
                        <?php echo $personal['address'];?>
                        </textarea>
                    </div>

                </div>
                <button type='submit' class="btn" style='width: 20%;'>Save</button>
            </form>
        </div>
    </div>
    <!-- Modal for personal detail end here -->


    <!-- Modal for contact start -->
    <div class="pro-form-container" id='contact_detail'>
        <div class="pro-modal">
            <button id='c_close_modal'>x</button>
            <form action="" method = "POST" class="pro-form">
                <div class="pro-form-data">
                    <div style="display: flex;flex-direction: column; margin-top:15px ;">
                        <h1>Contact</h1>
                        <div style="display: flex;flex-direction: column; margin: 10px 0px;">
                            <label for="">Email</label>
                            <input type="text" name='email'>
                        </div>
                    </div>
                </div>
                <button type='submit' class="btn" style='width: 20%;'>Save</button>
            </form>
        </div>
    </div>
    <!-- Mdoal for conatct end here -->

    <!-- Modal for other start -->
    <div class="pro-form-container" id='other_detail'>
        <div class="pro-modal">
            <button id='ot_close_modal'>x</button>
            <form action="./other_detail.php" method="POST" class="pro-form">
                <h1 style="margin-top:20px">Other</h1>
                <div class="pro-form-data-other">
                    <div>
                        <label for="">Favorite Singer</label>
                        <input type="text" name='user_fav_singer' value="<?php echo $other['favourite_singer'];?>" >
                    </div>
                    <div>
                        <label for="">Favorite Band</label>
                        <input type="text" name='user_fav_band' value="<?php echo $other['favourite_band'];?>">
                    </div>
                    <div>
                        <label for=""> Favorite Color </label>
                        <input type="text" name='user_fav_color' value="<?php echo $other['favourite_color'];?> ">
                    </div>
                    <div>
                        <label for=""> Favorite Actor </label>
                        <input type="text" name='user_fav_actor' value="<?php echo $other['favourite_actor'];?> ">
                    </div>
                    <div>
                        <label for=""> Favorite Actress </label>
                        <input type="text" name='user_fav_actress' value="<?php echo $other['favourite_actress'];?>">
                    </div>
                    <div>
                        <label for="">Favorite Food </label>
                        <input type="text" name='user_fav_food' value="<?php echo $other['favourite_food'];?>">
                    </div>
                </div>

                <button type='submit' class="btn" style='width: 20%;'>Save</button>
            </form>
        </div>
    </div>

    <!-- Modal for other end here -->



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
    <script src='../public/js/index.js'></script>
    <script src='../public/js/profile_page.js'></script>
</body>

</html>