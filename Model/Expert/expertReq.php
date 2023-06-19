<?php

include("../../Config/database_con.php");

session_start();
$user_id = $_SESSION['Current_user_id'];
$status = "Pending";
$expert_id = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

$sql = "INSERT INTO expert (
    expert_id,
    user_id,
    expert_Access) VALUE('$expert_id',
    '$user_id',
    '$status')";


if(!mysqli_query($conn,$sql)){
    echo'not inserted';
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}else{
    
    ?>

    <script>
        alert("Request for Expert Sucessfully");
        window.location='../../View/User/profile.php';
    </script>



    <?php
     $conn->close();
}



?>