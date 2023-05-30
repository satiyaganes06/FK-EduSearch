<?php
    require '../../Api/PHPMailer/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    $email = 'satiyaganes.sg@gmail.com';
    $name = "Satiya";
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
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Account Inactivity Warning';
        $mail->Body = 'Dear ' . $name . ',<br><br>Your account has been inactive for almost 30 days. Please log in to maintain your active status.<br><br>Best regards,<br>Your Team';

        $mail->send();
        echo "Email sent to $email.\n";
        
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}\n";

    }

?>