<?php
session_start();
if (isset($_SESSION['phone'])) {
    # code...


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>list of Dogs</title>



        <link rel="stylesheet" href="index.css">
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
        <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="assets/css/sidebar.css" rel="stylesheet">
        <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/lib/helper.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="index.css">

    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                        <div class="logo">
                            <span>CMS</span></a>
                        </div>

                        <li class="active"><a class="sidebar-sub-toggle active" href="index.html"><i class="ti-layers"></i> Dashboard </a>

                        </li>
                        <li><a href="add_dog.php"><i class="ti-home"></i> Add Dog </a></li>

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
                                    <a href="../logout.php">Log OUt</a>
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
                                    <h1 style="color:darkgray;">Best Place, <span style="color:darkgray;">For Your Dream Dog</span></h1>
                                </div>
                            </div>
                        </div>

                    </div>

                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-home color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div style="color:darkgray;" class="stat-text">Total Dogs</div>
                                            <div style="color:darkgray;" class="stat-digit">
                                                <?php

                                                require "count.php";



                                                ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div style="color:darkgray;" class="stat-text">Total Customers</div>
                                            <div style="color:darkgray;" class="stat-digit"><?php

                                                                                            require "tencount.php";



                                                                                            ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <?php

                        $id = $_SESSION['id'];

                        $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
                        $q = "select * from housemst where owner_id=$id";
                        $result = mysqli_query($con, $q);

                        ?>




                        <?php
                        $nom = $_SESSION['phone'];
                        $tom = "SELECT * from admins where phone_number=$nom";
                        $exc = mysqli_query($con, $tom);
                        $row2 = mysqli_fetch_assoc($exc);
                        ?>
                        <h1 style="color:darkgray;"><?php echo $row2['first_name']; ?>'s Dogs</h1>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-serif" scope="col">S/n</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Dog's_Name</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Breed_group</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Date_Of_Birth</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Sex</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Age</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Coat</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Dog's colour</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Distinct Feature</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Dog_Owner</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Price</th>
                                    <th style="color: darkgreen; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Currency</th>

                                </tr>
                            </thead>

                            <?php

                            $no = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>

                                    <tbody>
                                        <tr>
                                            <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo ++$no; ?></th>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['house_type'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['region'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['settlement'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['street'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['number_of_bathroom'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['number_of_bedroom'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['payment_mode'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['electricity'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['water'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['mode'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['pricing'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['currency'] ?></td>

                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['number_of_people'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['size'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['network'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['security'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['weather'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['noise'] ?></td>
                                            <td style="color: darkgray; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['topography'] ?></td>




                                            <td>
                                                <a style="color: wheat;" href="edit.php?id=<?php echo $row['id'] ?>">edit</a>
                                                <a style="color: red;" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                                            </td>

                                            <td><a style="color: yellow;" href="promtrent.php?id=<?php echo $row['id'] ?>">Serviced</a>
                                                <a style="color: cyan;" href="soldprompt.php?id=<?php echo $row['id'] ?>">Sold</a>
                                                <a style="color: magenta;" href="default.php?id=<?php echo $row['id'] ?>">Default</a>

                                            </td>
                                            <td>
                                                <?php


                                                $houseid = $row['id'];

                                                $queryy = "SELECT * FROM complainmst where owner_id = $id and house_id = $houseid";
                                                $exc = mysqli_query($con, $queryy);
                                                $rows = mysqli_fetch_assoc($exc);
                                                if (!empty($rows['complain'])) {
                                                ?>
                                                    <a style="color: yellow;" href="complain.php?id=<?php echo $row['id'] ?>">View</a>
                                                <?php
                                                }
                                                ?>




                                            </td>

                                        </tr>


                                    </tbody>
                            <?php

                                }
                            }

                            ?>
                        </table>

                        <div class="page-title">
                            <h1 style="color:darkgray;">My Customers</h1> <br>
                        </div>

                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'tenants') or die('connection failed');
                        $que = "SELECT housemst.owner_id,admins.role,admins.middle_name,admins.last_name,admins.email,admins.phone_number,housemst.mode,housemst.from_date,housemst.rentlong,housemst.to_date,housemst.house_type,housemst.region,housemst.street,admins.sex,admins.id,admins.first_name FROM `admins` INNER JOIN housemst ON admins.id=housemst.user_id WHERE housemst.user_id =user_id and housemst.owner_id=$id  and admins.role = 0 or admins.role = 1 ;";

                        $run = mysqli_query($con, $que);;

                        ?>

                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-serif" scope="col">S/n</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">First_Name</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Middle_Name</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">LastName</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Email</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Phone_Number</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Sex</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Dog's_Name</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Warranty</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">from_Date</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Expiry_Date</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Breed_group</th>
                                </tr>
                            </thead>

                            <?php

                            $no = 0;
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_assoc($run)) {

                            ?>

                                    <tbody>
                                        <tr>
                                            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo ++$no; ?></th>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['first_name'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['middle_name'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['last_name'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['email'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['phone_number'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['sex'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['mode'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['rentlong'] ?> months</td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo date("d-m-y", strtotime($row['from_date'])) ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php if ($row['mode'] == 'rent') {
                                                                                                                            echo date("d-m-y", strtotime($row['to_date']));
                                                                                                                        }   ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['house_type'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['street'] ?>, <?php echo $row['region'] ?></td>



                                            <td>

                                                <a style="color: red;" href="deletetenants.php?id=<?php echo $row['id'] ?>" data-toggle="modal">Delete</a>
                                            </td>
                                        </tr>


                                    </tbody>
                            <?php

                                }
                            }

                            ?>
                        </table>





                        </table>

                        <div class="page-title">
                            <h1 style="color:darkgray;">Online Payments</h1> <br>
                        </div>

                        <?php


                        $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
                        $queryonline = "SELECT rentmst.id,rentmst.payreceipt,rentmst.receiptdate,rentmst.receipttime,rentmst.house_id,rentmst.user_id,rentmst.owner_id,housemst.images,housemst.sold_or_rented,housemst.from_date,housemst.to_date,housemst.mode,housemst.house_type,housemst.street,housemst.region,housemst.rentlong,housemst.pricing,housemst.region,housemst.currency,admins.first_name,admins.last_name,admins.email,admins.phone_number FROM `rentmst` INNER JOIN housemst ON rentmst.house_id=housemst.id INNER JOIN admins ON admins.id = rentmst.user_id WHERE rentmst.house_id= house_id and rentmst.owner_id=$id and rentmst.payreceipt != 'NULL'";
                        $online = mysqli_query($con, $queryonline);

                        ?>

                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-serif" scope="col">S/n</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">FirstName</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">LastName</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Email</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">PhoneNumber</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">ReceiptId</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">AmountPaid</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Datepaid </th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">IssuedDate</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">ExpiryDate</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Breed_group</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Dog's_Name</th>
                                    <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Status</th>



                                </tr>
                            </thead>

                            <?php

                            $no = 0;
                            if (mysqli_num_rows($online) > 0) {
                                while ($rowonline = mysqli_fetch_assoc($online)) {

                            ?>

                                    <tbody>
                                        <tr>
                                            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo ++$no; ?></th>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['first_name'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['last_name'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['email'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['phone_number'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['payreceipt'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['pricing'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo date("d-m-y", strtotime($rowonline['receiptdate'])) ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['mode'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php if ($rowonline['mode'] == 'rent') {
                                                                                                                            echo ($rowonline['rentlong']);
                                                                                                                        ?> months <?php } ?></td>
                                            </td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo date("d-m-y", strtotime($rowonline['from_date'])) ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php if ($rowonline['mode'] == 'rent') {
                                                                                                                            echo date("d-m-y", strtotime($rowonline['to_date']));
                                                                                                                        }   ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['house_type'] ?></td>
                                            <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $rowonline['street'] ?>,<?php echo $rowonline['region'] ?></td>



                                            <td>

                                                <a style="color: green;" href="promtrent.php?id=<?php echo $rowonline['house_id'] ?>">ConfirmService</a>
                                                <a style="color: green;" href="soldprompt.php?id=<?php echo $rowonline['house_id'] ?>">ConfirmSold</a>

                                            </td>

                                            <td>

                                                <?php

                                                if ($rowonline['sold_or_rented'] == 2 || $rowonline['sold_or_rented'] == 1) {
                                                ?>

                                                    <a style="color: green;">Approved</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a style="color: red;">NotApproved</a>
                                                <?php
                                                }



                                                ?>


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


        </section>
        </div>
        </div>
        </div>


        <script src=" assets/js/lib/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <script src="assets/js/lib/bootstrap.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
        <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
        <script src="assets/js/lib/calendar-2/pignose.init.js"></script>
        <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
        <script src="assets/js/lib/weather/weather-init.js"></script>
        <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
        <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
        <script src="assets/js/lib/chartist/chartist.min.js"></script>
        <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
        <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
        <script src="assets/js/dashboard2.js"></script>
    </body>

    </html>
<?php
} else {
    header('location:../index.php');
}
?>