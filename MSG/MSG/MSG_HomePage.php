<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Montgomery Sporting Goods & Paintball - Airsoft, Paintball</title>
	<link rel="icon" type="Image/png" href="Image/Logo.gif">
	<link rel="stylesheet" href="CSS/HomePage.css">

	<style>
	
	section{
		padding-left: 15px;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: ;
		gap: 15em;
	}

	iframe{
		border-radius: 3em;
	}

	header{
		background-color: #0d0d0d;
		border-bottom: 3px solid #d00000;
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
	}

	h1, h2, h3{
		color: white;
	}

	.logoutButton {
		background-color: #b00000;
		color: white;
		padding: 10px 15px;
		border-radius: 5px;
		text-decoration: none;
		font-weight: bold;
	}

	.logoutButton:hover {
		background-color: #d00000;
	}

	</style>
		
</head>

<body>

	<header>

		<nav>

			<ul>

				<li>
					<a href="MSG_HomePage.php"> 
						<img src="/Websites/MSG/Image/Logo2.gif" alt="logo" width="150" height="150">
					</a>
				</li>

				<li>
					<a href="MSG_HomePage.php">Home</a>
				</li>

				<li>
					<a href="HoursLocations.php">Hours/Locations</a>
				</li>

				<li>
					<a href="FieldPage.php">Paintball Field</a>
				</li>

				<li>
					<a href="PricesPage.php">Prices</a>
				</li>

				<li>
					<a href="PBirthdayPage.php">Paintball Birthday Parties</a>
				</li>

				<li>
					<a href="ABirthdayPage.php">Airsoft Birthday Parties</a>
				</li>

				<li>
					<a href="GellPage.php">Gell Ball Parties</a>
				</li>

				<li>
					<a href="FAQPage.php">FAQ</a>
				</li>

				<li>
					<a href="ContactPage.php">Contact</a>
				</li>

				<li>
					<a href="https://montgomery-sporting-goods-paintball.myshopify.com/">
						Online Store
					</a>
				</li>


				<?php

				if (isset($_SESSION['player_id'])) {

				?>

					<li>
						<a class="logoutButton" href="logout.php">Logout</a>
					</li>

				<?php

				}
				else {

				?>

					<li>
						<a href="MSG_Login.php">Player Login</a>
					</li>

				<?php

				}

				?>

			</ul>
		
		</nav>

	</header>

		
	<h1>Montgomery Sporting Goods & Paintball - Airsoft, Paintball</h1>

	<h2>Want to book a party?</h2>

	<h3>Click below</h3>


	<div class="Book"> 

		<a href="Book.php">
			<img src="Image/Book5.png" width="750" height="auto">
		</a>

	</div>


	<div class="sec2">

		<section>

			<div class="map">

				<h1>Our Field Location</h1>

				<p>
					If you click the map on the right it will give you directions
					to our field. We have plenty of different fields to choose from.
				</p>

			</div>

			<iframe 
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2989.4443180117373!2d-74.30519752508795!3d41.47296609068427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dcd4b5459720df%3A0x7cb30ffd9342d1ca!2sMSG%20Paintball%20Field!5e0!3m2!1sen!2sus!4v1789660339891!5m2!1sen!2sus" 
				width="600" 
				height="450" 
				style="border:0;" 
				allowfullscreen="" 
				loading="lazy" 
				referrerpolicy="strict-origin-when-cross-origin">
			</iframe>
	
		</section>

	</div>


	<script src="weather.js"></script>  

</body>
</html>
