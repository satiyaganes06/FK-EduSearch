<?php
session_start();

include("../../Config/database_con.php");

if(isset($_POST['submit'])){
    date_default_timezone_set('Asia/Kuala_Lumpur');
    extract($_POST);
    $id = $_SESSION['Current_user_id'];
    $status = "In Investigation";
    $post = $_POST['typePost'];
    $type = $_POST['typeComplaint'];
    $desc = $_POST['desc'];
    $date = date("Y-m-d");
    $time = date("H:i");
    $com_type = "";

    if($type === "1"){
        $com_type = "Unsatisfied Expert''s Feedback"; //escaping single quote
    }
    elseif($type === "2"){
        $com_type = "Wrongly Assigned Research Area";
    }

    $sql = "INSERT INTO complaint (user_id, posting_id, complaint_description, complaint_type, complaint_date, complaint_time, complaint_status) 
            VALUES ('$id', '$post', '$desc', '$com_type', '$date', '$time', '$status')";

    if(!mysqli_query($conn,$sql)){
        echo 'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        ?>
        <script>
            alert("The Data was Inserted Successfully");
            window.location='../../View/Complaint/userViewComplaint.php';
        </script>
        <?php
        $conn->close();
    }
}
?>
