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
        <title>invoices</title>


        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="canine-management-system">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <meta name="author" content="">
        <meta name="generator" content="">
        <link rel="shortcut icon" type="image/x-icon" href="/canine/images/favicon.png" />
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
                        <li><a href="./user_dash.php"><i class="ti-home"></i> Home</a></li>
                        <li><a href="./payments lists.php"><i class="ti-file"></i> payments list</a>
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
                                    <span>list of dogs you own</span>

                                </div>
                            </div>
                        </div>


                    </div>



                </div>



                <?php

                $user = $_SESSION['phone'];

                $query = "SELECT * FROM admins where phone_number = $user";
                $exc = mysqli_query($con, $query);

                $list = mysqli_fetch_assoc($exc);
                $yoyote = $list['id'];
                $querylist = "SELECT housemst.from_date,housemst.to_date,housemst.region,housemst.id,housemst.house_type,housemst.settlement,housemst.street,housemst.mode,housemst.pricing,housemst.rentlong,housemst.images, admins.first_name,admins.middle_name,admins.last_name,admins.email,admins.phone_number,admins.id, rentmst.house_id FROM housemst INNER JOIN admins ON admins.id=housemst.owner_id INNER JOIN rentmst ON rentmst.house_id = housemst.id WHERE housemst.user_id = $yoyote";

                $jeshi = mysqli_query($con, $querylist);
                if (mysqli_num_rows($jeshi) > 0) {

                    while ($kaka = mysqli_fetch_assoc($jeshi)) {

                ?>


                        <table class="table table-bordered table-dark">
                            <tbody>
                                <tr>
                                    <td class="col-md-7" alt="" srcset="">
                                        <img src="../photos/<?php echo $kaka['images']; ?>" alt="" width="700" height="400px"><br>

                                    </td>
                                    <td>
                                        <p style="text-align:left; color:cyan;"> <strong> LOCATION : <?php echo $kaka['street']; ?>, <?php echo $kaka['region']; ?> </strong></p>
                                        <p style="text-align:left; color:white;"><strong> DOG TYPE : <?php echo $kaka['house_type']; ?></p>
                                        <?php if ($kaka['mode'] == 'rent') { ?>
                                            <p style="text-align:left; color:white;"><strong> ONE DOG PRICE : <?php echo $kaka['pricing']; ?></p>
                                        <?php } ?>
                                        <?php if ($kaka['mode'] == 'sell') { ?>
                                            <p style="text-align:left; color:white;"><strong> PRICE : <?php echo $kaka['pricing']; ?></p>
                                        <?php } ?>
                                        <?php if ($kaka['mode'] == 'rent') { ?>
                                            <p style="text-align:left; color:white;"><strong>You have <?php echo $kaka['mode']; ?>ed for <?php echo  $kaka['rentlong']; ?> months</strong></p>
                                        <?php } ?>

                                        <?php if ($kaka['mode'] == 'rent') { ?>
                                            <p style="text-align:left; color:white;"><strong>Since <?php echo date("d-m-y", strtotime($kaka['from_date'])); ?> To <?php echo date("d-m-y", strtotime($kaka['to_date']));  ?> </strong></p>
                                        <?php } ?>
                                        <?php if ($kaka['mode'] == 'sell') { ?>
                                            <p style="text-align:left; color:white;"><strong>You bought on <?php echo date("d-m-y", strtotime($kaka['from_date'])); ?> </strong></p>
                                        <?php } ?>
                                        <p style="text-align:left; color:white;"><strong> Your Dog_Specialist is <?php echo $kaka['first_name']; ?> <?php echo $kaka['middle_name']; ?> <?php echo $kaka['last_name']; ?> </strong></p>
                                        <p style="text-align:left; color:white;"><strong>Your  Dog_Specialist phone number is <?php echo $kaka['phone_number']; ?> </strong></p>
                                    </td>
                                    <td>

                                        <a href="complain.php?houseid=<?php echo $kaka['house_id'] ?>&ownerid=<?php echo $kaka['id'] ?>">Complains</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                <?php


                    }
                } else {

                    echo "sorry there is nothing here!!!";
                }




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