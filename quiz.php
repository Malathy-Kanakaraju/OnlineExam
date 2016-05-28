<?php
session_start();
require 'config.php';

//first time entry to quiz page
if(isset($_SESSION['subjChosen'])) {  // restrict users from directly jumping to this page without login
    $subject = htmlspecialchars($_SESSION['subjChosen']);
    unset($_SESSION['subjChosen']);
} else if (isset($_POST['fnName']) && $_POST['fnName'] === 'insertAns') {
    insertAns();
    exit();
} else {
    error_log("Suspicious user",1,"its.mathy@gmail.com"); /////////****************************** not working
    header("Location: startQuiz.php");
}

function insertAns(){
    $user_id = $_SESSION['user_id'];
    $functionName = $_POST['fnName'];
    $quizID = $_POST['quiz_id'];
    $question_id = $_POST['question_id'];
    $user_answer = $_POST['user_answer'];
    $corrAns = $_POST['correct_answer'];
    
    $sql = "INSERT INTO a1_user_answers (user_id, quiz_id, question_id, user_answer, correct_answer) VALUES(" .(int) $user_id ."," .$quizID."," .$question_id .",'".$user_answer . "','" .$corrAns ."')";
    $result = mysqli_query($GLOBALS['dbConn'], $sql);

    if(!$result) {
        echo("Database error while recording user answers. Report to test@gmail.com");
    } else {
        echo("User answer is recorded successfully");
    }
}

            
?>



<html lang="en">
    <head>
        <title>Quiz Instructions</title>
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
        
        <!-- Timer script -->
        <script type="text/javascript">
            var count = 60*5; // number of seconds for timer
            var redirect = "results.php";

            function countDown(){
                var timer = document.getElementById("timer");
                if(count > 0){
                    count--;
                    var hour = Math.floor(count/(60*60));
                    var min = Math.floor((count/60)-(hour*60));
                    var sec = Math.floor(count - (hour*60*60) - (min*60));
                    if (min < 10) min = '0' + min;
                    if (sec < 10) sec = '0' +sec;
                    timer.innerHTML = min+" : "+sec; 
                    setTimeout("countDown()", 1000);
                }else{
                    qID = quizID;
                    delete quizID;
                    window.location.href = redirect+"?quizID="+qID;
                }
            }
        </script>
    
        <div class="wrapper">
        
        <?php require("header.php");?>
            
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 alert alert-info">
            <h2 class="text-center">PHP Quiz</h2>
            <form role="form" class="form-horizontal" id="quizForm" method="post">
                <div class="form-group">
                    <label for="question" class="control-label col-sm-1" id="sNo"></label>
                    <div class="col-sm-11"><p class="form-control-static" id="question"></p></div>
                </div>
                
                <label class="radio">
                    <div class="col-sm-2 text-right"><input type="radio" required="required" name="optans" id="opt1" /></div>
                    <div class="col-sm-10" id="option1"></div>
                </label>
                <label class="radio">
                    <div class="col-sm-2 text-right"><input type="radio" name="optans" id="opt2" /></div>
                    <div class="col-sm-10" id="option2"></div>
                </label>
                <label class="radio">
                    <div class="col-sm-2 text-right"><input type="radio" name="optans" id="opt3" /></div>
                    <div class="col-sm-10" id="option3"></div>
                </label>
                <label class="radio">
                    <div class="col-sm-2 text-right"><input type="radio" name="optans" id="opt4" /></div>
                    <div class="col-sm-10" id="option4"></div>
                </label>
                <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                    <button type="submit" role="button" class="btn btn-info btn-lg btn-block" name="nextBtn"> Next </a>
                </div>
                <div class="text-error" id="errorMsg"></div>
            </form>

        </div>
        <div class="clearfix"></div>
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <h4 class="pull-left">Total 5 Questions </h4>
            <h4 class="pull-right">
                Time left - <span id="timer">
                    <script type="text/javascript">
                        countDown();
                    </script>
                </span>
            </h4>
        </div>
        <div class="push"></div>
        </div>

<?php
require 'footer.php';
?>
        
        <script type="text/javascript">

        $(document).ready(function(){
            quizID = Date.now();
            var sub = "<?php echo $subject;?>";
            var qNo = 1;
            $.ajax({   // ajax call to fetch the questions, write into a JSON file, fetch the first question from JSON file and display in HTML
                url: "fetchQuestion.php",
                type: "POST",
                data: { sub : sub},
                success: function(){
                    showNextQue(qNo);
                }, error: function(jqXHR, textStatus, errorThrown) {
                      console.log(jqXHR, textStatus, errorThrown);
                        alert("error in fetchQuestion.php - ajax call");
                    }
            });
        });
        
        
    function showNextQue(qNo){
        $.getJSON("quizSet.json", function(nextQue){
            JSONdata = nextQue;
            console.log('inside');
            console.log(qNo);
            console.log(JSONdata);
            $('#sNo').html(qNo);
            var index = qNo - 1;
            var quiz = nextQue.questionSet[index];
            $('#question').html(quiz['question']);
            
            //Set the labels for radio buttons
            $('#option1').html(quiz['opt1']);
            $('#option2').html(quiz['opt2']);
            $('#option3').html(quiz['opt3']);
            $('#option4').html(quiz['opt4']);
            
            //Set the values of radio buttons
            $('#opt1').val(quiz['opt1']);
            $('#opt2').val(quiz['opt2']);
            $('#opt3').val(quiz['opt3']);
            $('#opt4').val(quiz['opt4']);
            
        });
    };
    
        $('#quizForm').on('submit', function(){
            event.preventDefault();
            
            //get the value of selected radio button
            var selectedOption = $("input:radio[name='optans']:checked").val() ; 
            console.log('sel :'+selectedOption);
            var qNo = document.getElementById('sNo').innerHTML;
            var queID = JSONdata.questionSet[qNo]['questionID'];
            var corrAns = JSONdata.questionSet[qNo]['correctAns'];
            
            $.post(
                    '<?php echo basename($_SERVER['PHP_SELF']);?>',
                    { fnName: "insertAns", quiz_id: quizID, question_id: queID, user_answer: selectedOption, correct_answer: corrAns},
                    function(data) {
                        console.log(data);
                    }
                )
            $("input:radio[name='optans']").prop({checked:false});
            qNo++;
            if (qNo < 6) {   /// **********************need to change it to 15 questions before submit
                showNextQue(qNo);
            } else {
                qID = quizID;
                delete quizID;
                window.location.href = "results.php?quizID="+qID;
            } 
        });
        </script>

    </body>
</html>
