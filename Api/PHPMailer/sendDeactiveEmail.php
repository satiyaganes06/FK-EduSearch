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
        $mail->Body = "Dear Sir, your account has been deactivated due to inactivity.";

        if($mail->send()){
            
            //Delete account 
            $sql = "DELETE FROM account WHERE user_id = '$user_id'";
            $result = mysqli_query($conn,$sql) or die ("Error 404");

            $sql2 = "DELETE FROM user_profile WHERE user_id = '$user_id'";
            $result2 = mysqli_query($conn,$sql2) or die ("Error 404");

            $sql3 = "DELETE FROM expert WHERE expert_id = '$expert_id'";
            $result3 = mysqli_query($conn,$sql3) or die ("Error 404");

            
            ?>

                <script>
                    alert("!!! Your Account has been deactivated due to inactive !!!");
                    window.location ='../../View/Module1/Login/GeneralUserLogin/userLogin.php';
                </script>

            <?php

            
        }else{

            echo "Problem 404";

        }
        
        
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}\n";

    }

?>


