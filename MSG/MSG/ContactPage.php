<?php


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contacts</title>
	<link rel="stylesheet" href="CSS/Nav.css">
	<style>
		form{
			display: grid;
			place-items: center;
		}
		
	</style>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li> <a href="MSG_HomePage.php"> 
						<img src="/Websites/MSG/Image/Logo.gif" alt="logo" width="150" height="150">
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

	<form>

		<label>Enter Name:</label><br>
		<input type="text" name="name" placeholder="Enter your name"><br>

		<label>Email:</label><br>
		<input type="Email" name="gmail" placeholder="Enter email address"><br>

		<label>Subject:</label><br>
		<input type="text" name="subject" placeholder="Enter text here"><br>

		<label>Notes:</label><br>
		<input type="text" name="notes" placeholder="Anything you would like to say?"><br>

		<button type="submit" name="ContactPage">Submit </button>


	</form>

</body>
</html>