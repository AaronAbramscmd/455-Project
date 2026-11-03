<?php
session_start();

if (isset($_POST['reminder_btn'])) {
	if (isset($_SESSION['notify'])) {
		unset($_SESSION['notify']);
		unset($_SESSION['remind_game']);
	} else {
		$_SESSION['notify'] = true;
		if (isset($_POST['game_select'])) {
			$_SESSION['remind_game'] = $_POST['game_select'];
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Montgomery Sporting Goods & Paintball - Airsoft, Paintball</title>
	<link rel="icon" type="Image/png" href="Logo.gif">
	<link rel="stylesheet" href="Nav.css">
	<link rel="stylesheet" href="HomePage.css">

	<style>
	
	section {
		padding-left: 15px;
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 15em;
	}

	iframe {
		border-radius: 3em;
	}

	header {
		background-color: #0d0d0d;
		border-bottom: 3px solid #d00000;
		box-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
	}

	h1, h2, h3 {
		color: white;
	}

	.accountButton {
		background-color: #222;
		color: white;
		padding: 10px 15px;
		border-radius: 5px;
		text-decoration: none;
		font-weight: bold;
		border: 1px solid #b00000;
		white-space: nowrap;
	}

	.accountButton:hover {
		background-color: #b00000;
		color: white;
	}

	</style>
		
</head>

<body>

	<header>

		<nav>

			<ul>

				<li>
					<a href="MSG_HomePage.php"> 
						<img src="Logo2.gif" alt="logo" width="150" height="150">
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
						<a class="accountButton" href="Account.php">
							<?php
							echo htmlspecialchars(
								$_SESSION['player_first'] . ' ' . $_SESSION['player_last']
							);
							?>
						</a>
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
			<img src="Book5.png" width="750" height="auto" alt="Book a party">
		</a>

	</div>

	<?php if (isset($_SESSION['player_id'])) { ?>
	
	<div style="background-color: #222; border: 2px solid #b00000; width: 600px; margin: 0 auto; margin-bottom: 50px; padding: 20px; border-radius: 15px;">
		<h3 style="color: #ff3333; padding: 0; margin-top: 0;">Notification Reminders</h3>
		
		<p style="font-size: 18px;">We will remind you about your booked date and time.</p>
		
		<form method="POST" action="MSG_HomePage.php">
			<?php if (isset($_SESSION['notify'])) { ?>
				
				<p style="background-color: #111; padding: 10px; border-left: 4px solid #d00000; color: white;">
					Reminders are ON for: <b><?php echo $_SESSION['remind_game']; ?></b>
				</p>
				
				<p style="color: #ff3333; font-weight: bold; margin-top: 15px;">Notifcation reminders are ON! We will text you before the game.</p>
				<button type="submit" name="reminder_btn" style="background-color: #444; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 10px;">Turn Off Reminders</button>
				
			<?php } else { ?>
				
				<label style="color: white; font-weight: bold; margin-bottom: 5px; display: block;">What do you want to be reminded about?</label>
				<select name="game_select" style="width: 100%; padding: 8px; margin-bottom: 15px; background-color: #111; color: white; border: 1px solid #555; border-radius: 5px;">
					<option value="Paintball Party">Paintball Party</option>
					<option value="Airsoft Party">Airsoft Party</option>
					<option value="Gell Ball Party">Gell Ball Party</option>
				</select>

				<p style="color: #888; font-weight: bold; margin-top: 15px;">Notifcation reminders are currently off.</p>
				<button type="submit" name="reminder_btn" style="background-color: #d00000; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; margin-top: 10px;">Turn On Reminders</button>
				
			<?php } ?>
		</form>
	</div>

	<?php } ?>

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
