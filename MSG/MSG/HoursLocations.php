<?php

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hours and Locations</title>
	<link rel="icon" type="Image/png" href="Image/Logo.gif">
	<link rel="stylesheet"  href="CSS/HoursPage.css">
	<style>
		header {
		background-color: #0d0d0d;
		border-bottom: 3px solid #d00000;
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);

	}
	body {
		background-color: #0d0d0d;
		margin: 0;
		padding: 0;

	}
		h1,h2,h3,h4,p {
			color: white;
		}
		ul {
			color: white;
		}
		.Shop {
			background-color: #0d0d0d;

			display: grid;
			grid-template-columns:1fr 1fr ;
			width: 90%;
			max-width: 1200px;
			margin: 50px auto;
			gap: 50px;
		}

		.Location\/hours {
			
			text-align: center;
			background-color: #222222;
			padding: 35px;
			border-radius: 20px;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
		}

		.Location\/hours h1 {
			background-color: #d00000;
			margin: 0;
			margin-bottom: 0;
			padding: 15px;
			border-bottom: 3px solid #d00000;
			border-radius: 60px;
		}
		.Location\/hours h2 { 
			margin-top: 30px; 
		margin-bottom: 15px; 
		padding-bottom: 8px; 
		border-bottom: 2px solid #d00000; 
		color: #ff3333; 
		font-size: 24px; }
					
		.tri {
			padding: 35px;
			background-color: #222222;
			border-radius: 20px;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);

		}

		.tri h2{
			color: #d00000;
			text-align: center;
			margin: 0;
			margin-bottom: 25px;
			border-bottom: 2px solid #d00000;

		}
		.tri h4{
			text-align: center;
			color: #d00000;
			margin: 0;
			margin-bottom: 25px;
			padding: 15px;
			border-bottom: 2px solid #d00000;
			text-align: center;
			font-size: 24px;

		}
		.tri h3{
			text-align: center;
			font-size: 30px;
			margin-bottom: 35px;
		}

		.tri ul{
			margin: 0;
			padding-left: 25px;
		}
		.tri li {
			margin-bottom: 12px;
			font-size: 18px;
			line-height: 1.5;
		}
		.tri p{
			margin: 0;
			padding: 20px;
			line-height: 1.7;
			border-radius: 20px;
			background-color: #171717;
			text-align: center;
			
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
<div class="Shop">
  <div class= "Location/hours">
	<h1>(This is not the Painball field)</h1>
	<h2> Pro-Shop is located at:</h2>
	<h4> 1934 Route 211 East Middletown, NY 10941</h4>
	<h3>Phone number: </h3> <h4> 845-457-4678 </h4>

	<h2> Shop Hours </h2>
	<h3> Monday: 11:00am - 5:00pm</h3>
	<h3> Tuesday: 11:00am - 5:00pm </h3>
	<h3> Wednesday: 11:00am - 5:00pm</h3>
	<h3> Thursday: 11:00am - 5:00pm </h3>
	<h3> Friday: 11:00am - 5:00pm</h3>
	<h3> Saturday: 11:00am - 5:00pm </h3>
	<h3> Sunday: 11:00am - 5:00pm</h3>
  
  </div>
	
  <div class="tri">
	<h4> Largest paintball pro-shop in the Tri-State. <br>Fully stocked for all your paintball needs!</h4>
		<ul>
			<li>Paintball gun repairs by certified paintball techs</li>
			<li>Co2 refills up to 24 ounce tanks</li>
			<li>Compresses air fills up to 4,500PSI</li>
			<li>Smoke grenades for gender reveals</li>
			<li>Green gas for airsoft</li>
			<li>Airsoft BB's</li>
			<li>Red dot sights, and lasers</li>
			<li>Home defense</li>
		</ul>
	<h3>Something for everyone!</h3>

	<h2> Brands we carry in our shop</h2>
	<p> Dye, Planet Eclipse, Valken, Tippmann, Exalt, <br>HK Army, First Strike, Bunkerkings, Push, Umarex, <br>Elite Force, Empire, JT, VForce, Condor,Social Paintball, <br>Virtue, Gen-X-Global, CP, Inception Designs, <br>Killhouse Weapon Systems, GOG/Luxe</p>
</div>
</div>
  


</body>
</html>