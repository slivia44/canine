<?php
ini_set('display_errors', 1);
require 'logic.php';
$errors = array();
if (isset($_SESSION['phone'])) {



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add Dog</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="canine-management-system">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <meta name="author" content="">
        <meta name="generator" content="">

        <link rel="shortcut icon" type="image/x-icon" href="/images/logo.png" />
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


        <div class="preloader">
            <div class="sk-cube-grid">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
            </div>
        </div>


        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                        <div class="logo">
                            <span>CMS</span></a>
                        </div>
                        <li><a href="index.php"><i class="ti-layers"></i> Dashboard </a></li>
                        <li class="active"><a class="active" href=""><i class="ti-home"></i> Add Dog </a></li>

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


        <div class="content-wrap ">
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title card-header">
                                    <span>Description</span>
                                </div>
                            </div>
                        </div>


                    </div>




                    <?php
                    if (isset($_POST['btn_add'])) {
                        if (!empty($ht and $reg and $settle and $street and $nbath and $nbed and $pmode and $elec and $water and $mode and $price and $currency and $image)) {
                    ?>

                            <p class="alert text-success"><?php echo "congratulations your informations has been uploaded successfull !!!"; ?></p>
                        <?php
                        } else {
                        ?>

                            <p class="alert text-danger"><?php echo "fill all the fields !!!"; ?></p>
                    <?php
                        }
                    }

                    ?>







                    <div class="row border-0 card-body">
                        <div class="col-sm-6 border-0">
                            <div class="card border-0">
                                <div class="card-body">
                                    <form action="" method="post" class="form-group " enctype="multipart/form-data">


                                        <label for="text">Dog_breed Type</label>
                                        <input style="background-color:darkgray ; border-radius: 5px;" placeholder="BreedType" class="form-control" type="text" name="housetype" required>
                                        <label for="text">Region</label>
                                        <input style="background-color:darkgray ; border-radius: 5px;" placeholder="Arusha" class="form-control" type="text" name="region" required>
                                        <label for="settlement">owner's name</label>
                                        <select style="background-color:darkgray ; border-radius: 5px;" name="settlement" id="settlement" class="form-control">
                                            <option value="town">Dog's name</option>
                                            <option value="village">Dog's colour</option>
                                        </select>
                                        <label for="address">Dog's Origin</label>
                                        <input style="background-color:darkgray ; border-radius: 5px;" placeholder="Denmark" class="form-control" type="text" name="street" required>
                                        <label for="text">Dog's date-of-birth</label>
                                        <input style="background-color:darkgray ; border-radius: 5px;" placeholder="dd-mm-yy" class=" form-control" type="number" name="noOfBathroom" required>
                                        <label for="name">Dog's Age</label>
                                        <input style="background-color:darkgray ;" placeholder="1 month" class="form-control" type="number" name="NoOfBedroom" required>
                                        <label for="mode">mode</label>
                                        <select style="background-color:darkgray ; border-radius: 5px;" name="mode" id="mode" class="form-control">
                                            <option value="rent">service</option>
                                            <option value="sell">Sell</option>
                                        </select>
                                        <label for="price">Pricing</label>
                                        <input style="background-color:darkgray ; border-radius: 5px;" placeholder="Price Per dog" class=" form-control" type="text" name="price" required>

                                        <label for="text">Currency</label>
                                        <select style="background-color:darkgray ; border-radius: 5px;" name="currency" id="currency" class=" form-control">
                                            <option value="TZS">TZS</option>
                                        </select>
                                        <br>

                                </div>
                            </div>
                        </div>



                        <div class="col-sm-6 border-0">
<!--
                            <div class="card border-0">
                                <div class="card-body border-0">
                                    <label for="text">
                                        <ion-icon name="earth-outline"></ion-icon> Topography / geography
                                    </label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="topography" value="Near mountain" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Mountain
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="topography" value="Near ocean" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Ocean
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="topography" value="Near River" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Rivers
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="topography" value="Near Road" id="flexRadioDefault4">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            Roads
                                        </label>
                                    </div><br>

                                    <label for="text">
                                        <ion-icon name="construct-outline"></ion-icon> Average Security
                                    </label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="security" value="high" id="flexRadioDefault5">
                                        <label class="form-check-label" for="flexRadioDefault5">
                                            High
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="security" value="medium" id="flexRadioDefault6">
                                        <label class="form-check-label" for="flexRadioDefault6">
                                            Medium
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="security" value="low" id="flexRadioDefault7">
                                        <label class="form-check-label" for="flexRadioDefault7">
                                            Low
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="security" value="No" id="flexRadioDefault8">
                                        <label class="form-check-label" for="flexRadioDefault8">
                                            No
                                        </label>
                                    </div><br>

                                    <label for="text">
                                        <ion-icon name="cellular-outline"></ion-icon> Network Services
                                    </label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="network" value="available" id="flexRadioDefault14">
                                        <label class="form-check-label" for="flexRadioDefault14">
                                            available
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="network" value="not available" id="flexRadioDefault15">
                                        <label class="form-check-label" for="flexRadioDefault15">
                                            not available
                                        </label>
                                    </div>
                                    <br>

                                    <label for="text">
                                        <ion-icon name="sunny-outline"></ion-icon> Average Weather
                                    </label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="weather" value="sunny" id="flexRadioDefault12">
                                        <label class="form-check-label" for="flexRadioDefault12">
                                            sunny
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="weather" value="cold" id="flexRadioDefault13">
                                        <label class="form-check-label" for="flexRadioDefault13">
                                            cold
                                        </label>
                                    </div>
                                    <br>


                                    <label for="text">
                                        <ion-icon name="radio-outline"></ion-icon> Average Noise
                                    </label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="noise" value="high" id="flexRadioDefault9">
                                        <label class="form-check-label" for="flexRadioDefault9">
                                            High
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="noise" value="medium" id="flexRadioDefault10">
                                        <label class="form-check-label" for="flexRadioDefault10">
                                            Medium
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="noise" value="low" id="flexRadioDefault11">
                                        <label class="form-check-label" for="flexRadioDefault11">
                                            Low
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="noise" value="No" id="flexRadioDefault12">
                                        <label class="form-check-label" for="flexRadioDefault12">
                                            No
                                        </label>
                                    </div><br>

                                    <label for="text">
                                        <ion-icon name="flash"></ion-icon> Electricity
                                    </label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="electricity1" value="not available" id="flex1">
                                        <label class="form-check-label" for="flex1">
                                            Not available
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="electricity1" value="available" id="flex2" checked>
                                        <label class="form-check-label" for="flex2">
                                            available
                                        </label>
                                    </div>
                                    <br>

                                    <label for="text">
                                        <ion-icon name="rainy"></ion-icon> Water
                                    </label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="water1" value="not available" id="flexRadioDefault30">
                                        <label class="form-check-label" for="flexRadioDefault30">
                                            Not available
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="water1" value="available" id="flexRadioDefault31" checked>
                                        <label class="form-check-label" for="flexRadioDefault31">
                                            available
                                        </label>
                                    </div>
                                    <br>




                                    <label for="description">Description</label>
                                    <textarea style="background-color:darkgray ; border-radius: 5px;" class="form-control" type="text" name="description" id="description" cols="68" rows="7"></textarea>
                                    <br>
                -->


                                    <input type="file" class="fil" name="image" id="file" required>
                                    <?php
                                    if (!empty($errors)) {
                                    ?>
                                        <div class="alert alert-danger">
                                            <?php

                                            foreach ($errors as $error) {
                                                echo $error . "<br>";
                                            } ?></div>

                                        

                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit" name="btn_add">SUBMIT</button><br>

                                    </form>
                                </div>
                            </div>
                        </div>
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

<?php

} else {
    header("Location:../index.php");
}
?>