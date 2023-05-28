<?php
  include_once('../../../../Config/database_con.php');

  $role = $_REQUEST['roleSelect'];
  $userID = $_REQUEST['userID'];
  $username = $_REQUEST['username'];
  $userPassword = $_REQUEST['password'];

  $sql = "INSERT INTO account (user_id, acc_password, acc_role, first_login)
  VALUES ('$userID', '$userPassword', '$role', '1')";

  if(mysqli_query($conn, $sql)){
     echo '<script type="text/javascript">';
  echo 'alert("Sign up successful! Redirecting to login page.");';
  echo 'window.location.href = "userLogin.html";';
  echo '</script>';
    
  }else{
    echo "Error: " .$sql . "<br>" . mysqli_error($conn);
  }
?>