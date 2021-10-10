<?php 
session_start();
if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
    session_destroy();
    header("location: ./home_page.php");
    exit;
    }else{
        header("location: ./login_page.php");  
    }
?>