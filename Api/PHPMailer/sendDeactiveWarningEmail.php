<?php

    include_once('../../Config/database_con.php');
    require '../PHPMailer/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    $user_id = $_GET['user_id'];
    $email = $_GET['user_email'];
    $expert_id = $_GET['expert_id'];

    
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
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        // Set the email subject and body
        $mail->Subject = 'Account Deactivation';
        $mail->Body = "Dear Sir/Madam,

        We are writing to inform you that your account with us is currently inactive. We value your business and would like to remind you of the benefits of keeping your account active.
        
        As per our records, your account has not been used for a significant period of time, and we would like to encourage you to log in and use our services again. Failure to do so may result in the deactivation of your account.
        
        Please note that deactivating your account will result in the loss of all data associated with it, including any stored information, settings, and preferences. Additionally, you will no longer be able to access any of our services or receive any updates or notifications.
        
        We understand that circumstances may have prevented you from using our services recently, and we would like to offer our assistance in any way we can. If you have any questions or concerns, please do not hesitate to contact our customer support team.
        
        Thank you for choosing our services, and we look forward to your continued patronage.
        
        Sincerely,
        
        FK-edu-search";

        if($mail->send()){
            
            
            
            echo "!!! send account inactive warning message !!!";
                   

          

            
        }else{

            echo "Problem 404";

        }
        
        
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}\n";

    }

?>


