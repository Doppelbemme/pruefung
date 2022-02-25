<?php
ob_start();
require('mysql.php');

$mail = $_GET['mail'];
$password = $_GET['password'];
$currentTime = time();

//Check if mail exists in database
$statement = $mysql -> prepare("SELECT * FROM users WHERE email = :MAIL")
$statement -> bindParam(":MAIL", $mail);
$statement->execute();
$mailCount = $statement->rowCount();

if($mailCount != 1){
    header("index.html?logback=mail");
    exit();
}

//Check if password matches password hash in database
$row = $statement->fetch();
if(!password_verify($password, $row['PASSWORD'])){
    header("index.html?logback=password");
    exit();
}

//put log_date in database
$statement = $mysql -> prepare("UPDATE log_date SET log_date = :CURRENTTIME");
$statement->bindParam(":CURRENTTIME", $currentTime);
$statement->execute();

//Start session with UID
session_start();
$uid = $row['UID'];
$_SESSION["UID"] = $uid;
header("index.html?logback=success");
exit();
?>  