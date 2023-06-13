<?php
session_start();

include("../../Config/database_con.php");

if (isset($_POST['submit'])) {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $id = $_POST['complaint_id'];
    $type = $_POST['typeComplaint'];
    $comp_type = "";
    $desc = $_POST['desc'];
    $date = date("Y-m-d");
    $time = date("H:i");

    if ($type === "1") {
        $comp_type = "Unsatisfied Expert''s Feedback";
    } elseif($type === "2") {
        $comp_type = "Wrongly Assigned Research Area";
    }


    $sql = "UPDATE complaint SET complaint_description = '$desc', complaint_type = '$comp_type',
    complaint_date = '$date', complaint_time = '$time'  WHERE complaint_id = '$id'"; 

    if (!mysqli_query($conn, $sql)) {
        echo 'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
?>
        <script>
            alert("The Data was Update Successfully");
            window.location = '../../View/Complaint/userViewComplaint.php';
        </script>
<?php
        $conn->close();
    }
} ?>