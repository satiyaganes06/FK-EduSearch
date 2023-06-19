<?php

include_once("../../Config/database_con.php");

$post_id = $_GET['post_id'];
$expert_id = $_GET['expert_id'];

$sql = "UPDATE posting set expert_id = '$expert_id', posting_status = 'Assigned' WHERE posting_id = '$post_id'";


$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Error 404";
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
    ?>
    <script>
        alert("Assign Sucessfully!!!");
        window.location = '../../../View/Module1/Admin/adminUserApprovalList.php';
    </script>
    <?php
    $conn->close();

} 


?>