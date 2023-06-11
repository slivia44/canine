<?php

ini_set('display_errors', 1);


$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
ini_set("display_errors", 1);

$matako = $_GET['id'];
$query = "update housemst set sold_or_rented = 0, user_id= 0, rentlong = 0 where id='$matako'";

if (mysqli_query($con, $query)) {
    header('location:index.php');
}
