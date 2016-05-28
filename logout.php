 <?php
session_start();
require 'config.php';

$userid = $_SESSION['user_id'];

$sql = "UPDATE a1_active_users SET expires = ".time()." WHERE user_id = " .(int)$userid;
$result = mysqli_query($dbConn, $sql);

if(!$result) {
    die("Database Error.  Unable to logout.<br />Error: " .mysqli_error($dbConn));
} else {
    session_unset();
    session_destroy();
    header('Location: index.php?logout=true');
}
?>
