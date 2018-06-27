<?php
//session_start();
//$_SESSION['deviceId'] = 1;
//header('Location: index.php');
//exit();
include "../../api/v1/config/connection.php";
include "../../api/v1/config/functions.php";

session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $deviceID = $con->query("SELECT deviceID FROM `users` WHERE email = '$email' AND password = '$password';");
        if (mysqli_num_rows($deviceID) == 1) {
            $row = $deviceID->fetch_assoc();
            $_SESSION['deviceId'] = $row['deviceID'];
            header('Location: index.php');
        }
    }
}

