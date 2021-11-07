<?php
session_start();
include_once '../config/connectDB.php';

?>

<?php

$user_name = mysqli_real_escape_string($connect , $_POST['user_name']);
$stage_name =mysqli_real_escape_string($connect , $_POST['user_stage_name']);
$age= mysqli_real_escape_string($connect , $_POST['age']);
$address= mysqli_real_escape_string($connect , $_POST['address']);
$email = $_SESSION['email'];
if($user_name == "" || $user_name == null || $stage_name =="" || $stage_name ==null || $age=="" ||  $age==null || $address=="" || $address==null){
   header("location: ./profile_page.php");
    exit;
}
$query = "SELECT * FROM personal_detail WHERE email_id= '$email';";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);
if($num){
   $sql = "UPDATE personal_detail SET name='$user_name', stage_name='$stage_name',age='$age',address='$address' WHERE email_id= '$email';";
   
}else{
$sql = "INSERT INTO personal_detail
    VALUES('$user_name','$stage_name','$age','$address','$email');";
}
    if(mysqli_query($connect,$sql)){
       header("Location: ./profile_page.php");
        exit;
    }
    else{
        header("Location:./profile_page.php");
        exit;
    }
