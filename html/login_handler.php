
<?php
 session_start();

 if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
 header("location: ./home_page.html");
 exit;
 }

 $login = false;
 $showError = "";
 if($_SERVER["REQUEST_METHOD"] == "POST"){

include_once '../config/connectDB.php';

$email = mysqli_real_escape_string($connect , $_POST['email']);
$password= mysqli_real_escape_string($connect , $_POST['password']) ;

$sql = "SELECT * FROM user WHERE email_id='$email';"; 

$result = mysqli_query($connect, $sql);

if($result){
  $num = mysqli_num_rows($result);
 
}
else{
  $num = 0;
}

if ($num == 1){
  $row = mysqli_fetch_assoc($result);
  if($password===$row['password']){
      $login = true;
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = $row['first_name']." ".$row['last_name'];
      $_SESSION['email'] = $row['email_id'];
      header("Location: ./home_page.php");
  }
else{
  $_SESSION['showError'] = "Invalid password";
  header("location: ./login_page.php");
}

} 
else{
  $_SESSION['showError'] = "User does not exist";
  header("location: ./login_page.php");
}
}

?>