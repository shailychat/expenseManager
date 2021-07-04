<!-- Index page -->
<?php
require 'common.php'; //connection file 
?>
<?php
//checking active user session else goto login
if (isset($_SESSION['email'])) {
    header('location:home.php');
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" type="text/css">
        <style>
            .button2{
                    background-color: #0a8065;
                    color: white;
                    border: 2px solid #0a8065;
                    }
                    a:hover
                    {text-decoration: none;
                    color:white;      
                    }
        </style>
        <title>Control Budget</title>
    </head>
    <body>
        <!-- header part starts -->
        <?php
        include 'header.php'; //contains the navbar
        ?>

        <!-- body part starts -->
        <div class="hight1"> <!-- minimum height 610px --> 
            <div id="banner_image"> <!-- background image --> 
                <div class= "container">
                    <centre>
                        <div id="banner_content"> <!-- content of the body and transparent black box -->  
                            <h1>We help you control your budget
                            </h1>
                            <br>
                            <?php { ?>
                                <a  href="login.php" class="button2 btn-lg active">Start Today</a>
                            <?php }
                            ?>
                        </div>
                    </centre>
                </div>
            </div>
        </div>
        
        <!-- footer part starts --> 
        <?php
        include 'footer.php';
        ?>


    </body>
</html>
