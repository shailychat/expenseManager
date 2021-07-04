<!-- handling form data of 'signup.php' -->
<?php
require 'common.php'; //connection file
?>
<?php
//data from login form using POST method
$name = mysqli_real_escape_string($con, $_POST['Name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, ($_POST['password']));
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$select_query = "SELECT email FROM users WHERE email='$email';";
$result = mysqli_query($con, $select_query)or die(mysqli_error($con));
//checking if email exists or not
if (mysqli_num_rows($result) > 0) {
    //using javascript alert statement for showng user messages
    echo"<script> alert('Email id already exists.')</script>";
    echo"<script>location.href='signup.php'</script>";
} else {
    //Applying password validation
    //checking for minimum password length
    if (strlen($password) >= 6) {
        $password = md5($password); // encrypting password
        if (strlen($contact) == 10) { //checking for valid contact number
            //query to insert data into 'users' table
            $insert_query = "INSERT INTO budget.users(Name, email, password, contact) values('$name', '$email', '$password', '$contact');";
            $insert_query_submit = mysqli_query($con, $insert_query) or die(mysqli_error($con));
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = mysqli_insert_id($con);
            echo"<script> alert('User successfully registered')</script>"; //using javascript alert statement for showng user messages
            echo"<script>location.href='home.php'</script>";
        } else {
            echo"<script> alert('Invalid Contact.')</script>"; //using javascript alert statement for showng user messages
            echo"<script>location.href='signup.php'</script>";
        }
    } else {
        echo"<script> alert('Password length must be greater than or equal to 6 characters.')</script>"; //using javascript alert statement for showng user messages
        echo"<script>location.href='signup.php'</script>";
    }
}
?>

