
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['player_id']) || (int)$_SESSION['player_id'] <= 0) {
    header("Location: MSG_Login.php");
    exit();
}

$playerID = (int)$_SESSION['player_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_booking'])) {

    $gameID = filter_input(INPUT_POST, 'game_id', FILTER_VALIDATE_INT);

    if ($gameID && $gameID > 0) {

        $sql = "DELETE FROM game
                WHERE Game_ID = ? AND Player_ID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $gameID, $playerID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['booking_message'] = "Your reservation has been cancelled successfully.";
        } else {
            $_SESSION['booking_message'] = "Reservation not found. It may already have been cancelled.";
        }

        $stmt->close();

    } else {
        $_SESSION['booking_message'] = "Invalid reservation.";
    }

    header("Location: Account.php");
    exit();
}

$message = $_SESSION['booking_message'] ?? '';
unset($_SESSION['booking_message']);

$sql = "SELECT Player_ID, First_Name, Last_Name, Player_Email
        FROM player
        WHERE Player_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $playerID);
$stmt->execute();

$result = $stmt->get_result();
$player = $result->fetch_assoc();

$stmt->close();

$sql = "SELECT Game_ID, Game_Type, `Date`, `Time`, Location
        FROM game
        WHERE Player_ID = ?
        ORDER BY `Date` ASC, `Time` ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $playerID);
$stmt->execute();

$reservations = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Account Page | MSG Paintball</title>

    <link rel="icon" type="image/gif" href="Image/Logo.gif">
    <link rel="stylesheet" href="CSS/Nav.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #111;
            color: white;
        }

        header {
            background-color: #0d0d0d;
            border-bottom: 3px solid #d00000;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
        }

        .account {
            width: 600px;
            max-width: 90%;
            margin: 50px auto;
            background-color: #1b1b1b;
            padding: 30px;
            border: 1px solid #d00000;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }

        .account h1 {
            text-align: center;
            color: white;
        }

        .accountInfo {
            font-size: 18px;
            margin-top: 25px;
        }

        .accountInfo p {
            padding: 12px;
            border-bottom: 1px solid #444;
            overflow-wrap: anywhere;
        }

        .accountButtons {
            text-align: center;
            margin-top: 30px;
        }

        .accountButtons a,
        .cancelButton {
            display: inline-block;
            background-color: #b00000;
            color: white;
            padding: 12px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .accountButtons a:hover,
        .cancelButton:hover {
            background-color: #d00000;
        }

        .reservations {
            width: 900px;
            max-width: 90%;
            margin: 30px auto 50px;
            background-color: #1b1b1b;
            padding: 30px;
            border: 1px solid #d00000;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }

        .reservations h2 {
            text-align: center;
            color: white;
        }

        .reservationCard {
            background-color: #111;
            border: 1px solid #444;
            border-left: 4px solid #d00000;
            border-radius: 6px;
            padding: 20px;
            margin: 20px 0;
        }

        .reservationCard h3 {
            color: white;
        }

        .reservationCard p {
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .message {
            text-align: center;
            background-color: #333;
            border-left: 4px solid #d00000;
            padding: 12px;
            border-radius: 5px;
        }

        .empty {
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 600px) {
            .account,
            .reservations {
                padding: 18px;
            }
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

<div class="account">

    <h1>My Account</h1>

    <div class="accountInfo">

        <p>
            <strong>First Name:</strong>
            <?php echo htmlspecialchars($player['First_Name'] ?? ''); ?>
        </p>

        <p>
            <strong>Last Name:</strong>
            <?php echo htmlspecialchars($player['Last_Name'] ?? ''); ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?php echo htmlspecialchars($player['Player_Email'] ?? ''); ?>
        </p>

    </div>

    <div class="accountButtons">
        <a href="MSG_HomePage.php">Back to Home</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

<div class="reservations">

    <h2>My Reservations</h2>

    <?php if ($message !== ''): ?>
        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>

    <?php if ($reservations->num_rows > 0): ?>

        <?php while ($booking = $reservations->fetch_assoc()): ?>

            <div class="reservationCard">

                <h3>
                    <?php echo htmlspecialchars($booking['Game_Type']); ?>
                </h3>

                <p>
                    <strong>Date:</strong>
                    <?php
                    echo htmlspecialchars(
                        date('F j, Y', strtotime($booking['Date']))
                    );
                    ?>
                </p>

                <p>
                    <strong>Time:</strong>
                    <?php echo htmlspecialchars($booking['Time']); ?>
                </p>

                <p>
                    <strong>Field:</strong>
                    <?php echo htmlspecialchars($booking['Location']); ?>
                </p>

                <form method="POST"
                      action="Account.php"
                      onsubmit="return confirm('Are you sure you want to cancel this reservation?');">

                    <input type="hidden"
                           name="game_id"
                           value="<?php echo (int)$booking['Game_ID']; ?>">

                    <button type="submit"
                            name="cancel_booking"
                            class="cancelButton">
                        Cancel Reservation
                    </button>

                </form>

            </div>

        <?php endwhile; ?>

    <?php else: ?>

        <p class="empty">
            You currently have no reservations.
        </p>

    <?php endif; ?>

</div>

<?php
$stmt->close();
$conn->close();
?>

</body>
</html>
