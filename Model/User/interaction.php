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

  }
  include("../../Config/database_con.php");

  $sql = "SELECT * FROM posting";
  $result = mysqli_query($conn,$sql) or die ("Could not execute query in view");
  //$row = mysqli_fetch_assoc($result);

  $posting_id = $row['posting_id'];

  $sql2 = "UPDATE posting SET posting_view = posting_view + 1 WHERE posting_id = '$posting_id'";
  $result2 = mysqli_query($conn, $sql2) or die("Could not execute query in view");

// Increment the like count
$_SESSION['likeCount'] = isset($_SESSION['likeCount']) ? $_SESSION['likeCount'] + 1 : 1;
// Return the updated like count
echo $_SESSION['likeCount'];

// Increment the view count
$_SESSION['viewCount'] = isset($_SESSION['viewCount']) ? $_SESSION['viewCount'] + 1 : 1;
// Return the updated view count
echo $_SESSION['viewCount'];

// Check if the view count file exists
if (file_exists('view_count.txt')) {
    // Read the current count from the file
    $count = file_get_contents('view_count.txt');
    // Increment the count by 1
    $count++;
} else {
    // If the file doesn't exist, start the count from 1
    $count = 1;
}

// Write the updated count back to the file
file_put_contents('view_count.txt', $count);

// Return the count as the response
echo $count;

?>