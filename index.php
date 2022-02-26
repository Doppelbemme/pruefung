<?php
if (isset($_GET['logback'])) {
    $loginFeedback = $_GET['logback'];
} else {
    $loginFeedback = "empty";
}

if (isset($_GET['regback'])) {
    $registerFeedback = $_GET['regback'];
} else {
    $registerFeedback = "empty";
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
    <title>Prüfungsvorbereitung</title>
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
<div class="hero">
    <div class="hero-title">
        <h1 class="title-one">Prüfungsvorbereitung</h1>
        <h1>Kaufmann für Groß- und Außenhandel</h1>
    </div>
    <form class="hero-login-form" method="post" action="php/login.php">
        <?php
        echo '<input type="email" name="login-email" placeholder="E-Mail-Adresse" class="hero-login-email form-input' . ($loginFeedback == "error" ? ' form-input-error">' : '">');
        echo '<input type="password" name="login-password" placeholder="Passwort" class="hero-login-email form-input' . ($loginFeedback == "error" ? ' form-input-error">' : '">');
        ?>
        <input type="submit" value="Anmelden" class="btn btn--big login-btn">
        <a href="#" class="hero-link-password">Passwort vergessen?</a>
        <div class="hero-divider"></div>
        <a href="#" class="btn btn--big register-btn" id="open-register-popup">Konto erstellen</a>
    </form>
</div>
<div class="registration-popup-box">
    <div class="registration-popup">
        <div class="registration-popup-header">
            <i class="fa-solid fa-xmark fa-xl btn-popup-close" id="close-register-popup"></i>
            <h1 class="header-one">Registrieren</h1>
            <p class="paragraph-one">Es geht schnell und einfach.</p>
        </div>
        <form class="registration-form" method="post" action="php/register.php">
            <div class="registration-name">
                <?php
                echo '<input type="text" name="register-surname" placeholder="Vorname" id="register-surname" class="form-input form-input-register' . ($registerFeedback == "surname" ? ' form-input-error">' : '">');
                echo '<input type="text" name="register-lastname" placeholder="Nachname" id="register-lastname" class="form-input form-input-register' . ($registerFeedback == "lastname" ? ' form-input-error">' : '">');
                ?>
            </div>
            <?php
            echo '<input type="email" name="register-email" placeholder="E-Mail-Adresse" id="register-email" class="form-input form-input-register' . ($registerFeedback == "mail" ? ' form-input-error">' : '">');
            echo '<input type="password" name="register-password" placeholder="Passwort" id="register-password" class="form-input form-input-register' . ($registerFeedback == "password" ? ' form-input-error">' : '">');
            ?>
            <input type="submit" class="btn register-submit-btn" value="Registrieren">
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>