<?php
ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$matako = $_GET['id'];
$q = "delete from housemst where id='$matako'";

if (mysqli_query($con, $q)) {
    header('location:change1.php');
}
