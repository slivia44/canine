<?php
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
session_start();
$errors = array();
ini_set("display_errors", 1);

$owner =  $_SESSION['id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS Dashboard</title>
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
                    <li><a href="index.php"><i class="ti-home"></i> Home </a></li>
                    <li class="active"><a class="active" href="complain.php?id=<?php echo $_GET['id'] ?>"><i class=" ti-email"></i> complains</a></li>

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
                                <span>Description</span>
                            </div>
                        </div>
                    </div>


                </div>



                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <?php

                            $houseid = $_GET['id'];

                            $queryy = "SELECT * FROM complainmst where owner_id = $owner and house_id = $houseid";
                            $exc = mysqli_query($con, $queryy);
                            $rows = mysqli_fetch_assoc($exc);
                            ?>

                            <?php if (!empty($rows)) {
                            ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="subject">Subject</label> <?php echo date("d-m-y H:i", strtotime($rows['entry_date'])); ?>
                                        <h1 type="text" id="subject" name="subject"><?php echo $rows['Subject']; ?> </h1>
                                    </div>
                                    <div class="form-group">
                                        <label for="complain">complain description</label>
                                        <h1 id="complain" rows="3" name="complaindesc"><?php echo $rows['complain']; ?> </h1>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Date</label>
                                        <h1 type="text" id="subject" name="subject"><?php echo date("d-m-y H:i", strtotime($rows['entry_date'])); ?> </h1>
                                    </div>



                                </form>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class=" form-group">
                                        <label for="complain">Status</label>
                                        <h1 id="status" name="status"><?php echo $rows['status']; ?></h1>

                                    </div>

                                    <?php
                                    if (isset($_POST['btn-reply'])) {
                                        date_default_timezone_set('Africa/Dar_es_Salaam');
                                        $insertdate = date("y-m-d H:i:s");
                                        $reply = $_POST['reply'];

                                        $quereply = "update complainmst set reply ='$reply', status = 'replied', reply_date = '$insertdate' where owner_id= $owner and house_id = $houseid";
                                        $excrep = mysqli_query($con, $quereply);
                                    } elseif (isset($_POST['btn-yrreply'])) {
                                        date_default_timezone_set('Africa/Dar_es_Salaam');
                                        $insertdate = date("y-m-d H:i:s");
                                        $reply = $_POST['yrreply'];

                                        $quereply = "update complainmst set reply ='$reply', status = 'replied', reply_date = '$insertdate' where owner_id= $owner and house_id = $houseid";
                                        $excrep = mysqli_query($con, $quereply);
                                    }
                                    ?>
                                    <div class=" form-group">
                                        <?php if ($rows['status'] == 'not replied') {
                                        ?>
                                            <label for="complain">write your Reply</label>
                                            <textarea class="form-control" id="reply" rows="3" name="reply" placeholder="type in your reply" onsubmit="return getdata()"></textarea>
                                            <button type=" submit" name="btn-reply" class="btn btn-success">Submit</button>


                                        <?php
                                        } else {
                                        ?>
                                            <label for="complain">your Reply</label>
                                            <input class="form-control" id="yrreply" name="yrreply" value="<?php echo $rows['reply']; ?>"></input><br>
                                            <div class="form-group">
                                                <label for="subject">Date</label>
                                                <h1 id="date" name="date"><?php echo date("d-m-y H:i", strtotime($rows['reply_date'])); ?> </h1>
                                            </div>
                                            <button type="submit" name="btn-yrreply" class="btn btn-success">Update</button>
                                        <?php
                                        }

                                        ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

                            } else {
                                echo "Sorry there is nothing here";
                            }
            ?>
            </div>


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
    <script src="assets/js/lib/jquery.min.js"></script>
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
    <script src="./dash.js"></script>



</body>

</html>