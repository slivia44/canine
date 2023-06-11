<?php
ini_set('display_errors', 1);
$errors = array();
session_start();
if (isset($_SESSION['phone'])) {

    $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');

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
                        <li><a href="#"><i class="ti-home"></i> Home</a></li>
                        <li><a href="./payments lists.php"><i class="ti-file"></i>Payments list</a>
                        <li><a href="./listdog.php"><i class="ti-view-list"></i> My Dogs</a>

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


                                    <?php
                                    $nom = $_SESSION['phone'];
                                    $tom = "SELECT * from admins where phone_number=$nom";
                                    $exc = mysqli_query($con, $tom);
                                    $row2 = mysqli_fetch_assoc($exc);
                                    ?>
                                    <h1 style="color:white;"> <?php echo $row2['first_name']; ?>'s Properties</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php

                    $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
                    $q = "select * from housemst";
                    $result = mysqli_query($con, $q);

                    ?>




                    <!-- /# row -->
                    <table class="table table-bordered table-dark">

                        <?php
                        $mama = $_SESSION['id'];


                        $query = "SELECT rentmst.id,rentmst.house_id,rentmst.user_id,rentmst.owner_id,housemst.images,housemst.mode,housemst.street,housemst.rentlong,housemst.pricing,housemst.region,housemst.currency FROM `rentmst` INNER JOIN housemst ON rentmst.house_id=housemst.id WHERE rentmst.user_id='$mama';";
                        $result = mysqli_query($con, $query);


                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <tbody>
                                <tr>



                                    <td class="col-md-7" alt="" srcset="">
                                        <img src="../photos/<?php echo $row['images']; ?>" alt="" width="650" height="300px"><br>
                                        <p style="text-align:center"><?php echo $row['street']; ?>, <?php echo $row['region']; ?></p>
                                        <p style="text-align:center"><?php echo $row['pricing']; ?> <?php echo $row['currency']; ?></p>
                                        <p style="text-align:center">dog For <?php echo $row['mode']; ?></p>
                                    </td>
                                    <td>

                                        <?php
                                        if ($row['mode'] == 'sell' || $row['rentlong'] > 0) {
                                        ?>
                                            <a style="color: blue;" href="invoice.php?houseid=<?php echo $row['house_id'] ?>&ownerid=<?php echo $row['owner_id'] ?>">INVOICE PAY</a>
                                            <a style="color: green;" href="index.php?houseid=<?php echo $row['house_id'] ?>&ownerid=<?php echo $row['owner_id'] ?>">PAY ONLINE</a>
                                        <?php
                                        }
                                        ?>

                                        <a href="view.php?houseid=<?php echo $row['house_id'] ?>&ownerid=<?php echo $row['owner_id'] ?>">view</a>
                                        <a style="color: red;" href="delete.php?rentid=<?php echo $row['id'] ?>">delete</a>





                                    </td>
                                </tr>
                            </tbody>
                        <?php

                        };
                        ?>
                    </table>




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