<?php 
$server="localhost";
$user="root";
$password="";
$database="db";
$con=mysqli_connect($server,$user,$password,$database);
if(!$con)
{
   die("connection fail".mysqli_connect_error($con));
}

// echo"<br>";
session_start();
$pass=$_POST['password'];
$mail=$_POST['emailid'];
$_SESSION['email'] = $mail;
$sql="select*from userdata where(password='$pass' and email='$mail')";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res) >0 ){
header('location:index.html ');
//  echo('<script> alert("login") </script>'); 
 
}


 else{
  echo('<script> alert("regstertion required")</script>'); 
  header('refresh:2,url=SIGNIN2.html');
}
mysqli_close($con);
?> 