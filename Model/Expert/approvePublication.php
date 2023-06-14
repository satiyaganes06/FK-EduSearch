<?php

include_once("../../Config/database_con.php");

session_start();


$id = $_GET['pub_id'];
$status = $_GET['status'];


if($status == "Accept"){
    
    $sql = "UPDATE publication set publication_status = '$status' WHERE publication_id = '$id'";

}elseif($status == "Reject"){
    $reason = $_POST["reason"];
    $sql = "UPDATE publication set publication_status = '$status', publication_reject_reason = '$reason' WHERE publication_id = '$id'";
   
}


$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Error 404";
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
    ?>
    <script>
        alert("Publication Status update sucessfully!!!");
        window.location = '../../../View/Module1/Admin/adminUserApprovalList.php';
    </script>
    <?php
    $conn->close();

} 


?>