<?php
ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$errors = array();
session_start();
if (isset($_SESSION['phone'])) {



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Dashboard</title>
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
        <link href="../assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="../add_dog.php" rel="stylesheet">
        <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="../assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="../assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="../assets/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="../assets/css/sidebar.css" rel="stylesheet">
        <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/lib/helper.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../index.css">

    </head>

    <body>



        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                        <div class="logo">
                            <span>CMS</span></a>
                        </div>
                        <li><a href="javascript:history.back()"><i class="ti-home"></i> Home</a></li>



                        </li>


                        </li>



                    </ul>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">

                            <div>
                                <div class="header-icon">
                                    <a href="./logout.php">Log OUt</a>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1 style="color:white;">My Property</h1>


                                </div>
                            </div>
                        </div>

                    </div>
                    <?php


                    $q = "select * from housemst";
                    $result = mysqli_query($con, $q);

                    ?>




                    <table class="table table-bordered table-dark">

                        <?php
                        $mama = $_GET['houseid'];
                        $query = "SELECT * FROM housemst where id = '$mama'";
                        $result = mysqli_query($con, $query);


                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                            <img src="../photos/<?php echo $row['images']; ?>" alt="" width="900" height="500px"><br>

                            <?php
                            if ($row['mode'] == 'rent') {
                            ?>
                                <form action="" method="post">
                                    <div class="align-items-right">

                                        <input class="form-control col-sm-9" style="background-color: black; color:white; border-radius:2px; margin-left:19px;" required name="inrentlong" placeholder="Fill in months you would like to rent eg 4, 9 0r 10 in order To Proceed" type="number">
                                        <button style="margin-left:400px;" name="btnlong" type="submit" class="btn btn-primary"> <a> Submit </a></button><br>
                                        <?php

                                        $long = $_GET['houseid'];
                                        $rentl = mysqli_query($con, $query);
                                        $rowlong = mysqli_fetch_assoc($rentl);

                                        if (isset($_POST['btnlong'])) {

                                            $inlong =  $_POST['inrentlong'];

                                            $query2 = "update housemst set rentlong = $inlong where id = $long";
                                            $exc = mysqli_query($con, $query2);
                                        ?>

                                            <a href="./user_dash.php" style="color: blue;"> click here then click "PAY" in order to pay the actual amount according to the time you have entered</a>

                                        <?php

                                        }


                                        ?>




                                    </div>
                                </form>

                            <?php
                            }; ?>

                        <?php

                        };
                        ?>

                        <h1 style="color: white; font-family:Verdana, Geneva, Tahoma, sans-serif">Owner Details</h1><br>
                        <?php
                        $id = $_GET['ownerid'];
                        $query = "SELECT * FROM admins where id = '$id'";
                        $result = mysqli_query($con, $query);


                        while ($owner = mysqli_fetch_assoc($result)) {
                        ?>
                            <div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Name : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $owner['first_name']; ?> <?php echo  $owner['middle_name']; ?> <?php echo  $owner['last_name']; ?> </span><br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Sex : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $owner['sex']; ?> </span><br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Phone : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $owner['phone_number']; ?> </span><br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Email : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $owner['email']; ?></span>

                            </div><br>

                        <?php

                        }
                        ?>



                        <?php
                        $mama = $_GET['houseid'];
                        $query = "SELECT * FROM housemst where id = '$mama'";
                        $result = mysqli_query($con, $query);


                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                            <h1 style="color: white; font-family:Verdana, Geneva, Tahoma, sans-serif">Location</h1><br>


                            <div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">

                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Region : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['region']; ?></span> <br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Street : </span> <span style=" font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['street']; ?> </span><br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Settlement :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['settlement']; ?> </span> <br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Topography :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['topography']; ?></span><br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Weather :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['weather']; ?></span> <br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Noise :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['noise']; ?></span><br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Network :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['network']; ?></span> <br>
                                <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">security :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['security']; ?></span><br>


                            </div><br>

                        <?php

                        };
                        ?>








                        <?php
                        $mama = $_GET['houseid'];
                        $query = "SELECT * FROM housemst where id = '$mama'";
                        $result = mysqli_query($con, $query);


                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                            <h1 style="color: white; font-family:Verdana, Geneva, Tahoma, sans-serif">Space</h1><br>


                            <div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">
                                <div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">
                                    <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">House Type : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo $row['house_type']; ?></span><br>
                                    <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Number Of Bedrooms : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['number_of_bedroom']; ?> </span><br>
                                    <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Number Of Bathroom : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['number_of_bathroom']; ?> </span><br>
                                    <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Maximum Number Of People : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['number_of_people']; ?> </span><br>

                                </div><br>

                            <?php

                        };
                            ?>



                            <?php
                            $kaka = $_GET['houseid'];
                            $query = "SELECT * FROM housemst where id = '$kaka'";
                            $result = mysqli_query($con, $query);


                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                <h1 style="color: white; font-family:Verdana, Geneva, Tahoma, sans-serif">Price</h1><br>

                                <div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">
                                    <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Minimum Time Of Payment : </span><span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><?php echo $row['payment_mode']; ?> </span><br>
                                    <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Minimum pay Per Month : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['pricing']; ?></span> <br>
                                    <span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">current accepted currency : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo $row['currency']; ?></span> <br>


                                </div>

                            <?php

                            };
                            ?>


                            </div>

                </div>

            </div>

        </div>

        </div>

        </div>


        </div>




        </section>

        </div>

        </div>

        </div>


        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="../assets/js/lib/jquery.min.js"></script>
        <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
        <script src="../assets/js/lib/menubar/sidebar.js"></script>
        <script src="../assets/js/lib/preloader/pace.min.js"></script>
        <script src="../assets/js/lib/bootstrap.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        <script src="../assets/js/lib/calendar-2/moment.latest.min.js"></script>
        <script src="../assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
        <script src="../assets/js/lib/calendar-2/pignose.init.js"></script>
        <script src="../assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
        <script src="../assets/js/lib/weather/weather-init.js"></script>
        <script src="../assets/js/lib/circle-progress/circle-progress.min.js"></script>
        <script src="../assets/js/lib/circle-progress/circle-progress-init.js"></script>
        <script src="../assets/js/lib/chartist/chartist.min.js"></script>
        <script src="../assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
        <script src="../assets/js/lib/sparklinechart/sparkline.init.js"></script>
        <script src="../assets/js/lib/owl-carousel/owl.carousel.min.js"></script>

        <script src="../assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
        <script src="../assets/js/dashboard2.js"></script>
        <script src=".../dash.js"></script>



    </body>

    </html>

<?php

} else {
    header("Location:/cossie/canine/index.php");
}
?>