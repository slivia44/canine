<?php
require 'news.php';
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
	if (strlen($phn) <= '9') {
		array_push($errors, "Your phone number is not Valid!");
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
ini_set('display_errors', 1);
$con = mysqli_connect('localhost', 'root', '', 'canine');


if (isset($_POST['btn-login'])) {



	$phn = $_POST['phone'];
	$pass = $_POST['password'];
	if (empty($phn)) {
		array_push($lgerrors, "Phone Required!!!");
	}
	if (empty($pass)) {
		array_push($lgerrors, "Password Required!!!");
	} else {
		array_push($lgerrors, "User do not Exit!!!");
	}


	$query = "SELECT * FROM admins where phone_number= '$phn'";
	$exc = mysqli_query($con, $query);

	if (mysqli_num_rows($exc) > 0) {
		$result = mysqli_fetch_assoc($exc);
		if (password_verify($pass, $result['password'])) {


			$_SESSION['phone'] = $phn;

			$_SESSION['id'] = $result['id'];


			if ($result['role'] == 1) {
				$_SESSION['user_name'] = $phn;
				header("location:./dash/index.php");
			} elseif ($result['role'] == 2) {
				$_SESSION['user_name'] = $phn;

				header("location:./dash/admin/admin.php");
			} else {

				header("location:./dash/user/user_dash.php");
			}
		} else {
			array_push($lgerrors, 'Invalid Cresedentials!!');
		}
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
	<link rel="shortcut icon" type="image/x-icon" href="/images/logo.png" />
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


	<section class="hero-area overlay" style="background-image: url('images/banner/newback.jpeg');">

		<div class="block">

			<h1>CMS</h1>
			<p>A better Place For Your Dream Dog</p>
			<a href="#portfolio" class="btn btn-transparent smooth-scroll">Explore Us</a>
		</div>
	</section>


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
							<li class="nav-item">
								<a class="nav-link" href="#home">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#about">About</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#portfolio">Dogs And Services</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="#blog">Popular Dogs</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#contact-us">Contact</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#myModal" data-toggle="modal">Account</a>
							</li>


							<!-- Modal login HTML -->
							<div id="myModal" class="modal fade" data-backdrop="false">
								<div class="modal-dialog modal-login">
									<div class="modal-content">
										<div class="modal-header">

											<h4 class="modal-title">Login </h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body modal-content">
											<form action="" method="post">

												<!-- login errors	start	 -->
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


												<!-- login errors	end	 -->
												<div class="form-group">
													<input type="text" class="form-control " name="phone" placeholder="phone number" required>
												</div>
												<div class="form-group">
													<input type="password" id="myInput2" class="form-control " name="password" placeholder="Password" required>
												</div>
												<input type="checkbox" onclick="myFunction2()"> show password</input> <br>
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
												<input type="sex" class="form-control color" name="sex" placeholder=" sex *male or female" required>
											</div>
											<div class="form-group">
												<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control color" name="password" placeholder="password" required>




												<script>
													function myFunction() {
														var x = document.getElementById("myInput");
														if (x.type === "password") {
															x.type = "text";
														} else {
															x.type = "password";
														}
													}
												</script>
												

											</div>
											<div class="form-group">
												<input type="password" id="myInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control color" name="cpassword" placeholder="confirm password" required><br>
												<input type="checkbox" onclick="myFunction()"> show password</input> <br>
											</div>
											


											
											<div class="form-check">
												<input class="form-check-input" type="radio" name="role" value="1" id="flexRadioDefault3" checked>
												<label class="form-check-label" for="flexRadioDefault3">
													dog_owner
												</label>
											</div>

											

											<div class="form-check">
												<input class="form-check-input" type="radio" name="role" value="1" id="flexRadioDefault3" checked>
												<label class="form-check-label" for="flexRadioDefault3">
													Veterinarian
												</label>
											</div>


											<div class="form-check">
												<input class="form-check-input" type="radio" name="role" value="1" id="flexRadioDefault3" checked>
												<label class="form-check-label" for="flexRadioDefault3">
													Trainer
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="role" value="0" id="flexRadioDefault4">
												<label class="form-check-label" for="flexRadioDefault4">
													Dogophiles
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
					</ul>
			</div>
			</nav>
		</div>
		</div>
	</header>

	<section id="blog" class="section">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div class="title text-center wow fadeInDown">
						<h2> Popular <span class="color">Dogs</span></h2>
						<div class="border"></div>
					</div>

				</div>


				<?php

				$query = "SELECT housemst.images,housemst.street,housemst.sold_or_rented,rentmst.user_id,rentmst.house_id,rentmst.id,rentmst.owner_id,housemst.street,housemst.pricing,housemst.region,housemst.description FROM `rentmst` INNER JOIN housemst ON rentmst.house_id=housemst.id";
				$result = mysqli_query($con, $query);;

				while ($row = mysqli_fetch_assoc($result)) {
				?>



					<article class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
						<div class="post-block">
							<div id="gallery-post" class="media-wrapper">
								<div class="item">

									<img src="./dash/photos/<?php echo $row['images']; ?>" alt="" width="417px" height="278px" class="img-fluid">
								</div>
								<div class="item">
									<img src="./dash/photos/<?php echo $row['images']; ?>" alt="" width="417px" height="278px" class="img-fluid">
								</div>
								<div class="item">
									<img src="./dash/photos/<?php echo $row['images']; ?>" alt="" width="417px" height="278px" class="img-fluid">

								</div>
							</div>

							<div class="content">
								<p> <a href="details.php?rentid=<?php echo $row['id'] ?>&ownerid=<?php echo $row['owner_id'] ?>&houseid=<?php echo $row['house_id'] ?>"> Read more</a></p>

								<h4><a href=""><?php echo $row['street']; ?>, <?php echo $row['region']; ?></a></h4>
								<p class="mb-0"><?php echo $row['description']; ?></p>

							</div>
						</div>
					</article>


				<?php } ?>




			</div>
		</div>
	</section>




	<section class="portfolio section" id="portfolio">
		<div class="container">
			<div class="row ">
				<div class="col-lg-12">

					<div class="title text-center">
						<h2>Our <span class="color">Dogs And Services</span></h2>
						<div class="border"></div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portfolio-filter">
						<button class="active" type="button" data-filter="all">All</button>
						<button type="button" data-filter="rent">service List</button>
						<button type="button" data-filter="sell">Sell List</button>
					</div>
				</div>
			</div>

			<div class="row mx-auto filtr-container">
				<?php
				$query = "SELECT * FROM housemst";
				$result = mysqli_query($con, $query);;

				while ($row = mysqli_fetch_assoc($result)) {
				?>



					<div class="filtr-item col-lg-4 col-md-6" data-category="<?php echo $row['mode']; ?>">
						<div class="portfolio-block">
							<img src="./dash/photos/<?php echo $row['images']; ?>" width="400px" height="1000px">
							<?php
							if ($row['sold_or_rented'] == 1) {
							?>

								<img class="card-img-overlay" src="./soldofficial.png" alt="" width="20px" height="5px" srcset="">

							<?php
							};
							?>

							<?php
							if ($row['sold_or_rented'] == 2) {
							?>

								<img class="card-img-overlay" src="./rentedofficial.png" alt="" width="20px" height="5px" srcset="">

							<?php
							};
							?>



							<div class="caption">
								<a class="search-icon" data-effect="mfp-with-zoom" href="details.php?houseid=<?php echo $row['id'] ?>&ownerid=<?php echo $row['owner_id'] ?>" data-lightbox="image-1">
									<i class="tf-ion-android-search"></i>
								</a>
								<h4><a href=""><?php echo $row['street']; ?>, <?php echo $row['region']; ?></a></h4>
								<p class="mb-0"><?php echo $row['description']; ?></p>
							</div>
						</div>
					</div>

				<?php } ?>
			</div>

		</div>
	</section>


	<section class="bg-one about section" id="about">
		<div class="container">
			<div class="row">

				<div class="col-12">

					<div class="title text-center wow fadeIn" data-wow-duration="1500ms">
						<h2>About <span class="color">Us</span> </h2>
						<div class="border"></div>
					</div>

				</div>

				<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms">
					<div class="block">
						<div class="icon-box">
							<i class="tf-tools"></i>
						</div>

						<div class="content text-center">
							<h3 class="ddd">We're Creative</h3>
							<p>Get every Best Dog of your desire right now, Right There, any Place you Want, We Give The Best Dogs</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms">
					<div class="block">
						<div class="icon-box">
							<ion-icon name="thumbs-up-outline"></ion-icon>
						</div>

						<div class="content text-center">
							<h3>We're Professional</h3>
							<p>There Is No Time To Struggle its Just One Click and Scrolling You Get The Dog. No Time To Roam Around</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
					<div class="block kill-margin-bottom">
						<div class="icon-box">
							<ion-icon name="logo-usd"></ion-icon>
						</div>

						<div class="content text-center">
							<h3>Best Price</h3>
							<p>No auctioneers. You Love The dog You directly Check the owner And Pay.You need a service you just choose a dog specialist according to your needs and Negotiate. We offer The Best We Can
							</p>
						</div>
					</div>
				</div>


			</div>
		</div>
	</section>


	<section id="counter" class="parallax-section dg-1 section overly">
		<div class="container">
			<div class="row">

				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms">
					<div class="counters-item">
						<i class="tf-ion-android-happy"></i>
						<span class="jsCounter" data-count="320">0</span>
						<h3>Happy Clients</h3>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="200ms">
					<div class="counters-item">
						<i class="tf-ion-archive"></i>
						<span class="jsCounter" data-count="565">0</span>
						<h3>works completed</h3>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="400ms">
					<div class="counters-item">
						<i class="tf-ion-thumbsup"></i>
						<span class="jsCounter" data-count="300">0</span>
						<h3>Positive feedback</h3>

					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
					<div class="counters-item kill-margin-bottom">
						<i class="tf-ion-coffee"></i>
						<span class="jsCounter" data-count="2500">0</span>
						<h3>Cups of Coffee</h3>
					</div>
				</div>


			</div>
		</div>
	</section>






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

				<div class="col-12">

					<div class="title text-center wow fadeIn" data-wow-duration="500ms">
						<h2>Get In <span class="color">Touch</span></h2>
						<div class="border"></div>
					</div>

				</div>


				<div class="contact-info col-lg-6 wow fadeInUp" data-wow-duration="500ms">
					<h3>Contact Details</h3>
					<p>Get every Best Dog of your desire right now, Right There, any Place you Want, We Give The Best Dogs </p>
					<div class="contact-details">
						<div class="con-info clearfix">
							<i class="tf-map-pin"></i>
							<span>Arusha Technical College, Arusha</span>
						</div>

						<div class="con-info clearfix">
							<i class="tf-ion-ios-telephone-outline"></i>
							<span>Phone: +255746483465</span>
						</div>


						<div class="con-info clearfix">
							<i class="tf-ion-ios-email-outline"></i>
							<span>Email: silviacosmas@gmail.com</span>
						</div>
					</div>
				</div>

				<div class="contact-form col-lg-6 mt-4 mt-lg-0 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
					<form id="contact-form" method="post" action="" role="form">

						<?php
						$Msg = "";
						if (isset($_GET['errorz'])) {
							$Msg = "please fill in the blanks";
							echo '<p class =" alert alert-danger">' . $Msg . '<p>';
						}


						?>
						<?php
						if (isset($_GET['success'])) {
							$Msg = "sent successfully";
							echo '<p class =" alert alert-success">' . $Msg . '<p>';
						}


						?>
						<div class="form-group">
							<input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
						</div>

						<div class="form-group">
							<input type="email" placeholder="Your Email" class="form-control" name="email" id="email">
						</div>

						<div class="form-group">
							<input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
						</div>

						<div class="form-group">
							<textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>
						</div>

						<div>
							<input type="submit" id="contact-submit" class="btn btn-transparent" name="email_btn">
						</div>

					</form>
				</div>

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
	<script src="plugins/wow/wow.min.js"></script>
	<script src="js/script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>