<!-- Header part -->
<nav class="navbar navbar-inverse navbar-fixed-top"> <!-- using bootstrap properties --> 
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <!-- Toggle button -->
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">Ct&#8377l Budget</a> <!-- &#8377 For Indian Currency sign --> 
        </div>
        <div class="collapse navbar-collapse" id="myNavbar"> <!-- collapsing properties -->
            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    //using if-else for header bar as they both are differnt for login and logout
                    if (isset($_SESSION['email'])) {
                        ?>
                        <li><a href="about_us.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                        <li><a href = "change_password.php"><span class="glyphicon glyphicon-user"></span> Change Password</a></li>
                        <li><a href = "logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                        <?php
                    } else {
                        ?>
                        <li><a href="about_us.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php
}
?>
                </ul>
            </ul>
        </div>
    </div>
</nav>