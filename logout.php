<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="icon" href="image/logout.png">
        <title> Signed out | Charusat Medicare.</title>
    </head>
<?php

session_start();
unset($_SESSION['user']);

echo "<center><h1>logout Successfully.</h1></center>";
?>


    <form>
        <center><a href="login.html" class="btn">  Login  <span class="fas fa-chevron-right"></span> </a><br></center>
        <center><a href="index.html" class="btn">  Home  <span class="fas fa-home"></span> </a></center>
    </form>

    <script>
        window.history.forward();
        HttpContext.Current.Response.AddHeader("Cache-Control", "no-cache, no-store, must-revalidate");
        HttpContext.Current.Response.AddHeader("Pragma", "no-cache");
        HttpContext.Current.Response.AddHeader("Expires", "0");
    </script>

    <style>
        *{
            justify-content: center;
            user-select: none;
            text-align: center;
        }
    </style>
</html>
