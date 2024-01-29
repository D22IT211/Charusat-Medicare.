<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="icon" href="image/booked.png">
    </head>
<?php

$server="localhost";
$username="root";
$password="";

$con=mysqli_connect($server, $username, $password);
if(!$con)
{
    die("Connection to the database FAILED due to " .mysqli_connect_error());
}
//echo "Success connecting to the database...";
$user = $_POST['name'];
$phone = $_POST['ph_no'];
$mail = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$sql="INSERT INTO `appointment`.`appointment_table`( `name`, `ph_no`,`email`,`date`,`time`) 
VALUES ('$user', '$phone', '$mail', '$date','$time');";
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
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


if($con->query($sql) == true)
{
    echo "<center><h1>Dear '$user', Your Appointment Has Been Booked!</h1></center>";
    ?>
    
    <form action="home.html" method="POST">
    <center><a href="home.html" class="btn"> Home <span class="fas fa-chevron-right"></span> </a></center><br>
    <center><a href="home.html #book" class="btn">  Book another Appointment  <span class="fas fa-chevron-left"></span> </a></center>
    </form>
    
</html>
<?php
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
?>

