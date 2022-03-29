<?php
    ob_start();
    require("php/mysql.php");
    $questionID = $_GET['questionid'];
    
    $statement = $mysql->prepare("SELECT * FROM question WHERE ID = :QUESTION_ID");
    $statement->bindParam(":QUESTION_ID", $questionID);
    $statement->execute();
    $row = $statement->fetch();

    $questionHeader = $row['QUESTION'];
    $answerOne = $row['ANSWER_1'];
    $answerTwo = $row['ANSWER_2'];
    $answerThree = $row['ANSWER_3'];
    $correctAnswer = $row['ANSWER_CORRECT']
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
        <a href="http://100.115.92.196/prüfung/dashboard.php" class="navbar-header">Prüfungsvorbereitung</a>
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
    <main class="main-box">
    <div class="question-box quiz-active quiz-remove">
            <div class="question-box-header">  
                <h3><?php echo $questionHeader ?></h3>
            </div> 
            <div class="question-box-content">
                <form class="question-answer" method="post" action="php/submitQuestion.php">
                    <div class="question-answer-box">
                        <input class="question-answer-input" type="checkbox" name="answer" id="answer-1" value="1">
                        <label class="question-answer-label" for="answer-1"><?php echo $answerOne ?></label>
                    </div>
                    <div class="question-answer-box">
                        <input class="question-answer-input" type="checkbox" name="answer" id="answer-2" value="2">
                        <label class="question-answer-label" for="answer-2"><?php echo $answerTwo ?></label>
                    </div>
                    <div class="question-answer-box">
                        <input class="question-answer-input" type="checkbox" name="answer" id="answer-3" value="3">
                        <label class="question-answer-label" for="answer-3"><?php echo $answerThree ?></label>
                    </div>
                        <input type="hidden" name="question_id" value="<?php echo $questionID ?>">
                        <input type="hidden" name="correct_answer" value="<?php echo $correctAnswer ?>">
                    <input class="btn btn--big register-btn question-answer-submit btn-inactive" type="submit" value="Weiter" id="answer-submit" disabled>
                </form> 
            </div>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>