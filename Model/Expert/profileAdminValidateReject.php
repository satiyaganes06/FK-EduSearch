<?php

include_once("../../Config/database_con.php");

$user_id = $_GET['userid'];
$temp_user_id = $_GET['temp_id'];


//Data from temp user profile table
$sql1 = "SELECT * FROM temp_user_profile WHERE temp_user_id = '$temp_user_id'";
$result1 = mysqli_query($conn,$sql1) or die ("Could not execute query in homepage");
$updateUserInfo = mysqli_fetch_assoc($result1);


  $name = $updateUserInfo['user_name'];
  $email = $updateUserInfo['user_email'];
  $phoneNum = $updateUserInfo['user_phoneNum'];
  $age = $updateUserInfo['user_age'];
  $academicLevel = $updateUserInfo['user_academicStatus'];
  $researchArea = $updateUserInfo['user_researchArea'];
  $socialMediaLink = $updateUserInfo['user_socialMedia'];

  $query = "UPDATE user_profile set user_name = '$name', user_age = '$age', user_email = '$email', user_academicStatus = '$academicLevel', user_researchArea = '$researchArea', user_socialMedia = '$socialMediaLink', user_phoneNum = '$phoneNum' WHERE user_id = '$user_id'";
  $result = mysqli_query($conn,$query) or die ("Could not execute query");

  // $query = "UPDATE expert set expert_cv = '$pdf_blob' WHERE expert_id = '$expert_id'";
  // $result = mysqli_query($conn,$query) or die ("Could not execute query");

  if(!$result){
    echo "Error 404";

  }else{
        $sql2 = "DELETE FROM temp_user_profile WHERE temp_user_id = '$temp_user_id'";

        $result2 = mysqli_query($conn,$sql2) or die ("Could not execute query");  
        
        if(!$result2){
            ?>

                <script>
                    alert("Profile Update error !!!");
                    window.location='../../../View/Module1/Admin/adminUserApprovalList.php';
                </script>

            <?php
        }else{
            ?>

                <script>
                    
                    alert("Profile Update successfully !!!");
                    window.location='../../../View/Module1/Admin/adminUserApprovalList.php';
                </script>

            <?php
        }
      
         $conn->close();
  }

    


?>