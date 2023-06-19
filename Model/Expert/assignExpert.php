<?php
    include_once("../../Config/database_con.php");

    // Get current time
    $currentTime = date("Y-m-d H:i:s");

    // First, check the postings with status "Assign" and assign them to a random expert
    $sql = "SELECT posting_id FROM posting WHERE posting_status = 'Assign'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Get all experts
        $experts = $conn->query("SELECT expert_id FROM expert");
        $expert_ids = [];
        while($row = $experts->fetch_assoc()) {
            array_push($expert_ids, $row['expert_id']);
        }

        while($row = $result->fetch_assoc()) {
            // Assign a random expert to the post
            $randomExpert = $expert_ids[array_rand($expert_ids)];
            $assignTime = date("H:i:s");
            $conn->query("UPDATE posting SET expert_id = '$randomExpert', posting_status = 'Assigned', posting_assign_time = '$assignTime' WHERE posting_id = " . $row["posting_id"]);
           
        }
    }

    // Check the postings assigned more than an hour ago and assign them to a new random expert
    $sql = "SELECT posting_id FROM posting WHERE posting_status = 'Assigned' AND TIMEDIFF('$currentTime', CONCAT(CURDATE(), ' ', posting_assign_time)) >= '00:01:00'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Get all experts
        $experts = $conn->query("SELECT expert_id FROM expert");
        $expert_ids = [];
        while($row = $experts->fetch_assoc()) {
            array_push($expert_ids, $row['expert_id']);
        }

        while($row = $result->fetch_assoc()) {
            // Assign a random expert to the post
            $randomExpert = $expert_ids[array_rand($expert_ids)];
            $assignTime = date("H:i:s");
            $conn->query("UPDATE posting SET expert_id = '$randomExpert', posting_assign_time = '$assignTime' WHERE posting_id = " . $row["posting_id"]);
           
        }
    }

    $conn->close();
?>