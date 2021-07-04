<!-- Change Password page -->
<?php
require 'common.php'; //connection file
?>
<?php
//chechking for active user session else goto login
if (!isset($_SESSION['email'])) {
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
        <title>Budget Change Password</title>
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
            <div class="content">

                <br>
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
                            <div class="panel panel-default">
                                <div class="panel-header"> <!-- header of form -->
                                    <center>
                                        <h3>Change Password</h3>
                                        <hr>
                                    </center>
                                </div>
                                <div class="panel-body"> <!-- body of form -->


                                    <form method="POST" action="change_password_script.php ">
                                        <div class="form-group">
                                            <label for="oldpassword"><b>Old Password</b></label>
                                            <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="newpassword"><b>New Password</b></label>
                                            <input type="password" class="form-control" placeholder="New Password (Min. 6 characters)" pattern="[6,)" name="newpassword" required="true"> <!-- adding html password validation -->
                                        </div>

                                        <div class="form-group">
                                            <label for="retypenewpassword"><b>Confirm New Password</b></label>
                                            <input type="password" class="form-control" placeholder="Re-type-New Password" pattern="[6,)" name="retypenewpassword" required="true">
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" name="submit" class="button2 btn-block">Change</button>
                                        </div>
                                    </form>
                                </div>
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