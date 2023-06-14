<?php 
include_once('../../Config/database_con.php');


$user_id = $_GET['user_id'];

// Sanitize the user_id value
$user_id = $conn->real_escape_string($user_id);

// sql to delete a record
$sql = "DELETE FROM user_profile WHERE user_id = '$user_id'";

if ($conn->query($sql) === TRUE) {

  $sql2 = "DELETE FROM account WHERE user_id = '$user_id'";
  if($conn->query($sql2) === TRUE){
    echo "<script>
            alert('User Deleted Successfully.');
            window.location.href = '../../View/Module1/Admin/adminViewUserList.php';
          </script>";
  }
} else {
    echo "<script>
    alert('User Deletion Unsuccessful.');
    window.location.href = '../../View/Module1/Admin/adminViewUserList.php';
  </script>";
}







?>