<?php
$host = "localhost";
$name = "exams";
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
                            ANSWERS_RIGHT INT(3),
                            ANSWERS_WRONG INT (3),
                            REG_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
$statement->execute();

$statement = $mysql->prepare("CREATE TABLE IF NOT EXISTS question(
                            ID INT(9) AUTO_INCREMENT PRIMARY KEY,
                            QUESTION VARCHAR(255),
                            ANSWER_1 VARCHAR(255),
                            ANSWER_2 VARCHAR(255),
                            ANSWER_3 VARCHAR(255),
                            ANSWER_CORRECT INT(1))");
$statement->execute();  
?>