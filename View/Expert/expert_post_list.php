<?php
  session_start();

  //If the user is not logged in send him/her to the login form
  if(!isset( $_SESSION["Current_user_id"] )) {

      ?>
          <script>
              alert("Access denied !!!")
              window.location = "../Module 1/Login/General User Login/userLogin.php";
          </script>
      <?php

  }else{
    include("../../Config/database_con.php");

    //Post Info
    $expert_id = $_SESSION['expertID'];
    $sql = "SELECT * FROM posting WHERE expert_id = '$expert_id' AND posting_status = 'Accepted'";
    $result = mysqli_query($conn,$sql) or die ("Could not execute query in homepage");

    $_SESSION["route"] = "post";

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK-Edu Search</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--Bootstrap Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">
    <link rel="stylesheet" href="css/expert_post_list.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>
<body>
  
    
    <!-- Navbar -->
    <?php
        include_once('../Common/html/expertNavbar.php');
    ?>
    
    <section class="flexSection">
        <div class="mainSection mb-5">
            <h1><strong>View Post</strong></h1>
            <div id="publication_Component">
                
                <?php
                if ($result->num_rows > 0) {
                    // Loop through each row and display the data
                    while ($row = $result->fetch_assoc()) {
                        $userID = $row["user_id"];
                        $post_id = $row["posting_id"];
                        //User Info
                        $sql2 = "SELECT * FROM user_profile WHERE user_id = '$userID'";
                        $result2 = mysqli_query($conn,$sql2) or die ("Could not execute query in homepage");
                        $row2 = mysqli_fetch_assoc($result2); 
                        ?> 
                        
                        <!-- Posts -->
                        <div class="post">
                            <div class="d-flex">
                                <!-- Image -->
                                <?php if(empty($row2['user_profile_img'])){
                                echo '<img class="rounded-circle " src="' . "https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541" . '" height="60"
                                alt="Black and White Portrait of a Man"
                                loading="lazy"">';
                                }else{
                                echo '<img class="rounded-circle shadow" src="data:image/jpeg;base64,' . base64_encode($row2['user_profile_img']) . '" height="60"
                                    alt="Black and White Portrait of a Man"
                                    loading="lazy"">';
                                } ?>
                    
                                <!-- Content -->
                                <div class="w-100 pl-3">
                                
                                    <div class="d-flex justify-content-between">
                                        <h6><strong><?php echo $row['posting_title']; ?></strong></h6>
                                        
                                        <div class="d-flex">
                                            <p id="datetime_text" class="pr-1"><?php echo $row['posting_date']; ?></p>
                                            <p id="datetime_text"><?php echo $row['posting_assign_time']; ?></p>
                                        </div>
                        
                                    </div>

                                    <p id="post_desc"><?php echo $row['posting_content']; ?></p>
                    
                                </div>
                                
                            </div>

                            <div class="d-flex mb-3">

                                <div class="d-flex align-items-center mr-4">
                                    <i class="fas fa-heart text-danger"></i>
                                    <p class="likeRate_text"><?php echo $row['posting_like']; ?> Likes</p>
                                </div>

                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning"></i>
                                    <p class="likeRate_text">15 Likes</p>
                                </div>
                                
                                
                            </div>

                            <hr>

                            <a href="../Expert/expert_reply_post.php?post_id=<?php echo $post_id; ?>&user_id=<?php echo $userID; ?>"><button class="button_View btn-dark btn btn-block text-white"  data-mdb-ripple-color="dark"><strong>Comment</strong></button></a>

                        </div>

                    <?php }
                
                    }else {
                        ?>
                            <div class="text-center" style="height: 200px; margin:100px">
                                <p><?php echo "No post found.";?></p>
                            </div>
                        <?php
                }?>
                    
                        
    
        </div>
        
        
      </section>
    
    <!-- Footer -->
    <?php
        include_once('../Common/html/footer.html');
    ?>

  <!-- MDB -->
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>