<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }  
        .profile-name {
            color:red;
            text-transform: uppercase;
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        .profile-address {
            font-size: 24px;
            font-weight: lighter;
            margin: 10px 0;
        }
        .profile-ph {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        .profile-email {
            color: #777;
            margin: 5px 0;
        }

       
    </style>
</head>
<body>
    <div class="profile-card">

<?php
$server="localhost";
$user="root";
$password="";
$databse="db";
$con=mysqli_connect($server,$user,$password,$databse);

if(!$con)
{
    die("fail".mysqli_connect_error($con));
}

else{
   session_start();
   if(isset($_SESSION['email'])){
     $validUser = mysqli_real_escape_string($con,$_SESSION['email']);
     $sql="select username,phone,address,email from userdata where email= '$validUser' ";
     $res=mysqli_query($con,$sql);
     
        $register=mysqli_fetch_assoc($res);
        echo  '<b>username:</b> <div class="profile-name">' . $register['username'] . '</div>';
        echo '<b>Email:</b><div class="profile-email">' . $register['email'] . '</div>';
        echo '<b>Phone:</b><div class="profile-ph">' . $register['phone'] . '</div>';
        echo '<b>Address:</B><div class="profile-address">' . $register['address'] . '</div>';
    }
    else{
        header('location:SIGNIN2.html');
    }
    
}
mysqli_close($con)
?>
</body>
</html>