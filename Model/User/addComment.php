<?php
session_start();

// If the user is not logged in, redirect to the login form
if (!isset($_SESSION["Current_user_id"])) {
    ?>
    <script>
        alert("Access denied !!!");
        window.location = "../Module 1/Login/General User Login/userLogin.php";
    </script>
    <?php
} else {
    include("../../Config/database_con.php");

    $comment = $_POST['reply'];
    $posting_id = $_POST['posting_id'];
    $user_id = $_SESSION["Current_user_id"];
    $time = date('H:i:s');
    $date = date('Y-m-d');

    $sql = "INSERT INTO discussion (
                posting_id,
                user_id,
                discussion_content, 
                discussion_date,
                discussion_time
                ) VALUES (
                '$posting_id',
                '$user_id',
                '$comment',
                '$date',
                '$time'
                )";

    if (!mysqli_query($conn, $sql)) {
        echo 'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        ?>
        <script>
            alert("The Data was Inserted Successfully");
            window.history.back();
        </script>
        <?php
    }
}
?>
