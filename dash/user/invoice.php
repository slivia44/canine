<?php
ini_set('display_errors', 1);
$errors = array();
session_start();
$nom = $_SESSION['phone'];
if (isset($_SESSION['phone'])) {




    $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
    ini_set("display_errors", 1);

    $ownerid = $_GET['ownerid'];
    $houseid = $_GET['houseid'];
    $bill = $_SESSION['id'];

    $query = "SELECT housemst.id,housemst.region,housemst.rentlong,housemst.house_type,housemst.payment_mode,housemst.mode,housemst.street,housemst.payment_mode,housemst.pricing,
    housemst.currency,housemst.owner_id,admins.first_name,admins.middle_name,admins.last_name,admins.email,admins.phone_number,
    admins.role FROM `housemst` INNER JOIN admins ON housemst.owner_id=admins.id WHERE housemst.id='$houseid';";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);




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
        ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <meta name="author" content="">
        <meta name="generator" content="">
        <link rel="shortcut icon" type="image/x-icon" href="/tenants/images/favicon.png" />
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
        <div class="containerifluid">





            <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
                <div class="nano">
                    <div class="nano-content">
                        <ul>
                            <div class="logo">
                                <span>CMS</span></a>
                            </div>
                            <li><a href="./user_dash.php"><i class="ti-home"></i> Home</a></li>
                            <li><a href="./complain.php"><i class="ti-email"></i> complains</a></li>
                            <li><a href="./payments lists.php"><i class="ti-file"></i>payments list</a>
                            <li><a href="./listhouse.php"><i class="ti-view-list"></i> My dogs</a>


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


            <div id="ud" class="row gutters">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-container">
                                <div class="invoice-header">

                                    <div class="row  ">
                                        <div class="col-lg-12 col-sm-12">
                                            <address style="font-style: italic;" class="text-right text-light">
                                                <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?>, <br>
                                                <?php echo $row['email']; ?>,<br>
                                                <?php echo $row['street']; ?>,
                                                <?php echo $row['region']; ?>.<br>
                                                <?php echo $row['phone_number']; ?>
                                                <div class="bill-data text-right">
                                                    <p>
                                                        <?php
                                                        date_default_timezone_set('Africa/Dar_es_Salaam');
                                                        $date = date('d/m/Y');
                                                        ?>
                                                    <div id="date"> <?php echo $date; ?></div>
                                                    </p>
                                                </div>
                                            </address>
                                        </div>
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
                        <?php
                        $tom = "SELECT * from admins where phone_number=$nom";
                        $exc = mysqli_query($con, $tom);
                        $row2 = mysqli_fetch_assoc($exc);
                        ?>
                        <div id="ud" class="col-md-4">
                            <h5 class="text-light"><strong>Bill To</strong></h5>
                            <div class="bill-to">
                                <address style="font-style: italic;">
                                    <span class="text-light"> <strong>Full Name :</strong> </span>
                                    <span type="text" style="margin-bottom: 10px;" class="text-success"><strong> <?php echo $row2['first_name']; ?> </strong><?php echo $row2['last_name']; ?></span> <br>
                                    <span class="text-light"> <strong>Mobile :</strong> </span>
                                    <span type="text" style="margin-bottom: 10px;" class="text-success"><strong><?php echo $row2['phone_number']; ?> </strong></span><br>
                                    <span class="text-light"> <strong>Email :</strong> </span>
                                    <div type="text" style="margin-bottom: 10px;" class="text-success"><strong> <?php echo $row2['email']; ?> </strong></div>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class=" col-sm-12">
                            <div class="table-responsive">
                                <table class="table custom-table m-0">
                                    <thead>
                                        <tr>
                                            <th style="color: white;">Dog_breed Type</th>
                                            <th style="color: white;">Property for </th>
                                            <th style="color: white;">Payment Time</th>
                                            <th style="color: white;"> Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="color: white;">
                                                <?php echo $row['house_type']; ?>
                                            </td>
                                            <td style="color: white;"><?php echo $row['mode']; ?></td>
                                            <td style="color: white;"><?php echo $row['payment_mode']; ?></td>
                                            <td style="color: white;"><?php echo $row['pricing']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td colspan="2">
                                                <p style="color: white;"> Subtotal<br></p>
                                                <h5 class="text-success"><strong>Amount To be Paid TZS</strong></h5>
                                            </td>
                                            <td>
                                                <p style="color: white;"> <?php echo $row['pricing']; ?><br> </p>
                                                <h5 class="text-success"><strong>
                                                        <?php
                                                        if ($row['mode'] == 'rent') {
                                                            $total = $row['pricing'] * $row['rentlong'];
                                                            echo $total;
                                                        } else echo $row['pricing'];


                                                        ?>

                                                    </strong></h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <a href="print.php?id=<?php echo $houseid; ?>" style=" margin-left: 10cm;" class="btn btn-success">print</a>

        </div>








        <style type=" text/css">
            body {
                margin: 0;
                padding: 0;
                font: 400 .875rem 'Open Sans', sans-serif;
                color: #bcd0f7;
                background: #1A233A;
                position: relative;
                height: 100%;
            }

            .table {
                background: #1a243a;
                color: #bcd0f7;
                font-size: .95rem;
            }

            .text-success {
                color: #c0d64a !important;
            }

            .custom-actions-btns {
                margin: auto;
                display: flex;
                justify-content: flex-end;
            }

            .custom-actions-btns .btn {
                margin: .3rem 0 .3rem .3rem;
            }
        </style>


    </body>

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