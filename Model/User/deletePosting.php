<?php
session_start();

include("../../Config/database_con.php");

if (isset($_POST['delete'])) {
    $id = $_POST['posting_id'];

    $sql = "DELETE posting, discussion FROM posting
            INNER JOIN discussion ON posting.posting_id = discussion.posting_id
            WHERE posting.posting_id = '$id'";

    if (!$result = mysqli_query($conn, $sql)) {
        echo 'Not deleted';
        echo "Error: " . mysqli_error($conn);
    } else {
        mysqli_close($conn);
?>
        <script>
            alert("The Data was Deleted Successfully");
            window.location = '../../View/User/dashboard.php';
        </script>
<?php
    }
}
?>
