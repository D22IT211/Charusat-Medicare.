<?php

session_start();

$name = $_POST['user'];
$password = $_POST['pass'];

$con = new mysqli("localhost","root","","registration");

if($con->connect_error)
{
    die("Failed connection : ".$con->connect_error);
}
else{
    $stmt = $con->prepare("select * from students where user = ?");
    $stmt->bind_param("s",$name);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['pass'] === $password){
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" href="style1.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                <link rel="icon" href="image/logged-in.png">
            <title> Signed in | Charusat Medicare.</title>
            <?php
                echo "<h2>Login Successfully.</h2>";
                ?>
            
        </head>
            <body>
            
            <center><form>
            <center><a href="home.html" class="btn1">  Home  <span class="fas fa-chevron-right"></span> </a>
            <a href="login.html" class="btn1"> <span class="fas fa-user"></span>  Use Another Account </a></center>
            </form></center>
            </body>
            <style>
        body{
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
            </html>
        <?php
        }   

        else{
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" href="style1.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                <link rel="icon" href="image/invalid-user.png">
            <title> Login Failed | A&T's Medicare.</title>
            <?php
            echo "<center><h2>Invalid Username or Password!</h2></center>";
            ?>
            
        </head>
            <center><form action="login.html">
            <center><a href="login.html" class="btn1">  Back  <span class="fas fa-chevron-left"></span> </a></center>
            </form></center>
            <style>
        form{
            justify-content: center;
            align-items: center;
        }
    </style>
            </html>
       <?php 
         }
        }

        else{
            echo "<center><h2>Invalid Username or Password</h2></center>";
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <link rel="icon" href="image/invalid-user.png">
                <link rel="stylesheet" href="style1.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <title> Login-failed </title>
        </head>
            <form action="login.html">
            <center><a href="login.html" class="btn1">  Back  <span class="fas fa-chevron-left"></span> </a></center>
            </form>
            <style>
                *{
                    justify-content: center;
                    align-items: center;
                    user-select: none;
                }
        form{
            justify-content: center;
            align-items: center;
        }
    </style>
            </html>
    <script>
    window.history.forward();
HttpContext.Current.Response.AddHeader("Cache-Control", "no-cache, no-store, must-revalidate");
HttpContext.Current.Response.AddHeader("Pragma", "no-cache");
HttpContext.Current.Response.AddHeader("Expires", "0");
</script>
            </html>
            <?php
        }
    }   
?>


