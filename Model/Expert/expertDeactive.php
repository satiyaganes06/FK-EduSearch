<?php

    //Expert Info
    $sql = "SELECT * FROM expert";
    $result = mysqli_query($conn,$sql) or die("ERROR 401");
     
    while ($row = mysqli_fetch_assoc($result)){
        //Deactive Check
        $userid = $row['user_id'];
        $last_interaction = $row['lastUse_Date'];
        $current_date = new DateTime();
        //$days_since_last_interaction = floor(($current_date - $last_interaction) / (60 * 60 * 24));
        $last_interaction_date = new DateTime($last_interaction);


        if ($last_interaction_date->diff($current_date)->days == 30) {

            header('Location: ../../Api/PHPMailer/sendDeactiveWarningEmail.php?user_id=' . $userID . '&user_email=' . $user_email .'&expert_id=' . $expert_id);
            

        } elseif($last_interaction_date->diff($current_date)->days > 30){
            // Deactivate the expert's account
            $sql3 = "SELECT * FROM user_profile WHERE user_id = '$userID'";
            $result3 = mysqli_query($conn,$sql3) or die("ERROR 401");
            $row3 = mysqli_fetch_assoc($result3);

            $user_email = $row3['user_email'];

            header('Location: ../../Api/PHPMailer/sendDeactiveEmail.php?user_id=' . $userID . '&user_email=' . $user_email .'&expert_id=' . $expert_id);

        }
    }

    


?>