<?php

include_once("../../Config/database_con.php");

session_start();

$user_id = $_SESSION['Current_user_id'];
$expert_id = $_SESSION['expertID'];

$action = $_GET['actionType'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  switch ($action) {
  
    case 'formUpdate':
        // Get the submitted form data
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phoneNum = $_POST['phoneNum'];
      $age = $_POST['age'];
      $academicLevel = $_POST['academic-level'];
      $researchArea = $_POST['research-area'];
      $socialMediaLink = $_POST['social-media-link'];


      $sql = "INSERT INTO temp_user_profile (
        user_id,
        user_name,
        user_age,
        user_email,
        user_academicStatus,
        user_researchArea,
        user_socialMedia,
        user_phoneNum
      ) VALUE('$user_id', '$name' ,'$age', '$email', '$academicLevel', '$researchArea', '$socialMediaLink', '$phoneNum')";
      $resultUser = mysqli_query($conn, $sql) or die("Could not execute query1: " . mysqli_error($conn));


      if ($_FILES["cover-letter"]["type"] == "application/pdf") {
      
        $file = file_get_contents($_FILES["cover-letter"]["tmp_name"]);
        $base64FileData = base64_encode($file);
        
        $query = "INSERT INTO temp_expert (expert_id, user_id, expert_cv) VALUE('$expert_id', '$user_id', '$base64FileData')";
        $resultExpert = mysqli_query($conn, $query) or die("Could not execute query2");

      }

      if(!$resultUser && !$resultExpert){
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
        
        break;

    case 'profileImgUpdate':

      if ($_FILES["profile-image"]["type"] == "image/jpeg" || $_FILES["profile-image"]["type"] == "image/png") {
        // Get the submitted form data
        $file = file_get_contents($_FILES["profile-image"]["tmp_name"]);
        $base64FileData = addslashes($file);

        // Insert user profile data into temp_user_profile table
        $sql = "UPDATE user_profile set user_profile_img = '$base64FileData' WHERE user_id = '$user_id'";

        $resultImg = mysqli_query($conn, $sql);


        if (!$resultImg) {
            echo "Error 404";
        } else {
            ?>
            <script>
                alert("Profile Image update sucessfully!!!");
                window.location = '../../../View/Expert/expert_profile.php';
            </script>
            <?php
            $conn->close();
        }
      } else {
          echo "Invalid image format. Only JPEG and PNG images are allowed.";
      }
      break;

    case 'profileBgUpdate':

      if ($_FILES["profile-image-bg"]["type"] == "image/jpeg" || $_FILES["profile-image-bg"]["type"] == "image/png") {
        // Get the submitted form data
        $file = file_get_contents($_FILES["profile-image-bg"]["tmp_name"]);
        $base64FileData = addslashes($file);

        // Insert user profile data into temp_user_profile table
        $sql = "UPDATE user_profile set user_profile_bg = '$base64FileData' WHERE user_id = '$user_id'";

        $resultImg = mysqli_query($conn, $sql);


        if (!$resultImg) {
            echo "Error 404";
        } else {
            ?>
            <script>
                alert("Profile Background update sucessfully!!!");
                window.location = '../../../View/Expert/expert_profile.php';
            </script>
            <?php
            $conn->close();
        }
      } else {
          echo "Invalid image format. Only JPEG and PNG images are allowed.";
      }
     break;

    default:
      echo "Error 404";
      
  }
  
}



?>
