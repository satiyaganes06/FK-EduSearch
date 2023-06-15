<?php
  session_start();
  
  //If the user is not logged in send him/her to the login form
  if(!isset( $_SESSION["Current_user_id"] )) {

      ?>
          <script>
              alert("Access denied !!!")
              window.location = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";
          </script>
      <?php

  }else{
    include("../../Config/database_con.php");

    $user_id = $_SESSION["Current_user_id"];
    $user_name = $_POST['name'];
    $user_fullName = $_POST['fullName'];
    $user_age = $_POST['age'];
    $user_email = $_POST['email'];
    $user_academicStatus = $_POST['academicStatus'];
    $user_socialMedia = $_POST['socialMedia'];
    $user_phoneNum = $_POST['phoneNum'];
    $user_img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhJLRPWYOASOmvpCMobRDM2hVldrvApmgCSY-vNCYVWbuUM6dErtEZNGAo6-XvF8K-y0k&usqp=CAU";

    $sql_retrieve = "SELECT * FROM temp_user_profile WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql_retrieve) or die("Could not execute query in view");
    $row = mysqli_fetch_assoc($result);
  
    // Check if 'categoriesRA' key exists in $_POST array
    if (isset($_POST['categoriesRA']) && !empty($_POST['categoriesRA'])) {
      $user_researchArea = implode(",", $_POST['categoriesRA']);
    } else {
      // Retrieve the current user's research area from the database
      $user_researchArea = $row['user_researchArea'];
    }

    // Upload Image Background
    if (!empty($_FILES["imgBack"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["imgBack"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Check if the uploaded file is an image
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowedTypes)) {
            // Read the uploaded file
            $imgContent = addslashes(file_get_contents($_FILES["imgBack"]["tmp_name"]));
            $imgSize = strlen($imgContent); // Get the image size in bytes
            $imgSizeFormatted = "[BLOB - " . $imgSize . " B]"; // Format the size as [BLOB - 101 B]
        }
    }

    // Upload Image Profile
    if (!empty($_FILES["imgProfile"]["name"])) {
        // Get file info
        $fileName2 = basename($_FILES["imgProfile"]["name"]);
        $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);

        // Check if the uploaded file is an image
        $allowedTypes2 = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType2, $allowedTypes2)) {
            // Read the uploaded file
            $imgProfile = addslashes(file_get_contents($_FILES["imgProfile"]["tmp_name"]));
            $imgSize2 = strlen($imgProfile); // Get the image size in bytes
            $imgSizeFormatted2 = "[BLOB - " . $imgSize2 . " B]"; // Format the size as [BLOB - 101 B]
        }
    }

    $sql_query = "SELECT * FROM temp_user_profile";
    $result = mysqli_query($conn, $sql_query) or die("Could not execute query in view");

    while ($row = mysqli_fetch_assoc($result)){
    if ($row['user_id'] != $user_id){

      $sql = "INSERT INTO temp_user_profile (
              user_id,
              user_name,
              user_fullName,
              user_age,
              user_email,
              user_academicStatus,
              user_researchArea ,
              user_socialMedia,
              user_phoneNum,
              user_profile_bg,
              user_profile_img
              ) VALUE (
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

          }else {
          
      $sql = "UPDATE user_profile SET 
              user_name = '$user_name',
              user_fullName = '$user_fullName',
              user_age = '$user_age',
              user_email = '$user_email',
              user_academicStatus = '$user_academicStatus',
              user_researchArea = '$user_researchArea',
              user_socialMedia = '$user_socialMedia',
              user_phoneNum = '$user_phoneNum'";

              // Append imgContent and imgProfile update if the respective files are not empty
              if (!empty($_FILES["imgBack"]["name"])) {
                  $sql .= ", user_profile_bg = '$imgContent'";
              }

              if (!empty($_FILES["imgProfile"]["name"])) {
                  $sql .= ", user_profile_img = '$imgProfile'";
              }

              $sql .= " WHERE user_id = '$user_id'";
          }
        }

    if(!mysqli_query($conn,$sql)){
      echo'not inserted';
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }else{
        ?>
      <script>
        alert("The Data was update Sucessfully");
        window.location='../../../View/User/profile.php';
      </script>
        <?php
    }
  
  }
?>