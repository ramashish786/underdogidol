<?php
$dbServername = "localhost:3307";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "user_data";


$connect =  mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

if($connect-> connect_error){
    die("Connection failed:"+ $connect-> connect_error);
}
else{
    // echo " connected.";
}
?>
