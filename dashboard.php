<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["UID"])){
        header("Location: ../index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
        <a href="#" class="navbar-header">Prüfungsvorbereitung</a>
        <ol class="navbar-controlls-box">
            <li class="navbar-controlls-item">
                <i class="fa-solid fa-user item-user"></i>
            </li>
            <li class="navbar-controlls-item">
                <i class="fa-solid fa-gear item-controlls"></i>
            </li>
            <li class="navbar-controlls-item">
                <a href="php/logout.php">
                    <i class="fa-solid fa-arrow-right-from-bracket item-logout"></i>
                </a>   
            </li>
        </ol>
    </nav>
    <main class="question-box">
        <h2>Hello World</h2>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>