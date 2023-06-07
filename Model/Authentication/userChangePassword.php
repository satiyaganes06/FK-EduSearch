<?php 
include_once('../../Config/database_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $otp = $_POST['otp'];
    $newPass = $_POST['newPassword'];
    $confirmPass = $_POST['confirmPassword'];

    // Validate the input (you can add more validation as per your requirements)
    if (empty($otp) || empty($newPass) || empty($confirmPass)) {
        // Handle empty fields error
        echo 'Please fill in all the input fields.';
    } else {
        $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (!($newPass == $confirmPass)){
            
        }else{
        $query = "INSERT INTO account (acc_password, VALUE $confirmPass )WHERE OTP = '$otp'";

                $result = mysqli_query($conn, $query);

            if ($result) {
                    
                        echo 'Password Changes ';
                    } else {
                        echo 'No matching user found.';
                    }

        }
    }
}

?>