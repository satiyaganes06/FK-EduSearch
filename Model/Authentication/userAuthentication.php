<?php
include_once('../../Config/database_con.php');

// if($_SERVER["REQUEST_METHOD"] == "POST"){

//     $role = $_REQUEST['roleSelect'];
//   $userID = $_REQUEST['userID'];
//   $userPassword = $_REQUEST['password'];

//   $sql = "SELECT user_id FROM account WHERE user_id = '$userID' , acc_password = '$userPassword' and acc_role = '$role'";

//   $result = mysqli_query($conn,$sql);
//   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//   $active = $row['active'];

//   $count = mysqli_num_rows($result);

//   if($count == 1){
   
//     if($role == "User")
//     {
//         header("location=dashboard.php");
//     }
//   }else{
//     $error = "Your Role, User ID or Password is invalid";
//     echo '<script type="text/javascript">';
//   echo 'alert("Your Role, User ID or Password is invalid.");';
//   echo 'window.location.href = "userLogin.html";';
//   echo '</script>';
//   }
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $role = $_POST['roleSelect'];
    $userID = $_POST['userID'];
    $userPassword = $_POST['password'];
  
    // Perform user authentication
    if ($role && $userID && $userPassword) {
      // Validate and sanitize the user input if necessary
      // ...
  
      // Establish a database connection
      $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
  
      // Check the connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
  
      // Prepare the SQL statement
      $query = "SELECT user_id FROM account WHERE user_id = ? AND acc_password = ? AND acc_role = ?";
  
      // Prepare the statement
      $stmt = mysqli_prepare($conn, $query);
  
      // Bind the parameters
      mysqli_stmt_bind_param($stmt, "sss", $userID, $userPassword, $role);
  
      // Execute the query
      mysqli_stmt_execute($stmt);
  
      // Get the result
      mysqli_stmt_store_result($stmt);
      $count = mysqli_stmt_num_rows($stmt);
  
      // Check if a matching user is found
      if ($count > 0) {

        session_start();
        $_SESSION["Current_user_id"] = $userID;
        // Authentication successful, redirect the user
        if($role == "Expert"){

          //Expert Info
          $sql = "SELECT * FROM expert WHERE user_id = '$userID'";
          $result = mysqli_query($conn,$sql) or die("ERROR 401");
          $row = mysqli_fetch_assoc($result);

          $expert_id = $row['expert_id'];
          $_SESSION["expertID"] = $expert_id;

          //Deactive Check
          $last_interaction = $row['lastUse_Date'];
          $current_date = new DateTime();
          //$days_since_last_interaction = floor(($current_date - $last_interaction) / (60 * 60 * 24));
          $last_interaction_date = new DateTime($last_interaction);


          if ($last_interaction_date->diff($current_date)->days > 30) {

            // Deactivate the expert's account
            $sql3 = "SELECT * FROM user_profile WHERE user_id = '$userID'";
            $result3 = mysqli_query($conn,$sql3) or die("ERROR 401");
            $row3 = mysqli_fetch_assoc($result3);

            $user_email = $row3['user_email'];

            header('Location: ../../Api/PHPMailer/sendDeactiveEmail.php?user_id=' . $userID . '&user_email=' . $user_email .'&expert_id=' . $expert_id);

          } else {
              
              // Update the last interaction date to the current date
              $sql4 = "UPDATE expert SET lastUse_Date = NOW() WHERE user_id = '$userID'";
              mysqli_query($conn, $sql4);

              header('Location: ../../../../View/Expert/expert_homepage.php');
              exit();
          }
          
          
            
        }else{
            header('Location: ../../../../View/User/dashboard.php');
            exit();
        }
        
      } else {
        // Authentication failed, handle accordingly (e.g., display an error message)
        // ...
        echo '<script type="text/javascript">';
        echo 'alert("Login Fail, Please Check Your Role, User ID and Password Again.");';
        echo 'window.location.href = "userLogin.php";';
        echo '</script>';
      }
  
      // Close the statement and connection
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    } else {
      // Handle empty or invalid form data
      // ...
    }
  }



  ?>

