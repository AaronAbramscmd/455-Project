<?php

session_start();
include 'db.php';

if (!isset($_SESSION['ref_id'])) {
	header("Location: RefLogin.php");
	exit();
}

$refID = $_SESSION['ref_id'];
$msg   = "";
$msgType = "good";

if (isset($_POST['addGear'])) {

	$newName = trim($_POST['gearName']);
	$newCat  = trim($_POST['gearCat']);
	$newQty  = (int)$_POST['gearQty'];

	if ($newName == "" || $newCat == "" || $newQty <= 0) {
		$msg = "Fill in everything and make sure the quantity is at least 1.";
		$msgType = "bad";
	}
	else {
		$sql = "INSERT INTO Equipment (Equipment_Name, Category, Total_Stock, Checked_Out)
				VALUES (?, ?, ?, 0)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssi", $newName, $newCat, $newQty);
		$stmt->execute();
		$stmt->close();

		$msg = "Added " . $newName . " to the inventory.";
	}
}

if (isset($_POST['checkOut'])) {

	$eqID = (int)$_POST['checkOut'];

	$sql = "UPDATE Equipment
			SET Checked_Out = Checked_Out + 1
			WHERE Equipment_ID = ? AND Checked_Out < Total_Stock";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $eqID);
	$stmt->execute();

	if ($stmt->affected_rows == 1) {
		$msg = "Checked out. Don't lose it!";
	}
	else {
		$msg = "That item is already all checked out.";
		$msgType = "bad";
	}
	$stmt->close();
}
if (isset($_POST['returnGear'])) {

	$eqID = (int)$_POST['returnGear'];

	$sql = "UPDATE Equipment
			SET Checked_Out = Checked_Out - 1
			WHERE Equipment_ID = ? AND Checked_Out > 0";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $eqID);
	$stmt->execute();

	if ($stmt->affected_rows == 1) {
		$msg = "Gear returned. Nice.";
	}
	$stmt->close();
}

if (isset($_POST['deleteGear'])) {

	$eqID = (int)$_POST['deleteGear'];

	$sql = "DELETE FROM Equipment
			WHERE Equipment_ID = ? AND Checked_Out = 0";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $eqID);
	$stmt->execute();

	if ($stmt->affected_rows == 1) {
		$msg = "Removed from inventory.";
	}
	else {
		$msg = "Can't delete that - some of it is still checked out.";
		$msgType = "bad";
	}
	$stmt->close();
}

$allGear = $conn->query("SELECT * FROM Equipment ORDER BY Category, Equipment_Name");

