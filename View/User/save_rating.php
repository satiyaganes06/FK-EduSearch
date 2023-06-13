<?php
include_once ("../../Config/database_con.php");
session_start();
// Create connection
$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$rating = $_POST['rating'];
$user_id = $_SESSION["Current_user_id"];
$rating = isset($_POST['rating']) ? $_POST['rating'] : null;

if ($rating === null) {
  echo "Error: Rating is not provided";
  exit;
}else{
  $sql_retrieve = "SELECT * FROM temp_user_profile";
  $result = mysqli_query($conn,$sql_retrieve) or die ("Could not execute query in view");
  //$row = mysqli_fetch_assoc($result);

  while ($row = mysqli_fetch_assoc($result)){
    if ($row['user_id'] != $user_id){
      $sql = "INSERT INTO rating (user_id, rating) VALUES ('$user_id', '$rating')";

    } else{
      $sql = "UPDATE rating SET user_id = '$user_id', rating = '$rating' where user_id = '$user_id'";
    }
  }

  if ($conn->query($sql) === TRUE) {
    ?>
        <script>
          alert("New record created successfully");
          window.location='../../../View/User/rating.php';
        </script>
          <?php
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>
