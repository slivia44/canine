<?php

ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$id = $_SESSION['id'];
$query = "SELECT * FROM housemst where owner_id=$id";

$run = mysqli_query($con, $query);

$count = mysqli_num_rows($run);

echo $count;
