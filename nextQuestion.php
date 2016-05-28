<?php
session_start();
require 'config.php';

    unset($userAns, $sNo, $offset);
 
    $nextQue = array();

    require_once 'validator.php';
    $validObj = new validator();
    $sNO = $validObj -> sanitize($_POST['sNo']);

    $offset = $sNO - 1;
    $queArrayDE = json_decode($queArrayEN, TRUE);
    $a = array_splice($queArrayDE['questionSet'], $offset, 1);

    //Values of quiz page
    $nextQue['question'] = $a[0]['question'];
    $nextQue['opt1'] = $a[0]['opt1'];
    $nextQue['opt2'] = $a[0]['opt2'];
    $nextQue['opt3'] = $a[0]['opt3'];
    $nextQue['opt4'] = $a[0]['opt4'];
    $nextQue['correctAns'] = $a[0]['correctAns'];
    echo $nextQue;
    
    $arrayEncoded = json_encode($nextQue);
    echo $arrayEncoded;
    echo 'hi';
    exit();