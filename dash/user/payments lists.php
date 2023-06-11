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
                        <li><a href="./user_dash.php"><i class="ti-home"></i> Home</a></li>
                        <li><a href="./payments lists.php"><i class="ti-file"></i>payments list</a>
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


                        <button class="btn btn-success" type="button" onclick="myPrint('myfrm')"> print</button>
                        <script>
                            function myPrint(myfrm) {
                                var printdata = document.getElementById(myfrm);
                                newwin = window.open("");
                                newwin.document.write(printdata.outerHTML);
                                newwin.print();
                                newwin.close();
                            }
                        </script>
                    </div>
                </div>
            </div>

        </div>


        <div class="content-wrap" id=myfrm>
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">

                                    <?php

                                    $no = 0;
                                    if ($_POST) {
                                        date_default_timezone_set('Africa/Dar_es_Salaam');
                                        $date = date('y/m/d');
                                        $time = date('H:i:s');
                                        $user_id = $_SESSION['id'];
                                        $pay = $_SESSION['houseid'];
                                        $payh = $_SESSION['ownerid'];
                                        $razorpay_payment_id = $_POST['razorpay_payment_id'];
                                        $queryreceipt = "update rentmst set payreceipt = '$razorpay_payment_id', receiptdate = '$date', receipttime = '$time' where house_id= '$pay' and user_id = '$user_id' and owner_id = '$payh'";
                                        $exc = mysqli_query($con, $queryreceipt);



                                    ?>




                                    <?php

                                    };

                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>





                    <table class="table table-bordered table-light">
                        <thead>
                            <tr>
                                <th style="color: white;" scope="col">#</th>
                                <th style="color: white;" colspan="2" scope="col">Dog's_Name</th>
                                <th style="color: white;" colspan="2" scope="col">Dog_breed Type</th>
                                <th style="color: white;" colspan="2" scope="col">Location</th>
                                <th style="color: white;" colspan="2" scope="col">Mode</th>
                                <th style="color: white;" colspan="2" scope="col">How_long</th>
                                <th style="color: white;" colspan="2" scope="col">Date </th>
                                <th style="color: white;" colspan="2" scope="col">Receipts_ID</th>
                                <th style="color: white;" colspan="2" scope="col">Receipts_date</th>
                                <th style="color: white;" colspan="2" scope="col">Receipts_time</th>
                                <th style="color: white;" scope="col">status</th>
                                

                            </tr>
                        </thead>
                        <?php
                        $mama = $_SESSION['id'];



                        $no = 0;
                        $querypay = "SELECT rentmst.id,rentmst.payreceipt,rentmst.receiptdate,rentmst.receipttime,rentmst.house_id,rentmst.user_id,rentmst.owner_id,housemst.images,housemst.from_date,housemst.sold_or_rented,housemst.to_date,housemst.mode,housemst.house_type,housemst.street,housemst.region,housemst.rentlong,housemst.pricing,housemst.region,housemst.currency,admins.first_name FROM `rentmst` INNER JOIN housemst ON rentmst.house_id=housemst.id INNER JOIN admins ON  rentmst.owner_id=admins.id WHERE rentmst.user_id='$mama';";
                        $excpay = mysqli_query($con, $querypay);

                        while ($payrow = mysqli_fetch_assoc($excpay)) {
                            if (!empty($payrow['payreceipt'])) {

                        ?>
                                <tbody>


                                    <tr>
                                        <th scope="row"><?php echo ++$no; ?></th>
                                        <th style="color: white;" colspan="2" scope="col"><?php echo $payrow['first_name'];  ?></th>
                                        <th style="color: white;" colspan="2" scope="col"><?php echo $payrow['house_type'];  ?></th>
                                        <th style="color: white;" colspan="2" scope="col"><?php echo $payrow['street'];  ?>, <?php echo $payrow['region'];  ?></th>
                                        <th style="color: white;" colspan="2" scope="col"><?php echo $payrow['mode'];  ?></th>

                                        <th style="color: white;" colspan="2" scope="col"><?php if ($payrow['mode'] == 'rent') {

                                                                                                echo $payrow['rentlong'];
                                                                                            ?> days <?php   } ?></th>

                                        <th style="color: white;" colspan="2" scope="col"><?php if ($payrow['mode'] == 'rent') {

                                                                                                echo date("d-m-y", strtotime($payrow['from_date']));
                                                                                            ?> to <?php echo date("d-m-y", strtotime($payrow['to_date']));
                                                                                                }

                                                                                                if ($payrow['mode'] == 'sell') {
                                                                                                    echo date("d-m-y", strtotime($payrow['from_date']));
                                                                                                }
                                                                                                    ?>

                                        </th>


                                        <td style="color: green;" colspan="2"><?php echo $payrow['payreceipt'];  ?></td>
                                        <td style="color: white;" colspan="2"><?php echo date("d-m-y", strtotime($payrow['receiptdate']));  ?></td>
                                        <td style="color: white;" colspan="2"><?php echo $payrow['receipttime'];  ?></td>

                                        <td>

                                            <?php

                                            if ($payrow['sold_or_rented'] == 2 || $payrow['sold_or_rented'] == 1) {
                                            ?>

                                                <a style="color: green;">Paid</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a style=" color: red;">pending</a>
                                            <?php
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <a style="color: red;" href="deletereceipt.php?user_id=<?php echo $payrow['id'] ?>">delete</a>
                                        </td>

                                    </tr>
                                </tbody>
                        <?php
                            }
                        }



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