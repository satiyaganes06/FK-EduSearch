<?php 
include_once('../Config/database_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userId = $_POST['fpuserid'];

    // Validate the input (you can add more validation as per your requirements)
    if (empty($userId)) {
        // Handle empty fields error
        echo 'Please fill in the ID field.';
    } else {
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $query = "SELECT * FROM user_profile WHERE user_id = '$userId'";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userEmail = $row['user_email']; 

            echo 'Specific Field Value: ' . $userEmail;
        } else {
            echo 'No matching user found.';
        }

        // For the sake of this example, let's assume the password reset is successful
        echo 'Password reset request processed successfully.';
    }
}



?>