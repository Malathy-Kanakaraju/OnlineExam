<?php
session_start();
require 'config.php';

if (isset($_POST['startQuizBtn'])) {
    require_once 'validator.php';
    $validObj = new validator();
    $subject = $errorMsg = '';
    $error = 0;
    
    if (isset($_POST['subject'])) {
        $subject = $validObj ->sanitize($_POST['subject']);
        if ($subject === 'null') {
            $errorMsg = "Select a subject before starting quiz";
            $error = 1;
        } else {
            $_SESSION['subjChosen'] = $subject;
        }
    }
    
    if ($error === 0) {
        header("Location: quiz.php");
    }
}

?>

<html lang="en">
    <head>
        <title>Quiz Instructions</title>
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
            
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 alert alert-info">
            <h3 class="text-center">Carefully ready through these instructions before taking up the quiz</h3><br />
            <ul class="instructions">
                <li>Total Questions: 5</li>
                <li>Time Alloted: 5 Minutes</li>
                <li>Subject specific objective questions</li>
                <li>There is no negative marking</li>
                <li>Choose a subject and Click on Start Quiz button to start the test</li>
                <li>After the test starts, don’t press back or refresh button and don’t close the browser window</li>
            </ul><br />
            <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
            <div class="col-sm-6 text-center">
                <select id="sub" name="subject" required="required">
                    <option value="null">Choose a Subject</option>
                    <?php 
                        $sql = "SELECT subject FROM a1_subjects ORDER BY subject_id";
                        $result = mysqli_query($dbConn, $sql) or die ('Database error.  Report to test@gmail.com.<br />Error: ' .mysqli_errno($dbConn));
                        
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' .$row['subject'] .'">'.$row['subject'] .'</option>';
                        }
                    ?>
                </select>
                
            </div>
            <div class="col-sm-4 text-center">
                <button type="submit" name="startQuizBtn" role="button" class="btn btn-info btn-lg btn-block">Start Quiz</a>
            </div>
            <div class="clearfix"></div>
            <div class="text-error text-center">
                <?php echo isset($errorMsg)? '<br />'.$errorMsg: ''; ?>
            </div>
            </form>
        </div>
        <div class="push"></div>
        </div>
        
<?php
require 'footer.php';
?>

    </body>
</html>
