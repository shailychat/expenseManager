<!-- Create New Plan Page -->
<?php
require 'common.php'; //connection file
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
        <title>Budget New Plan</title>
        
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
                    <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
                        <div class="panel panel-success">

                            <div class="panel-heading"> <!-- header part of form -->
                                <center>
                                    <h3>Create New Plan</h3>
                                </center>
                                
                            </div>
                            <div class="panel-body"> <!-- body part of form -->
                                
                                <form method="POST" action="plandetails.php">
                                    <div class="form-group">
                                        <p>Initial Budget:</p>
                                        <input type="number" class="form-control" placeholder="Initial Budget (Ex-4000)" name="initial_budget" min="50" title="Value must be greater than or equal to 50" required="true">
                                    </div>
                                    <div class="form-group">
                                        <p>How many people you want to add in your group?</p>
                                        <input type="number" class="form-control" placeholder="No. of people" name="people" min="1" title="Value must be greater than or equal to 1" required="true">
                                    </div>

                                    <div class="form-group">
                                        <!-- button hover styling is given to make the button green when hover -->
                                        <button type="submit" name="Next" value="submit" class="button1 btn-block ">Next</button> <!-- button1 styling style for green text color and white background color -->
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
