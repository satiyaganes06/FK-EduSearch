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
    $sql = "SELECT posting_id FROM posting WHERE posting_status = 'Assigned' AND TIMEDIFF('$currentTime', CONCAT(CURDATE(), ' ', posting_assign_time)) >= '01:0:00'";
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
            $conn->query("UPDATE posting SET expert_id = '$randomExpert' WHERE posting_id = " . $row["posting_id"]);
           
        }
    }

    $sql = "SELECT posting_id FROM posting WHERE posting_status = 'Assigned' AND TIMEDIFF('$currentTime', CONCAT(CURDATE(), ' ', posting_assign_time)) >= '24:00:00'";
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
            $conn->query("UPDATE posting SET expert_id = '', posting_status = 'Expiry' WHERE posting_id = " . $row["posting_id"]);
           
        }
    }

    $sql = "SELECT * FROM posting WHERE posting_status = 'Assigned'";
    $result = $conn->query($sql);
     
    while ($row = mysqli_fetch_assoc($result)){
        //Deactive Check
        $posting_id = $row['posting_id'];
        $posting_date = $row['posting_date'];
        $current_date = new DateTime();
        //$days_since_last_interaction = floor(($current_date - $last_interaction) / (60 * 60 * 24));
        $postingDate = new DateTime($posting_date);


        echo "Its working <br>";
        if($postingDate->diff($current_date)->days >= 1){

            $conn->query("UPDATE posting SET expert_id = '', posting_status = 'Expiry' WHERE posting_id ='$posting_id' ");


        }
    }
    

    $conn->close();
?>