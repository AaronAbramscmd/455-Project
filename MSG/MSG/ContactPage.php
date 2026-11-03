<?php


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contacts</title>
	<link rel="stylesheet" href="CSS/Contact.css">

</head>
<body>
	<header>
		<nav>
			<ul>
				<li> <a href="MSG_HomePage.php"> 
						<img src="/Websites/MSG/Image/Logo.gif" alt="logo" width="150" height="150">
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
				<li> <a href="https://montgomery-sporting-goods-paintball.myshopify.com/"> Online Store</a></li>
			</ul>
		
		</nav>
	</header>


<div class="contact-container">

    <h1>Contact Us</h1>

    <h3>Have a question? Get in touch!</h3>

    <form>

        <label for="name">Enter Name:</label>
        <input type="text" id="name" name="name"
               placeholder="Enter your name">

        <label for="gmail">Email:</label>
        <input type="email" id="gmail" name="gmail"
               placeholder="Enter email address">

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject"
               placeholder="Enter text here">

        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"
                  placeholder="Anything you would like to say?"></textarea>

        <button type="submit" name="ContactPage">Submit</button>

    </form>

</div>

</body>
</html>