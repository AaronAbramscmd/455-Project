<?php
session_start();
include 'db.php';

if (!isset($_SESSION['player_id'])) {
	header("Location: MSG_Login.php");
	exit();
}

$playerID = $_SESSION['player_id'];
$msg = "";
$msgType = "good";

if (isset($_POST['submitReview'])) {

	$rating    = (int)$_POST['rating'];
	$title     = trim($_POST['title']);
	$comment   = trim($_POST['comment']);
	$field     = trim($_POST['field']);
	$recommend = $_POST['recommend'];

	if ($rating < 1 || $rating > 5) {
		$msg = "Pick a rating between 1 and 5 stars.";
		$msgType = "bad";
	}
	else if ($title == "" || $comment == "") {
		$msg = "Fill in a title and a comment.";
		$msgType = "bad";
	}
	else {
		$sql = "INSERT INTO Review (Player_ID, Rating, Title, Comment, Field_Visited, Would_Recommend, Review_Date)
				VALUES (?, ?, ?, ?, ?, ?, CURDATE())";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("iissss", $playerID, $rating, $title, $comment, $field, $recommend);
		$stmt->execute();
		$stmt->close();

		$msg = "Thanks for the review!";
	}
}
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Write a Review | MSG Paintball</title>

	<link rel="icon" type="Image/png" href="Logo.gif">

	<style>

		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
			background-color: #111;
			color: white;
		}

		header {
			background-color: #1b1b1b;
			border-bottom: 4px solid #d00000;
			padding: 10px 0;
		}

		nav ul {
			list-style: none;
			padding: 0;
			margin: 0;
			display: flex;
			align-items: center;
			justify-content: space-around;
			flex-wrap: wrap;
		}

		nav li {
			padding: 10px;
		}

		nav a {
			color: white;
			text-decoration: none;
			font-weight: bold;
		}

		nav a:hover {
			color: #ff3333;
		}

		nav img {
			display: block;
		}

		h1 {
			text-align: center;
			margin-top: 30px;
			letter-spacing: 1px;
		}

		.sub {
			text-align: center;
			color: #999;
			margin-top: -10px;
			margin-bottom: 25px;
		}

		.formCard {
			width: 550px;
			max-width: 90%;
			margin: 30px auto 60px auto;
			background-color: #222222;
			padding: 30px;
			border-radius: 10px;
			border-top: 5px solid #d00000;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
		}

		.formCard label {
			display: block;
			margin-top: 15px;
			margin-bottom: 5px;
			font-weight: bold;
			color: white;
		}

		.formCard input,
		.formCard select,
		.formCard textarea {
			width: 100%;
			padding: 11px;
			border: 1px solid #555;
			border-radius: 5px;
			font-size: 15px;
			font-family: Arial, Helvetica, sans-serif;
			background-color: #1b1b1b;
			color: white;
		}

		.formCard input:focus,
		.formCard select:focus,
		.formCard textarea:focus {
			outline: none;
			border-color: #d00000;
		}

		.formCard textarea {
			min-height: 120px;
			resize: vertical;
		}

		.formCard button {
			width: 100%;
			margin-top: 22px;
			padding: 13px;
			background-color: #b00000;
			color: white;
			border: none;
			border-radius: 5px;
			font-size: 17px;
			font-weight: bold;
			cursor: pointer;
			letter-spacing: 1px;
		}

		.formCard button:hover {
			background-color: #d00000;
		}

		.good {
			background-color: #1e3a1e;
			border-left: 5px solid #2e7d32;
			padding: 10px;
			color: #a8e6a8;
			margin: 0 0 15px 0;
			font-size: 14px;
			border-radius: 4px;
		}

		.bad {
			background-color: #3a1e1e;
			border-left: 5px solid #b00000;
			padding: 10px;
			color: #ffb3b3;
			margin: 0 0 15px 0;
			font-size: 14px;
			border-radius: 4px;
		}

		.backLink {
			display: block;
			text-align: center;
			margin-top: 20px;
			color: #ff3333;
			font-size: 14px;
			text-decoration: none;
		}

		.backLink:hover {
			text-decoration: underline;
		}

		footer {
			text-align: center;
			padding: 25px;
			background-color: #1b1b1b;
			border-top: 3px solid #d00000;
			color: #ccc;
			margin-top: 40px;
		}

	</style>

</head>

<body>

<header>

	<nav>

		<ul>

			<li>
				<a href="MSG_HomePage.php">
					<img src="Logo.gif" alt="MSG Paintball Logo" width="100" height="100">
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
			<li> <a href="WriteReview.php">Write a Review</a> </li>
			<li> <a href="MSG_Logout.php">Log Out</a> </li>

		</ul>

	</nav>

</header>

<h1>Share Your Experience</h1>
<p class="sub">Tell the world how your day at MSG Paintball went.</p>

<div class="formCard">

	<?php
	if ($msg != "") {
		if ($msgType == "bad") {
			echo "<div class='bad'>" . $msg . "</div>";
		}
		else {
			echo "<div class='good'>" . $msg . "</div>";
		}
	}
	?>

	<form method="post">

		<label for="rating">Rating</label>
		<select id="rating" name="rating" required>
			<option value="5">5 Stars - Amazing</option>
			<option value="4">4 Stars - Great</option>
			<option value="3">3 Stars - Decent</option>
			<option value="2">2 Stars - Meh</option>
			<option value="1">1 Star - Never again</option>
		</select>

		<label for="title">Review Title</label>
		<input type="text" id="title" name="title" placeholder="Sum it up in a few words" required>

		<label for="field">Which Field Did You Play?</label>
		<select id="field" name="field">
			<option value="Field A">Field A</option>
			<option value="Field B">Field B</option>
			<option value="Field C">Field C</option>
			<option value="Speedball Arena">Speedball Arena</option>
			<option value="Woods Field">Woods Field</option>
			<option value="Indoor Arena">Indoor Arena</option>
		</select>

		<label for="recommend">Would You Recommend Us?</label>
		<select id="recommend" name="recommend">
			<option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>

		<label for="comment">Your Review</label>
		<textarea id="comment" name="comment" placeholder="Tell us about your day. What was good? What could be better?" required></textarea>

		<button type="submit" name="submitReview">Post Review</button>

	</form>

	<a class="backLink" href="Reviews.php">Back to All Reviews</a>

</div>

<footer>
	<p>MSG Paintball | Paintball - Airsoft - Gel Ball</p>
</footer>

</body>

</html>
