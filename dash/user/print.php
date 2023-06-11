<?php

session_start();
$nom = $_SESSION['phone'];
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
header("Refresh: 60");
$houseid = $_GET['id'];
$start_date = $_POST['Start_date'];
$end_date = $_POST['End_date'];

require('fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();



$query = "SELECT housemst.id,housemst.region,housemst.rentlong,housemst.house_type,housemst.payment_mode,housemst.mode,housemst.street,housemst.payment_mode,housemst.pricing,
    housemst.currency,housemst.owner_id,admins.first_name,admins.middle_name,admins.last_name,admins.email,admins.phone_number,
    admins.role FROM `housemst` INNER JOIN admins ON housemst.owner_id=admins.id WHERE housemst.id='$houseid';";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$tom = "SELECT * from admins where phone_number=$nom";
$exc = mysqli_query($con, $tom);
$row2 = mysqli_fetch_assoc($exc);

date_default_timezone_set('Africa/Dar_es_Salaam');
$date = date('d/m/Y');


$pdf->Image('tms2.png', 80, -35);


$pdf->Ln(3);
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(100);
$pdf->Cell(170, 5, $row['first_name'] . " " . $row['last_name'], 0, 1, 'R');
$pdf->Cell(100);
$pdf->Cell(170, 5, $row['email'], 0, 1, 'R');
$pdf->Cell(100);
$pdf->Cell(170, 5, $row['street'] . " " . $row['region'], 0, 1, 'R');
$pdf->Cell(100);
$pdf->Cell(170, 5, $row['phone_number'], 0, 1, 'R');
$pdf->Cell(100);
$pdf->Cell(170, 10, $date, 0, 1, 'R');



//left
$pdf->Cell(7);
$pdf->SetFont('Times', 'B', 16);
$pdf->Cell(100, 5, 'Bill To', 0, 1, 'L');
$pdf->Cell(7);
$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(170, 5, 'Full Name: ' . $row2['first_name'] . ' ' . $row2['last_name'], 0, 1, 'L');
$pdf->Cell(7);
$pdf->Cell(170, 5, 'Mobile: ' . $row2['phone_number'], 0, 1, 'L');
if ($row2['email'] != '') {
	$pdf->Cell(7);
	$pdf->Cell(170, 5, 'Email :' . $row2['email'], 0, 1, 'L');
} else {
	$pdf->Cell(7);
	$pdf->Cell(170, 5, '', 0, 1, 'L');
}

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(7);
$pdf->Cell(170, 21, 'Property Type', 0, 1, 'L');
$pdf->Cell(8);
$pdf->Cell(170, -21, 'Property For', 0, 1, 'C');
$pdf->Cell(8);
$pdf->Cell(300, 21, 'Payment Time', 0, 1, 'C');
$pdf->Cell(8);
$pdf->Cell(493, -21, 'price', 0, 1, 'C');

$pdf->Line(18, 80, 279, 80);

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(8);
$pdf->Cell(170, 51, $row['house_type'], 0, 1, 'L');
$pdf->Cell(9);
$pdf->Cell(170, -51, $row['mode'], 0, 1, 'C');
$pdf->Cell(9);
$pdf->Cell(300, 51, $row['payment_mode'], 0, 1, 'C');
$pdf->Cell(9);
$pdf->Cell(493, -51, $row['pricing'], 0, 1, 'C');

$pdf->Line(18, 98, 279, 98);

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(9);
$pdf->Cell(170, 81, '', 0, 1, 'L');
$pdf->Cell(10);
$pdf->Cell(170, -81, 'Subtotal', 0, 1, 'C');
$pdf->Cell(10);
$pdf->Cell(300, 81, '', 0, 1, 'C');
$pdf->Cell(10);
$pdf->Cell(493, -81, $row['pricing'], 0, 1, 'C');

$total = $row['pricing'] * $row['rentlong'];

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(9);
$pdf->Cell(170, 101, '', 0, 1, 'L');
$pdf->Cell(10);
$pdf->Cell(200, -101, 'Amount To be Paid TZS', 0, 1, 'C');
$pdf->Cell(10);
$pdf->Cell(300, 101, '', 0, 1, 'C');
$pdf->Cell(10);

if ($row['mode'] == 'rent') {

	$pdf->Cell(493, -101, $total, 0, 1, 'C');
} else {
	$pdf->Cell(493, -101, $row['pricing'], 0, 1, 'C');
}


$pdf->Ln(120);
$pdf->Cell(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(200, -10, 'please contant' . ' ' . $row['phone_number'] . ' ' . 'for more concerns', 0, 1, 'L');
$pdf->Cell(10);
$pdf->Cell(200, -10, 'An Invoice payment is due within 10 days', 0, 1, 'L');
$pdf->Cell(10);
$pdf->SetFont('Arial', 'B', 17);
$pdf->Cell(200, -10, 'Terms & conditions', 0, 1, 'L');
$pdf->Cell(10);



$pdf->Output();
