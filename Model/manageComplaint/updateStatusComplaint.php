<?php
session_start();

include("../../Config/database_con.php");

if (isset($_POST['edit'])) {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $id = $_POST['complaint_id'];
    $status = $_POST['complaintStatus'];



    if ($status === "1") {
        $comp_status = "In Investigation";
    } elseif ($status === "2") {
        $comp_status = "On Hold";
    } elseif ($status === "3") {
        $comp_status = "Resolved";
    }


    $sql = "UPDATE complaint SET complaint_status = '$comp_status' WHERE complaint_id = '$id'";

    if (!mysqli_query($conn, $sql)) {
        echo 'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
?>
        <script>
            alert("The Data was Update Successfully");
            window.location = '../../View/Module1/Admin/adminManageComplaint.php';
        </script>
<?php
        $conn->close();
    }
}
?>