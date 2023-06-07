<?php
  session_start();
  
  //If the user is not logged in send him/her to the login form
  if(!isset( $_SESSION["Current_user_id"] )) {

      ?>
          <script>
              alert("Access denied !!!")
              window.location = "../../View/Module1/Login/GeneralUserLogin/userLogin.php";
          </script>
      <?php
  }else{
    include("../../Config/database_con.php");

    $user_id = $_SESSION["Current_user_id"] ;
    $sql = "SELECT * FROM user_profile WHERE user_id = '$user_id'";
    $result = mysqli_query($conn,$sql) or die ("Could not execute query in homepage");
    $userinfo = mysqli_fetch_assoc($result);

    $sql4 = "SELECT * FROM expert WHERE user_id = '$user_id'";
    $result4 = mysqli_query($conn,$sql4) or die ("Could not execute query in homepage");
    $expertinfo = mysqli_fetch_assoc($result4);

    $_SESSION["route"] = "profile";

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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />  
</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/userNavBar.php');
  ?>

  <section>
    <div class="container">
        <div class="infoProfile">
        <?php
          include("../../Config/database_con.php");
          while($row = $result->fetch_assoc()) {
            $id = $row["publication_id"];

            $sql2 = "SELECT * FROM user_profile WHERE user_id = '$user_id'";
            $result2 = mysqli_query($conn,$sql2) or die ("Could not execute query in homepage");
            $row2 = mysqli_fetch_assoc($result2);
        ?>
          <div class="background">
              <img 
                  id="profile-background-pic"
                  src= <?php echo $userinfo['user_profile_bg']; ?>
                  class="shadows"
                  width="100%"
                  alt="Black profile background"
                  loading="lazy"
              />
          </div>
          <div class="pictureProfile">
            <hr class="solid">
            <div class="centered">
              <img
                src=<?php echo $userinfo['user_profile_img']; ?>
                class="rounded-circle"
                height="100"
                width= "100"
                alt="Black and White Portrait of a Man"
                loading="lazy"
              />
            </div>
          </div>
          <div class="infoUser">
            <h4 class="userName">
                <strong><?php echo $userinfo['user_name']; ?></strong> 
                <a href="updateInfo.php"><i class="fa-solid fa-gear" style="color: #8d9096;"></i></a>
            </h4>
              <div class="infoFirst">
                <p>ID: <?php echo $userinfo['user_id']; ?></p>
                <p class="infoAge">Age: <?php echo $userinfo['user_age']; ?></p>
              </div>
              <p>Email: <?php echo $userinfo['user_email']; ?></p>
              <p>Academic Level: <?php echo $userinfo['user_academicStatus']; ?></p>
              <p>Social Media: <?php echo $userinfo['user_socialMedia']; ?></p>
              <p>Research Area: <?php echo $userinfo['user_researchArea']; ?></p>
          </div>
          <?php } ?>
        </div>
        <br>
        <div class="posting">
          <div class="perPosting">
              <div class="question">
                  <div class="profile">
                      <div class="profileImg">
                          <!-- Image -->
                          <img
                              src= "../../../Asset/pp.jpg"
                              class="rounded-circle shadow"
                              height="50"
                              width= "50";
                              alt="Black and White Portrait of a Man"
                              loading="lazy"
                              />
                      </div>
                      <div class="username">
                          <strong>James Cooper</strong>
                      </div>
                      <div class="status" id="status">
                          <div class="circle1" style="background-color: #84D17E;"></div>
                      </div>
                  </div>
                  <h4>What is a MAC address in networking?</h4>
                  <!-- icon section -->
                  <div class="interaction">
                      <div id="like">
                          <i id="iconLike" class="fa-regular fa-heart fa-xl"></i>
                      </div>
                      <div class="likeCounter">
                          <p>Like</p>
                      </div>
                      <div class="views">
                          <i class="fa-solid fa-eye fa-xl"></i>
                      </div>
                      <div class="viewCounter">
                          <p>View</p>
                      </div>
                      <div class="comment">
                          <i id="iconComment" class="fa-regular fa-comment fa-xl"></i>
                      </div>
                      <div class="commentCounter">
                          <p>Comment</p>
                      </div>
                      <div class="rates">
                          <i id="iconRate" class="fa-regular fa-star fa-xl"></i>
                      </div>
                      <div class="rateCounter">
                          <p>Rates</p>
                      </div>
                      <div class="dateTime">
                          <p>DateTime</p>
                      </div>
                  </div>
              </div>
              <div class="commentBox">
                  <div class="perComment">
                      <div class="profile">
                          <div class="profileImg">
                              <!-- Image -->
                              <img
                                  src= "../../../Asset/pp.jpg"
                                  class="rounded-circle shadow"
                                  height="40"
                                  width= "40";
                                  alt="Black and White Portrait of a Man"
                                  loading="lazy"
                                  />
                          </div>
                          <div class="username">
                              <strong>James Cooper</strong>
                          </div>
                      </div>
                      <div class="commentText">
                          <p>This is the additional container below the left side.</p>
                      </div>
                      <textarea id="textareaComment" placeholder="Enter your text..."></textarea>
                  </div>
              </div>
          </div>
        </div>
    </div>
  </section>
  
  <!-- Footer -->
  <?php
    include_once('../Common/html/footer.html');
  ?>


  <!-- MDB -->
  <script src="../../js/profile.js"></script>
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>