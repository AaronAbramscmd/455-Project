<?php

session_start();
include 'db.php';

$errorMsg = "";
$successMsg = "";

if (isset($_SESSION['ref_id'])) {
	header("Location: RefHomePage.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$refFirst = trim($_POST['refFirst']);
	$refLast  = trim($_POST['refLast']);
	$refEmail = trim($_POST['refEmail']);
	$refPass  = $_POST['refPassword'];
	$refConfirm = $_POST['refConfirm'];

	if ($refFirst == "" || $refLast == "" || $refEmail == "" || $refPass == "" || $refConfirm == "") {
		$errorMsg = "Please fill in all fields.";
	}
	else if ($refPass != $refConfirm) {
		$errorMsg = "The passwords do not match.";
	}
	else {
		$checkSql = "SELECT Referee_ID FROM Referee WHERE Referee_Email = ?";
		$checkStmt = $conn->prepare($checkSql);
		$checkStmt->bind_param("s", $refEmail);
		$checkStmt->execute();
		$checkStmt->store_result();

		if ($checkStmt->num_rows > 0) {
			$errorMsg = "An account with that email already exists.";
		}
		else {
			$hashedPass = password_hash($refPass, PASSWORD_DEFAULT);

			$insertSql = "INSERT INTO Referee (First_Name, Last_Name, Referee_Email, Password) VALUES (?, ?, ?, ?)";
			$insertStmt = $conn->prepare($insertSql);
			$insertStmt->bind_param("ssss", $refFirst, $refLast, $refEmail, $hashedPass);
			
			if ($insertStmt->execute()) {
				$successMsg = "Account created! You can now log in.";
			}
			else {
				$errorMsg = "Something went wrong. Please try again.";
			}
			$insertStmt->close();
		}
		$checkStmt->close();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Referee Registration | MSG Paintball</title>
	<link rel="icon" type="Image/png" href="Logo.gif">
	<link rel="stylesheet" href="RefLogin.css">
</head>
<body>

	<header>
		<nav>
			<ul>
				<li>
					<a href="MSG_HomePage.php">
						<img src="Logo.gif" alt="logo" width="100" height="100">
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
				<li> <a href="MSG_Login.php">Player Login</a> </li>
			</ul>
		</nav>
	</header>

	<img class="splat" src="background2.gif" alt="">

	<h1>Referee Registration</h1>

	<div class="loginBox">

		<?php
		if ($errorMsg != "") {
			echo "<p class='error'>" . $errorMsg . "</p>";
		}
		if ($successMsg != "") {
			echo "<p style='background-color:#1e3a1e; border-left:5px solid #3a8a5f; padding:10px; color:#a8e6a8; margin:0 0 15px 0; font-size:14px; border-radius:4px;'>" . $successMsg . "</p>";
		}
		?>

		<form action="RefRegister.php" method="post">

			<label for="refFirst">First Name</label>
			<input type="text" id="refFirst" name="refFirst" placeholder="Enter your first name" required>

			<label for="refLast">Last Name</label>
			<input type="text" id="refLast" name="refLast" placeholder="Enter your last name" required>

			<label for="refEmail">Referee Email</label>
			<input type="email" id="refEmail" name="refEmail" placeholder="you@msgpaintball.com" required>

			<label for="refPassword">Password</label>
			<input type="password" id="refPassword" name="refPassword" placeholder="Create a password" required>

			<label for="refConfirm">Confirm Password</label>
			<input type="password" id="refConfirm" name="refConfirm" placeholder="Enter your password again" required>

			<button type="submit" name="refRegister">Create Account</button>

		</form>

		<p class="hint">Already have an account? <a href="RefLogin.php">Log in here</a></p>

	</div>

	<footer>
		<p>MSG Paintball | Paintball - Airsoft - Gel Ball</p>
	</footer>

</body>
</html>