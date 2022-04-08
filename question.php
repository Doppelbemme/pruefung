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

    include("includes/head.php");
    include("includes/loader.php");
    include("includes/navbar.php");
?>

<main class="main-box">
    <div class="question-box quiz-active quiz-remove">
        <div class="question-box-header">  
            <h3><?php echo $questionHeader ?></h3>
        </div> 
        <div class="question-box-content">
            <form class="question-answer" method="post" action="submitQuestion.php">
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