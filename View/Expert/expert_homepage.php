<?php
    session_start();
      //If the user is not logged in send him/her to the login form
    if(!isset( $_SESSION["Current_user_id"] )) {

    ?>
        <script>
            alert("Access denied !!!")
            window.location = "../Module1/Login/GeneralUserLogin/userLogin.php";
        </script>
    <?php

    }else{
      include("../../Config/database_con.php");
  
      $user_id = $_SESSION['Current_user_id'];

      $sql = "SELECT * FROM publication ORDER BY publication_impression DESC";
      $result = mysqli_query($conn,$sql) or die ("Could not execute query in homepage");
      $row = mysqli_fetch_assoc($result);

      $_SESSION["route"] = "home";
  
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
    <link rel="stylesheet" href="css/expert_homepage.css">

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
        <h1><strong>Top Publication</strong></h1>

        <div id="publication_Component">
          <?php
              while($row = $result->fetch_assoc()) {
                  $id = $row["publication_id"];

                  $sql2 = "SELECT user_profile_img FROM user_profile WHERE user_id = '$user_id'";
                  $result2 = mysqli_query($conn,$sql2) or die ("Could not execute query in homepage");
                  $row2 = mysqli_fetch_assoc($result2);

                ?> 
                
                <!-- Posts -->
                <div>
                  <div class="post_publication d-flex">
                    
                    <!-- Image -->
                    <img
                      src= <?php echo $row2['user_profile_img']; ?>
                      class="rounded-circle shadow"
                      height="60"
                      alt="Black and White Portrait of a Man"
                      loading="lazy"
                    />
        
                    <!-- Content -->
                    <div class="w-100 pl-3">
        
                      <div class="d-flex justify-content-between">
                        <h6><strong><?php echo $row['publication_title'];?></strong></h6>
                        
                        <div class="d-flex align-items-center">
                          <i class="far fa-eye mr-1 fa-sm text-center" style="margin-bottom: 1em; color: #7C7C7C;"></i>
                          <p id="impression_text"><?php echo $row['publication_impression'];?></p>
                        </div>
        
                      </div>
        
                      <p id="post_desc"><?php echo $row['publication_description'];?></p>
        
                      <a href="../Expert/expert_view_publication.php?id=<?php echo $id; ?>"><button class="button_View btn-dark btn btn-block mb-4 text-white"  data-mdb-ripple-color="dark"><strong>View</strong></button></a>
                    </div>
                    
                  </div>
      
                  <hr>
                </div> 
              <?php }
          ?>
          
          

        </div>

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