<?php
include_once('../../Config/database_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $otp = $_POST['otp'];
    $newPass = $_POST['newPassword'];
    $confirmPass = $_POST['confirmPassword'];

    // Validate the input
    if (empty($otp) || empty($newPass) || empty($confirmPass)) {
        // Handle empty fields error
        echo 'Please fill in all the input fields.';
    } else {
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM account WHERE OTP = '$otp'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            if ($newPass !== $confirmPass) {
                
            } else {
                $queryUpdate = "UPDATE account SET acc_password = '$confirmPass' WHERE OTP = '$otp'";
                $updateResult = mysqli_query($conn, $queryUpdate);

                if ($updateResult) {
                    echo '<script>alert("Password changed successfully."); window.location.href = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";</script>';
                } else {
                    echo '<script>alert("Failed to update password."); window.location.href = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";</script>';
                }
            }
        } else {
            echo '<script>alert("Incorrect OTP."); window.location.href = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";</script>';
        }
    }
}
?>
