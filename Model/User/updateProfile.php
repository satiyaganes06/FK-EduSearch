<?php
session_start();

// If the user is not logged in, redirect them to the login form
if (!isset($_SESSION["Current_user_id"])) {
    ?>
    <script>
        alert("Access denied !!!");
        window.location = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";
    </script>
    <?php
} else {
    include("../../Config/database_con.php");

    $user_id = $_SESSION["Current_user_id"];
    $user_name = $_POST['name'];
    $user_fullName = $_POST['fullName'];
    $user_age = $_POST['age'];
    $user_email = $_POST['email'];
    $user_academicStatus = $_POST['academicStatus'];
    $user_socialMedia = $_POST['socialMedia'];
    $user_phoneNum = $_POST['phoneNum'];

    // Check if 'categoriesRA' key exists in $_POST array
    if (isset($_POST['categoriesRA']) && !empty($_POST['categoriesRA'])) {
        $user_researchArea = implode(",", $_POST['categoriesRA']);
    } else {
        // Retrieve the current user's research area from the database
        $sql_query = "SELECT user_researchArea FROM temp_user_profile WHERE user_id = '$user_id'";
        $result2 = mysqli_query($conn, $sql_query) or die("Could not execute query in view");
        $row3 = mysqli_fetch_assoc($result2);
        $user_researchArea = $row3['user_researchArea'];
    }

    // Upload Image Background
    $imgContent = null;
    if (!empty($_FILES["imgBack"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["imgBack"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Check if the uploaded file is an image
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowedTypes)) {
            // Read the uploaded file
            $imgContent = file_get_contents($_FILES["imgBack"]["tmp_name"]);
            $imgContent = mysqli_real_escape_string($conn, addslashes($imgContent)); // Escape the binary data to prevent SQL injection
        }
    }

    // Upload Image Profile
    $imgProfile = null;
    if (!empty($_FILES["imgProfile"]["name"])) {
        // Get file info
        $fileName2 = basename($_FILES["imgProfile"]["name"]);
        $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);

        // Check if the uploaded file is an image
        $allowedTypes2 = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType2, $allowedTypes2)) {
            // Read the uploaded file
            $imgProfile = file_get_contents($_FILES["imgProfile"]["tmp_name"]);
            $imgProfile = mysqli_real_escape_string($conn, $imgProfile); // Escape the binary data to prevent SQL injection
        }
    }

    $sql_retrieve = "SELECT * FROM temp_user_profile WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql_retrieve) or die("Could not execute query in view");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        
        $sql = "UPDATE temp_user_profile SET
            user_name = '$user_name',
            user_fullName = '$user_fullName',
            user_age = '$user_age',
            user_email = '$user_email',
            user_academicStatus = '$user_academicStatus',
            user_researchArea = '$user_researchArea',
            user_socialMedia = '$user_socialMedia',
            user_phoneNum = '$user_phoneNum'";

        // Append imgContent and imgProfile update if the respective files are not empty
        if ($imgContent !== null) {
            $sql .= ", user_profile_bg = '$imgContent'";
        }

        if ($imgProfile !== null) {
            $sql .= ", user_profile_img = '$imgProfile'";
        }

        $sql .= " WHERE user_id = '$user_id'";
    } else {
        $sql = "INSERT INTO temp_user_profile  (
            user_id,
            user_name,
            user_fullName,
            user_age,
            user_email,
            user_academicStatus,
            user_researchArea,
            user_socialMedia,
            user_phoneNum,
            user_profile_bg,
            user_profile_img
        ) VALUES (
            '$user_id',
            '$user_name',
            '$user_fullName',
            '$user_age',
            '$user_email',
            '$user_academicStatus',
            '$user_researchArea',
            '$user_socialMedia',
            '$user_phoneNum',
            '$imgContent',
            '$imgProfile'
        )";
    }

    if (!mysqli_query($conn, $sql)) {
        echo 'not inserted';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        ?>
        <script>
            alert("The Data was updated successfully");
            window.location = '../../View/User/profile.php';
        </script>
        <?php
    }
}
?>
