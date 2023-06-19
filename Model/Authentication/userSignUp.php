<?php
  include_once('../../Config/database_con.php');
  
  $role = $_REQUEST['roleSelect'];
  $userID = $_REQUEST['userID'];
  $username = $_REQUEST['username'];
  $userPassword = $_REQUEST['password'];
  $userImage = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhJLRPWYOASOmvpCMobRDM2hVldrvApmgCSY-vNCYVWbuUM6dErtEZNGAo6-XvF8K-y0k&usqp=CAU";
  $imageData = addslashes(file_get_contents($userImage));


  $sql = "INSERT INTO account (user_id, acc_password, acc_role, first_login)
  VALUES ('$userID', '$userPassword', '$role', '1')";

  $sql2 = "INSERT INTO user_profile (user_id, admin_id, user_name, user_profile_img)
  VALUES ('$userID' , '0' , '$username', '$imageData')";


  if(mysqli_query($conn, $sql)){
    if(mysqli_query($conn, $sql2)){
      echo '<script type="text/javascript">';
      echo 'alert("Sign up successful! Redirecting to login page.");';
      echo 'window.location.href = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";';
      echo '</script>';
    }else{
      echo "Error: " .$sql . "<br>" . mysqli_error($conn);
    }
 
    
  }else{
    echo "Error: " .$sql . "<br>" . mysqli_error($conn);
  }
?>