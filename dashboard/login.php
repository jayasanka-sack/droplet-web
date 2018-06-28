<?php
session_start();
//$_SESSION['deviceId'] = 1;
//header('Location: index.php');
//exit();
include "../../api/v1/config/connection.php";
include "../../api/v1/config/functions.php";

$error = ''; // Variable To Store Error Message
if (isset($_GET['submit'])) {
    if (empty($_GET['email']) || empty($_GET['password'])) {
        $error = "Username or Password is invalid";
    } else {
        $email=$_GET['email'];
        $password=$_GET['password'];

        $deviceID = $con->query("SELECT deviceID FROM `users` WHERE email = '$email' AND password = '$password';");
        if (mysqli_num_rows($deviceID) == 1) {
            $row = $deviceID->fetch_assoc();
            session_start(); // Starting Session
            $_SESSION['deviceId'] = $row['deviceID'];
            header('Location: index.php');
        }
    }
}

