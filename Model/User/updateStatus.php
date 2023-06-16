<?php
session_start();

include("../../Config/database_con.php");

if (isset($_POST['confirm'])) {
    $id = $_POST['posting_id'];
    $status = "Completed";

    $sql = "UPDATE posting SET
                posting_status = '$status'
                WHERE posting_id = '$id'";

    if (!$result = mysqli_query($conn, $sql)) {
        echo 'Not deleted';
        echo "Error: " . mysqli_error($conn);
    } else {
        mysqli_close($conn);
?>
        <script>
            alert("The Posting Close Case Successfully");
            window.history.back();
        </script>
<?php
    }
}
?>
