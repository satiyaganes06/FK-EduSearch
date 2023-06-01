<?php

include_once("../../Config/database_con.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    session_start();
    $user_id = $_SESSION['Current_user_id'];
    $sql3 = "SELECT * FROM user_profile WHERE user_id  = '$user_id'";
    $result3 = mysqli_query($conn,$sql3) or die ("Could not execute query in view");
    $row3 = mysqli_fetch_assoc($result3);
}

// Retrieve comments from the database
$sql = "SELECT * FROM discussion ORDER BY discussion_time DESC";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reply = $row['discussion_content'];
        $date = $row['discussion_date'];
        $time = $row['discussion_time'];

        echo '<div class="ml-5 mt-3 d-flex">

        <!-- Image -->
        <img
            src='. $row3['user_profile_img'] . '
            class="rounded-circle shadow"
            height="40"
            alt="Black and White Portrait of a Man"
            loading="lazy"
        />

        <!-- Content -->
        <div class="w-100 pl-3">

          <div class="d-flex justify-content-between">
              <h6 class="w-75"><strong>'. $row3['user_name'] .'</strong></h6>
              
              <div class="d-flex">
                  <p id="datetime_text" class="pr-2">'. $date . '</p>
                  <p id="datetime_text">'. $time . '</p>
              </div>

          </div>

          <p id="post_desc">'. $reply . '</p>

        </div>
      </div>';
    }
} else {
    echo '<br><p>No comments found.</p>';
}

$conn->close();
?>
