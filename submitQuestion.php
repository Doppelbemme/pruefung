<?php
    ob_start();

    $questionID = $_POST['question_id'];
    $user_answer = $_POST['answer'];
    $correct_answer = $_POST['correct_answer'];
    $questionCookie = "question" . strval($questionID);
    $maxQuestions = 27;

    if($user_answer == $correct_answer){
        setcookie($questionCookie, "true", 2147483647);
    }else{
        setcookie($questionCookie, "false", 2147483647);
    }

    echo($_COOKIE['question']);

    $newQuestionID = $questionID + 1;

    if($newQuestionID > $maxQuestions){
        header("Location: results.php");
    }else{
        header("Location: question.php?questionid=".strval($newQuestionID));
    }
    exit;
?>