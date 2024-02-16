
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
echo("connection successfull");
echo"<br>";
$uname=$_POST['name'];
$mail=$_POST['email'];
$restaurant=$_POST['restaurant'];
$sql="select*from admin_data where(username='$uname' and email='$mail' and restaurant = '$restaurant')";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res) > 0){
   $row=mysqli_fetch_assoc($res);
   if($mail==isset($row['email']) && $uname==isset($row['username']) && $restaurant==isset($row['restaurant'])){
      echo'<script>alert("admin already exist")</script>';
   }  
   }
   else{

$ph=$_POST['tel'];
$address=$_POST['address'];

 $password=$_POST['password'];
 //$restaurant=$_POST['restaurant'];
 $register = array($uname,$ph,$address,$mail,$password,$restaurant); 
 $query="insert into admin_data(username,phone,address,email,password,restaurant) values('$register[0]','$register[1]','$register[2]','$register[3]','$register[4]','$register[5]')";
if(mysqli_query($con,$query)){
  //echo("register successfully");
  header('location:adminlogin.html');
 }
else{
 echo("fail");}
}
mysqli_close($con);
?>

