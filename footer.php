<div class="clearfix"></div>
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 text-center"><h4>Online Examination </h4></div>
            <div class="col-sm-4 text-center">
                <h4>Registered Users </h4>
                <?php 
                $sql = "SELECT count(*) as tot_users FROM a1_users";
                $result = mysqli_query($dbConn, $sql) or die ('Database error.  Report to test@gmail.com.<br /> Error: ' . mysqli_error($dbConn));

                $row = mysqli_fetch_assoc($result);
                echo '<h2>'.$row['tot_users'].'</h2>';
                ?>
            </div>
            <div class="col-sm-4 text-center">
                <h4>Exams Taken</h4>
                <?php 
                $sql = "SELECT count(*) as tot_quiz FROM a1_user_answers";
                $result = mysqli_query($dbConn, $sql) or die ('Database error.  Report to test@gmail.com.<br /> Error: ' . mysqli_error($dbConn));

                $row = mysqli_fetch_assoc($result);
                echo '<h2>'.$row['tot_quiz'].'</h2>';
                ?>
            </div>
        </div>
    </div>
</div>