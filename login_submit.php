<!-- Handling form input from 'login.php' -->
<?php
require 'common.php'; //connection file
?>
<?php
//data from login form using POST method
$Email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, md5($_POST['password'])); //encrypting password
$select_query = "SELECT id, email ,password FROM users WHERE email='$Email'";
$result = mysqli_query($con, $select_query)or die(mysqli_error($con));
//checking email in 'users' table
if (mysqli_num_rows($result) == 0) {
    echo"<script> alert('Please enter correct email and password.')</script>"; //using javascript alert statement for showng user messages
    echo"<script>location.href='login.php'</script>";
} else {
    //checking password from database
    $row = mysqli_fetch_array($result);
    if (!($password == $row['password'])) {
        echo"<script> alert('Please enter correct email and password.')</script>"; //using javascript alert statement for showng user messages
        echo"<script>location.href='login.php'</script>";
    } else {
        //creating session for successfull login and redirecting to 'home.php'
        $_SESSION['email'] = $Email;
        $_SESSION['user_id'] = $row['id'];
        header('location:home.php');
    }
}
?>
