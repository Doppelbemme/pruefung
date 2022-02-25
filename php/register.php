<?php
ob_start();
require('mysql.php');

$surname = $_POST["register-surname"];
$lastname = $_POST["register-lastname"];
$mail = $_POST["register-email"];
$password = $_POST["register-password"];
$saltedPassword = $surname . $password;

echo($surname);
echo($lastname);
echo($mail);
echo($password);
echo($saltedPassword);

//TODO: Hash password
$password_hashed = password_hash($saltedPassword, PASSWORD_BCRYPT);

//TODO: Check if mail already exists in database
$statement = $mysql -> prepare("SELECT * FROM user WHERE EMAIL = :MAIL")
$statement -> bindParam(":MAIL", $mail);
$statement->execute();
$mailCount = $statement->rowCount();

if($mailCount != 0){
    header("index.html?regback=mail");
    exit();
}

$statement = $mysql -> prepare("INSERT INTO user (?,?,?,?) VALUES (':SURNAME',':LASTNAME',':MAIL',':PASSWORD')");
$statement->bindParam(":SURNAME", $surname);
$statement->bindParam(":LASTNAME", $lastname);
$statement->bindParam(":MAIL", $mail);
$statement->bindParam(":PASSWORD", $password_hashed);
$statement->execute();

header("index.html?regback=confirmation");
exit();
?>