<?php  
	session_start();
	include 'db.php';

	

	if (isset($_POST['submit'])) {

		

		$time = $_POST['Time'];
		$partyType = $_POST['Game_Type'];
		$date = $_POST['Date'];
		$field = $_POST['Location'];

		$sql = "INSERT INTO game (Game_Type, Date, Time, Location)
            VALUES ('$partyType', '$date', '$time', '$field')";

        $statement = $pdo-> query($sql);
        $game = $statement-> fetchAll();

        $sql2 = "SELECT * 
        		 FROM game;";
        $statement = $pdo-> query($sql2);
        $game = $statement-> fetchAll();
		
       header("Location: thankyou.php");
       exit();
   }
    



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking Page</title>
	<link rel="stylesheet" href="CSS/Nav.css">
	<link rel="stylesheet" href="CSS/Book.css">
	<style>
		header{
		background-color: #0d0d0d;
		border-bottom: 3px solid #d00000;
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
	}
	</style>

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
	<div class="Entire">
	<div class="timemenu">
		<form action="Book.php" method="POST">
		<!--Time-->
			<label for="Time">
				<h1>What time would you like to book your party?</h1>
			</label>
					<select name="Time" id="Time" required>
						<option value="">Pick which time works best</option>
						<option value="10:00 am">10:00 am</option>
						<option value="12:00 pm">12:00 pm </option>
						<option value="1:00 pm">1:00 pm</option>
						<option value="2:00 pm">2:00 pm</option>
					</select>
		<!--Party Type-->
			<label for="Game_Type">
				<h2>What type of party would you like?</h2>
			</label>
					<select name="Game_Type" id="Game_Type" required>
						<option value="">Pick a party</option>
						<option value="Paintball Party">Paintball Party</option>
						<option value="Airsoft Party">Airsoft Party</option>
						<option value="Gel Party">Gel Party</option>
					</select>
		<!--Date-->
			<label for="Date">
				<h2>When would you like to book your party?</h2>
			</label>
					<input type="Date" id="Date" name="Date" min="2026-01-01" max="" required>
					
		<!--Field-->
			<label for="Location">
				<h2>Which field would you like to book?</h2>
			</label>
					<select name="Location" id="Location" required>
						<option value="">Pick a field</option>
						<option value="King of the hill">King of the hill</option>
						<option value="Castle">Castle</option>
						<option value="Town">Town</option>
						<option value="Forest">Forest</option>
						<option value="Sandhill">Sandhill</option>
						<option value="Graveyard">Graveyard</option>
					</select>

					<br><br>

			<button name="submit" type="submit">Submit</button>
		</form>
			</div>
			</div>
		

</div>





</body>
</html>