$lowCount = 0;
$gearList = [];
while ($row = $allGear->fetch_assoc()) {
	$gearList[] = $row;
	$left = $row['Total_Stock'] - $row['Checked_Out'];
	if ($left <= 2) {
		$lowCount++;
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Equipment Inventory | MSG Paintball</title>
	<link rel="icon" type="Image/png" href="Logo.gif">
	<meta http-equiv="refresh" content="45">

	<style>

		* { box-sizing: border-box; }

		body {
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
			background-color: #f2f2f2;
			color: #222;
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

		nav li { padding: 10px; }

		nav a {
			color: white;
			text-decoration: none;
			font-weight: bold;
		}

		nav a:hover { color: #ff3333; }

		nav img { display: block; }

		h1 {
			text-align: center;
			margin-top: 30px;
			letter-spacing: 1px;
		}

		.sub {
			text-align: center;
			color: #666;
			margin-top: -10px;
			margin-bottom: 25px;
		}

		.wrap {
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 20px 60px 20px;
		}

		.banner {
			padding: 15px 20px;
			border-radius: 6px;
			margin-bottom: 20px;
			font-weight: bold;
		}

		.banner.good {
			background-color: #dff5df;
			border-left: 6px solid #2e7d32;
			color: #1e5a22;
		}

		.banner.bad {
			background-color: #ffe2e2;
			border-left: 6px solid #b00000;
			color: #800000;
		}

		.banner.warn {
			background-color: #fff4d1;
			border-left: 6px solid #e0a800;
			color: #7a5c00;
		}

		.addBox {
			background-color: white;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
			margin-bottom: 30px;
		}

		.addBox h2 {
			margin-top: 0;
			color: #b00000;
			font-size: 20px;
		}

		.addBox form {
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
			align-items: flex-end;
		}

		.addBox label {
			display: block;
			font-size: 13px;
			font-weight: bold;
			margin-bottom: 4px;
			color: #555;
		}

		.addBox input {
			padding: 10px;
			border: 1px solid #bbb;
			border-radius: 4px;
			font-size: 14px;
		}

		.addBox button {
			padding: 10px 20px;
			background-color: #b00000;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-weight: bold;
		}

		.addBox button:hover { background-color: #d00000; }

		.grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
			gap: 20px;
		}

		.card {
			background-color: white;
			border-radius: 8px;
			padding: 18px;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
			border-top: 5px solid #2e7d32;
			position: relative;
		}

		.card.low  { border-top-color: #e0a800; }
		.card.out  { border-top-color: #b00000; }

		.catTag {
			display: inline-block;
			font-size: 11px;
			text-transform: uppercase;
			letter-spacing: 1px;
			color: #888;
			font-weight: bold;
		}

		.card h3 {
			margin: 6px 0 15px 0;
			font-size: 17px;
		}

		.barWrap {
			background-color: #eee;
			height: 14px;
			border-radius: 7px;
			overflow: hidden;
			margin-bottom: 8px;
		}

		.bar {
			height: 100%;
			background-color: #2e7d32;
			transition: width 0.3s;
		}

		.card.low .bar { background-color: #e0a800; }
		.card.out .bar { background-color: #b00000; }

		.numbers {
			font-size: 14px;
			color: #444;
			margin-bottom: 15px;
		}

		.numbers strong { color: #222; }

		.actions {
			display: flex;
			gap: 8px;
		}

		.actions form { flex: 1; }

		.actions button {
			width: 100%;
			padding: 8px;
			border: none;
			border-radius: 4px;
			font-weight: bold;
			cursor: pointer;
			font-size: 13px;
		}

		.btnOut {
			background-color: #1a5fb4;
			color: white;
		}
		.btnOut:hover { background-color: #14406e; }
		.btnOut:disabled {
			background-color: #ccc;
			cursor: not-allowed;
		}

		.btnBack {
			background-color: #2e7d32;
			color: white;
		}
		.btnBack:hover { background-color: #1e5a22; }
		.btnBack:disabled {
			background-color: #ccc;
			cursor: not-allowed;
		}

		.trashRow {
			margin-top: 10px;
			text-align: right;
		}

		.trashRow button {
			background: none;
			border: none;
			color: #999;
			cursor: pointer;
			font-size: 12px;
			text-decoration: underline;
		}

		.trashRow button:hover { color: #b00000; }

		.empty {
			text-align: center;
			color: #777;
			font-style: italic;
			padding: 40px;
		}

		footer {
			text-align: center;
			padding: 25px;
			background-color: #1b1b1b;
			color: #ccc;
			border-top: 3px solid #d00000;
			margin-top: 40px;
		}

	</style>

</head>

<body>

<header>
	<nav>
		<ul>
			<li>
				<a href="RefHomePage.php">
					<img src="Logo.gif" alt="MSG Logo" width="100" height="100">
				</a>
			</li>
			<li> <a href="RefHomePage.php">Referee Home</a> </li>
			<li> <a href="Equipment.php">Equipment</a> </li>
			<li> <a href="RefLogout.php">Log Out</a> </li>
		</ul>
	</nav>
</header>

<div class="wrap">

	<h1>Equipment Inventory</h1>
	<p class="sub">Heads up, <?php echo $_SESSION['ref_first']; ?> - keep this updated so we don't double book gear.</p>

	<?php
	if ($msg != "") {
		if ($msgType == "bad") {
			echo "<div class='banner bad'>" . $msg . "</div>";
		}
		else {
			echo "<div class='banner good'>" . $msg . "</div>";
		}
	}

	if ($lowCount > 0) {
		echo "<div class='banner warn'>WARNING: " . $lowCount . " item(s) are running low or fully checked out. Scroll down to check.</div>";
	}
	?>

	<div class="addBox">
		<h2>Add New Equipment</h2>
		<form method="post">
			<div>
				<label for="gearName">Item Name</label>
				<input type="text" id="gearName" name="gearName" placeholder="e.g. Dye Rotor" required>
			</div>
			<div>
				<label for="gearCat">Category</label>
				<input type="text" id="gearCat" name="gearCat" placeholder="Marker / Mask / Tank" required>
			</div>
			<div>
				<label for="gearQty">How Many</label>
				<input type="number" id="gearQty" name="gearQty" min="1" value="10" required>
			</div>
			<div>
				<button type="submit" name="addGear">Add It</button>
			</div>
		</form>
	</div>

	<div class="grid">

	<?php
	if (count($gearList) > 0) {

		foreach ($gearList as $g) {

			$total = $g['Total_Stock'];
			$out   = $g['Checked_Out'];
			$avail = $total - $out;

			$pct = 0;
			if ($total > 0) {
				$pct = ($avail / $total) * 100;
			}

			$state = "";
			if ($avail == 0) {
				$state = "out";
			}
			else if ($avail <= 2) {
				$state = "low";
			}
	?>

		<div class="card <?php echo $state; ?>">

			<span class="catTag"><?php echo $g['Category']; ?></span>

			<h3><?php echo $g['Equipment_Name']; ?></h3>

			<div class="barWrap">
				<div class="bar" style="width: <?php echo $pct; ?>%;"></div>
			</div>

			<div class="numbers">
				<strong><?php echo $avail; ?></strong> of <?php echo $total; ?> available
				<br>
				<span style="color:#888;">(<?php echo $out; ?> checked out)</span>
			</div>

			<div class="actions">

				<form method="post">
					<button
						type="submit"
						name="checkOut"
						value="<?php echo $g['Equipment_ID']; ?>"
						class="btnOut"
						<?php if ($avail <= 0) { echo "disabled"; } ?>
					>
						Check Out
					</button>
				</form>

				<form method="post">
					<button
						type="submit"
						name="returnGear"
						value="<?php echo $g['Equipment_ID']; ?>"
						class="btnBack"
						<?php if ($out <= 0) { echo "disabled"; } ?>
					>
						Return
					</button>
				</form>

			</div>

			<div class="trashRow">
				<form method="post" onsubmit="return confirm('Remove this from inventory?');">
					<button type="submit" name="deleteGear" value="<?php echo $g['Equipment_ID']; ?>">
						remove
					</button>
				</form>
			</div>

		</div>

	<?php
		}
	}
	else {
		echo "<p class='empty'>No equipment yet. Add some using the form above.</p>";
	}

	$conn->close();
	?>

	</div>

</div>

<footer>
	<p>MSG Paintball | Paintball - Airsoft - Gel Ball</p>
</footer>

</body>

</html>