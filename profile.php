<?php
session_start();
require 'config.php';
?>

<!DOCTYPE>
<html lang="en">
    <head>
        <title>My Profile</title>
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
            <h1>Welcome to your profile</h1>
        </div>
        <div class="push"></div>
        </div>

<?php
require 'footer.php';
?>
        
    </body>
</html>
