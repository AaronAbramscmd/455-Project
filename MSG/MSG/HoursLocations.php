<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hours and Locations | MSG Paintball</title>
	<link rel="icon" type="Image/png" href="Image/Logo2.gif">
	<link rel="stylesheet" href="CSS/Nav.css">
	<link rel="stylesheet" href="CSS/HomePage.css">

	<style>
		.wrap {
			max-width: 800px;
			margin: 40px auto;
			background-color: #222222;
			padding: 30px;
			border-radius: 8px;
			border-top: 5px solid #d00000;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
		}

		h1 {
			text-align: center;
			color: #d00000;
			font-size: 36px;
			margin-bottom: 5px;
			padding: 0;
		}

		h2 {
			text-align: center;
			color: white;
			font-size: 24px;
			border-bottom: 1px solid #333;
			padding-bottom: 10px;
			margin-top: 30px;
		}

		h3 {
			text-align: center;
			color: #ff3333;
			font-size: 20px;
			margin-top: 25px;
		}

		h4 {
			text-align: center;
			color: #ccc;
			margin: 5px 0;
			font-weight: normal;
		}

		p {
			color: white;
			text-align: center;
		}

		.btn {
			display: inline-block;
			padding: 12px 25px;
			background-color: #d00000;
			color: white;
			text-decoration: none;
			border-radius: 5px;
			font-weight: bold;
			font-size: 16px;
		}

		.btn:hover {
			background-color: #ff3333;
		}
	</style>
</head>
<body>

	<header>
		<nav>
			<ul>
				<li>
					<a href="MSG_HomePage.php"> 
						<img src="Image/Logo2.gif" alt="logo" width="150" height="150">
					</a>
				</li>
				<li> <a href="MSG_HomePage.php">Home</a> </li>
				<li> <a href="HoursLocations.php">Hours/Locations</a> </li>
				<li> <a href="FieldPage.php">Paintball Field</a> </li>
				<li> <a href="PricesPage.php">Prices</a> </li>
				<li> <a href="PBirthdayPage.php">Paintball Birthday Parties</a> </li>
				<li> <a href="ABirthdayPage.php">Airsoft Birthday Parties</a> </li>
				<li> <a href="GellPage.php">Gell Ball Parties</a> </li>
				<li> <a href="FAQPage.php">FAQ</a> </li>
				<li> <a href="ContactPage.php">Contact</a> </li>
				<li> <a href="Reviews.php">Reviews</a> </li>
				<li> <a href="https://montgomery-sporting-goods-paintball.myshopify.com/"> Online Store</a></li>
			</ul>
		</nav>
	</header>

	<div class="wrap">
		<h1>Our Hours and Locations</h1>
		<p>Find out when we are open and where to find us!</p>

		<h2>Pro-Shop Location</h2>
		<h4>(This is NOT the Paintball Field)</h4>
		<h4 style="color: #ff3333;">Adress: 1934 Route 211 East Middletown, NY 10941</h4>
		<h4>Phone number: 845-457-4678</h4>

		<h3>Pro-Shop Hours</h3>
		<h4>Monday: 11:00am - 5:00pm</h4>
		<h4>Tuesday: 11:00am - 5:00pm</h4>
		<h4>Wednesday: 11:00am - 5:00pm</h4>
		<h4>Thursday: 11:00am - 5:00pm</h4>
		<h4>Friday: 11:00am - 5:00pm</h4>
		<h4>Saturday: 9:00am - 5:00pm</h4>
		<h4>Sunday: 9:00am - 5:00pm</h4>

		<hr style="border: 1px solid #333; margin: 40px 0;">

		<h2>Paintball Field Location</h2>
		<h4 style="color: #ff3333;">Adress: 162 O'Haire Road Middletown, NY 10941</h4>
		<h4>Phone number: 845-457-4678</h4>
		<h3>Follow the long gravel road into our parking lot.</h3>

		<h3>Paintball Field Hours</h3>
		<h4>Open every Saturday & Sunday: 10:00am - 5:00pm</h4>
		<h4>Open during the week by reservation of 15 or more players.</h4>

		<h2>Map to the Field</h2>
		<center>
			<iframe 
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2989.4443180117373!2d-74.30519752508795!3d41.47296609068427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dcd4b5459720df%3A0x7cb30ffd9342d1ca!2sMSG%20Paintball%20Field!5e0!3m2!1sen!2sus!4v1789660339891!5m2!1sen!2sus" 
				width="80%" 
				height="400" 
				style="border:2px solid #b00000; border-radius: 10px;" 
				allowfullscreen="" 
				loading="lazy" 
				referrerpolicy="strict-origin-when-cross-origin">
			</iframe>
		</center>
		
		<br><br>
		<center>
			<a href="ContactPage.php" class="btn">Contact Us Here</a>
		</center>
	</div>

	<footer>
		<p>MSG Paintball | Paintball - Airsoft - Gel Ball</p>
	</footer>

</body>
</html>
