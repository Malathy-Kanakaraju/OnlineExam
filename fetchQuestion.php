<?php 
session_start();
require 'config.php';

if (isset($_POST['sub'])) {
    $sub = $_POST['sub'];
    $limit = 5;
    $sql = "SELECT a.question as question, a.question_id, a.opt1 as opt1, a.opt2 as opt2, a.opt3 as opt3, a.opt4 as opt4, a.correct_answer as correctAns"
            . " FROM a1_question_bank a, a1_subjects b WHERE a.subject_id = b.subject_id and b.subject = '" .$sub . "' ORDER BY rand() LIMIT " .$limit;  
    $result = mysqli_query($dbConn, $sql);

    if (mysqli_num_rows($result) > 0 ) {
        $questionSet = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($questionSet, array('question' => $row['question'],
                                            'questionID' => $row['question_id'],
                                            'opt1' => $row['opt1'],
                                            'opt2' => $row['opt2'],
                                            'opt3' => $row['opt3'],
                                            'opt4' => $row['opt4'],
                                            'correctAns' => $row['correctAns']));
        }

        $queArrayEN = json_encode(array("questionSet" => $questionSet));
//        echo $queArrayEN;
        $quiz = fopen("quizSet.json", "w");  // Create a new JSON file 
        fwrite($quiz, $queArrayEN); //write the fetched records in JSON format into the new file
        fclose($quiz);
        echo 'JSONdone';
        
    } else {
        die ('No questions currently available for this subject.  Report to test@gmail.com');
    }
    
} else {
    echo 'No subject chosen';
}

?>