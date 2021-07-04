<!-- View Plan page -->
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
        <title>Budget View Plan</title>
        <style>
            a:hover{
                    text-decoration: none;
                    color:#0a8065;      
                    }
        </style>

    </head>
    <body>
        <!-- body starts -->
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
                    <div class="col-xs-12 col-md-6">
                        <?php
                        $user_id = $_SESSION['user_id'];
                        $ids = mysqli_real_escape_string($con, $_GET['id']);
                        $idpass = mysqli_real_escape_string($con, $_GET['idp']);
                        $select_query = "SELECT * FROM plan WHERE plan.id='$ids'";
                        $select_query_result = mysqli_query($con, $select_query)or die(mysqli_error($con));
                        $nam = "";
                        $row = mysqli_fetch_array($select_query_result);
                        $name1 = $row['name_of_person'];
                        //query to load data from 'users'
                        $select_query1 = "SELECT * FROM expense WHERE expense.users_id='$user_id'AND expense.plan_id='$idpass'";
                        $select_query_result1 = mysqli_query($con, $select_query1)or die(mysqli_error($con));
                        $total_row = mysqli_num_rows($select_query_result);
                        //creating an empty array to load expense data
                        $expense = array();
                        $remaining_amount = 0; //calculating remaining amount
                        if ($total_row) {
                            //loading data from database into array
                            while ($datarow = mysqli_fetch_array($select_query_result1)) {
                                $remaining_amount += $datarow['amount_spent'];
                                array_push($expense, $datarow);
                            }
                        }
                        ?>
                        <div class="panel panel-success">

                            <div class="panel-heading"> <!-- header part of plan -->
                                <center>
                                    <!-- getting the title from database -->
                                    <?php
                                    $nam = $row['title_trip'];
                                    echo $nam;
                                    ?>
                                    <div class="right">
                                        <span class="glyphicon glyphicon-user"></span><?php echo" " . $row['no_of_people']; ?> <!-- getting the no. of people from database -->
                                    </div>
                                </center>
                            </div>
                            <div class="panel-body"> <!-- body part of plan -->
                                <br>
                                <!-- getting the budget from database -->
                                <b> Budget  </b>
                                <div class="right">
                                    &#8377  <?php echo $row['ibudget']; ?>
                                </div>
                                <br>
                                <br>
                                <!-- getting the remaining amount by applying if and else statement -->
                                <b> Remaining Amount  </b>
                                <div class="right">
                                    <?php
                                    $remaining_amount1 = $row['ibudget'] - $remaining_amount;
                                    if ($remaining_amount1 > 0) {
                                        ?>
                                        <b class="gre">  &#8377 <?php echo $remaining_amount1; ?></b> <!-- green in case it is greater than 0 -->
                                        <?php
                                    } else if ($remaining_amount1 < 0) {
                                        ?>
                                        <b class="rd"> Overspent by &#8377 <?php echo $remaining_amount1; ?></b> <!-- red in case it is smaller than 0 -->
                                        <?php
                                    } else {
                                        ?>
                                        <b class="blk"> &#8377 <?php echo $remaining_amount1; ?></b> <!-- black in case of 0 -->
                                        <?php
                                    }
                                    ?>
                                </div>
                                <br>
                                <br>
                                <!-- getting the date from database -->
                                <b>Date</b>
                                <div class="right">
                                    <!-- adding date  -->
                                    <?php echo date('dS M', strtotime($row['_from'])) . " - " . date('dS M Y', strtotime($row['_to'])); ?>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <center>
                            <!-- redirecting to expense distribution page -->
                            <form method="POST" action="expense_distribution.php?idp=<?php echo $idpass ?>">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="button1 btn-lg">Expense Distribution</button>
                                </div>
                            </form>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </center>
                    </div>
                    <br>
                    <div class="col-xs-12 col-md-8">
                        <?php
                        if ($total_row) {
                            //loading expense data into page if you have made any expense
                            for ($item = 0; $item < count($expense); $item++) {
                                ?>
                                <div class='col-xs-12 col-md-4'>
                                    <div class="panel panel-success">

                                        <div class="panel-heading"> <!-- header part of expense done -->
                                            <center>
                                                <?php
                                                $nam = $expense[$item]['title_expense'];
                                                echo $nam;
                                                ?>
                                            </center>
                                        </div>
                                        <div class="panel-body"> <!-- body part of expense done -->
                                            <br>
                                            <!-- getting amount spent from expense database --> 
                                            <b> Amount </b>
                                            <div class="right">
                                                &#8377  <?php echo $expense[$item]['amount_spent']; ?>
                                            </div>
                                            <br>
                                            <br>
                                            <!-- getting who spent from expense database -->
                                            <b>Paid by </b>
                                            <div class="right">
                                                <?php
                                                echo $expense[$item]['by_whom'];
                                                ?>

                                            </div>
                                            <br>
                                            <br>
                                            <!-- getting date of expense from expense database -->
                                            <b>Paid on</b>
                                            <div class="right">
                                                <!-- formating date -->
                                                <?php echo date('dS M Y', strtotime($expense[$item]['date_of_expense'])); ?>
                                                <br>
                                                <br>
                                            </div>
                                            <div class="col-xs-12">
                                                <center>
                                            <?php
                                            $comp = $expense[$item]['bill'];
                                            //using if and else for getting option of showing bill
                                            if ($comp == "No file choosen") {
                                                ?>                                   <a href=#><?php echo "You Don't have bill"; ?></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a  href="<?php echo $comp ?>"> Show Bill</a>
                                                <?php
                                            }
                                            ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading"> <!-- header part of adding expense form -->
                                <center>
                                    <h3> Add New Expense</h3>
                                </center>
                            </div>
                            <div class="panel-body"> <!-- body part of adding expense form -->

                                <form method="POST" enctype="multipart/form-data" action="add_expense.php?iplan=<?php echo $idpass ?>&id=<?php echo $ids ?>">

                                    <div class="form-group">
                                        <!-- title of what you have spent -->
                                        <label for="title_expense"><b>Title</b></label>
                                        <input type="text" class="form-control" placeholder="Expense Name" name="title_expense" required="true">
                                        
                                        <?php
                                        $select_query = "SELECT * FROM plan WHERE plan.id='$ids'AND plan.user_id='$user_id'";
                                        $select_query_result = mysqli_query($con, $select_query)or die(mysqli_error($con));
                                        $row = mysqli_fetch_array($select_query_result);
                                        $fro = date('Y-m-d', strtotime($row['_from']));
                                        $too = date('Y-m-d', strtotime($row['_to']));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <!-- adding the expense date -->
                                        <label for="date_of_expense"><b>Date</b></label>
                                        <input  type="date" class="form-control"  name="date_of_expense"  min="<?php echo$fro; ?>" max="<?php echo$too; ?>" required="true">
                                    </div>
                                    <div class="form-group">
                                        <!-- adding the amount spent -->
                                        <label for="amount_spent"><b>Amount Spent</b></label>
                                        <input type="number" class="form-control" placeholder="Amount Spent" name="amount_spent" min="0" required="true">

                                    </div>


                                    <div class="form-group">
                                        <!-- creating choose option in form -->
                                        <select class="form-control" name="by_whom" required="true">
                                            <option disabled value="" selected>Choose</option>
                                            <?php
                                            //seperating names using ',' as seperator
                                            $names = strtok($name1, ",");
                                            while ($names) {
                                                ?>
                                                <option value="<?php echo $names ?>">  <?php
                                                    echo $names . "<br>";
                                                    $names = strtok(",");
                                                    ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <!-- creating upload image option -->
                                        <label for="bill"><b>Upload Bill</b></label>
                                        <input type="file" class="form-control" placeholder="choose file" name="uploadedimage">

                                    </div>

                                    <div class="form-group">
                                        <label for="submit"></label>
                                        <!-- button hover styling is given to make the button green when hover -->
                                        <button type="submit" name="submit" class="button1 btn-block "> Add </button> <!-- button1 styling style for green text color and white background color -->
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
