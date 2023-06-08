<?php
include_once("../../Config/database_con.php");

if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT expert_cv FROM temp_expert WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($fileData);
    $stmt->fetch();

    $decodedData = base64_decode($fileData);

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename=expert_cv.pdf');

    echo $decodedData;

    $stmt->close();
} else {
    echo "Expert ID not specified.";
}

$conn->close();
?>
