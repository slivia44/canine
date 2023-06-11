<?php
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$house = $_GET['house_id'];
$owner = $_GET['ownerid'];
$q = "delete from complainmst where house_id= $house and owner_id = $owner and status = 'replied'";

var_dump($house, $owner);

if (mysqli_query($con, $q)) {
    header('location:listhouse.php');
}
