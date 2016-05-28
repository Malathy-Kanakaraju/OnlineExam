<?php
session_start();
require 'config.php';
?>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/custom.css" />

    </head>
    <body>
        <div class="wrapper">
        
        <?php require("header.php");?>
            
        <div class="col-md-offset-2 col-md-8 col-md-offset-2 alert alert-info">
            <h3 class="text-center">Welcome to the Online Examination Portal</h3><br />
            <ul class="instructions">
                <li>Here you can take up quiz on the subjects</li>
                <ol><li>HTML5</li><LI>CSS</LI><li>PHP</li><li>Javascript</li><li>jQuery</li><li>Bootstrap</li><li>AJAX</li></ol>
                <li>You can add new questions under "Add question" menu</li>
                <li>Result history can be viewed under "Results" menu</li>
                <li>If you wish you change your profile settings, go to "My Profile" menu</li>
            </ul><br />
            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                <a href="startQuiz.php" role="button" class="btn btn-info btn-lg btn-block"><strong>Are you ready to take up the quiz?</strong></a>
            </div>
        </div>
        <div class="push"></div>
        </div>
        
        <?php require ("footer.php"); ?>
        
    </body>
</html>
