<?php
include_once('../../Config/database_con.php');
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
  
    $userID = $_POST['userID'];
    $userPassword = $_POST['password'];
  
    // Perform user authentication
    if ($userID && $userPassword) {
      // Validate and sanitize the user input if necessary
      // ...
  
      // Establish a database connection
      $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
  
      // Check the connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
  
      // Prepare the SQL statement
      $query = "SELECT admin_id FROM admin WHERE admin_id = ? AND admin_password = ?";
  
      // Prepare the statement
      $stmt = mysqli_prepare($conn, $query);
  
      // Bind the parameters
      mysqli_stmt_bind_param($stmt, "ss", $userID, $userPassword);
  
      // Execute the query
      mysqli_stmt_execute($stmt);
  
      // Get the result
      mysqli_stmt_store_result($stmt);
      $count = mysqli_stmt_num_rows($stmt);
  
      // Check if a matching user is found
      if ($count > 0) {
        // Authentication successful, redirect the user
       
            header('Location: ../../../../View/Module1/Admin/adminDashboard.html');
            exit();
        
        
        
      } else {
        // Authentication failed, handle accordingly (e.g., display an error message)
        // ...
        echo '<script type="text/javascript">';
        echo 'alert("Login Fail, Please Check Your Admin ID and Password Again.");';
        echo 'window.location.href = "adminLogin.php";';
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

