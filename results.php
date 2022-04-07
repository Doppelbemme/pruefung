<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["UID"])){
        header("Location: ../index.php");
        exit;
    }

    $trueAnswerCount = 0;
    $falseAnswerCount = 0;
    $maxQuestions = 27;

    for ($i = 1; $i <= $maxQuestions; $i++){
        $questionCookie = "question".strval($i);
        if(isset($_COOKIE[$questionCookie])){
            if($_COOKIE[$questionCookie] == "true"){
                $trueAnswerCount = $trueAnswerCount + 1;
            }else{
                $falseAnswerCount = $falseAnswerCount + 1;
            }
        }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
    <main class="result-main-box">
        <div class="chart-box">
            <canvas id="quizResults"></canvas>
        </div>
        <div class="question-individual-box">
            <?php
                require("php/mysql.php");
                $maxQuestions = 27;
                for ($i = 1; $i <= $maxQuestions; $i++){
                    $questionCookie = "question".strval($i);
                    if(isset($_COOKIE[$questionCookie])){
                        if($_COOKIE[$questionCookie] == "false"){
                            $statement = $mysql -> prepare("SELECT * FROM question WHERE ID = :QUESTION_ID");
                            $statement->bindParam(":QUESTION_ID", $i);
                            $statement->execute();
                            $row = $statement->fetch();
                            $questionHeader = $row['QUESTION'];
                            $correctAnswerID = $row['ANSWER_CORRECT'];
                            $correctAnswer = $row['ANSWER_'.strval($correctAnswerID)];
                            echo "
                            <div class='result-question-box'>
                            <div class='result-question-header-box result-question-down' id='question-down-$questionCookie'>
                            <h3 class='result-question-header'>$questionHeader</h3>
                            <i class='fa-solid fa-angle-down item-question-down' id='item-question-down-$questionCookie'></i>
                            </div>
                            <div class='result-question-content-box content-hide' id='result-question-content-box-$questionCookie'>
                            <p>Richtige Antwort: $correctAnswer</p>
                            </div>
                            </div>
                            <script>
                            $('#question-down-$questionCookie').click(function (evt) {
                            $('#item-question-down-$questionCookie').toggleClass('question-active');
                            $('#result-question-content-box-$questionCookie').toggleClass('content-hide');
                            evt.preventDefault();
                            });
                            </script>
                            ";
                        }
                    }   
                }
            ?>
        </div>
    </main>

<script src="js/app.js"></script>
<script>
    const ctx = $('#quizResults');
    const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Richtig', 'Falsch'],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo($trueAnswerCount) ?>, <?php echo($falseAnswerCount) ?>],
            backgroundColor: [
                'rgba(169, 227, 75, 0.75)',
                'rgba(240, 62, 62, 0.75)'
            ],
            borderColor: [
                'rgba(169, 227, 75, 1)',
                'rgba(240, 62, 62, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Auswertung',
                font: {
                    size: 24
                }
            },
            legend: {
                display: false
            }
        }
    }
});
</script>
</body>
</html>