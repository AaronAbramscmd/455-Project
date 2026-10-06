<?php

session_start();

session_unset();
session_destroy();

header("Location: MSG_Login.php");
exit();

?>