<?php

    include("../../Config/database_con.php");

    session_start();
    
    $posting_id = $_GET['posting_id'];
    $posting_status = $_GET['status'];

    $sql1 = "UPDATE posting set posting_status = '$posting_status' WHERE posting_id = '$posting_id'";
    
    
    if(!mysqli_query($conn,$sql1)){
        echo'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }else{
        
        ?>

        <script>
            window.location='../../../View/Expert/expert_post_list.php';
        </script>



        <?php
         $conn->close();
    }
    
    

?>