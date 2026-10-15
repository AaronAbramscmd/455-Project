<?php

session_start();
include 'db.php';

if (!isset($_SESSION['player_id'])) {
    header("Location: MSG_Login.php");
    exit();
}

$playerID = $_SESSION['player_id'];

$sql = "SELECT Player_ID, First_Name, Last_Name, Player_Email
        FROM player
        WHERE Player_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $playerID);
$stmt->execute();

$result = $stmt->get_result();
$player = $result->fetch_assoc();

$stmt->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Account Page</title>

	<link rel="stylesheet" href="CSS/Nav.css">

	<style>

		header{
			background-color: #0d0d0d;
			border-bottom: 3px solid #d00000;
			box-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
		}

		.account {
			width: 600px;
			max-width: 90%;
			margin: 50px auto;
			background-color: white;
			color: black;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0 5px 20px rgba(0,0,0,0.5);
		}

		.account h1 {
			text-align: center;
			color: #b00000;
		}

		.accountInfo {
			font-size: 18px;
			margin-top: 25px;
		}

		.accountInfo p {
			padding: 12px;
			border-bottom: 1px solid #ccc;
		}

		.accountButtons {
			text-align: center;
			margin-top: 30px;
		}

		.accountButtons a {
			display: inline-block;
			background-color: #b00000;
			color: white;
			padding: 12px 20px;
			margin: 5px;
			border-radius: 5px;
			text-decoration: none;
			font-weight: bold;
		}

		.accountButtons a:hover {
			background-color: #d00000;
		}

		.reservations {
			width: 900px;
			max-width: 90%;
			margin: 30px auto;
			background-color: white;
			color: black;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0 5px 20px rgba(0,0,0,0.5);
		}

		.reservations h2 {
			color: #b00000;
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

			</ul>
		</nav>
	</header>


	<div class="account">

		<h1>My Account</h1>

		<div class="accountInfo">

			<p>
				<strong>First Name:</strong>
				<?php echo htmlspecialchars($player['First_Name']); ?>
			</p>

			<p>
				<strong>Last Name:</strong>
				<?php echo htmlspecialchars($player['Last_Name']); ?>
			</p>

			<p>
				<strong>Email:</strong>
				<?php echo htmlspecialchars($player['Player_Email']); ?>
			</p>

		</div>

		<div class="accountButtons">

			<a href="MSG_HomePage.php">Back to Home</a>

			<a href="logout.php">Logout</a>

		</div>

	</div>


	<div class="reservations">

		<h2>My Reservations</h2>

		<p style="text-align: center;">
			Your reservations will appear here.
		</p>

	</div>

</body>
</html>