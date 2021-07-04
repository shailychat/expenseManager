<!-- SignUp page -->
<?php
require 'common.php'; //connection file
?>
<?php
// checking for active user session else goto login
if (isset($_SESSION['email'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>Budget SignUp</title>
        <style>
            .button2{
                    background-color: #0a8065;
                    color: white;
                    border: 2px solid #0a8065;
                    border-radius: 8px;
                    padding: 8px;
                    }
        </style>
    </head>
    <body>
        <!-- header starts -->
        <?php
        include 'header.php';
        ?>
        
        <!-- body starts --> 
        <div class="backg"> <!-- background color for page -->
            <div class="container">
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-5 col-sm-offset-3"> <!-- using layouts to divide the page --> 
                          <div class="panel panel-default">

                            <div class="pannel-header"> <!-- header part of form -->
                                <center>
                                    <h2>Sign Up</h2>
                                </center>
                                <hr>
                            </div>
                            <div class="panel-body">  <!-- body part of form -->
                                <form method="POST" action="signup_script.php">
                                    <div class="form-group">
                                        <label for="Name"><b>Name:</b></label>
                                        <input type="text" class="form-control" placeholder="Name" name="Name" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Email:</b></label>
                                        <input type="email" class="form-control" placeholder="Enter Valid Email" name="email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title=" Email entered is invalid."> <!-- html validation for email id -->
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><b>Password:</b></label>
                                        <input type="password" class="form-control" placeholder="Password (Min. 6 characters)" name="password" required="true" title="Password length must be greater than or equal to 6 characters."> 
                                    </div>

                                    <div class="form-group">
                                        <label for="conact"><b>Phone Number:</b></label>
                                        <input type="number" class="form-control" placeholder="Enter Valid Phone Number (Ex-8448444853)" name="contact" required="true" title="Number is invalid.">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="button2 btn-lg btn-block">Sign Up</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!-- footer starts -->
        <?php
        include 'footer.php';
        ?>

    </body>
</html>
