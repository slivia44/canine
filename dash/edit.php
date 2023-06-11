<?php
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
ini_set("display_errors", 1);
define('SITE_ROOT', realpath(dirname(__FILE__)));

$baba = $_GET['id'];
$query = "SELECT * FROM housemst where id = '$baba'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['btn_save'])) {

  $ht = $_POST['housetype'];
  $reg = $_POST['region'];
  $settle = $_POST['settlement'];
  $street = $_POST['street'];
  $nbath = $_POST['noOfBathroom'];
  $nbed = $_POST['NoOfBedroom'];
  $pmode = $_POST['paymentmode'];
  $elec = $_POST['electricity1'];
  $water = $_POST['water1'];
  $mode = $_POST['mode'];
  $price = $_POST['price'];
  $currency = $_POST['currency'];
  $image = $_FILES['image'];
  $description = $_POST['description'];
  $hsize = $_POST['size'];
  $npeople = $_POST['NoOfPeople'];
  $topography = $_POST['topography'];
  $security = $_POST['security'];
  $weather = $_POST['weather'];
  $noise = $_POST['noise'];
  $network = $_POST['network'];
  $errors = array();
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  $file_ext = explode('.', $image['name']);
  $file_ext = end($file_ext);
  $file_ext = strtolower($file_ext);
  $file_name = uniqid();
  $file_name = uniqid() . '.' . $file_ext;

  $extensions = array("jpeg", "jpg", "png");

  if (in_array($file_ext, $extensions) === false) {
    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
  }

  if ($file_size > 5242880) {
    $errors[] = 'File size must not be more than 5 MB';
  }

  if (empty($errors) == true) {
    move_uploaded_file($file_tmp, SITE_ROOT . "/photos/" . $file_name);
    $query = "update housemst set house_type='$ht',region='$reg',settlement='$settle',street='$street',number_of_bathroom='$nbath',number_of_bedroom='$nbed',payment_mode='$pmode',electricity='$elec',water='$water',mode='$mode',pricing='$price',currency='$currency',images='$file_name',description='$description',size='$hsize',number_of_people='$npeople',topography='$topography',security='$security',weather='$weather',noise='$noise',network='$network' where id='$baba'";
    $exc = mysqli_query($con, $query);
    header('location:index.php');
  } else {
    print_r($errors);
    echo "update failed";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit tab</title>

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
  <div class="float-left">

    <div>
      <div class="header-icon">
        <a href="index.php">
          <p style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="ti-home">Back</p>
        </a>
        </span>

      </div>
    </div>
  </div>


  <div class="row border-0">
    <div class="col-sm-6 border-0 card">
      <div class="card border-0">
        <div class="card-body">
          <form action="" method="post" class="form-group " enctype="multipart/form-data">
            <label for="text">House Type</label>
            <input placeholder="master" style="background-color:darkgray ; border-radius: 5px;" class="form-control" type="text" name="housetype" value="<?php echo $row['house_type']; ?>" required>
            <label for="text">Region</label>
            <input placeholder="Arusha" style="background-color:darkgray ; border-radius: 5px;" class=" form-control" type="text" name="region" value="<?php echo $row['region']; ?>" required>
            <label for="settlement">Settlement</label>
            <select name="settlement" id="settlement" style="background-color:darkgray ; border-radius: 5px;" class=" form-control">
              <option value="town"><?php echo $row['settlement']; ?></option>
              <option value="village">Village</option>
            </select>
            <label for="address">Street</label>
            <input placeholder="Engosheraton" style="background-color:darkgray ; border-radius: 5px;" class=" form-control" type="text" name="street" value="<?php echo $row['street']; ?>" required>
            <label for="text">Number of Bathroom</label>
            <input placeholder="1" style="background-color:darkgray ; border-radius: 5px;" class=" form-control" type="number" name="noOfBathroom" value="<?php echo $row['number_of_bathroom']; ?>" required>
            <label for="name">Number Of Bedroom</label>
            <input placeholder="1" style="background-color:darkgray ; border-radius: 5px;" class="form-control" type="number" name="NoOfBedroom" value="<?php echo $row['number_of_bedroom']; ?>" required>

            <label for="name">Size in (sq.meters)</label>
            <input style="background-color:darkgray ; border-radius: 5px;" placeholder="2333" class=" form-control" type="number" name="size" value="<?php echo $row['size']; ?>" required>
            <label for="name">Maximum Number Of people</label>

            <input placeholder="4" class=" form-control" type="number" name="NoOfPeople" style="background-color:darkgray ; border-radius: 5px;" value="<?php echo $row['number_of_people']; ?>" required>
            <label for="mode">mode</label>
            <select style="background-color:darkgray ; border-radius: 5px;" name="mode" id="mode" class=" form-control">
              <option value="rent"><?php echo $row['mode']; ?></option>
              <option value="sell">Sell</option>
            </select>
            <label for="name">Payment duration</label>
            <input placeholder="eg.Per 3 Months / Years" style="background-color:darkgray ; border-radius: 5px;" class=" form-control" type="text" name="paymentmode" value="<?php echo $row['payment_mode']; ?>" required>
            <label for="price">Pricing</label>
            <input placeholder="Price Per Month / Years" style="background-color:darkgray ; border-radius: 5px;" class=" form-control" type="text" name="price" value="<?php echo $row['pricing']; ?>" required>

            <label for="text">Currency</label>
            <select name="currency" id="currency" style="background-color:darkgray ; border-radius: 5px;" class=" form-control">
              <option value="TZS"><?php echo $row['currency']; ?></option>
            </select>
            <br>

        </div>
      </div>
    </div>
<!--
    <div class="col-sm-6 border-0 card">

      <div class="card border-0 ">
        <div class="card-body border-0">
          <label for="text">
            <ion-icon name="earth-outline"></ion-icon> Topography / geography
          </label><br>
          <span style="color: red;">previous was <?php echo $row['topography']; ?></span>

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
          </label><br>
          <span style="color: red;">previous was <?php echo $row['security']; ?></span>

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
          </label><br>
          <span style="color: red;">previous was <?php echo $row['network']; ?></span>

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
          </label><br>
          <span style="color: red;">previous was <?php echo $row['weather']; ?></span>

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
          </label><br>
          <span style="color: red;">previous was <?php echo $row['noise']; ?></span>

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
          </label><br>
          <span style="color: red;">previous was <?php echo $row['electricity']; ?></span>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="electricity1" value="not available" id="flex1">
            <label class="form-check-label" for="flex1">
              Not available
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="electricity1" value="available" id="flex2">
            <label class="form-check-label" for="flex2">
              available
            </label>
          </div>
          <br>

          <label for="text">
            <ion-icon name="rainy"></ion-icon> Water
          </label><br>
          <span style="color: red;">previous was <?php echo $row['water']; ?></span>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="water1" value="not available" id="flexRadioDefault30">
            <label class="form-check-label" for="flexRadioDefault30">
              Not available
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="water1" value="available" id="flexRadioDefault31">
            <label class="form-check-label" for="flexRadioDefault31">
              available
            </label>
          </div>
          <br>




          <label for="description">Description</label>
          <textarea class=" form-control" style="background-color:darkgray ; border-radius: 5px;" type="text" name="description" id="description" cols="68" rows="7"> <?php echo $row['description']; ?></textarea>
          <br>





          <input type="file" class="fil" name="image" id="file" required>
          <button class="btn btn-primary" type="submit" name="btn_save">save changes</button><br>




          </form>
        </div>
      </div>
    </div>
  </div>

-->



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