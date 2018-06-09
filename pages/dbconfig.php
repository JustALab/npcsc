<?php

/** Default time zone set to India */
date_default_timezone_set('Asia/Calcutta');
	
if(!defined('HOMEURL'))
	define('HOMEURL', 'http://localhost/npcsc');

if(!defined('SERVICES_URL'))
	define('SERVICES_URL', 'http://localhost/npcsc/services/');

//date_default_timezone_set(TIMEZONE);
// This file establishes a connection to MySQL 
// and selects the database.

//Set the configuration of your MySQL server
$db_servername = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'narpavicsc';

// Connect to MySQL:
$dbc = mysqli_connect ($db_servername,$db_username,$db_password,$db_name);

// Confirm the connection and select the database:

if (mysqli_connect_errno()) {
    echo "Could not establish database connection!<br>";
    exit();
}

?>
