<?php
  session_start();
  
  //If the user is not logged in send him/her to the login form
  if(!isset( $_SESSION["Current_user_id"] )) {

      ?>
          <script>
              alert("Access denied !!!")
              window.location = "../Module 1/Login/General User Login/userLogin.php";
          </script>
      <?php

  }else{
    include("../../Config/database_con.php");
    try{
      $user_id = $_SESSION['Current_user_id'];
      $posting_content = $_POST['question'];
      $posting_categories = $_POST['researchArea'];
      $posting_course = $_POST['categories'];
      $posting_like = 0;
      $posting_view = 0;
      $posting_status = 'Assign';
      $posting_rating = 0;
      $posting_date = date("Y-m-d H:i:s");

      $sql = "INSERT INTO posting (
        user_id,
        posting_content,
        posting_categories,
        posting_course,
        posting_like,
        posting_view,
        posting_status,
        posting_rating,
        posting_date
      ) VALUE (
        '$user_id',
        '$posting_content',
        '$posting_categories',
        '$posting_course',
        '$posting_like',
        '$posting_view',
        '$posting_status',
        '$posting_rating',
        '$posting_date')";
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    if(!mysqli_query($conn,$sql)){
      echo'not inserted';
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }else{
        ?>
      <script>
        alert("The Data was Insert Sucessfully");
        window.location='../../../View/User/dashboard.php';
      </script>
        <?php
    }
  }
?>