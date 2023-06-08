<?php

include_once('../../Config/database_con.php');
require '../PHPMailer/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userId = $_POST['fpuserid'];
    $userEmail = $_POST['fpemail'];
    $queryCheck = "SELECT * FROM account WHERE user_id = '$userId'";
    $resultCheck = mysqli_query($conn,$queryCheck) or die ("Error 404");
    if (mysqli_num_rows($resultCheck) > 0) {
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true; 
            $mail->Username = 'sgdevelopercompany@gmail.com';
            $mail->Password = 'tjgxtlddossrivuj';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
    
            // Recipients
            $mail->setFrom('sgdevelopercompany@gmail.com', 'SG Developers');
            $mail->addAddress($userEmail);
    
            // Content
            $mail->isHTML(true);
            $OTP = rand(1111,9999);
            // Set the email subject and body
            $mail->Subject = 'OTP for Forget Password';
            $mail->Body = "Dear Sir/Madam, This is your OTP code to reset your password  " . $OTP;
    
            if($mail->send()){
                    //Delete account 
                    $sql = "UPDATE account SET OTP = '$OTP' WHERE user_id = '$userId'";
                    $result = mysqli_query($conn,$sql) or die ("Error 404");
                    // Redirect back to the login page and show the OTP modal
                    $redirectUrl = "../../View/Module1/Login/GeneralUserLogin/userLogin.php?showOTPModal=true";
                    echo "<script>window.location.href='$redirectUrl';</script>";
                    exit;
    
              
            } else {
                echo "Problem 404";
            }
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
        }
    }else{
        echo '<script>alert("No record of such User ID."); window.location.href = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";</script>';
    }
   
}

?>
