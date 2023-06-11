<?php
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

        <title>complain</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Parallax HTML5 Template">
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
        <link href="../add_house.php" rel="stylesheet">
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
                        <li><a href="listhouse.php"><i class="ti-home"></i> Home</a></li>
                        <li><a href="./complain.php?houseid=<?php echo $_GET['houseid'] ?>&ownerid=<?php echo $_GET['ownerid'] ?>"><i class="ti-email"></i> complains</a></li>
                        <li><a href="./replies.php?houseid=<?php echo $_GET['houseid'] ?>&ownerid=<?php echo $_GET['ownerid'] ?>"><i class="ti-email"></i> replies</a></li>

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
                                    <span>Description</span>
                                </div>
                            </div>
                        </div>

                    </div>



                    <?php
                    $userid = $_SESSION['id'];
                    $houseid = $_GET['houseid'];
                    $ownerid = $_GET['ownerid'];
                    if (isset($_POST['btn-complain'])) {
                        date_default_timezone_set('Africa/Dar_es_Salaam');
                        $insertdate = date("y-m-d H:i:s");
                        $sub = $_POST['subject'];
                        $comp = $_POST['complain'];
                        $comquery = "insert into complainmst (complainmst.user_id,complainmst.owner_id,complainmst.house_id,subject,complain,entry_date ) values($userid,$ownerid,$houseid,'$sub','$comp','$insertdate')";
                        $exc = mysqli_query($con, $comquery);
                    }
                    ?>


                    <?php
                    $houseid = $_GET['houseid'];

                    $queryy = "SELECT * FROM complainmst where user_id = $userid and house_id = $houseid";
                    $exc = mysqli_query($con, $queryy);
                    $rows = mysqli_fetch_assoc($exc);

                    ?>

                    <?php if ($rows['status'] != 'replied') {

                    ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="complain">write your complains</label>
                                            <textarea class="form-control" id="complain" rows="3" name="complain" placeholder="describe your complains"></textarea>
                                        </div>
                                        <button type="submit" name="btn-complain" class="btn btn-success">Submit</button>

                                    </form>
                                </div>
                            </div>


                        </div>
                    <?php
                    } else {
                        echo "In order to complain again, you must click "; ?> <a class="btn btn-danger" href="deletereply.php?house_id=<?php echo $_GET['houseid'] ?>&& ownerid=<?php echo $_GET['ownerid'] ?>">DELETE</a>
                    <?php
                        echo "your replies";
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


        <script type=" module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

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