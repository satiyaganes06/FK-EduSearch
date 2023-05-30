<?php

    include("../../Config/database_con.php");

    session_start();
    extract($_POST);  
    $uniqid = uniqid();
    $expert_id = $_SESSION['Current_user_id'];
    $status = "Pending";
    $impression = 0;

    $sql = "INSERT INTO publication (
        publication_id,
        expert_id,
        publication_author,
        publication_title,
        publication_date,
        publication_journal,
        publication_volume,
        publication_issue,
        publication_pages,
        publication_publisher,
        publication_description,
        publication_link,
        publication_impression,
        publication_status
        ) VALUE('$uniqid','$expert_id',
        '$publication_author',
        '$publication_title',
        '$publication_date', '$publication_journal', '$publication_volume', 
        '$publication_issue', '$publication_pages', '$publication_publisher', '$publication_description', '$publication_link'
        , '$impression', '$status')";
    
    
    if(!mysqli_query($conn,$sql)){
        echo'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }else{
        
        ?>

        <script>
            alert("The Data was Insert Sucessfully");
            window.location='../../../View/Expert/expert_profile.php';
        </script>



        <?php
         $conn->close();
    }
    
    

?>