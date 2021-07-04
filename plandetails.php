<!-- Plan Details page -->
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

        <title>Budget Plan Details</title>
    </head>
    <body>
        <!-- header starts -->
        <?php
        include 'header.php';
        ?>
        <?php
        //receieving data from 'new_plan.php'
        $intb = $_POST['initial_budget'];
        $no_of_people = $_POST['people'];
        $p = 0;
        ?>
        
        <!-- body starts -->
        <div class="backg"> <!-- background color for page -->
            <div class="container">
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-4"> 
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form method="POST" action="plandetail_submit.php?budget=<?php echo $intb ?>&people=<?php echo $no_of_people ?>">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <h5><b>Title</b></h5>
                                            <input type="text" class="form-control" placeholder="Enter Title (Ex:- Trip to Goa)" name="title_trip" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6"> <!-- equal size box of from and to -->
                                            <h5><b>From</b></h5>
                                            
                                            <input  type="date" class="sample_class form-control" name="_from" placeholder="mm/dd/yyyy"  min="<?php echo date("Y-m-d") ?>" required="true">
                                        </div>
                                        <div class="col-xs-6">
                                            <h5><b>To</b></h5>
                                            <input  type="date" class="sample_class form-control" name="_to" placeholder="mm/dd/yyyy" min="<?php echo date("Y-m-d") ?>"  required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6 col-md-8"> <!-- For making the box larger than the no. of people -->
                                            <!-- Adding the data from new_plan.php -->
                                            <h5><b>Initial Budget</b></h5>
                                            <input type="number" class="form-control"  name="ibudget" value="<?php echo$intb; ?>" required="true" disabled="">
                                        </div>

                                        <div class="col-xs-6 col-md-4">
                                            <h5><b>No. of people</b></h5>
                                            <!-- Adding the data from new_plan.php -->
                                            <input type="number" class="form-control" name="no_of_people" value="<?php echo$no_of_people; ?>" required="true" disabled="">
                                        </div>
                                    </div>
                                    <!-- php loop codes for adding the the boxes of name of person depending on the number of person entered in the form of 'new_plan.php' page -->
                                    <?php
                                    $p = 0;
                                    while ($no_of_people) {
                                        $p++;
                                        ?>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <h5><b>Person <?php echo$p; ?> </b></h5>
                                                <input type="text" class="form-control" placeholder="Person <?php echo$p; ?> name" name="person<?php echo$p; ?>" required="true">
                                            </div>
                                        </div>
                                        <?php
                                        $no_of_people--;
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label for="submit"></label>
                                            <!-- button hover styling is given to make the button green when hover -->
                                            <button type="submit" name="submit" value="submit" class="button1 btn-block ">Submit</button> <!-- button1 styling style for green text color and white background color -->
                                        </div>
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
