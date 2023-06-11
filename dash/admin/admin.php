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
    <title>Admin Dashboard</title>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </head>

  <body>



    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
      <div class="nano">
        <div class="nano-content">
          <ul>
            <div class="logo">
              <span>CMS</span></a>
            </div>
            <li class="active"><a class="active" href="./admin.php"><i class="ti-user"></i> Users </a></li>


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

                  <div style="margin-left:350px; text-align:center">

                    <h1 style="color:white"> Welcome <?php echo $row2['first_name']; ?></h1>
                  </div>


                  <h1 style="color:white;">Canine_specialist</h1>
                  <br>
                </div>
              </div>
            </div>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
            $q = "select * from admins where role=1";
            $result = mysqli_query($con, $q);

            ?>

            <table class="table table-dark">
              <thead>
                <tr>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-serif" scope="col">S/n</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">First Name</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Middle Name</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Last Name</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Email</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Phone Number</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Sex</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Role</th>
                  <th style="color: green; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Action</th>


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
                      <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['first_name'] ?></td>
                      <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['middle_name'] ?></td>
                      <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['last_name'] ?></td>
                      <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['email'] ?></td>
                      <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['phone_number'] ?></td>
                      <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['sex'] ?></td>
                      <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['role'] ?></td>



                      <td>
                        <a style="color: wheat;" href="edit.php?id=<?php echo $row['id'] ?>">edit role</a>

                        <a style="color: red;" href="delete.php?id=<?php echo $row['id'] ?>" data-toggle="modal">Delete</a>

                        <!-- delete promt Modal start-->
                        <!-- <div class="modal fade" id="myModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                              <div class="modal-body">
                                <P style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri">Do you really want to <span style="color: red;">DELETE </span> ? this changes can not be undone</P>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- delete promt Modal start-->
                      </td>
                    </tr>


                  </tbody>
              <?php

                }
              }

              ?>
            </table>
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1 style="color:white;">Dogophiles</h1> <br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
      $q = "select * from admins where role=0";
      $result = mysqli_query($con, $q);

      ?>

      <table class="table table-dark">
        <thead>
          <tr>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-serif" scope="col">S/n</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">First Name</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Middle Name</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Last Name</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Email</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Phone Number</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Sex</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Role</th>
            <th style="color: blue; font-family:Verdana, Geneva, Tahoma, sans-seri" scope="col">Action</th>


          </tr>
        </thead>

        <?php

        $no = 0;
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

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
                <td style="color: white; font-family:Verdana, Geneva, Tahoma, sans-seri"><?php echo $row['role'] ?></td>



                <td>
                  <a style="color: wheat;" href="edit.php?id=<?php echo $row['id'] ?>">edit role</a>

                  <a style="color: red;" href="delete.php?id=<?php echo $row['id'] ?>" data-toggle="modal">Delete</a>
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


    <!-- /# column -->

    <!-- /# column -->
    </div>
    </div>
    </div>
    </div>

    </div>


    </section>
    </div>
    </div>
    </div>



    </div>


    <?php


    echo "welcome" . $_SESSION['user_name'];
    exit
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