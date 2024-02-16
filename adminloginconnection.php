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

session_start();
$pass=$_POST['password'];
$mail=$_POST['emailid'];
$restaurant=$_POST['restaurant'];

$_SESSION['email'] = $mail;
$sql="select*from admin_data where(password='$pass' and email='$mail' and restaurant = '$restaurant')";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res) >0 ){
    header('location:admin.php');

 echo('<script> alert("login") </script>'); 
 
}


 else{
   echo('<script> alert("registeration required") </script>'); 
   header('refresh:2,url=adminlogin.html');

}
mysqli_close($con);
?> 