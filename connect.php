<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'complete_signup_login_logout';

$con=mysqli_connect($hostName,$userName,$password,$dbName);

if(!$con){
    die(mysqli_connect_error($con));
}
?>