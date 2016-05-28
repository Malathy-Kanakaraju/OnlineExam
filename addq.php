<?php 
session_start();
$newSub = "";
require_once 'validator.php';
require_once "config.php";

//Execute for add a subject modal window
if(isset($_POST['newSub'])){
    $validObj = new validator();
    $newSub = $validObj ->sanitize($_POST["newSub"]);
    $newSub = strtoupper($newSub);
    $userid = $_SESSION['user_id'];

    $sql = "INSERT INTO a1_subjects (subject,user_id) VALUES('" .$newSub ."',".(int) $userid.")";
    $result = mysqli_query($dbConn, $sql);
    
    if($result) {
        echo 'New Subject ' . $newSub.' added successfully';
    } else if (mysqli_errno($dbConn)){
        echo $newSub. ' subject is already added';
    } else {
        echo 'Error while adding new subject.  Report to test@gmail.com';
    }
    exit();
}

//Execute for add a question
if(isset($_POST["addQBtn"])) {
    
    $subject = $subID = $question = $option1 = $option2 = $option3 = $option4 = $corrOpt = $corrAns = " "; //Initialize all variables
    $qbErrorMsg = " ";
    $error = 0;
    
    $validObj = new validator();
    if (isset($_POST['subject'])){
        
        if(isset($_POST['subject'])) {
            $subject = $validObj ->sanitize($_POST['subject']);
            if ($subject === 'null') {
                $qbErrorMsg = 'Choose a subject<br />';
                $error = 1;
            }
        }
        
        if(isset($_POST['question'])) {
            $question = $validObj ->sanitize($_POST['question']);
        }
        
        if(isset($_POST['optradio1'])) {
            $corrOpt = $validObj ->sanitize($_POST['optradio1']);
        } else {
            $qbErrorMsg .= "Enable the radio button for correct answer<br />";
            $error = 1;
        }
        
        if(isset($_POST['option1'])) {
            $option1 = $validObj ->sanitize($_POST['option1']);
        }
        if(isset($_POST['option2'])) {
            $option2 = $validObj ->sanitize($_POST['option2']);
        }
        if(isset($_POST['option3'])) {
            $option3 = $validObj ->sanitize($_POST['option3']);
        }
        if(isset($_POST['option4'])) {
            $option4 = $validObj ->sanitize($_POST['option4']);
        }
        
        if($error == 0) {
            for($i=1;$i<5;$i++) {
                if ($corrOpt === 'optrd'.$i) {
                    switch ($i) {
                        case 1 :
                            $corrAns = $option1;
                            break;
                        case 2 :
                            $corrAns = $option2;
                            break;
                        case 3 :
                            $corrAns = $option3;
                            break;
                        case 4 :
                            $corrAns = $option4;
                            break;
                    }
                    break;
                }
            }
            $userid = $_SESSION['user_id'];
            
            $sql = "SELECT * FROM a1_subjects WHERE subject='".$subject."'";
            $result = mysqli_query($dbConn, $sql);
            
            $row = mysqli_fetch_assoc($result);
            $subID = $row['subject_id'];
            unset($result,$sql);
            
            $sql = "INSERT into a1_question_bank (subject_id,question,opt1,opt2,opt3,opt4,correct_answer,user_id) VALUES(".(int)$subID.",'".$question."','".$option1."','".$option2."','".$option3."','".$option4."','".$corrAns."',".$userid.")";
            $result = mysqli_query($dbConn, $sql);
            
            if($result) {
                $qbErrorMsg = "New Question added to question bank successfully!";
                unset($question, $option1, $option2, $option3, $option4);
            } else {
                $qbErrorMsg = "Database Error.  Report to test@gmail.com<br />Error: " .mysqli_errno($dbConn);
            }
        }
    }
    
}
?>
<html lang="en">
    <head>
        <title>Add a Question</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="css/custom.css" rel="stylesheet" />

    </head>
    <body>
        <div class="wrapper">
        
        <?php require("header.php");?>
            
        <div class="col-xs-offset-2 col-xs-8 col-xs-offset-2 alert alert-info">
            <h3 class="text-center">Add a Question</h3>
            <div class="text-error"><h4><?php echo isset($qbErrorMsg)? '<br />' .$qbErrorMsg.'<br /><br />': " "; ?></h4></div>
            <form class="queBankForm" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
                    <select required="required" name="subject" id="subjList">
                        <option value="null">Choose a Subject</option>>
                        <?php 
                        $sql = "SELECT subject FROM a1_subjects ORDER BY subject_id";
                        $result = mysqli_query($dbConn, $sql) or die ('Database error.  Report to test@gmail.com.<br />Error: ' .mysqli_errno($dbConn));
                        
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' .$row['subject'] .'">'.$row['subject'] .'</option>';
                        }
                        ?>
                        
                    </select>
                    <a href="#subModal" data-toggle="modal" rel="tooltip" title="Add a new subject" data-placement="right">Subject not found?</a>
                    <br /><br />   
                    <textarea rows="5" cols="100" class="form-control" maxlength="1000" name="question" placeholder="Enter your Question" required="required" autofocus="autofocus" ><?php if(isset($question)) { echo $question;} ?></textarea><br /><br />
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="optradio1" value="optrd1" />
                        </span>
                        <input type="text" name="option1" class="form-control" required="required" value="<?php if(isset($option1)) { echo $option1;} ?>" placeholder="Enter option1; Enable the radio button for true answer" />
                    </div><br />
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="optradio1" value="optrd2" />
                        </span>
                        <input type="text" name="option2" class="form-control" required="required" value="<?php if(isset($option2)) { echo $option2;} ?>" placeholder="Enter option2; Enable the radio button for true answer"/>
                    </div><br />
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="optradio1" value="optrd3"/>
                        </span>
                        <input type="text" name="option3" class="form-control" required="required" value="<?php if(isset($option3)) { echo $option3;} ?>" placeholder="Enter option3; Enable the radio button for true answer"/>
                    </div><br />
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="optradio1" value="optrd4"/>
                        </span>
                        <input type="text" name="option4" class="form-control" required="required" value="<?php if(isset($option4)) { echo $option4;} ?>" placeholder="Enter option4; Enable the radio button for true answer"/>
                    </div><br />
                    <div class=" col-xs-12 col-sm-offset-4 col-sm-4 col-sm-offset-4">
                        <button name="addQBtn" type="submit" class="btn btn-info btn-lg btn-block"> Save </button>
                    </div><br />
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
        
        <div class="modal fade" id="subModal" role="dialog" aria-labelledby="subjectModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="model-title">Add a Subject</div>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="newSubForm">
                            <div class="input-group">
                                <input id="newSub" type="text" class="form-control" name="newSub" placeholder="Enter a new subject" required="required"/>
                                <span class="input-group-btn"><button type="submit" class="btn btn-primary" name="newSubBtn" id="newSubBtn">&nbsp Add &nbsp;</button></span>
                            </div><br />
                            <div id="modalMsg" class="text-error"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="push"></div>
        </div>
        
<?php
require 'footer.php';
?>
        
        
        <script>
        

        
        $(document).ready(function(){
            $('[rel=tooltip]').tooltip({delay:10});
            //AJAX request using jQuery to check and insert new subject into database - starts
            $('#newSubForm').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url: '<?php echo basename($_SERVER["PHP_SELF"]);?>',
                    type: 'POST',
                    data: $('form#newSubForm').serialize(), 
                    success: function(msg) {
                        $('#modalMsg').html(msg);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                          console.log(textStatus, errorThrown);
                        alert(" error ");
                    }
                });
            });

            //to reset the error message and close the tooltip upon reopen of modal
            $('#subModal').on('show.bs.modal',function() {
                $('[rel=tooltip]').tooltip('hide');
                $('#modalMsg').html("");
            });
            
            //AJAX request using jQuery to check and insert new subject into database - ends
    });
        </script>
    
    </body>
</html>
