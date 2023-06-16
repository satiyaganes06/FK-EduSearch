<?php
    include_once("../../Config/database_con.php");
    
    //Expert Info
    $sql = "SELECT * FROM expert";
    $result = mysqli_query($conn,$sql) or die("ERROR 401");
     
    while ($row = mysqli_fetch_assoc($result)){
        //Deactive Check
        $user_id = $row['user_id'];
        $expert_id = $row['expert_id'];
        $last_interaction = $row['lastUse_Date'];
        $current_date = new DateTime();
        //$days_since_last_interaction = floor(($current_date - $last_interaction) / (60 * 60 * 24));
        $last_interaction_date = new DateTime($last_interaction);


        // if ($last_interaction_date->diff($current_date)->days == 30) {

        //     header('Location: ../../Api/PHPMailer/sendDeactiveWarningEmail.php?user_id=' . $userID . '&user_email=' . $user_email .'&expert_id=' . $expert_id);
            

        // } else
        
        if($last_interaction_date->diff($current_date)->days > 30){

            // Deactivate the expert's account
            $sql1 = "DELETE FROM account WHERE user_id = '$user_id'";
            $result1 = mysqli_query($conn,$sql1) or die ("Error 404");

            $sql2 = "DELETE FROM user_profile WHERE user_id = '$user_id'";
            $result2 = mysqli_query($conn,$sql2) or die ("Error 404");

            $sql3 = "DELETE FROM expert WHERE expert_id = '$expert_id'";
            $result3 = mysqli_query($conn,$sql3) or die ("Error 404");

            echo $user_id . "<br>" . $expert_id;
           // $user_email = $row3['user_email'];

         //   header('Location: ../../Api/PHPMailer/sendDeactiveEmail.php?user_id=' . $userID . '&user_email=' . $user_email .'&expert_id=' . $expert_id);

        }
    }

    


?>