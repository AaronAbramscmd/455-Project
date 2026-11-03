<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Airsoft Birthday Parties | MSG Paintball</title>
	<link rel="icon" type="Image/png" href="Logo2.gif">
	<!-- Using the exact same CSS files as the homepage -->
	<link rel="stylesheet" href="Nav.css">
	<link rel="stylesheet" href="HomePage.css">

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

		.subtitle {
			text-align: center;
			font-size: 20px;
			font-weight: bold;
			margin-top: 0;
			margin-bottom: 30px;
			border-bottom: 1px solid #333;
			padding-bottom: 20px;
		}

		.infoBox {
			background-color: #111;
			border-left: 4px solid #d00000;
			padding: 15px;
			margin-bottom: 30px;
			font-size: 18px;
			text-align: center;
			color: white;
		}

		.package {
			background-color: #111;
			padding: 20px;
			margin-bottom: 20px;
			border: 1px solid #333;
			border-radius: 5px;
		}

		.package h3 {
			color: #d00000;
			margin-top: 0;
			font-size: 22px;
			text-align: left;
		}

		.package p {
			color: #ccc;
			margin-bottom: 0;
		}

		.warningBox {
			background-color: #332200;
			border-left: 4px solid #ffaa00;
			padding: 15px;
			margin-top: 30px;
			color: #ffcc66;
			font-weight: bold;
			text-align: center;
		}

		.btn-container {
			text-align: center;
			margin-top: 40px;
		}

		.btn {
			display: inline-block;
			padding: 15px 40px;
			background-color: #d00000;
			color: white;
			text-decoration: none;
			border-radius: 5px;
			font-weight: bold;
			font-size: 20px;
		}

		.btn:hover {
			background-color: #ff3333;
		}

		footer {
			text-align: center;
			padding: 20px;
			background-color: #1b1b1b;
			border-top: 3px solid #d00000;
			margin-top: 40px;
			color: #888;
		}
	</style>
</head>
<body>

	<header>
		<nav>
			<ul>
				<li> 
					<a href="MSG_HomePage.php"> 
						<img src="Logo2.gif" alt="logo"> 
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
				<li> <a href="https://montgomery-sporting-goods-paintball.myshopify.com/">Online Store</a> </li>
				<li> <a href="RefRegister.php">Referee Register</a> </li>
				<li> <a href="RefLogin.php">Referee Login</a> </li>
				<li> <a href="MSG_Login.php">Player Login</a> </li>
			</ul>
		</nav>
	</header>

	<div class="wrap">
		
		<h1>Airsoft Birthday Parties</h1>
		<p class="subtitle">For ages 12 & up</p>

		<div class="infoBox">
			<strong>3 Hour Party</strong> | Private group & Private referee
		</div>

		<div class="package">
			<h3>Package #1: Up to 10 players - $329 plus tax</h3>
			<p><strong>Includes:</strong> Admission, rental gun, face masks, and 15,000 BB's.</p>
		</div>

		<div class="package">
			<h3>Package #2: 11-15 players - $399 plus tax</h3>
			<p><strong>Includes:</strong> Admission, rental gun, face masks, and 25,000 BB's.</p>
		</div>

		<p style="color: #d00000; font-weight: bold; text-align: center; margin-top: 30px;">
			** Minimum age for airsoft is 12 years old **<br>
			NO EXCEPTIONS
		</p>

		<div class="warningBox">
			Airsoft parties can't be played in rain or snow.
		</div>

		<div class="btn-container">
			<a href="Book.php" class="btn">Book Now!</a>
		</div>

	</div>

	<footer>
		<p>MSG Paintball | Paintball - Airsoft - Gel Ball</p>
	</footer>

</body>
</html>
