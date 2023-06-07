<?php
include_once ("../../Config/database_con.php");

// Create connection
$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$rating = $_POST['rating'];
$rating = isset($_POST['rating']) ? $_POST['rating'] : null;

if ($rating === null) {
  echo "Error: Rating is not provided";
  exit;
}else{

$sql = "INSERT INTO ratings (rating) VALUES ('$rating')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
