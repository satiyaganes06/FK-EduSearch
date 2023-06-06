<?php

include_once("../../Config/database_con.php");

    $temp_user_id = $_GET['temp_id'];


    $sql2 = "DELETE FROM temp_user_profile WHERE temp_user_id = '$temp_user_id'";

    $result2 = mysqli_query($conn,$sql2) or die ("Could not execute query");  
    
    if(!$result2){
        ?>

            <script>
                alert("Profile Update Rejected Error !!!");
                window.location='../../../View/Module1/Admin/adminUserApprovalList.php';
            </script>

        <?php
    }else{
        ?>

            <script>
                
                alert("Profile Update Rejected !!!");
                window.location='../../../View/Module1/Admin/adminUserApprovalList.php';
            </script>

        <?php

        $conn->close();
    }
    
        
  

    


?>