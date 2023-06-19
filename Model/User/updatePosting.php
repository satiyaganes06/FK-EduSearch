<?php
session_start();

//If the user is not logged in, send them to the login form
if (!isset($_SESSION["Current_user_id"])) {
    ?>
    <script>
        alert("Access denied!!!");
        window.location = "../Module 1/Login/General User Login/userLogin.php";
    </script>
    <?php
} else {
    include("../../Config/database_con.php");

    $user_id = $_SESSION['Current_user_id'];
    $posting_id = $_POST['posting_id'];
    $posting_content = $_POST['posting_content'];

    $sql = "UPDATE posting SET posting_content ='$posting_content' WHERE posting_id = '$posting_id'";

    if (!$result = mysqli_query($conn, $sql)) {
        echo 'Not deleted';
        echo "Error: " . mysqli_error($conn);
    } else {
        mysqli_close($conn);
?>
        <script>
            alert("The Question was Update Successfully");
            window.history.back();
        </script>
<?php
    }
}
?>
