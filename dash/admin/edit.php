<?php

ini_set('display_errors',1);


$con = mysqli_connect('localhost','root','','canine') or die('connection failed');
ini_set("display_errors",1);
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$baba = $_GET['id'];
$query = "SELECT * FROM admins where id = '$baba'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);


if(isset($_POST['btn_role'])){
    $role = $_POST['role'];

    $query="update admins set role='$role' where id='$baba'"; 
    $exc = mysqli_query($con,$query);
    header('location:admin.php');



}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <form action="" method="post">



    <style>
        body{
            background-color: black;
        }
        div{
            margin: 350px auto;
            padding-left: 600px;
            
        }
    </style>
    <div>
    <input name="role" value="<?php echo $row['role']; ?>"  type="text">
<button type="submit" name="btn_role" class="btn btn-success" >save changes</button>
</div>
    </form>


</body>
</html>

	
	

