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

    // Check if the user has already posted 3 questions in the current session
    $postedQuestions = $_SESSION['posted_questions'] ?? 0;

    if ($postedQuestions >= 3) {
        ?>
        <script>
            alert("You have already posted 3 questions in this session. Please try again later.");
            window.location = "../../View/User/dashboard.php";
        </script>
        <?php
        exit;
    }

    $posting_content = $_POST['question'];
    $posting_categories = $_POST['categories'];
    $posting_course = $_POST['researchArea'];
    $posting_like = 0;
    $posting_view = 0;
    $posting_status = 'Assign';
    $posting_rating = 0;
    $posting_date = date("Y-m-d H:i:s");
    $posting_title= $_POST['title'];

    $sql = "INSERT INTO posting (
        user_id,
        posting_content,
        posting_categories,
        posting_course,
        posting_like,
        posting_view,
        posting_status,
        posting_rating,
        posting_date,
        posting_title
    ) VALUE (
        '$user_id',
        '$posting_content',
        '$posting_categories',
        '$posting_course',
        '$posting_like',
        '$posting_view',
        '$posting_status',
        '$posting_rating',
        '$posting_date',
        '$posting_title'
    )";

    if (!mysqli_query($conn, $sql)) {
        echo 'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        // Increment the posted questions count in the session
        $_SESSION['posted_questions'] = $postedQuestions + 1;
        ?>
        <script>
            alert("The Data was Inserted Successfully");
            window.location = '../../View/User/question.php';
        </script>
        <?php
    }
}
?>
