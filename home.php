<!-- Home page -->
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

        <title>Budget Home</title>
        <style>
            a:hover{
                    text-decoration: none;
                    color:#0a8065;      
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
                    <?php
                    $user_id = $_SESSION['user_id'];
                    //loading data from table 'plan'
                    $select_query = "SELECT * FROM plan WHERE plan.user_id='$user_id'";
                    $select_query_result = mysqli_query($con, $select_query)or die(mysqli_error($con));
                    $nam = "";
                    
                    //writing if and else for diffrentiating no plans and plans made
                    if (mysqli_num_rows($select_query_result) == 0) {
                        ?>
                        <h2>You don't have any active plans</h2>
                
                    <div class="col-xs-4 col-xs-offset-4">
                        
                        <div class="panel panel-default" >
                            
                            <div class="panel-body"> <!-- you can add your new plan -->
                                <br>
                                <br>
                                <br>
                                <br>
                                <center><a href="new_plan.php"><h4><span class="glyphicon glyphicon-plus-sign "></span> Create a New Plan</h4></a></center>
                                <br>
                                <br>
                                <br>
                                <br>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                    <?php
                    } else {
                        ?>
                        
                        
                            <div class="col-xs-12 col-md-12">
                                <h3> Your plans</h3>
                            </div>
                        
                        <br>
                        <br>
                        <br>
                        <br>
                        
                        

                        <?php
                        //using array to load the data from table 'plan'
                        $content = array();
                        while ($row = mysqli_fetch_array($select_query_result)) {
                            array_push($content, $row);
                        }
                        //displaying each plan data
                        for ($items = count($content) - 1; $items >= 0; $items--) {
                            ?>
                        
                        
                        <!-- making form for showing the details field in plan details -->
                            <div class="col-xs-6 col-md-3">
                                <div class="panel panel-success">
                                    <div class="panel-heading "> <!-- title of your plan as heading -->
                                        <center>
                                            
                                            <!-- adding the detail of title from your database -->
                                            <?php
                                            $nam = $content[$items]['title_trip'];
                                            echo $nam;
                                            $ids = $content[$items]['id'];
                                            ?>
                                            <div class="right">
                                                <span class="glyphicon glyphicon-user"></span><?php echo" " . $content[$items]['no_of_people']; ?> <!-- adding the detail of no. of people from your database -->

                                            </div>
                                        </center>
                                    </div>
                                    <div class="panel-body"> <!-- body part of form -->
                                        <br>
                                        <!-- adding the detail of budget from your database -->
                                        <?php
                                        $idpass = $content[$items]['id'];
                                        ?>
                                        <b> Budget  </b>
                                        <div class="right">
                                            &#8377  <?php echo $content[$items]['ibudget']; ?>
                                        </div>
                                        <br>
                                        <br>
                                        <b>Date</b>
                                        <div class="right">
                                            <!-- adding the detail of dates from your database -->
                                            <?php
                                            //using date() function to set date format
                                            echo date('dS M', strtotime($content[$items]['_from'])) . " - " . date('dS M Y', strtotime($content[$items]['_to']));
                                            ?>

                                            <br>
                                            <br>
                                        </div>
                                        <form method="POST" action="view_plan.php?id=<?php echo $ids ?>&idp=<?php echo $idpass ?>">
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="button1 btn-block">View Plan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <br>
                </div>
            </div>
        </div>
        
                    <?php
                    //using if-else for glyphicon plus sign
                    if (mysqli_num_rows($select_query_result) != 0) {
                        ?>
                        <div class="right rightmargin">
            <a href="new_plan.php" > <span class="glyphicon glyphicon-plus-sign" style="font-size: 45px;"></span></a>
                        </div>

                        <?php
                    } 
                    ?>
        
        <!-- footer starts -->
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
