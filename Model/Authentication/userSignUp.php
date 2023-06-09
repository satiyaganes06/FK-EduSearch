<?php
  include_once('../../Config/database_con.php');
  
  $role = $_REQUEST['roleSelect'];
  $userID = $_REQUEST['userID'];
  $username = $_REQUEST['username'];
  $userPassword = $_REQUEST['password'];
  $image = "https://o.remove.bg/uploads/15248c13-d51e-483f-b5ca-cd600c988b75/account-profile-icon-2.png";

  $sql = "INSERT INTO account (user_id, acc_password, acc_role, first_login)
  VALUES ('$userID', '$userPassword', '$role', '1')";

  $sql2 = "INSERT INTO user_profile (user_id, admin_id, user_name, user_profile_img)
  VALUES ('$userID' , '0' , '$username', '$image')";


  if(mysqli_query($conn, $sql)){
    (mysqli_query($conn, $sql2));
  echo '<script type="text/javascript">';
  echo 'alert("Sign up successful! Redirecting to login page.");';
  echo 'window.location.href = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";';
  echo '</script>';
    
  }else{
    echo "Error: " .$sql . "<br>" . mysqli_error($conn);
  }
?>