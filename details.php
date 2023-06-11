<?php


$con = mysqli_connect('localhost', 'root', '', 'canine') or die('connection failed');
$errors = array();
$lgerrors = array();

if (isset($_POST['btn-sign'])) {
	$fn = $_POST['firstname'];
	$mn = $_POST['middlename'];
	$ln = $_POST['lastname'];
	$em = $_POST['email'];
	$phn = $_POST['phone'];
	$sex = $_POST['sex'];
	$pass = $_POST['password'];
	$cpass = $_POST['cpassword'];
	$role = $_POST['role'];


	$exist = "SELECT * FROM admins where phone_number='$phn'";
	$exc = mysqli_query($con, $exist);
	if (mysqli_num_rows($exc) > 0) {
		array_push($errors, "Credentials exist!!!");
	}



	if (empty($fn)) {
		array_push($errors, "first_name Required!!!");
	}
	if (empty($mn)) {
		array_push($errors, "middle_name Required!!!");
	}
	if (empty($ln)) {
		array_push($errors, "last_name Required!!!");
	}

	if (empty($phn)) {
		array_push($errors, "phone Required!!!");
	}
	if (empty($sex)) {
		array_push($errors, "sex Required!!!");
	}
	if (empty($pass)) {
		array_push($errors, "password Required!!!");
	}
	if ($pass !== $cpass) {
		array_push($errors, "password doesnt match!!");
	}

	if (strlen($pass) <= '6') {
		array_push($errors, "Your Password Must Contain At Least 8 Characters!");
	}

	if (!preg_match("#[0-9]+#", $pass)) {
		array_push($errors, "Your Password Must Contain At Least 1 Number!");
	}
	if (!preg_match("#[A-Z]+#", $pass)) {
		array_push($errors,  "Your Password Must Contain At Least 1 Capital Letter!");
	}
	if (!preg_match("#[a-z]+#", $pass)) {
		array_push($errors, "Your Password Must Contain At Least 1 Lowercase Letter!");
	}



	if (empty($errors)) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$query = "insert into admins(first_name,middle_name,last_name,email,phone_number,sex,password,role) values ('$fn','$mn','$ln','$em','$phn','$sex','$pass','$role')";
		if (mysqli_query($con, $query)) {
		} else {
			echo "Registration Failed!!";
		}
	}
}

// login


session_start();
$con = mysqli_connect('localhost', 'root', '', 'canine');


