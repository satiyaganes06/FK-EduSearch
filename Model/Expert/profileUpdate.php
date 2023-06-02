<?php

include_once("../../Config/database_con.php");

session_start();
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the submitted form data
  // $profileImage = $_FILES['profile-image'];
  // $profileBgImage = $_FILES['profile-bg-image'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phoneNum = $_POST['phoneNum'];
  $age = $_POST['age'];
  $academicLevel = $_POST['academic-level'];
  $researchArea = $_POST['research-area'];
  $socialMediaLink = $_POST['social-media-link'];
 // $coverLetterFile = $_FILES['cover-letter'];

  $user_id = $_SESSION['Current_user_id'];

  $sql = "INSERT INTO temp_user_profile (
    user_id,
    user_name,
    user_age,
    user_email,
    user_academicStatus,
    user_researchArea,
    user_socialMedia,
    user_phoneNum
    ) VALUE('$user_id', '$name', '$age', '$email', '$academicLevel', '$researchArea', '$socialMediaLink', '$phoneNum')";

    $result = mysqli_query($conn, $sql) or die("Could not execute query");

  // $query = "UPDATE user_profile set user_name = '$name', user_age = '$age', user_email = '$email', user_academicStatus = '$academicLevel', user_researchArea = '$researchArea', user_socialMedia = '$socialMediaLink', user_phoneNum = '$phoneNum' WHERE user_id = '$user_id'";
  // $result = mysqli_query($conn,$query) or die ("Could not execute query");

  // $query = "UPDATE expert set expert_cv = '$pdf_blob' WHERE expert_id = '$expert_id'";
  // $result = mysqli_query($conn,$query) or die ("Could not execute query");

  if(!$result){
    echo "Error 404";

  }else{
      ?>

        <script>
            alert("Send admin to validate !!!");
            window.location='../../../View/Expert/expert_profile.php';
        </script>

      <?php
         $conn->close();
  }

      
}





?>
