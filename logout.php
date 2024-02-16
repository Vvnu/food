<?php
session_start();
if(!isset($_SESSION['email'])){
    
    header("location: newuser.html");
    exit;
}
else{
    session_unset();
    session_destroy();
    header("location:index.html");
    exit;
}