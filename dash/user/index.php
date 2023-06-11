<?php

session_start();
if (isset($_SESSION['phone'])) {
    # code...



    $nom = $_SESSION['phone'];
    require_once('./config.php');
    $con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');

    $tom = "SELECT * from admins where phone_number=$nom";
    $exc = mysqli_query($con, $tom);
    $row2 = mysqli_fetch_assoc($exc);


    $ownerid = $_GET['ownerid'];
    $houseid = $_GET['houseid'];
    $_SESSION['ownerid'] = $ownerid;
    $_SESSION['houseid'] = $houseid;



    $query = "SELECT housemst.id,housemst.region,housemst.rentlong,housemst.house_type,housemst.payment_mode,housemst.mode,housemst.street,housemst.payment_mode,housemst.pricing,
housemst.currency,housemst.owner_id,admins.first_name,admins.middle_name,admins.last_name,admins.email,admins.phone_number,
admins.role FROM `housemst` INNER JOIN admins ON housemst.owner_id=admins.id WHERE housemst.id='$houseid';";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $total = $row['pricing'] * $row['rentlong'];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS pay</title>
    </head>

    <style>
        body {
            background-color: black;
        }
    </style>

    <body>
        <form action="./payments lists.php" method="POST">
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key=<?php echo $api_key_id ?> data-amount="<?php if ($row['mode'] == 'rent') {
                                                                                                                            echo $total * 100 * 0.034;
                                                                                                                        }
                                                                                                                        if ($row['mode'] == 'sell') {
                                                                                                                            echo $row['pricing'] * 100 * 0.034;
                                                                                                                        }  ?>" data-currency="INR" data-buttontext="Pay with Razorpay" data-name="TMS" data-description="Tenants Management System" data-image="https://example.com/tms2.png" data-prefill.name="<?php echo $row2['first_name'] ?>" data-prefill.email=" <?php echo $row2['email'] ?>" data-prefill.contact="<?php echo $row['phone_number']; ?>" data-theme.color="#000000"></script>
            <input type="hidden" custom="Hidden Element" name="hidden">
        </form>
    </body>

    </html>

<?php
} else {
    header('location:../index.php');
}
?>