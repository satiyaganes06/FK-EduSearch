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
  ?>
        <script>
          alert("Rating is not provided");
          window.location='../../View/User/rating.php';
        </script>
          <?php
  exit;
}else{
  $sql_retrieve = "SELECT * FROM rating WHERE user_id = '$user_id'";
  $result = mysqli_query($conn,$sql_retrieve) or die ("Could not execute query in view");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0){
    $sql = "UPDATE rating SET user_id = '$user_id', rating = '$rating' where user_id = '$user_id'";
  }else{
      $sql = "INSERT INTO rating (user_id, rating) VALUES ('$user_id', '$rating')";
  }

  if ($conn->query($sql) === TRUE) {
    ?>
        <script>
          alert("Rating Successfully Submitted! Thank You For Your Feedback!");
          window.location='../../View/User/rating.php';
        </script>
          <?php
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>
