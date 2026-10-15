<?php

$servername = "localhost";
$username   = "root";
$password	= "";
$dbname		= "msg_paintball";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}

//PDO options

$type   = "mysql";
$server = $servername;
$db     = $dbname;
$port   = 3306;
$charset = "utf8mb4";

$options	= [								// Options for how PDO works
	PDO::ATTR_ERRMODE					=> PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE		=> PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES 			=> false,
];																  // Set PDO options

//DO NOT CHANGE ANYHTING BENEATH THIS LINE
$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN
try {
	$pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
	throw new PDOException($e ->getMessage(), $e ->getcode());
	
}
?>