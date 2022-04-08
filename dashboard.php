<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["UID"])){
        header("Location: ../index.php");
        exit;
    }

    include("includes/head.php");
    include("includes/loader.php");
    include("includes/navbar.php");
?>
<main class="main-box">
    <div class="question-box quiz-remove">
        <a href="http://100.115.92.196/prüfung/question.php?questionid=1" class="btn btn--big register-btn quiz-start-btn quiz-remove">
            <i class="fa-solid fa-play item-play"></i>
            Starten
        </a>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>