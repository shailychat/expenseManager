<?php
//connection string
$con = mysqli_connect("localhost:3306", "root", "", "budget")or die(mysqli_error($con)); //budget is database here
//checking for existing session else start new session
if (!isset($_SESSION['email'])) {
    session_start();
}
?>
