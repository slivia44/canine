<?php

ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$id = $_SESSION['id'];
$query = "SELECT admins.role,admins.id,admins.first_name FROM `admins` INNER JOIN housemst ON admins.id=housemst.user_id WHERE housemst.user_id =user_id and housemst.owner_id=$id and admins.role = 0 or admins.role = 1;";
$run = mysqli_query($con, $query);
$count = mysqli_num_rows($run);
echo $count;
