<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prices | MSG Paintball</title>

    <link rel="icon" type="image/gif" href="Image/Logo.gif">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 14px;
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
            padding: 8px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px 14px;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #d00000;
        }

        nav ul li:first-child img {
            display: block;
            width: 85px;
            height: auto;
        }

        .location {
            text-align: center;
            padding: 18px 12px;
            background-color: #191919;
            border-bottom: 1px solid #333;
        }

        .location h4 {
            color: #d00000;
            font-size: 18px;
            margin: 0 0 5px;
        }

        .location p {
            color: #ddd;
            font-size: 13px;
            margin: 3px 0;
        }

        .page-title {
            text-align: center;
            padding: 25px 15px 18px;
        }

        .page-title h1 {
            font-size: 32px;
            text-transform: uppercase;
            margin: 0;
        }

        .page-title span {
            color: #d00000;
        }

        .title-line {
            height: 4px;
            width: 80px;
            background-color: #d00000;
            margin: 10px auto;
        }

        .page-title p {
            color: #ccc;
            font-size: 13px;
            margin: 0 auto;
            max-width: 650px;
        }

        .prices-container {
            max-width: 1150px;
            margin: 0 auto;
            padding: 15px 20px 35px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            align-items: start;
        }

        .price-card {
            background-color: #1b1b1b;
            border: 1px solid #383838;
            border-top: 4px solid #d00000;
            border-radius: 7px;
            padding: 17px;
            min-width: 0;
            overflow-wrap: anywhere;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35);
            transition: border-color 0.3s;
        }

        .price-card:hover {
            border-color: #d00000;
        }

        .price-card h2 {
            color: white;
            font-size: 19px;
            margin: 0 0 10px;
            padding-bottom: 7px;
            border-bottom: 1px solid #444;
        }

        .price-card h3 {
            color: #d00000;
            font-size: 15px;
            margin: 15px 0 6px;
        }

        .price-card h4 {
            color: #d00000;
            font-size: 14px;
            margin: 12px 0 5px;
        }

        .price-card p {
            color: #ddd;
            font-size: 12px;
            line-height: 1.5;
            margin: 5px 0;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 8px;
            padding: 6px 0;
            border-bottom: 1px solid #333;
            font-size: 12px;
            line-height: 1.45;
        }

        .price-row span:first-child {
            color: #eee;
            flex: 1;
            min-width: 0;
        }

        .price-row span:last-child {
            color: #ff3333;
            font-weight: bold;
            text-align: right;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .price-row:last-child {
            border-bottom: none;
        }

        .notice {
            color: #ff4444 !important;
            font-size: 11px !important;
            font-weight: bold;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .waiver-section {
            text-align: center;
            padding: 25px 15px 35px;
            background-color: #191919;
            border-top: 1px solid #333;
        }

        .waiver-section h2 {
            font-size: 21px;
            margin: 0 0 8px;
        }

        .waiver-section h2 span {
            color: #d00000;
        }

        .waiver-section p {
            color: #ccc;
            font-size: 13px;
            margin: 5px 0 15px;
        }

        .waiver-button {
            display: inline-block;
            background-color: #d00000;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid #d00000;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .waiver-button:hover {
            background-color: #111;
            color: white;
        }

        footer {
            background-color: #0d0d0d;
            border-top: 3px solid #d00000;
            color: #aaa;
            text-align: center;
            padding: 12px;
            font-size: 11px;
        }

        footer p {
            margin: 0;
        }

        @media (max-width: 800px) {
            .prices-container {
                grid-template-columns: 1fr;
                max-width: 600px;
                padding: 15px;
                gap: 15px;
            }

            .full-width {
                grid-column: auto;
            }

            nav ul {
                gap: 10px;
            }

            nav ul li:first-child img {
                width: 75px;
            }

            .page-title h1 {
                font-size: 28px;
            }
        }

        @media (max-width: 400px) {
            .price-card {
                padding: 12px;
            }

            .price-card h2 {
                font-size: 17px;
            }

            .price-card h3 {
                font-size: 14px;
            }

            .price-row {
                font-size: 11px;
                gap: 6px;
            }

            .price-row span:last-child {
                white-space: normal;
            }

            .page-title h1 {
                font-size: 25px;
            }

            .location p {
                font-size: 12px;
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
                    <img src="/Websites/MSG/Image/Logo.gif" alt="MSG Paintball Logo">
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

<section class="location">
    <h4>Located At</h4>
    <p>162 O'Haire Road, Middletown, NY 10941</p>
    <p>Phone Number: 845 457 4678</p>
</section>

<section class="page-title">
    <h1>2026 <span>Prices</span></h1>
    <div class="title-line"></div>
    <p>Explore our walk-on prices, equipment rentals, paintballs, and discounted packages.</p>
</section>

<main class="prices-container">

    <section class="price-card">
        <h2>Walk-On Prices</h2>

        <div class="price-row">
            <span>Admission &amp; Air</span>
            <span>$20</span>
        </div>

        <div class="price-row">
            <span>Admission, Air, and Rental</span>
            <span>$35</span>
        </div>

        <h3>Rental Equipment Includes</h3>
        <p>Tippmann '98, air tank, barrel sock, and a paintball mask.</p>
    </section>

    <section class="price-card">
        <h2>Available to Rent</h2>

        <div class="price-row">
            <span>Thermal Upgrade Mask Rental</span>
            <span>$5</span>
        </div>

        <div class="price-row">
            <span>Camo Coverall Rental</span>
            <span>$10</span>
        </div>

        <div class="price-row">
            <span>Compressed Air Tank Rental</span>
            <span>$10</span>
        </div>

        <p class="notice">LIMITED QUANTITY: Compressed air tanks.</p>

        <div class="price-row">
            <span>Tippmann A-5 with Response Trigger</span>
            <span>$20</span>
        </div>

        <div class="price-row">
            <span>Planet Eclipse EMEK with PAL Hopper</span>
            <span>$20</span>
        </div>
    </section>

    <section class="price-card">
        <h2>Available to Purchase</h2>

        <div class="price-row">
            <span>Basic Gloves</span>
            <span>$5</span>
        </div>

        <div class="price-row">
            <span>Half-Finger Hard Shell Gloves</span>
            <span>$15</span>
        </div>

        <div class="price-row">
            <span>Full-Finger Hard Shell Gloves</span>
            <span>$20</span>
        </div>

        <div class="price-row">
            <span>Neck Protectors</span>
            <span>$6</span>
        </div>

        <div class="price-row">
            <span>Barrel Sock</span>
            <span>$5–$15</span>
        </div>

        <div class="price-row">
            <span>Podpack with Pods</span>
            <span>$25</span>
        </div>

        <div class="price-row">
            <span>Chest Protectors</span>
            <span>$30</span>
        </div>

        <div class="price-row">
            <span>Pods</span>
            <span>$4 Each</span>
        </div>

        <div class="price-row">
            <span>Enola Gaye Pull-Pin Paint Grenades</span>
            <span>$15 Each</span>
        </div>

        <div class="price-row">
            <span>Smoke Grenades</span>
            <span>$12 Each</span>
        </div>
    </section>

    <section class="price-card">
        <h2>Paintballs</h2>

        <p class="notice">FIELD PAINT ONLY</p>

        <h3>.68 Caliber Paintballs</h3>

        <div class="price-row">
            <span>500 Paintballs</span>
            <span>$20</span>
        </div>

        <div class="price-row">
            <span>1,000 Paintballs</span>
            <span>$35</span>
        </div>

        <div class="price-row">
            <span>2,000 Paintballs</span>
            <span>$70</span>
        </div>

        <h3>.50 Caliber Paintballs</h3>

        <p class="notice">FIELD PAINT ONLY</p>

        <div class="price-row">
            <span>500 Paintballs</span>
            <span>$20</span>
        </div>

        <div class="price-row">
            <span>2,000 Paintballs</span>
            <span>$70</span>
        </div>
    </section>

    <section class="price-card full-width">
        <h2>Discounted Rates</h2>

        <p>No minimum player count is required for these walk-on packages.</p>
        <p class="notice">Tax is not included.</p>

        <div class="price-row">
            <span>Package #1: Admission, Air, Rental Equipment, and 500 Paintballs</span>
            <span>$50</span>
        </div>

        <div class="price-row">
            <span>Package #2: Admission, Air, Rental Equipment, and 1,000 Paintballs</span>
            <span>$60</span>
        </div>

        <h3>Rental Equipment Includes</h3>
        <p>Tippmann '98, air tank, barrel sock, and a paintball mask.</p>
    </section>

</main>

<section class="waiver-section">
    <h2>Ready to Visit <span>MSG Paintball?</span></h2>
    <p>Review and print your waiver before your visit.</p>

    <a class="waiver-button" href="Printable_Waiver/Waiver.pdf" target="_blank">
        Printable Waiver
    </a>
</section>

<footer>
    <p>&copy; 2026 MSG Paintball. All Rights Reserved.</p>
</footer>

</body>
</html> 