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
            header('Location: ../../../../View/Expert/expert_homepage.php');
            exit();
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

