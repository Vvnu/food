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

$pfp = "";

echo"<br>";
$uname=$_POST['name'];
$mail=$_POST['email'];
$sql="select*from userdata where email='$mail'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res) > 0){
   $row=mysqli_fetch_assoc($res);
   if($mail==isset($row['email'])){
      echo'<script>alert("email already exist")</script>';
      header("refresh:0.5,url=newuser.html");
   }  
   }
   else{
     
        $file_name=$_FILES['file']['name'];
        $file_size=$_FILES['file']['size'];
        $file_tmp=$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];  

        $pfp = "image/".$file_name;
   if(move_uploaded_file($file_tmp,"image/".$file_name)){
      echo'<script>alert("file is uploaded")</script>';
   }    
   else{
      echo'<script>alert("file is not uploaded")</script>';
   }
$ph=$_POST['tel'];
$address=$_POST['address'];

 $password=$_POST['password'];
 $register = array($uname,$ph,$address,$mail,$password); 
 $query="insert into userdata(username,phone,address,email,password,pfp) values('$register[0]','$register[1]','$register[2]','$register[3]','$register[4]','$pfp')";
if(mysqli_query($con,$query)){
  
  header('location:SIGNIN2.html');
 }
else{
 echo("fail");}
}
mysqli_close($con);
?>