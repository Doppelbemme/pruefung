<?php
ob_start();
require('mysql.php');

$mail = $_POST["login-email"];
$password = $_POST["login-password"];
$saltedPassword = $mail . $password;

//Check if mail exists in database
$statement = $mysql -> prepare("SELECT * FROM user WHERE EMAIL = :MAIL");
$statement->bindParam(":MAIL", $mail);
$statement->execute();
$mailCount = $statement->rowCount();

if($mailCount != 1){
    header("Location: ../index.php?logback=error");
    exit();
}

//Check if password matches password hash in database
$row = $statement->fetch();
if(!password_verify($saltedPassword, $row['PASSWORD'])){
    header("Location: ../index.php?logback=error");
    exit();
}

//Start session with UID
session_start();
$uid = $row['UID'];
$_SESSION["UID"] = $uid;
header("Location: ../dashboard.php");
exit();
?>  