<?php

ini_set('display_errors', 1);


$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
ini_set("display_errors", 1);


$fromdate = $_GET['fromdate'];
$newfromdate = date("y-m-d", strtotime($fromdate));

$todate = $_GET['todate'];
$newtodate = date("y-m-d", strtotime($todate));

// var_dump($newfromdate, $newtodate);


$matako = $_GET['houseid'];
$user = $_GET['userid'];
$query = "update housemst set sold_or_rented = 2, user_id = $user, from_date = '$newfromdate', to_date = '$newtodate' where id='$matako'";

if (mysqli_query($con, $query)) {
    header('location:index.php');
}
