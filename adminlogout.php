<?php
session_start();
if(!isset($_SESSION['email'])){
    
    header("location: adminsignup.html");
    exit;
}
else{
    session_unset();
    session_destroy();
    header("location:adminlogin.html");
    exit;
}