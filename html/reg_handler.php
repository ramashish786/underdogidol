<?php
include_once '../config/connectDB.php';
?>

<?php
$first_name = mysqli_real_escape_string($connect , $_POST['first_name']);
$last_name =mysqli_real_escape_string($connect , $_POST['last_name']);
$email = mysqli_real_escape_string($connect , $_POST['email']);
$password_1= mysqli_real_escape_string($connect , $_POST['password_1']);
$password_2= mysqli_real_escape_string($connect , $_POST['password_2']);


    $sql = "INSERT INTO user 
    VALUES('$first_name','$last_name','$email','$password_1');";
    if(mysqli_query($connect,$sql)){
        header("Location:profile_page.html");
        
    }
    else{
        header("Location:register_page.html");
    
    }
    
    
?>