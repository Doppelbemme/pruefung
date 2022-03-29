<?php
require_once("mysql.php");
ob_start();
session_start();
if(!isset($_SESSION["UID"])) {
    header("Location: ../index.php");
    exit();
}

$UID = $_SESSION["UID"];
$statement = $mysql -> prepare("SELECT * FROM user WHERE UID = :UID");
$statement->bindParam(":UID", $UID);
$statement->execute();
$row = $statement->fetch();

$surname = $row['SURNAME'];
$lastname = $row['LASTNAME'];
$email = $row['EMAIL'];
$regdate = $row['REG_DATE'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/467cba3d21.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="loader-box">
    <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
    <nav class="navbar-box">
        <a href="../dashboard.php" class="navbar-header">Prüfungsvorbereitung</a>
        <ol class="navbar-controlls-box">
            <li class="navbar-controlls-item">
                <a href="http://100.115.92.196/prüfung/php/account.php">
                    <i class="fa-solid fa-user item-user"></i>
                </a>    
            </li>
            <li class="navbar-controlls-item">
                <a href="#">    
                    <i class="fa-solid fa-gear item-controlls"></i>
                </a>
            </li>
            <li class="navbar-controlls-item">
                <a href="http://100.115.92.196/prüfung/php/logout.php">
                    <i class="fa-solid fa-arrow-right-from-bracket item-logout"></i>
                </a>   
            </li>
        </ol>
    </nav>
    <main class="question-box">
        <h2>Hello <?php echo $surname?></h2>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/app.js"></script>
</body>
</html>