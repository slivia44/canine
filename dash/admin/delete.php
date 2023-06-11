<?php
ini_set('display_errors',1);
$con = mysqli_connect('localhost','root','','canine') or die('connection failed');
$id=$_GET['id'];
$q="delete from admins where id='$id'";

if (mysqli_query($con,$q)) {
    header('location:admin.php');
}
