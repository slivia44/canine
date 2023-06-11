<?php
$errors = array();
$houseid = $_GET['id'];
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
if (isset($_GET['confirm-btn'])) {

    $number = $_GET['phone-identity'];
    $house = $_GET['housename'];
    $query = "SELECT * FROM admins where phone_number = '$number'";

    $exc = mysqli_query($con, $query);
    $mama = mysqli_fetch_assoc($exc);
    if (empty($number)) {
        array_push($errors, "input can not be empty!!!");
    }

    if ($mama['phone_number'] != $number) {
        array_push($errors, "number does not exist!!!");
    } else {

        if ($exc) {



            header('location:rented.php?userid=' . $mama['id'] . '&houseid=' . $house . '&fromdate=' . $fromdate . '&todate=' . $todate);
        } else {
            array_push($errors, "failed !!!");
        }
    }
}


?>




<link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/lib/helper.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">

<?php
if (count($errors) > 0) {
    foreach ($errors as $error) {
?>

        <span class="text-danger"><?php echo $error ?> </span>

<?php

    }
}

?>

<style>
    div {
        margin: 250px auto;
    }

    body {
        background-color: black;
    }
</style>

<form method="" class="form-group row">

    <div class="col-md-4">
        <p for="phone">Rented to </p>
        <input required name="phone-identity" type="text" class="form-control" id="phone_number" placeholder="phone number">
        <p for="fromdate">From date </p>
        <input required name="fromdate" type="date" class="form-control" id="fromdate" placeholder="27-08-2022">
        <p for="todate">To date </p>
        <input required name="todate" type="date" class="form-control" id="todate" placeholder="27-11-2022"> <br>



        <input name='housename' value="<?php echo $houseid; ?> <?php echo $fromdate; ?> <?php echo $todate; ?>" type="text" hidden><br>
        <button type="submit" name="confirm-btn" class="btn btn-primary mb-2">Confirm identity</button>
    </div>


</form>