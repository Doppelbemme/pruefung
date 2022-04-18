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

    include("includes/head.php");
    include("includes/loader.php");
    include("includes/navbar.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/app.js"></script>
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
<script>
    const ctx = $('#quizResults');
    const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Richtig', 'Falsch'],
        datasets: [{
            label: '# of Votes',
            data: [<?php echo($trueAnswerCount); ?>, <?php echo($falseAnswerCount); ?>],
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