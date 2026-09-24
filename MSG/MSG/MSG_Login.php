```php
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Player Login | MSG Paintball</title>

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

     .splat { width: 
        100%; height: 250px; 
        object-fit: cover; 
        opacity: 0.55; }


        h1 {
            text-align: center;
            margin-top: -170px;
            position: relative;
            font-size: 42px;
            text-shadow: 3px 3px 5px black;
        }

        .loginBox {
            width: 450px;
            max-width: 90%;
            margin: 100px auto 60px auto;
            padding: 35px;
            background-color: #f2f2f2;
            color: #222;
            border-radius: 12px;
            box-shadow: 0 8px 25px black;
        }

        .loginBox h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
            color: #b00000;
        }

        .loginBox label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .loginBox input {
            width: 100%;
            padding: 12px;
            border: 1px solid #999;
            border-radius: 5px;
            font-size: 16px;
        }

        .loginBox input:focus {
            outline: none;
            border: 2px solid #b00000;
        }

        .loginBox button {
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

        .loginBox button:hover {
            background-color: #d00000;
        }

        .loginBox p {
            text-align: center;
            margin-top: 20px;
        }

        .loginBox a {
            color: #b00000;
            font-weight: bold;
            text-decoration: none;
        }

        .loginBox a:hover {
            text-decoration: underline;
        }

        .loginTitle {
            text-align: center;
            color: #b00000;
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


<img class="splat" src="background2.gif" alt="">


<h1>Player Login</h1>


<div class="loginBox">

    <h2 class="loginTitle">MSG Player Account</h2>

    <form action="MSG_Login.php" method="POST">

        <label for="username">
            Username
        </label>

        <input
            type="text"
            id="username"
            name="username"
            placeholder="Enter your username"
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
            placeholder="Enter your password"
            required
        >


        <button type="submit">
            Login
        </button>

    </form>


    <p>
        Don't have an account?
        <a href="register.php">Create Account</a>
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
```
