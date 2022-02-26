<?php
$host = "localhost";
$name = "prüfung";
$user = "root";
$password = "";

try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $password);
} catch (PDOException $exc){
    echo "SQL Error: ".$exc->getMessage();
}

$statement = $mysql->prepare("CREATE TABLE IF NOT EXISTS user(
                            UID INT(8) AUTO_INCREMENT PRIMARY KEY,
                            SURNAME VARCHAR(255),
                            LASTNAME VARCHAR(255),
                            EMAIL VARCHAR(255),
                            PASSWORD VARCHAR(255),
                            REG_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
$statement->execute();

/*
$statement = $mysql->prepare("CREATE TABLE IF NOT EXISTS password(
                            EMAIL VARCHAR(255),
                            RESETKEY VARCHAR(255),
                            request_date TIMESTAMP DEFAULT,
                            expiration_date TIMESTAMP)");
$statement->execute();
*/
?>