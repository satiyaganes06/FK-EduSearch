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

    // Check if 'categoriesRA' key exists in $_POST array
    if (isset($_POST['categoriesRA']) && !empty($_POST['categoriesRA'])) {
        $user_researchArea = implode(",", $_POST['categoriesRA']);
    } else {
        // Retrieve the current user's research area from the database
        $sql_retrieve = "SELECT user_researchArea FROM temp_user_profile WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql_retrieve) or die("Could not execute query in view");
        $row = mysqli_fetch_assoc($result);
        $user_researchArea = $row['user_researchArea'];
    }

    $sql_retrieve = "SELECT * FROM temp_user_profile";
    $result = mysqli_query($conn,$sql_retrieve) or die ("Could not execute query in view");
    //$row = mysqli_fetch_assoc($result);

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
              user_phoneNum
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
            )";

          }else {
          
      $sql = "UPDATE temp_user_profile SET 
              user_name = '$user_name',
              user_fullName = '$user_fullName',
              user_age = '$user_age',
              user_email = '$user_email',
              user_academicStatus = '$user_academicStatus',
              user_researchArea = '$user_researchArea',
              user_socialMedia = '$user_socialMedia',
              user_phoneNum = '$user_phoneNum',
              WHERE user_id = '$user_id'";
          }}

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