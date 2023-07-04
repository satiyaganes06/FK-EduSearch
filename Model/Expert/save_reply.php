<?php
include_once("../../Config/database_con.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Save comment to the database
session_start();

if(isset($_POST['reply'])) {
    $reply = $_POST['reply'];
    echo "Received reply: " . $reply;
} else {
    ?>
        <script>
                alert("No reply input");
                window.location='../../View/Expert/expert_reply_post.php';
        </script>
    <?php
}

$expert_id = $_SESSION['expertID'];
$user_id = $_SESSION['Current_user_id'];
$post_id = $_SESSION['current_comment_post_id'];


$sql = "INSERT INTO discussion (posting_id, expert_id, user_id, discussion_content) 
            VALUES ('$post_id', '$expert_id', '$user_id', '$reply')";
$sql2 = "UPDATE posting set posting_status = 'Revised' WHERE posting_id = '$post_id'";
$conn->query($sql2);
$conn->query($sql);

$conn->close();
?>
