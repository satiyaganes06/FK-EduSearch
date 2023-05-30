<?php
include_once("../../Config/database_con.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Save comment to the database
$reply = $_POST['reply'];
$expert_id = $_SESSION['Current_user_id'];

$sql = "INSERT INTO discussion (posting_id, expert_id, user_id, discussion_content) 
            VALUES ('1251', '$expert_id', '1251', '$reply')";
$conn->query($sql);

$conn->close();
?>
