<?php

include "db.php";

$successMsg = "";
$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($password != $confirmPassword) {

        $errorMsg = "Passwords do not match.";

    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO player
                (First_Name, Last_Name, Player_Email, Password)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

        if ($stmt->execute()) {
            $successMsg = "Account created successfully!";
        } else {
            $errorMsg = "Error creating account: " . $stmt->error;
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

    <title>Create Account | MSG Paintball</title>

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

        .splat {
            display: block;
            width: 100%;
            height: auto;
            margin: 0;
        }

        h1 {
            text-align: center;
            margin-top: -100px;
            margin-bottom: 80px;
            position: relative;
            font-size: 42px;
            color: white;
            text-shadow: 3px 3px 5px black;
        }

        .registerBox {
            width: 500px;
            max-width: 90%;
            margin: 50px auto 70px auto;
            padding: 35px;
            background-color: white;
            color: #222;
            border-radius: 15px;
            border-top: 7px solid #b00000;
            box-shadow: 0 8px 25px black;
        }

        .registerBox h2 {
            text-align: center;
            color: #b00000;
            margin-top: 0;
            margin-bottom: 25px;
        }

        .registerBox label {
            display: block;
            margin-top: 14px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .registerBox input {
            width: 100%;
            padding: 11px;
            border: 1px solid #999;
            border-radius: 5px;
            font-size: 16px;
        }

        .registerBox input:focus {
            outline: none;
            border: 2px solid #b00000;
        }

        .registerButton {
            width: 100%;
            padding: 13px;
            margin-top: 25px;
            background-color: #b00000;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .registerButton:hover {
            background-color: #d00000;
        }

        .registerBox p {
            text-align: center;
            margin-top: 20px;
        }

        .registerBox a {
            color: #b00000;
            font-weight: bold;
            text-decoration: none;
        }

        .registerBox a:hover {
            text-decoration: underline;
        }

        .success {
            text-align: center;
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error {
            text-align: center;
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        footer {
            text-align: center;
            padding: 25px;
            background-color: #1b1b1b;
            border-top: 3px solid #d00000;
        }

    </style>

</head>

<body>

<header>

    <nav>

        <ul>

            <li>
                <a href="MSG_HomePage.php">
                    <img src="Logo.gif" alt="MSG Paintball Logo" width="120" height="120">
                </a>
            </li>

            <li>
                <a href="MSG_HomePage.php">Home</a>
            </li>

            <li>
                <a href="HoursLocations.php">Hours/Locations</a>
            </li>

            <li>
                <a href="#Field">Paintball Field</a>
            </li>

            <li>
                <a href="#Prices">Prices</a>
            </li>

            <li>
                <a href="#PBirthday">Paintball Birthday Parties</a>
            </li>

            <li>
                <a href="#ABirthday">Airsoft Birthday Parties</a>
            </li>

            <li>
                <a href="#Gell">Gell Ball Parties</a>
            </li>

            <li>
                <a href="#FAQ">FAQ</a>
            </li>

            <li>
                <a href="#Contact">Contact</a>
            </li>

            <li>
                <a href="https://montgomery-sporting-goods-paintball.myshopify.com/">
                    Online Store
                </a>
            </li>

            <li>
                <a href="RefLogin.php">Referee Login</a>
            </li>

        </ul>

    </nav>

</header>

<img class="splat" src="background.gif" alt="Paintball background">

<h1>Create Your Account</h1>

<div class="registerBox">

    <h2>Player Registration</h2>

    <?php if ($successMsg != "") { ?>

        <div class="success">
            <?php echo $successMsg; ?>
        </div>

    <?php } ?>

    <?php if ($errorMsg != "") { ?>

        <div class="error">
            <?php echo $errorMsg; ?>
        </div>

    <?php } ?>

    <form action="Register.php" method="POST">

        <label for="username">
            Username
        </label>

        <input
            type="text"
            id="username"
            name="username"
            placeholder="Choose a username"
            required
        >

        <label for="first_name">
            First Name
        </label>

        <input
            type="text"
            id="first_name"
            name="first_name"
            placeholder="Enter your first name"
            required
        >

        <label for="last_name">
            Last Name
        </label>

        <input
            type="text"
            id="last_name"
            name="last_name"
            placeholder="Enter your last name"
            required
        >

        <label for="email">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter your email"
            required
        >

        <label for="password">
            Password
        </label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Create a password"
            required
        >

        <label for="confirm_password">
            Confirm Password
        </label>

        <input
            type="password"
            id="confirm_password"
            name="confirm_password"
            placeholder="Enter your password again"
            required
        >

        <button class="registerButton" type="submit">
            Create Account
        </button>

    </form>

    <p>
        Already have an account?
        <a href="MSG_Login.php">Login</a>
    </p>

    <p>
        <a href="MSG_HomePage.php">Return to Home Page</a>
    </p>

</div>

<footer>

    <p>MSG Paintball | Paintball • Airsoft • Gel Ball</p>

</footer>

</body>

</html>