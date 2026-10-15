<?php
	

		$Time = $_REQUEST['Time'];
		$Game_Type = $_REQUEST['Game_Type'];
		$Date = $_REQUEST['Date'];
		$Location = $_REQUEST['Location'];



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thank You</title>
	<link rel="stylesheet" href="CSS/Nav.css">
	<link rel="stylesheet" href="CSS/thankyou.css">
</head>
<body>
	<header>
		<nav>
			<ul>
				<li> <a href="MSG_HomePage.php"> 
						<img src="/Websites/MSG/Image/Logo2.gif" alt="logo" width="150" height="150">
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
				<li> <a href="https://montgomery-sporting-goods-paintball.myshopify.com/"> Online Store</a></li>
			</ul>
		
		</nav>
	</header>
	<div class="page">
		<h1> Thank You!</h1>
		<p>
		<?php

			echo "Your $Game_Type is on $Date at $Time and the field your party will play on is $Location.";

		?>
		</p>
		<p>Thank you for choosing MSG!</p>
		<h3>Click the button below to go back to the home page.</h3>
		
		<button class="button">
			<a href="MSG_HomePage.php">Home </a>
		</button>
	</div>

</body>
</html>