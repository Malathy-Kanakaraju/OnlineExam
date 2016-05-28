<?php
session_start();
require 'config.php';

$userid = $_SESSION['user_id'];

$sql = "SELECT a.quiz_id as qid, b.subject as sub, (SELECT COUNT(*) FROM a1_user_answers x WHERE x.quiz_id = a.quiz_id AND a.correct_answer = a.user_answer) as score FROM a1_user_answers a, a1_subjects b, a1_question_bank c "
        . "WHERE a.user_id = ".(int)$userid. " AND a.question_id = c.question_id AND b.subject_id = c.subject_id "
        . "GROUP BY a.quiz_id" ;
$result = mysqli_query($dbConn, $sql);

$output = array();

date_default_timezone_set("Asia/Kolkata");

while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    array_push($output, array('quizID' => date("Y-m-d H:i:s",($row['qid']/1000)),
                              'subject' => $row['sub'],
                              'score' => $row['score']));
}

//$opEN = json_encode(array($output));
//$opEN = json_encode(array("output" => $output));

//if first time load, set page=1, else get the page value based on pagination
$page = (isset($_GET['page']))? $_GET['page'] : 1;

$recPerPage = 5;
$totalPages = ceil(count($output)/$recPerPage);

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
            
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 text-center alert alert-info table-responsive">
            <p class="text-center"><H2>Quiz result history</H2></p>
            <table class="table table-bordered table-hover" id="results">
                <thead>
                <tr>
                    <th class="text-center">Quiz Date and Time</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Score<br /><small>Out of 5</small></th>
                    <th class="text-center">Percentage</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        
<?php if ($totalPages > 1) { ?>
                <ul class="pagination pull-right">
                    <li><a href="resultHistory.php?page=1">First</a></li>
                    <?php 
                        for ($i = 1;$i<=$totalPages;$i++) {
                            if($i == $page) {
                                echo "<li class=active><a href='resultHistory.php?page=$i'>$i</a></li>";
                            } else {
                                echo "<li><a href='resultHistory.php?page=$i'>$i</a></li>";
                            }
                        }
                    echo "<li><a href='resultHistory.php?page=$totalPages'>Last</a></li>";
                    ?>
                </ul>
<?php }?>
            
        <div class="clearfix"></div><br />
            <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4">
                <a href="startQuiz.php" class="btn btn-warning btn-lg btn-block" role="button"> Try Again </a>
            </div>
        </div> <div class="push"></div>
        </div>
        
<?php
require 'footer.php';
?>
        <script type="text/javascript">
            var jsonObj = JSON.parse('<?php echo json_encode(array("output" => $output)); ?>');
            var quiz = jsonObj.output;
            $("#results tbody").empty();
            var totalRec = <?php echo count($output);?>;
            var startRec = <?php echo ($page - 1);?> * <?php echo $recPerPage;?>;
            var endRec = <?php echo $recPerPage;?> + startRec;
            for(var i=startRec;(i<endRec) && (i<totalRec);i++){
                var newRow = "<tr><td class='text-center'>"+quiz[i].quizID+"</td><td class='text-center'>"+quiz[i].subject+"</td><td class='text-center'>"+quiz[i].score+"</td><td class='text-center'>"+Math.ceil((quiz[i].score)*100/5)+"%</td></tr>";
                $("#results tbody").append(newRow);
            }
        </script>
    </body>
</html>
