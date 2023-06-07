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

    $user_id = $_SESSION["Current_user_id"] ;
    $expert_id = $_SESSION["expertID"];
    
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
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">
    <link rel="stylesheet" href="css/expert_profile.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>
<body>
  
    
   <!-- Navbar -->
    <?php
      include_once('../Common/html/expertNavbar.php');
    ?>
    
    <section class="flexSection">
    
        <div class="mainSection mb-5 mt-3">
    
            <div id="profile_Component">
    
                <div id="profile_details" class="position-relative">

                    <div >
                      <?php echo '<img id="profile-background-pic" class="shadows " src="data:image/jpeg;base64,' . $userinfo['user_profile_bg'] . '" width="100%"
                        alt="Black profile background"
                        loading="lazy"">';  ?>
                      <a type="button" data-toggle="modal" data-target="#editProfileBgModal" class="edit-icon-button2">
                          <i class="fa fa-pencil" style="color:blue;"></i>
                      </a>
                    </div>
                    

                    <div class="profile_Avatar">
                      
                      <?php echo '<img class="rounded-circle shadow-5 " src="data:image/jpeg;base64,' . $userinfo['user_profile_img'] . '" height="120"
                          alt="Black and White Portrait of a Man"
                          loading="lazy"">';  ?>
                      <a type="button" data-toggle="modal" data-target="#editProfileImgModal" class="edit-icon-button">
                          <i class="fa fa-pencil" style="color:blue;"></i>
                      </a>
                    </div>

                    <div class="profile_content">
                        <div class="d-flex justify-content-between">
                       
                            <div class="d-flex">
                                <h2><strong><?php echo $userinfo['user_name']; ?></strong></h2>
                                <i class="fas fa-circle-check fa-2x ml-3" style="color: #00FF00;"></i>
                            </div>
    
                            <div style="height: 30px">
                                <button style="border-color:azure;" type="button" class="rounded-5" data-toggle="modal" data-target="#editProfileModal"><i class="fas fa-pen-to-square"></i></button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start mt-3">
                            <p class="w-50 text-truncate mr-3"><?php echo $userinfo['user_email']; ?></p>
                            <p class="w-50 text-truncate">Age : <?php echo $userinfo['user_age']; ?></p>
                        </div>

                        <div class="d-flex justify-content-start">
                            <p class="w-50 text-truncate mr-3">Academic Level : <?php echo $userinfo['user_academicStatus']; ?></p>
                            <p class="w-50 text-truncate">Last Seen : <?php echo $expertinfo['lastUse_Date']; ?></p>
                        </div>

                        <div class="d-flex justify-content-between">
                          <p class="w-50 text-truncate">Phone Number: <?php echo $userinfo['user_phoneNum']; ?></p>
                          <p class="w-50 text-truncate ml-3">Social Media : <a href=<?php echo $userinfo['user_socialMedia']; ?> target="_blank"><i class="fab fa-instagram"></i></a></p>
                        </div>

                        <div class="d-flex w-50">
                          <p class="mr-3">Research Area : </p>
                          <p class="bg-secondary rounded-6" style="font-size: 12px; padding-top: 2px; padding-right: 10px; padding-left: 10px; color: white;"><?php echo $userinfo['user_researchArea']; ?></p>
                        </div>

                        <a href="../../Model/Expert/openCV.php?expert_id=<?=$expert_id?>" target="_blank"><button class="button_View btn-dark btn rounded-8 text-white mt-3 mb-3" data-mdb-ripple-color="dark"><i class="fas fa-arrow-up-from-bracket mr-1"></i><strong>View CV</strong></button></a>
                    </div>
                </div>
                
                <div id="profile_details" class="p-5">
                  <h2><strong>Publication Popularity</strong></h2>
                    
                  <canvas id="myChart" style="width: 100%;height: 250px;"></canvas>
                </div>

                <div id="profile_details" class="p-5">
                  <div class="d-flex justify-content-between mb-3">
                    <h2 class="m-0"><strong>List of Publication</strong></h2>
                    <button class="button_View btn-dark btn rounded-8 text-white pt-1 pb-1" onclick="location.href='expert_add_publication.php'" data-mdb-ripple-color="dark"><i class="fas fa-circle-plus mr-1"></i><strong>Add</strong></button>
                  </div>

                  <div id="inMainContentOutline" class="table-responsive p-4">

                    <table class="table table-borderless  mb-0 align-middle">
                      <thead id="tableHeaderBg">
                          <tr>
                            <th style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">Bil</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;">Impression</th>
                          </tr>
                      </thead>
                      <tbody>

                        <?php
                          include("../../Config/database_con.php");
                          $bilNum = 0;
                          $expert_id = $expertinfo['expert_id'];

                          $sql = "SELECT * FROM publication WHERE expert_id = '$expert_id'";
                          $result = mysqli_query($conn,$sql);
                          $monthImpression = array();

                          while ($row = mysqli_fetch_assoc($result)){
                            $id = $row["publication_id"];
                            $monthImpression = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                            // Retrieve comments from the database
                            $sql1 = "SELECT * FROM publication WHERE expert_id = '$expert_id' ORDER BY publication_uploaded_date DESC";
                            $result1 = $conn->query($sql1);

                            if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) {
                                    $month = date('n', strtotime($row1['publication_uploaded_date']));
                                    $monthImpression[$month] += $row1['publication_impression'];
                                }
                            }

                        ?>


                         <!-- Rows -->
                        <tr>
                          <td style="width: 5%; padding: 10px;">
                              <?php echo ++$bilNum; ?>
                          </td>

                          <td style="width: 75%; padding: 10px;">
                              
                          <div class="nameEllipsis"><a id="titleClickEffect" href="../Expert/expert_view_publication.php?id=<?php echo $id; ?>"><?php echo $row['publication_title']; ?></div>
                          </td>

                          <?php
                            if($row['publication_status'] == "Accept"){
                              $color = "color:green";
                            }elseif($row['publication_status'] == "Reject"){
                              $color = "color:red";
                            }else{
                              $color = "color:blue";
                            }
                          
                          ?>

                          <td style="width: 10%; padding: 10px; <?php echo $color; ?>">
                              <span><?php echo $row['publication_status']; ?></span>
                          </td>

                          <td style="width: 15%; padding: 10px; text-align: center;">
                            <?php echo $row['publication_impression']; ?>
                          </td>
                        </tr>

                        <?php } ?>    

                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
        
        
    </section>
    
    <!-- Footer -->
    <?php
      include_once('../Common/html/footer.html');
    ?>


  <!-- Edit Profile Img Modal -->
  <div class="modal fade" id="editProfileImgModal" tabindex="-1" role="dialog" aria-labelledby="editProfileImgModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <form action="../../Model/Expert/profileUpdate.php?actionType=profileImgUpdate" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProfileImgModalLabel">Edit Profile Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- Profile Image -->
            <div class="form-group">
              <label for="profile-image">Profile Image</label>
              <input type="file"  class="form-control-file" id="profile-image" name="profile-image" required>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Edit Profile Bg Modal -->
  <div class="modal fade" id="editProfileBgModal" tabindex="-1" role="dialog" aria-labelledby="editProfileBgModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <form action="../../Model/Expert/profileUpdate.php?actionType=profileBgUpdate" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProfileBgModalLabel">Edit Profile Background</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- Profile bg -->
            <div class="form-group">
              <label for="profile-image">Profile Background</label>
              <input type="file"  class="form-control-file" id="profile-image-bg" name="profile-image-bg" required>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <form action="../../Model/Expert/profileUpdate.php?actionType=formUpdate" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- Profile Image -->
            <div class="form-group">
              <label for="profile-image">Profile Image</label>
              <input type="file"  class="form-control-file" id="profile-image" name="profile-image">
            </div>

            <!-- Profile Background Image -->
            <div class="form-group">
              <label for="profile-bg-image">Profile Background Image</label>
              <input type="file" class="form-control-file" id="profile-bg-image" name="profile-bg-image">
            </div>

            <!-- Name -->
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $userinfo['user_name']; ?>" >
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $userinfo['user_email']; ?>">
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="phone number">Phone Number</label>
              <input type="tel" class="form-control" id="phoneNum" name="phoneNum" value="<?php echo $userinfo['user_phoneNum']; ?>">
            </div>

            <!-- Age -->
            <div class="form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" id="age" name="age" value="<?php echo $userinfo['user_age']; ?>">
            </div>

            <!-- Academic Level -->
            <div class="form-group">
              <label for="academic-level">Academic Level</label>
              <input type="text" class="form-control" id="academic-level" name="academic-level" value="<?php echo $userinfo['user_academicStatus']; ?>">
            </div>

            <!-- Research Area -->
            <div class="form-group">
              <label for="research-area">Research Area</label>
              <textarea class="form-control" id="research-area" rows="3" name="research-area"><?php echo $userinfo['user_researchArea']; ?></textarea>
            </div>

            <!-- Social Media Link -->
            <div class="form-group">
              <label for="social-media-link">Social Media Link</label>
              <input type="text" class="form-control" id="social-media-link" name="social-media-link" value="<?php echo $userinfo['user_socialMedia']; ?>">
            </div>

            <!-- Cover Letter Document -->
            <div class="form-group">
              <label for="cover-letter">Cover Letter Document</label>
              <input type="file" name="cover-letter" id="cover-letter" accept="application/pdf">
            </div>
              
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Validate</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <script>
    const xValues = ["","Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const yValues = [];

    <?php for ($i = 0; $i < 12; $i++) { ?>
        yValues[<?php echo $i; ?>] = <?php echo $monthImpression[$i]; ?>;
    <?php } ?>
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,160,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 100, max:10000}}],
        }
      }
    });
  </script>

  <!-- MDB -->
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>