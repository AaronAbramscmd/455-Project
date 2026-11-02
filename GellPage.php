
<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gell Parties</title>

    <link rel="icon" type="Image/png" href="Image/Logo.gif">
    <link rel="stylesheet" href="CSS/Nav.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 15px;
            line-height: 1.5;
        }

        header {
            background-color: #0d0d0d;
            border-bottom: 4px solid #d00000;
            box-shadow: 0 4px 12px rgba(208, 0, 0, 0.35);
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px 18px;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #d00000;
        }

        nav ul li:first-child img {
            display: block;
            width: 100px;
            height: auto;
        }

        .page-title {
            text-align: center;
            padding: 35px 15px 20px;
        }

        .page-title h1 {
            font-size: 36px;
            margin: 0;
            text-transform: uppercase;
        }

        .page-title span {
            color: #d00000;
        }

        .title-line {
            width: 90px;
            height: 4px;
            background-color: #d00000;
            margin: 14px auto;
        }

        .party-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 15px 20px 45px;
        }

        .party-info {
            background-color: #1b1b1b;
            border: 1px solid #383838;
            border-top: 5px solid #d00000;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        }

        .party-info h4 {
            color: #ff3333;
            font-size: 18px;
            margin: 10px 0;
        }

        .party-info p {
            color: #ddd;
            font-size: 15px;
            line-height: 1.6;
            margin: 12px 0;
        }

        .season {
            color: #ff4444 !important;
            font-weight: bold;
        }

        .package-container {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .package-card {
            background-color: #1b1b1b;
            border: 1px solid #383838;
            border-top: 4px solid #d00000;
            border-radius: 8px;
            padding: 22px 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        }

        .package-card h3 {
            color: white;
            font-size: 19px;
            margin: 0 0 12px;
        }

        .package-card p {
            color: #ff3333;
            font-size: 23px;
            font-weight: bold;
            margin: 10px 0;
        }

        .maximum {
            text-align: center;
            color: #ff4444;
            font-weight: bold;
            margin: 22px 0;
        }

        .includes {
            background-color: #1b1b1b;
            border: 1px solid #383838;
            border-top: 4px solid #d00000;
            border-radius: 8px;
            padding: 22px;
            text-align: center;
            margin-top: 20px;
        }

        .includes h3 {
            color: #ff3333;
            font-size: 21px;
            margin: 0 0 12px;
        }

        .includes p {
            color: #ddd;
            font-size: 15px;
            line-height: 1.8;
            margin: 0;
        }

        .booking {
            text-align: center;
            padding: 30px 15px 10px;
        }

        .booking a {
            display: inline-block;
            background-color: #d00000;
            color: white;
            text-decoration: none;
            padding: 13px 28px;
            border: 2px solid #d00000;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .booking a:hover {
            background-color: #111;
            color: white;
        }

        footer {
            background-color: #0d0d0d;
            border-top: 3px solid #d00000;
            color: #aaa;
            text-align: center;
            padding: 16px;
            font-size: 13px;
        }

        @media (max-width: 800px) {
            .package-container {
                grid-template-columns: 1fr;
                max-width: 500px;
                margin: 20px auto 0;
            }

            .party-container {
                padding: 15px;
            }

            .party-info {
                padding: 20px 15px;
            }

            .page-title h1 {
                font-size: 29px;
            }
        }

        @media (max-width: 480px) {
            nav ul {
                gap: 12px;
            }

            nav ul li:first-child img {
                width: 80px;
            }

            .party-info h4 {
                font-size: 16px;
            }

            .party-info p {
                font-size: 14px;
            }

            .package-card p {
                font-size: 21px;
            }

            .includes p {
                font-size: 14px;
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
                        <img src="/Websites/MSG/Image/Logo.gif" alt="logo" width="150" height="150">
                    </a>
                </li>

                <li><a href="MSG_HomePage.php">Home</a></li>
                <li><a href="HoursLocations.php">Hours/Locations</a></li>
                <li><a href="FieldPage.php">Paintball Field</a></li>
                <li><a href="PricesPage.php">Prices</a></li>
                <li><a href="PBirthdayPage.php">Paintball Birthday Parties</a></li>
                <li><a href="ABirthdayPage.php">Airsoft Birthday Parties</a></li>
                <li><a href="GellPage.php">Gel Ball Parties</a></li>
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

    <section class="page-title">
        <h1><span>Gel Ball</span> Parties</h1>
        <div class="title-line"></div>
    </section>

    <main class="party-container">

        <section class="party-info">

            <h4>Ultra low impact</h4>
            <h4>For ages 6-11 years old</h4>
            <h4>1.5 hour party</h4>

            <p>*Reservation and $100 deposit required</p>

            <p class="season">
                Gel ball parties available April 1st - October 31st
            </p>

        </section>

        <section class="package-container">

            <div class="package-card">
                <h3>Package #1</h3>
                <p>$229</p>
                <h3>Up to 8 players</h3>
                <p>Plus tax</p>
            </div>

            <div class="package-card">
                <h3>Package #2</h3>
                <p>$329</p>
                <h3>Up to 9-12 players</h3>
                <p>Plus tax</p>
            </div>

            <div class="package-card">
                <h3>Package #3</h3>
                <p>$429</p>
                <h3>Up to 13-15 players</h3>
                <p>Plus tax</p>
            </div>

        </section>

        <p class="maximum">
            (15 player is the maximum party size)
        </p>

        <section class="includes">

            <h3>Each gel ball package includes:</h3>

            <p>
                Admissions, gel ball guns, masks, chest protectors,
                unlimited ammo, private games, and referee
            </p>

        </section>

        <section class="booking">
            <a href="book.php">
                Book a gel party
            </a>
        </section>

    </main>

    <footer>
        <p>&copy; 2026 MSG Paintball. All Rights Reserved.</p>
    </footer>

</body>
</html>
