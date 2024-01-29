<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="icon" href="image/logged-in.png">
    </head>
    <title>Registration Done | A&T's Medicare.</title>
<?php

$server="localhost";
$username="root";
$password="";

session_start();

$con=mysqli_connect($server, $username, $password);
if(!$con)
{
    die("Connection to the database FAILED due to " .mysqli_connect_error());
}

//echo "Success connecting to the database...";
$user =$_POST['user'];
$email =$_POST['mail'];
$phone = $_POST['ph_no'];
$password= $_POST['pass'];
$blood_group=$_POST['blood_group'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$disease = $_POST['disease'];
$sql="INSERT INTO `registration`.`students` ( `user`, `mail`,`ph_no`,`pass`,`blood_group`, `age`, `gender`, `disease`) 
VALUES ('$user', '$email','$phone','$password', '$blood_group', '$age', '$gender', '$disease');";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


if($con->query($sql) == true)
{
    echo "<center><h1><t>Welcome '$user' to our Medical Website</h1></center>";?>
    
    <form action="login.html">
    <center><h2>Please Login For Confirmation</h2>
    <a href="login.html" class="btn"> Login <span class="fas fa-chevron-right"></span> </a></center>
    </form>
    <style>
        body{
           justify-content: center;
            align-items: center;
        }
    </style>
</html>
<?php
}


/*else{
    echo "ERROR: $sql <br> $con->error";
}*/



$con->close();
?>


