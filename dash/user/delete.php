<?php
ini_set('display_errors',1);
$con = mysqli_connect('localhost','root','','canine') or die('connection failed');
$matako=$_GET['rentid'];
$q="delete from rentmst where id='$matako'";

$exc = mysqli_query($con,$q);

if($exc){
    header('location:./user_dash.php');
}


