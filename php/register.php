<?php
ob_start();
require('mysql.php');

$surname = $_POST["register-surname"];
$lastname = $_POST["register-lastname"];
$mail = $_POST["register-email"];
$password = $_POST["register-password"];
$saltedPassword = $mail . $password;
$answersRight = 0;
$answersWrong = 0;

//TODO: Hash password
$password_hashed = password_hash($saltedPassword, PASSWORD_BCRYPT);

//TODO: Check if mail already exists in database
$statement = $mysql->prepare("SELECT * FROM user WHERE EMAIL = :MAIL");
$statement->bindParam(":MAIL", $mail);
$statement->execute();
$mailCount = $statement->rowCount();

if($mailCount != 0){
    header("Location: ../index.php?regback=mail&surname=".$surname."&lastname=".$lastname."&mail=".$mail);
    exit();
}

$statement = $mysql->prepare("INSERT INTO user (SURNAME,LASTNAME,EMAIL,PASSWORD,ANSWERS_RIGHT,ANSWERS_WRONG) VALUES (:SURNAME,:LASTNAME,:MAIL,:PASSWORD,:ANSWERS_RIGHT,:ANSWERS_WRONG)");
$statement->bindParam(":SURNAME", $surname);
$statement->bindParam(":LASTNAME", $lastname);
$statement->bindParam(":MAIL", $mail);
$statement->bindParam(":PASSWORD", $password_hashed);
$statement->bindParam(":ANSWERS_RIGHT", $answersRight);
$statement->bindParam(":ANSWERS_WRONG", $answersWrong);
$statement->execute();

header("Location: ../index.php?regback=success");
exit();
?>