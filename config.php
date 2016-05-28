<?php
$dbUser = "root";
$dbPass = "";
$dbHost = "localhost";
$dbDatabase = "test1";

$dbConn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);

if(!$dbConn) {
    die ("Database not connected");
}
?>