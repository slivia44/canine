<?php

ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');

if (isset($_POST['email_btn'])) {

    $yn = $_POST['name'];
    $em = $_POST['email'];
    $sub = $_POST['subject'];
    $mes = $_POST['message'];



    if (empty($yn) || empty($em) || empty($sub) || empty($mes)) {
        header("location:index.php?errorz");
    } else {
        $to = 'silviacosmas@gmail.com';

        if (mail($to, $sub, $mes, $em)) {
            header("location:index.php?success");
        }
    }
}
