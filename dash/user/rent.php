<?php
ini_set('display_errors',1);
session_start();
$con = mysqli_connect('localhost','root','','canine') or die('connection failed');
$houseid=$_GET['houseid'];
$ownerid=$_GET['ownerid'];
$userid=$_SESSION['id'];
$query = "Insert into rentmst(house_id,user_id,owner_id) values ($houseid,$userid,$ownerid)";

$exc = mysqli_query($con,$query);
if($exc){
    header('location:./user_dash.php?houseid=$houseid&ownerid=$ownerid');
    
}



?>