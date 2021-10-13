<?php
include_once '../config/connectDB.php';
?>

<?php
$first_name = mysqli_real_escape_string($connect , $_POST['first_name']);
$last_name =mysqli_real_escape_string($connect , $_POST['last_name']);
$email = mysqli_real_escape_string($connect , $_POST['email']);
$password_1= mysqli_real_escape_string($connect , $_POST['password_1']);
$password_2= mysqli_real_escape_string($connect , $_POST['password_2']);

if($first_name == "" || $first_name == null || $last_name=="" || $last_name==null || $email=="" || $email==null || $password_1=="" || $password_1==null || $password_2=="" || $password_2==null){
    header("location: ./register_page.php");
    exit;
}

$query = "SELECT * FROM user WHERE email_id= '$email';";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result) ;
if($num > 0){
    // $errorMsg = 'Email already exist';
    header("location: ./register_page.php");
    exit;
}else{
    $sql = "INSERT INTO user 
    VALUES('$first_name','$last_name','$email','$password_1');";
    if(mysqli_query($connect,$sql)){
        header("Location: ./login_page.php");
        exit;
    }
    else{
        header("Location:./register_page.php");
    exit;
    }
}

// echo " $first_name , $last_name,$email,$password_1";
   
?>