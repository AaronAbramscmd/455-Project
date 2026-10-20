<?php
session_start();
include 'db.php';

$sql = "SELECT r.Review_ID, r.Rating, r.Title, r.Comment, r.Field_Visited,
			   r.Would_Recommend, r.Review_Date,
			   p.First_Name, p.Last_Name
		FROM Review r
		JOIN Player p ON r.Player_ID = p.Player_ID
		ORDER BY r.Review_Date DESC";

$result = $conn->query($sql);

$avgSql = "SELECT AVG(Rating) AS avgRating, COUNT(*) AS totalReviews FROM Review";
$avgResult = $conn->query($avgSql);
$avgRow = $avgResult->fetch_assoc();

$avgRating = round($avgRow['avgRating'], 1);
$totalReviews = $avgRow['totalReviews'];
?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Reviews | MSG Paintball</title>

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

		.avgBox {
			width: 300px;
			margin: 20px auto;
			background-color: #222222;
			padding: 20px;
			border-radius: 10px;
			border-top: 5px solid #d00000;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
			text-align: center;
		}

		.avgNumber {
			font-size: 48px;
			font-weight: bold;
			color: #ff3333;
			margin: 0;
		}

		.avgStars {
			font-size: 20px;
			color: #ffbb33;
			letter-spacing: 3px;
			margin: 5px 0;
		}

		.avgTotal {
			color: #999;
			font-size: 14px;
			margin: 0;
		}

		.writeBtn {
			display: block;
			width: 240px;
			margin: 25px auto;
			text-align: center;
			padding: 12px;
			background-color: #b00000;
			color: white;
			text-decoration: none;
			border-radius: 5px;
			font-weight: bold;
			letter-spacing: 1px;
		}

		.writeBtn:hover {
			background-color: #d00000;
		}

		.grid {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			gap: 20px;
			padding: 20px 40px;
			max-width: 1200px;
			margin: 0 auto;
		}

		.reviewCard {
			width: 320px;
			background-color: #222222;
			border-radius: 10px;
			padding: 20px;
			border-left: 5px solid #d00000;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
		}

		.reviewTitle {
			margin: 0 0 8px 0;
			color: #ff3333;
			font-size: 17px;
		}

		.reviewStars {
			color: #ffbb33;
			font-size: 16px;
			letter-spacing: 2px;
			margin-bottom: 10px;
		}

		.reviewComment {
			color: #ddd;
			font-size: 14px;
			line-height: 1.5;
			margin: 10px 0;
		}

		.reviewMeta {
			color: #888;
			font-size: 12px;
			margin-top: 12px;
			padding-top: 12px;
			border-top: 1px solid #333;
		}

		.reviewMeta strong {
			color: white;
		}

		.empty {
			text-align: center;
			color: #777;
			font-style: italic;
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

			<?php if (isset($_SESSION['player_id'])) { ?>
				<li> <a href="WriteReview.php">Write a Review</a> </li>
				<li> <a href="MSG_Logout.php">Log Out</a> </li>
			<?php } else { ?>
				<li> <a href="MSG_Login.php">Player Login</a> </li>
			<?php } ?>

			<li> <a href="RefLogin.php">Referee Login</a> </li>

		</ul>

	</nav>

</header>

<h1>What Players Are Saying</h1>
<p class="sub">Real reviews from real players around the world.</p>

<div class="avgBox">
	<p class="avgNumber"><?php echo $avgRating; ?></p>
	<p class="avgStars"><?php echo str_repeat("*", round($avgRating)); ?></p>
	<p class="avgTotal">Based on <?php echo $totalReviews; ?> reviews</p>
</div>

<?php if (isset($_SESSION['player_id'])) { ?>
	<a class="writeBtn" href="WriteReview.php">Write Your Own Review</a>
<?php } else { ?>
	<a class="writeBtn" href="MSG_Login.php">Log In To Write a Review</a>
<?php } ?>

<div class="grid">

<?php
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$stars = str_repeat("*", $row['Rating']);
?>
	<div class="reviewCard">
		<h3 class="reviewTitle"><?php echo $row['Title']; ?></h3>
		<div class="reviewStars"><?php echo $stars; ?></div>
		<p class="reviewComment"><?php echo $row['Comment']; ?></p>
		<div class="reviewMeta">
			<strong><?php echo $row['First_Name'] . " " . substr($row['Last_Name'], 0, 1) . "."; ?></strong>
			&middot; <?php echo $row['Field_Visited']; ?>
			&middot; <?php echo date("M j, Y", strtotime($row['Review_Date'])); ?>
			&middot; Recommends: <?php echo $row['Would_Recommend']; ?>
		</div>
	</div>
<?php
	}
}
else {
	echo "<p class='empty'>No reviews yet. Be the first!</p>";
}

$conn->close();
?>

</div>

<footer>
	<p>MSG Paintball | Paintball - Airsoft - Gel Ball</p>
</footer>

</body>

</html>
