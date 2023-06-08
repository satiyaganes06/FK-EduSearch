<?php
include_once('../../Config/database_con.php');

$userId = $_GET['user_id'];
$userEmail = $_POST['email'];
$age = $_POST['age'];
$academiclvl = $_POST['academiclvl'];
$socialmedia = $_POST['socialmedia'];

// Validate the input
if (empty($userEmail) || empty($age) || empty($academiclvl) || empty($socialmedia)) {
    // Handle empty fields error
    echo '<script>alert("Please fill in all the input fields."); window.location.href = "../../View/Module1/Admin/adminEditUserProfile.php?user_id='.$userId.'";</script>';
} else{
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $queryUpdate = "UPDATE user_profile SET user_email = '$userEmail', user_age = '$age', user_academicStatus = '$academiclvl', user_socialMedia = '$socialmedia' WHERE user_id = '$userId'";

        $updateResult = mysqli_query($conn, $queryUpdate);
        if ($updateResult) {
          
            echo '<script>alert("User Details Changed Successfully."); window.location.href = "../../View/Module1/Admin/adminEditUserProfile.php?user_id='.$userId.'";</script>';
        } else {
            echo '<script>alert("Failed to update user details."); window.location.href = "../../View/Module1/Admin/adminEditUserProfile.php?user_id='.$userId.'";</script>';
        }
}
?>