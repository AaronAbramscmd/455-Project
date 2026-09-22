<?php

session_start();
include 'db.php';

if (!isset($_SESSION['ref_id'])) {
	header("Location: RefLogin.php");
	exit();
}

$refID   = $_SESSION['ref_id'];
$message = "";

if (isset($_POST['claimGame'])) {

	$gameID = (int)$_POST['claimGame'];

	$sql = "UPDATE Game
			SET Referee_ID = ?
			WHERE Game_ID = ? AND Referee_ID IS NULL";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ii", $refID, $gameID);
	$stmt->execute();

	if ($stmt->affected_rows == 1) {
		$message = "You got it! That party is yours now.";
	}
	else {
		$message = "Sorry, somebody else claimed that one first.";
	}

	$stmt->close();
}

$openSql = "SELECT Game_ID, Game_Type, Date, Time, Location, Capacity
			FROM Game
			WHERE Referee_ID IS NULL
			ORDER BY Date, Time";

$openResult = $conn->query($openSql);

if (!$openResult) {
	die("Query failed: " . $conn->error);
}

$mineSql = "SELECT Game_ID, Game_Type, Date, Time, Location, Capacity
			FROM Game
			WHERE Referee_ID = ?
			ORDER BY Date, Time";

$mineStmt = $conn->prepare($mineSql);
$mineStmt->bind_param("i", $refID);
$mineStmt->execute();
$mineResult = $mineStmt->get_result();

$myCount = $mineResult->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Referee Home | MSG Paintball</title>
	<link rel="icon" type="Image/png" href="Logo.gif">
	<link rel="stylesheet" href="RefHomePage.css">
</head>
<body>

	<header>
		<nav>
			<ul>
				<li>
					<a href="RefHomePage.php">
						<img src="Logo.gif" alt="logo" width="100" height="100">
					</a>
				</li>
				<li> <a href="RefHomePage.php">Referee Home</a> </li>
				<li> <a href="#OpenParties">Available Parties</a> </li>
				<li> <a href="#MyParties">My Parties</a> </li>
				<li> <a href="RefLogout.php">Log Out</a> </li>
			</ul>
		</nav>
	</header>

	<h1>Welcome back, <?php echo $_SESSION['ref_first']; ?>!</h1>

	<?php
	if ($message != "") {
		echo "<p class='notice'>" . $message . "</p>";
	}
	?>

	<div class="counter">
		<p>You are currently refereeing <strong><?php echo $myCount; ?></strong> party(s).</p>
	</div>

	<h2 id="OpenParties">Parties That Need a Referee</h2>

	<div class="cardRow">

	<?php
	if ($openResult->num_rows > 0) {
		while ($row = $openResult->fetch_assoc()) {
	?>
		<div class="partyCard">

			<h3><?php echo $row['Game_Type']; ?></h3>

			<p><span class="label">When:</span>
				<?php echo date("F j, Y", strtotime($row['Date'])); ?>
				at <?php echo date("g:i A", strtotime($row['Time'])); ?>
			</p>

			<p><span class="label">Where:</span> <?php echo $row['Location']; ?></p>
			<p><span class="label">Group Size:</span> <?php echo $row['Capacity']; ?> players</p>

			<form method="post">
				<button type="submit" name="claimGame" value="<?php echo $row['Game_ID']; ?>">
					Claim This Party
				</button>
			</form>

		</div>
	<?php
		}
	}
	else {
		echo "<p class='empty'>Nothing open right now. Check back later!</p>";
	}
	?>

	</div>

	<h2 id="MyParties">Parties You Are Refereeing</h2>

	<div class="cardRow">

	<?php
	if ($myCount > 0) {
		while ($row = $mineResult->fetch_assoc()) {
	?>
		<div class="partyCard mine">

			<h3><?php echo $row['Game_Type']; ?></h3>

			<p><span class="label">When:</span>
				<?php echo date("F j, Y", strtotime($row['Date'])); ?>
				at <?php echo date("g:i A", strtotime($row['Time'])); ?>
			</p>

			<p><span class="label">Where:</span> <?php echo $row['Location']; ?></p>
			<p><span class="label">Group Size:</span> <?php echo $row['Capacity']; ?> players</p>

			<p class="claimed">Claimed by you</p>

		</div>
	<?php
		}
	}
	else {
		echo "<p class='empty'>You have not picked up any parties yet.</p>";
	}

	$mineStmt->close();
	$conn->close();
	?>

	</div>

</body>
</html>