<?php
include("../../Config/database_con.php");

session_start();
// Retrieve the new password from the form
$oldpassword = $_POST['oldpass'];
$newPassword = $_POST['newpass'];

// Sanitize the input to prevent SQL injection
$newPassword = mysqli_real_escape_string($conn, $newPassword);


$adminId = $_SESSION["Current_admin_id"];

$sql2 = "SELECT * from admin where admin_id = '$adminId'";
$result = mysqli_query($conn,$sql2);


if ($result->num_rows > 0) {
   
  $row = mysqli_fetch_assoc($result);
  if($row['admin_password'] == $oldpassword){

            // Update the password in the admin table
            $sql = "UPDATE admin SET admin_password = '$newPassword' WHERE admin_id = '$adminId'";
                // Execute the query
                if (mysqli_query($conn, $sql)) {
                    // Set the success message in a session variable
                    $_SESSION['password_updated'] = true;
                    
                    header('Location: ../../View/Module1/Admin/adminProfile.php');
                    exit(); // Add this line to stop executing the code below
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
        }else{
            echo "Error updating password: " . mysqli_error($conn);
            $_SESSION['password_update_error'] = true;
            header('Location: ../../View/Module1/Admin/adminProfile.php');
         }

// Close the database connection
mysqli_close($conn);
}



?>
