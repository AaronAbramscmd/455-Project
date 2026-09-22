<?php

session_start();
include 'db.php';

$errorMsg = "";

if (isset($_SESSION['ref_id'])) {
	header("Location: RefHomePage.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$refEmail = trim($_POST['refEmail']);
	$refPass  = $_POST['refPassword'];

	if ($refEmail == "" || $refPass == "") {
		$errorMsg = "Please fill in both fields.";
	}
	else {
		$sql = "SELECT Referee_ID, First_Name, Last_Name, Password
				FROM Referee
				WHERE Referee_Email = ?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $refEmail);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows == 1) {

			$ref = $result->fetch_assoc();

			if (password_verify($refPass, $ref['Password'])) {

				$_SESSION['ref_id']    = $ref['Referee_ID'];
				$_SESSION['ref_first'] = $ref['First_Name'];
				$_SESSION['ref_last']  = $ref['Last_Name'];

				header("Location: RefHomePage.php");
				exit();
			}
			else {
				$errorMsg = "That password is not right.";
			}
		}
		else {
			$errorMsg = "No referee account found with that email.";
		}

		$stmt->close();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Referee Login | MSG Paintball</title>
	<link rel="icon" type="Image/png" href="Logo.gif">
	<link rel="stylesheet" href="RefLogin.css">
</head>
<body>

	<header>
		<nav>
			<ul>
				<li>
					<a href="MSG_HomePage.php">
						<img src="Logo.gif" alt="logo" width="150" height="150">
					</a>
				</li>
				<li> <a href="MSG_HomePage.php">Home</a> </li>
				<li> <a href="HoursLocations.php">Hours/Locations</a> </li>
				<li> <a href="#Field">Paintball Field</a> </li>
				<li> <a href="#Prices">Prices</a> </li>
				<li> <a href="#PBirthday">Paintball Birthday Parties</a> </li>
				<li> <a href="#ABirthday">Airsoft Birthday Parties</a> </li>
				<li> <a href="#Gell">Gell Ball Parties</a> </li>
				<li> <a href="#FAQ">FAQ</a> </li>
				<li> <a href="#Contact">Contact</a> </li>
				<li> <a href="https://montgomery-sporting-goods-paintball.myshopify.com/"> Online Store</a></li>
				<li> <a href="RefLogin.php">Referee Login</a> </li>
			</ul>
		</nav>
	</header>

	<img class="splat" src="background2.gif" alt="">

	<h1>Referee Login</h1>

	<div class="loginBox">

		<?php
		if ($errorMsg != "") {
			echo "<p class='error'>" . $errorMsg . "</p>";
		}
		?>

		<form action="RefLogin.php" method="post">

			<label for="refEmail">Referee Email</label>
			<input type="email" id="refEmail" name="refEmail" placeholder="you@msgpaintball.com" required>

			<label for="refPassword">Password</label>
			<input type="password" id="refPassword" name="refPassword" required>

			<button type="submit" name="refSubmit">Log In</button>

		</form>

		<!-- Player login coming soon -->

	</div>

</body>
</html>