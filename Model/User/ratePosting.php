<?php
session_start();

include("../../Config/database_con.php");

if (isset($_POST['rate'])) {
    $id = $_POST['posting_id'];
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

    if ($rating === null) {
?>
        <script>
            alert("Rating is not provided");
            window.history.back();
        </script>
    <?php
        exit;
    }

    $sql = "UPDATE posting SET
                posting_rate = '$rating'
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