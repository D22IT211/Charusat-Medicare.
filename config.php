<?php

define('Server','localhost');
define('User_id','root');
define('Password', '');
define('Db_Name','login');

$con = mysqli_connect(Server, User_id, Password,Db_Name);

if($con){
    echo "Connected Successfully to the Database";
}

else{
    die('Failed to Connect!');
}