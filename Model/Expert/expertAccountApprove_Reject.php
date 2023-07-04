<?php

include_once("../../Config/database_con.php");

session_start();


$user_id = $_GET['user_id'];
$action = $_GET['action'];



if($action == "Approve"){
    $current_date = date('Y-m-d H:i:s');
    $sql = "UPDATE expert set expert_Access = 'Approve', lastUse_Date = '$current_date' WHERE user_id = '$user_id'";
    $sql2 = "UPDATE account set acc_role = 'Expert' WHERE user_id = '$user_id'";
    $result2 = mysqli_query($conn, $sql2);
}elseif($action == "Reject"){

    $sql = "DELETE FROM expert WHERE user_id = '$user_id'";
   
}


$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Error 404";
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
    if($action == "Approve"){
        ?>
            <script>
                alert("Approve Expert Request Sucessfully!!!");
                window.location = '../../../View/Module1/Admin/adminUserApprovalList.php';
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("Reject Expert Request Sucessfully!!!");
                window.location = '../../../View/Module1/Admin/adminUserApprovalList.php';
            </script>
        <?php
    }
    $conn->close();

} 


?>