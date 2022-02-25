<?php
ob_start();
require('mysql.php');

$currentTime = time();
$expirationTime = $currentTime + (60*10);
$mail = $_GET['mail'];

//TODO: Check if there is a currently valid key
$statement = $mysql->prepare("SELECT * FROM password WHERE MAIL = :MAIL");
$statement->bindParam(":MAIL", $mail);
$statement->execute();
$keyCount = $statement->rowCount();
$row = $statement->fetch();

if($keyCount != 0){
    if($row['expiration_date'] > $currentTime){
        //Key still active!
        die("You just recieved a mail! Please wait a moment.");
        exit();
    }
}

//TODO: Generate RESET Key
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$resetKey = substr(str_shuffle($permitted_chars), 0, 32);
$finalResetKey = $resetKey;

//TODO: Put Key into database
$statement = $mysql->prepare("INSERT INTO password (?,?,?,?) VALUES = (:MAIL, :RESETKEY, :REQUEST_DATE, :EXPIRATION_DATE)");
$statement->bindParam(":MAIL", $mail);
$statement->bindParam(":RESETKEY", $finalResetKey);
$statement->bindParam(":RESETKEY", $currentTime);
$statement->bindParam(":EXPIRATION_DATE", $expirationTime);
$statement->execute();

//TODO: Sent mail with password reset link
$mailTarget = $mail;
$mailSubject = "Passwort zurücksetzen";
$mailFrom = "felix@scheschowitsch.de"
$mailText = "Hey, 
<br> 
klicke auf den Link unten, um dein Kennwort zurückzusetzen.
<br> <br>
Dieser Link ist nach absender der Mail 10 Minuten gültig.
<br>
LINK EINFÜGEN
<br>
<br>
Vielen Dank!";

$mail

?>