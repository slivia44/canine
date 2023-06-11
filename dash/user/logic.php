<?php

ini_set('display_errors',1);
$con = mysqli_connect('localhost','root','','canine') or die('connection failed');
define ('SITE_ROOT', realpath(dirname(__FILE__)));


if(isset($_POST['btn_add'])){

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
$errors= array();
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
$file_ext= explode('.', $image['name']);
$file_ext=end($file_ext);
$file_ext=strtolower($file_ext);
$file_name = uniqid();
$file_name =uniqid().'.'.$file_ext;

$extensions= array("jpeg","jpg","png");

if(in_array($file_ext,$extensions)=== false){
   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
}

if($file_size > 5097152){
   $errors[]='File size must be excately 5 MB';
}

if(empty($errors)==true){
   move_uploaded_file($file_tmp,SITE_ROOT."/photos/".$file_name); 
   $query = "insert into housemst(house_type,region,settlement,street,number_of_bathroom,number_of_bedroom,payment_mode,electricity,water,mode,pricing,currency,images) values ('$ht','$reg','$settle','$street',$nbath,$nbed,'$pmode','$elec','$water','$mode','$price','$currency','$file_name')";
   $exc = mysqli_query($con,$query);
//    echo "Success";
}else{
   print_r($errors);
}



















}
