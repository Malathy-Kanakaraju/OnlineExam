<?php
session_start();
require 'config.php';

if (isset($_GET['quizID'])) {
    $quizID = htmlspecialchars(stripslashes(trim($_GET['quizID'])));
    
    $sql1 = "SELECT COUNT(question_id) as score FROM a1_user_answers WHERE quiz_id = " .$quizID . " AND user_answer = correct_answer";
    $result1 = mysqli_query($dbConn, $sql1);
    
    $row1 = mysqli_fetch_assoc($result1);
    $percentage = floor($row1['score']/15);

    $sql2 = "SELECT MAX(inserted_timestamp) as endTime FROM a1_user_answers WHERE quiz_id = " .$quizID ;
    $result2 = mysqli_query($dbConn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    
    date_default_timezone_set("Asia/Kolkata");
    $qid = date("Y-m-d H:i:s",($quizID/1000));
    
    $start = new DateTime($qid);
    $end = new DateTime($row2['endTime']);
/*    $start = date_create("'".$qid."'");
    $end = date_create($row2['endTime']);*/
    $timeSpent = date_diff($start,$end);
    $min = $timeSpent -> format('%i');
    $sec = $timeSpent -> format('%s');
    $duration = $min." mins ".$sec." secs";
    
} else {
    header("Location: startQuiz.php");
}
?>

<!DOCTYPE>
<html lang="en">
    <head>
        <title>Quiz Results</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Bootstrap start here -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap ends here -->
        <link href="css/custom.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="wrapper">
        
        <?php require("header.php");?>
            
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 text-center alert alert-info">
            <h3>Result:</h3>
            <h4><?php echo $row1['score']; ?> of 15</h4><br />
            <h4><?php echo $percentage."%" ;?></h4><br /><br />
            <h3>Time Spent</h3>
            <h4><?php echo $duration ?></h4><br /><br />
            
            <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
                <a href="startQuiz.php" class="btn btn-warning btn-lg btn-block" role="button"> Try Again </a>
            </div>
        </div>
        <div class="push"></div>
        </div>

<?php
require 'footer.php';
?>
        
    </body>
</html>
