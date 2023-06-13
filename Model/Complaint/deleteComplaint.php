<?php
session_start();

include("../../Config/database_con.php");

if (isset($_POST['delete'])) {

    $id = $_POST['complaint_id'];

    $sql = "DELETE FROM complaint WHERE complaint_id = '$id'";

    if (!$result = mysqli_query($conn, $sql)) {
        echo 'Not deleted';
        echo "Error: " . mysqli_error($conn);
    } else {
        mysqli_close($conn);
?>
        <script>
            alert("The Data was Deleted Successfully");
            window.location = '../../View/Complaint/userViewComplaint.php';
        </script>
<?php
    }
}
?>
