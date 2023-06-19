<!-- Create a connect to SQL Server -->

<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cb21132";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (!$conn) {
	echo "Connection failed!";
}
