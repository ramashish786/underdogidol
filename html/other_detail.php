<?php
session_start();
include_once '../config/connectDB.php';

?>

<?php

$user_fav_singer = mysqli_real_escape_string($connect , $_POST['user_fav_singer']);
$user_fav_band =mysqli_real_escape_string($connect , $_POST['user_fav_band']);
$user_fav_color= mysqli_real_escape_string($connect , $_POST['user_fav_color']);
$user_fav_actor= mysqli_real_escape_string($connect , $_POST['user_fav_actor']);
$user_fav_actress= mysqli_real_escape_string($connect , $_POST['user_fav_actress']);
$user_fav_food= mysqli_real_escape_string($connect , $_POST['user_fav_food']);
$email = $_SESSION['email'];
if($user_fav_singer == "" || $user_fav_singer == null || $user_fav_band  =="" ||  $user_fav_band  ==null || $user_fav_color=="" ||  $user_fav_color==null || $user_fav_actor=="" 
 ||$user_fav_actor==null|| $user_fav_actress == "" ||$user_fav_actress == null || $user_fav_food == "" ||$user_fav_food== null){
//    header("location: ./profile_page.php");
    // exit;
    echo "wrong1";
}
echo $user_fav_actor;
$query = "SELECT * FROM other_detail WHERE email_id= '$email';";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);
if($num){
   $sql = "UPDATE other_detail
    SET 
    favourite_singer='$user_fav_singer' ,
    favourite_band='$user_fav_band',
    favourite_color='$user_fav_color',
    favourite_food='$user_fav_food',
    favourite_actress='$user_fav_actress',
    favourite_actor='$user_fav_actor'
    WHERE email_id= '$email';";
   
}else{
$sql = "INSERT INTO other_detail
    VALUES('$email',
    '$user_fav_singer',
    '$user_fav_band',
    '$user_fav_color',
    '$user_fav_food',
    '$user_fav_actress',
    '$user_fav_actor'
    );";
}
    if(mysqli_query($connect,$sql)){
       header("Location: ./profile_page.php");
       exit;
        
    }
    else{
        header("Location:./profile_page.php");
        exit;
      
    }
