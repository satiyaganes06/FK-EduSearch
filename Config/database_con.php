<!-- Create a connect to SQL Server -->

<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "fk_edu_search";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (!$conn) {
	echo "Connection failed!";
}
