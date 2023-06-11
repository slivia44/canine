<?php

ini_set('display_errors', 1);


$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
ini_set("display_errors", 1);

$fromdate = $_GET['fromdate'];
$newfromdate = date("y-m-d", strtotime($fromdate));

$matako = $_GET['houseid'];
$user = $_GET['userid'];
$query = "update housemst set sold_or_rented = 1, user_id = $user, from_date = '$newfromdate' where id='$matako'";


if (mysqli_query($con, $query)) {
    header('location:index.php');
}
