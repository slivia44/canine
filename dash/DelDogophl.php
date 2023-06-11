<?php
ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$matako = $_GET['id'];
$q = "update housemst set sold_or_rented=0,rentlog=0,user_id=0,from_date=0,to_date=0 where id='$matako'";

if (mysqli_query($con, $q)) {
    header('location:index.php');
}
