<?php
session_start();
include 'db.php';

if (!isset($_SESSION['player_id']) || (int)$_SESSION['player_id'] <= 0) {
    header("Location: MSG_Login.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $playerID = (int)$_SESSION['player_id'];
    $time = $_POST['Time'] ?? '';
    $partyType = $_POST['Game_Type'] ?? '';
    $date = $_POST['Date'] ?? '';
    $field = $_POST['Location'] ?? '';

    $validTimes = ['10:00 am', '12:00 pm', '1:00 pm', '2:00 pm'];
    $validParties = ['Paintball Party', 'Airsoft Party', 'Gel Party'];
    $validFields = [
        'King of the hill',
        'Castle',
        'Town',
        'Forest',
        'Sandhill',
        'Graveyard'
    ];

    if (
        !in_array($time, $validTimes, true) ||
        !in_array($partyType, $validParties, true) ||
        !in_array($field, $validFields, true) ||
        !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date) ||
        $date < date('Y-m-d')
    ) {
        $error = "Please enter valid booking information.";
    } else {
        try {
            $sql = "INSERT INTO game
                    (Player_ID, Game_Type, `Date`, `Time`, Location)
                    VALUES (?, ?, ?, ?, ?)";

            $statement = $pdo->prepare($sql);
            $statement->execute([
                $playerID,
                $partyType,
                $date,
                $time,
                $field
            ]);

            header("Location: thankyou.php");
            exit();

        } catch (PDOException $e) {
            $error = "The booking could not be saved. Please check your database setup.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Booking Page | MSG Paintball</title>

    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/Book.css">

    <style>
        header {
            background-color: #0d0d0d;
            border-bottom: 3px solid #d00000;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
        }

        .bookingError {
            color: white;
            background-color: #8b0000;
            padding: 12px;
            margin: 15px 0;
            border-radius: 5px;
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
                    <img src="/Websites/MSG/Image/Logo2.gif"
                         alt="logo" width="150" height="150">
                </a>
            </li>

            <li><a href="MSG_HomePage.php">Home</a></li>
            <li><a href="HoursLocations.php">Hours/Locations</a></li>
            <li><a href="FieldPage.php">Paintball Field</a></li>
            <li><a href="PricesPage.php">Prices</a></li>
            <li><a href="PBirthdayPage.php">Paintball Birthday Parties</a></li>
            <li><a href="ABirthdayPage.php">Airsoft Birthday Parties</a></li>
            <li><a href="GellPage.php">Gell Ball Parties</a></li>
            <li><a href="FAQPage.php">FAQ</a></li>
            <li><a href="ContactPage.php">Contact</a></li>
            <li>
                <a href="https://montgomery-sporting-goods-paintball.myshopify.com/">
                    Online Store
                </a>
            </li>
        </ul>
    </nav>
</header>

<div class="Entire">
    <div class="timemenu">

        <form action="Book.php" method="POST">

            <?php if ($error !== ''): ?>
                <p class="bookingError">
                    <?php echo htmlspecialchars($error); ?>
                </p>
            <?php endif; ?>

            <label for="Time">
                <h1>What time would you like to book your party?</h1>
            </label>

            <select name="Time" id="Time" required>
                <option value="">Pick which time works best</option>
                <option value="10:00 am">10:00 am</option>
                <option value="12:00 pm">12:00 pm</option>
                <option value="1:00 pm">1:00 pm</option>
                <option value="2:00 pm">2:00 pm</option>
            </select>

            <label for="Game_Type">
                <h2>What type of party would you like?</h2>
            </label>

            <select name="Game_Type" id="Game_Type" required>
                <option value="">Pick a party</option>
                <option value="Paintball Party">Paintball Party</option>
                <option value="Airsoft Party">Airsoft Party</option>
                <option value="Gel Party">Gel Party</option>
            </select>

            <label for="Date">
                <h2>When would you like to book your party?</h2>
            </label>

            <input type="date"
                   id="Date"
                   name="Date"
                   min="<?php echo date('Y-m-d'); ?>"
                   required>

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

</body>
</html>
