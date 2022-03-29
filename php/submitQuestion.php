<?php
    ob_start();

    $questionID = $_POST['question_id'];
    $user_answer = $_POST['answer'];
    $correct_answer = $_POST['correct_answer'];

    if(isset($_COOKIE["question_" + $questionID])){
        setcookie("question_" + $questionID, "expired", time() - 3600);
    }

    if($user_answer == $correct_answer){
        setcookie("question_" + $questionID, "true", strtotime("2038-01-19 03:14:07"));
    }else{
        setcookie("question_" + $questionID, "false", strtotime("2038-01-19 03:14:07"));
    }

    $newQuestionID = $questionID + 1;
    if($newQuestionID == 50){
        header("Location: ../question.php?questionid=finish");
        exit;
    }

    header("Location: ../question.php?questionid=2");
    exit;
?>