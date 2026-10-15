<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paintball Reservations</title>
</head>
<body>
    <h1>Book a Paintball Game</h1>

    <form action="reservations.php" method="POST">
        <label for="date">Choose a date:</label>
        <input type="date" id="date" name="date" required>

        <br><br>
        <label for="time">Choose a time:</label>
        <input type="time" id="time" name="time" required>

        <br><br>

        <button type="submit">Book Game</button>
    </form>
</body>
</html>