if (isset($_POST['btn-login'])) {
	$phn = $_POST['phone'];
	$pass = $_POST['password'];
	if (empty($phn)) {
		array_push($lgerrors, "Phone Required!!!");
	}
	if (empty($pass)) {
		array_push($lgerrors, "Password Required!!!");
	}





	$query = "SELECT * FROM admins where phone_number= '$phn'";
	$exc = mysqli_query($con, $query);

	if (mysqli_num_rows($exc) > 0) {
		$result = mysqli_fetch_assoc($exc);
		if (password_verify($pass, $result['password'])) {
			$_SESSION['phone'] = $phn;
			$_SESSION['id'] = $result['id'];
			if ($result['role'] == 1) {
				header("location:./dash/index.php");
			} else {
				$mama = $_GET['houseid'];
				$owner = $_GET['ownerid'];
				$user = $_SESSION['id'];
				$query = "SELECT * from rentmst INNER JOIN housemst ON rentmst.house_id = housemst.id where rentmst.house_id=$mama and rentmst.user_id=$user";
				$result = mysqli_query($con, $query);
				$row1 = mysqli_fetch_assoc($result);

				if (!isset($row1) and $row1['sold_or_rented'] == 0) { ?>
					<section class="container">

						<div style="text-align: center;">

							<button class="btn btn-transparent smooth-scroll"><a href="./dash/user/rent.php?houseid=<?php echo $_GET['houseid'] ?>&ownerid=<?php echo $_GET['ownerid'] ?>">Add This Property</a></button>
						</div>
					</section>
					<?php
				} elseif ($row1['user_id'] = $user) {
					if ($row1['sold_or_rented'] == 0) { ?>
						<section class="container">

							<div style="text-align: center;">

								<button class="btn btn-transparent smooth-scroll"><a href="./dash/user/user_dash.php?houseid=<?php echo $_GET['houseid'] ?>&ownerid=<?php echo $_GET['ownerid'] ?>">Proceed</a></button>
							</div>
						</section>
					<?php }
					if ($row1['user_id'] == $user and $row1['sold_or_rented'] != 0) { ?>
						<section class="container">

							<div style="text-align: center;">

								<p>occupied By You <a href="./dash/user/user_dash.php?houseid=<?php echo $row1['house_id'] ?>&ownerid=<?php echo $row1['owner_id'] ?>"> click to proceed</a></p>
							</div>
						</section>

			<?php	}
				}
			} ?>
<?php
		}
	} else {
		array_push($lgerrors, 'Invalid Credentials!!');
	}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>


	<meta charset="utf-8">
	<title>Canine management system</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="canine-management-system">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="">
	<meta name="generator" content="">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

	<link rel="stylesheet" href="plugins/themefisher-font/style.css">
	<link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/animate-css/animate.css">
	<link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick-theme.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./login/login.css">
	<script src="./js/jquery.js"></script>



</head>

<body id="home" data-spy="scroll" data-target=".navbar-nav" data-offset="80">

	<div class="preloader">
		<div class="sk-cube-grid">
			<div class="sk-cube sk-cube1"></div>
			<div class="sk-cube sk-cube2"></div>
			<div class="sk-cube sk-cube3"></div>
			<div class="sk-cube sk-cube4"></div>
			<div class="sk-cube sk-cube5"></div>
			<div class="sk-cube sk-cube6"></div>
			<div class="sk-cube sk-cube7"></div>
			<div class="sk-cube sk-cube8"></div>
			<div class="sk-cube sk-cube9"></div>
		</div>
	</div>

	<?php
	$mama = $_GET['houseid'];
	$query = "SELECT * FROM housemst where id = '$mama'";
	$result = mysqli_query($con, $query);


	while ($row = mysqli_fetch_assoc($result)) {

	?>

		<section class="hero-area overlay" style="background-image: url(./dash/photos/<?php echo $row['images']; ?>" ;>
			<?php
			if ($row['sold_or_rented'] == 2) {
			?>


				<div class="card bg-light">
					<h1 style="font-weight:bolder ; font-family:Verdana, Geneva, Tahoma, sans-serif; color:red; font-size:85px"> RENTED FOR <?php echo $row['rentlong']; ?> MONTHS</h1>
				</div>
				<div class="card">
					<h1 style="font-weight:bolder ; font-family: Verdana, Geneva, Tahoma, sans-serif; color:red; font-size:85px"><strong> <?php echo $row['from_date']; ?> TO <?php echo $row['to_date']; ?></strong></h1>
				</div>
			<?php
			}
			if ($row['sold_or_rented'] == 1) {
			?>


				<div class="card bg-light">
					<h1 style="font-weight:bolder ; font-family:Verdana, Geneva, Tahoma, sans-serif; color:red; font-size:85px"> SOLD OUT </h1>
				</div>

			<?php
			}

			?>
		</section>

	<?php

	};
	?>

	<header id="navigation" class="navigation">
		<div class="container">
			<div class="navbar-header w-100">
				<nav class="navbar navbar-expand-lg navbar-dark px-0">
					<a class="navbar-brand logo" href="index.html">
					</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbar01">
						<ul class="navbar-nav navigation-menu ml-auto">


							<?php
							$mama = $_GET['houseid'];
							$query = "SELECT * FROM housemst where id = '$mama'";
							$result = mysqli_query($con, $query);
							while ($row2 = mysqli_fetch_assoc($result)) {

							?>

								<?php
								if ($row2['sold_or_rented'] == 0) {
								?>
									<li class="nav-item">
										<a class="nav-link" href="#myModal" data-toggle="modal">Account</a>
									</li>
								<?php } else {
								?>
									<li class="nav-item">
										<span class="nav-link" style="color:red ;">Sorry the dog is taken click Home to view another one >></span>
									</li>
								<?php

								}

								?>



							<?php } ?>
							<li class="nav-item">
								<a class="nav-link" href="index.php">Home</a>
							</li>


							<div id="myModal" class="modal fade" data-backdrop="false">
								<div class="modal-dialog modal-login">
									<div class="modal-content">
										<div class="modal-header">

											<h4 class="modal-title">Login </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body modal-content">
											<form action="" method="post">

												<?php
												if (!empty($lgerrors)) {
												?>
													<div class="alert alert-danger">
														<?php

														foreach ($lgerrors as $error) {
															echo $error . "<br>";
														} ?></div>

												<?php
												}
												?>



												<div class="form-group">
													<input type="text" class="form-control " name="phone" placeholder="phone number" required>
												</div>
												<div class="form-group">
													<input type="password" id="myInput2" class="form-control " name="password" placeholder="Password" required>
												</div>
												<input type="checkbox" onclick="myFunction2()"> show password </input> <br>
												<script>
													function myFunction2() {
														var x = document.getElementById("myInput2");
														if (x.type === "password") {
															x.type = "text";
														} else {
															x.type = "password";
														}
													}
												</script>
												<div class="form-group">
													<button type="submit" id="btnsign" class="btn btn-primary btn-lg btn-block login-btn" name="btn-login">Login</button>
												</div>
												<div class="form-group">
													<a href="#createaccount" data-toggle="modal" id="account">Create Account</a>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<a href="#">Forgot Password?</a>
										</div>
									</div>
								</div>
							</div>

							<!-- Modal register HTML -->
							<div id="createaccount" class="modal create fade" data-backdrop="false">
								<div class="modal-dialog modal-login">
									<div class="modal-content">
										<div class="modal-header">

											<h4 class="modal-title">SignUp </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
											<form action="" method="POST">
												<?php
												if (!empty($errors)) {
												?>
													<div class="alert alert-danger">
													<?php

													foreach ($errors as $error) {
														echo $error . "<br>";
													}
												}
													?>
													</div>

													<div class="form-group">
														<input type="text" pattern="[A-Za-z]{3,}" title="should have atleast 3 letters and letters only without spaces" class="form-control color" name="firstname" placeholder="First name" required>
													</div>
													<div class="form-group">
														<input type="text" pattern="[A-Za-z]{3,}" title="should have atleast 3 letters and letters only without spaces" class="form-control color" name="middlename" placeholder="Middle name" required>
													</div>
													<div class="form-group">
														<input type="text" pattern="[A-Za-z]{3,}" title="should have atleast 3 letters and letters only without spaces" class="form-control color" name="lastname" placeholder="Last name" required>
													</div>
													<div class="form-group">
														<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control color" name="email" placeholder="Email address *Optional">
													</div>
													<div class="form-group">
														<input type="tel" pattern="[0-9]{10}" title="should be numbers and 10 digit long without space" class="form-control color" name="phone" placeholder="Phone Number" required>
													</div>
													<div class="form-group">
														<input type="sex" class="form-control color" name="sex *male or female" placeholder="sex">
													</div>
													<div class="form-group">
														<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control color" name="password" placeholder="password" required>
													</div>
													<div class="form-group">
														<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" id="myInput3" class="form-control color" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="confirm password" required><br>
														<input type="checkbox" onclick="myFunction3()"> show password</input> <br>
													</div>

													<script>
														function myFunction3() {
															var x = document.getElementById("myInput3");
															if (x.type === "password") {
																x.type = "text";
															} else {
																x.type = "password";
															}
														}
													</script>



													<div class="form-check">
														<input class="form-check-input" type="radio" name="role" value="1" id="flexRadioDefault3">
														<label class="form-check-label" for="flexRadioDefault3">
															dog_specialist
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="role" value="0" id="flexRadioDefault4" checked>
														<label class="form-check-label" for="flexRadioDefault4">
															dogophiles
														</label>
													</div>



													<br>
													<div class="form-group">
														<button type="submit" class="btn btn-primary btn-lg btn-block login-btn" name="btn-sign">SignUp</button>
													</div>

											</form>
										</div>

									</div>
								</div>
							</div>
					</div>

			</div>









		</div>
		</ul>
		</div>
		</nav>
		</div>
		</div>
	</header>


	<section class="bg-one about section">
		<div class="container">
			<div class="row">

				<div class="col-12">

					<div class="title text-center wow fadeIn" data-wow-duration="1500ms">
						<h2>owner <span class="color">Details</span> </h2>
						<div class="border"> <br>
							<?php
							$id = $_GET['ownerid'];
							$query = "SELECT * FROM admins where id = '$id'";
							$result = mysqli_query($con, $query);


							while ($owner = mysqli_fetch_assoc($result)) {
							?>
								<div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Name : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $owner['first_name']; ?> </span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Sex : </span> <span style="color: tomato; font-family:Verdana, Geneva, Tahoma, sans-serif;"> Login to see this information </span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Street : </span> <span style="color: tomato; font-family:Verdana, Geneva, Tahoma, sans-serif;"> Login to see this information </span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Phone : </span> <span style="color: tomato; font-family:Verdana, Geneva, Tahoma, sans-serif;"> Login to see this information </span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Email : </span> <span style="color: tomato; font-family:Verdana, Geneva, Tahoma, sans-serif;"> Login to see this information </span>

								</div>

							<?php

							}
							?>
						</div>
					</div>

				</div>


			</div>
		</div>

	</section>



	<?php
	$mama = $_GET['houseid'];
	$query = "SELECT * FROM housemst where id = '$mama'";
	$result = mysqli_query($con, $query);


	while ($row = mysqli_fetch_assoc($result)) {

	?>
		<section class="bg-one about section">
			<div class="container">
				<div class="row">

					<div class="col-12">

						<div class="title text-center wow fadeIn" data-wow-duration="1500ms">
							<h2>The <span class="color">Dog</span> </h2>
							<div class="border"> <br>

								<div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">

									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Breed Type : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['region']; ?></span> <br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Owner_Center : </span> <span style="color: tomato; font-family:Verdana, Geneva, Tahoma, sans-serif;">Login to see this information</span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Dog's Name :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['settlement']; ?> </span> <br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Dog's Origin :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['topography']; ?></span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Dog's Date Of Birth :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['weather']; ?></span> <br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Dog's Age :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['noise']; ?></span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Dog's Gender :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['network']; ?></span> <br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Dog's Color :</span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['security']; ?></span><br>


								</div>
							</div>
						</div>

					</div>



				</div>
			</div>
		</section>
	<?php

	};
	?>

<!--
	<?php
	$mama = $_GET['houseid'];
	$query = "SELECT * FROM housemst where id = '$mama'";
	$result = mysqli_query($con, $query);


	while ($row = mysqli_fetch_assoc($result)) {

	?>
		<section class="bg-one about section">
			<div class="container">
				<div class="row">

					<div class="col-12">

						<div class="title text-center wow fadeIn" data-wow-duration="1500ms">
							<h2>Distinguished<span class="color">Features</span> </h2>
							<div class="border"> <br>

								<div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Breed Type : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo $row['house_type']; ?></span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">: </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['number_of_bedroom']; ?> </span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan"> : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['number_of_bathroom']; ?> </span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan"> : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['number_of_people']; ?> </span><br>


								</div>
							</div>
						</div>

					</div>


				</div>
			</div>
		</section>
	<?php

	};
	?>

-->


	<?php
	$kaka = $_GET['houseid'];
	$query = "SELECT * FROM housemst where id = '$kaka'";
	$result = mysqli_query($con, $query);


	while ($row = mysqli_fetch_assoc($result)) {

	?>
		<section class="bg-one about section">
			<div class="container">
				<div class="row">

					<div class="col-12">

						<div class="title text-center wow fadeIn" data-wow-duration="1500ms">
							<h2>The<span class="color">Price</span> </h2>
							<div class="border"> <br>

								<div style="color: white;" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="text-left">
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Cost Per 1 Dog :</span><span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><?php echo $row['payment_mode']; ?> </span><br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">Warrant : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo  $row['pricing']; ?></span> <br>
									<span style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif; color:cyan">current accepted currency : </span> <span style="font-family:Verdana, Geneva, Tahoma, sans-serif;"> <?php echo $row['currency']; ?></span> <br>


								</div>
							</div>
						</div>

					</div>


				</div>
			</div>
		</section>
	<?php

	};
	?>



	<section id="testimonial" class="testimonial overly section bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<div id="testimonials" class="wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">


						<div class="item text-center">


							<div class="client-thumb">
								<img src="images/team/cos.png" class="img-fluid" alt="Meghna">
							</div>

							<div class="client-info">
								<div class="client-meta">
									<h3>Silvia Cosmas</h3>
									<span>january 18, 2023</span>
								</div>
								<div class="client-comment">
									<p>Natural Ability and Strong Will, and intense Has Propelled Silvia Cosmas Forward To This Point In Her Career. While She Has Achieved so much more, There is still a great Deal She wants to Accomplish In the World Of Programming. </p>
								</div>
							</div>

						</div>



					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="contact-us" class="contact-us section-bg">
		<div class="container">
			<div class="row">





			</div>
		</div>

	</section>
	<footer id="footer" class="bg-one">
		<div class="container">
			<div class="row wow fadeInUp" data-wow-duration="500ms">
				<div class="col-lg-12">




					<div class="copyright text-center">
						<a href="index.html">

						</a>

						<p class="mt-3">Copyright
							&copy; <script>
								document.write(new Date().getFullYear())
							</script>. All Rights Reserved. <br> Designed &amp; Developed by <a href="h#">Silvia Cosmas</a>.</p>
					</div>


				</div>
			</div>
		</div>
	</footer>

	<?php
	if (!empty($errors)) { ?>
		<script>
			$(document).ready(function() {
				$("#createaccount").modal('show');
			});
		</script>

	<?php

	}
	?>

	<?php
	if (!empty($lgerrors)) { ?>
		<script>
			$(document).ready(function() {
				$("#myModal").modal('show');
			});
		</script>

	<?php

	}
	?>

	<script>
		$('.modal-content').find('#account').on('click', function() {
			$(this).parents('#myModal').hide();
		});
	</script>

	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/bootstrap.min.js"></script>
	<script src="plugins/slick-carousel/slick.min.js"></script>
	<script src="plugins/filterzr/jquery.filterizr.min.js"></script>
	<script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
	<script src="plugins/google-map/gmap.js"></script>
	<script src="plugins/wow/wow.min.js"></script>
	<script src="js/script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>