<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="icon" href="image/feedback.png">
    </head>
    <title>Feedback Sent! | A&T's Medicare.</title>
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
$user =$_POST['name'];
$mail =$_POST['email'];
$phone = $_POST['ph_no'];
$mess = $_POST['message'];
$sql="INSERT INTO `contact`.`contact_us` ( `name`, `email`,`ph_no`,`message`) 
VALUES ('$user', '$mail','$phone', '$mess');";
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
    echo "<h1>Thanks '$user' For Your Feedback!</h1>";
}
else{
    echo "ERROR: $sql <br> $con->error";
}

if($mess==''){
    ?><html><script>alert("Message can't be empty..")</script></html>
    <?php
}

$con->close();
?>
    
    <form method="post">
    <a href="home.html" class="btn"> Home <span class="fas fa-chevron-right"></span> </a><br>
    <a href="cont_us-after.html" class="btn">  Submit another feedback  <span class="fas fa-chevron-left"></span> </a>
    </form>
    <style>
        *{
            justify-content: center;
            align-items: center;
            user-select: none;
        }
    </style>
</html>