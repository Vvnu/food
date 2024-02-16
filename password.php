<?php
$server="localhost";
$user="root";
$pass="";
$database="db";
$con=mysqli_connect($server,$user,$pass,$database);
if(!$con){
    die("connection fail".mysqli_connect_error(!con));
}
else{
    echo("connection successfull");
}
$passs=$_POST['password'];
$email=$_POST['email'];
$sql="update userdata set password='$passs' where email='$email'";
$res=mysqli_query($con,$sql);
if($res){
    echo("password updated");
}
else{
    echo("fail");
}
mysqli_close($con);
?>