<?php
session_start();
ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
define('SITE_ROOT', realpath(dirname(__FILE__)));




if (isset($_POST['btn_add'])) {

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
   $owner_id = $_SESSION['id'];

   $extensions = array("jpeg", "jpg", "png");

   if (in_array($file_ext, $extensions) == false) {
      $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
   }

   if ($file_size > 2097152) {
      $errors[] = 'File size must be excately 2 MB or less';
   }

   if (empty($errors) == true) {
      move_uploaded_file($file_tmp, SITE_ROOT . "/photos/" . $file_name);
      $query = "insert into housemst(house_type,region,settlement,street,number_of_bathroom,number_of_bedroom,payment_mode,electricity,water,mode,pricing,currency,images,description,owner_id,size,number_of_People,topography,security,weather,noise,network) values ('$ht','$reg','$settle','$street',$nbath,$nbed,'$pmode','$elec','$water','$mode','$price','$currency','$file_name','$description','$owner_id','$hsize','$npeople','$topography','$security','$weather','$noise','$network')";
      $exc = mysqli_query($con, $query);
      //    echo "Success";
   } else {
      print_r($errors);
   }
}
