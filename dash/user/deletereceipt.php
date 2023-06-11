<?php
ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$matako = $_GET['user_id'];
$q = "UPDATE rentmst SET payreceipt = NULL WHERE Id=$matako";

if (mysqli_query($con, $q)) {
    header('location:payments lists.php');
}
