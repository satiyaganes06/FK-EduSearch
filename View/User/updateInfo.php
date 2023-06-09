<?php 
session_start();

if(!isset( $_SESSION["Current_user_id"] )) {
  ?>
      <script>
          alert("Access denied !!!")
          window.location = "../Module1/Login/GeneralUserLogin/userLogin.php";
      </script>
  <?php
  }
  $user_id = $_SESSION["Current_user_id"];

  include("../../Config/database_con.php");

  $sql = "SELECT * FROM user_profile WHERE user_id ='$user_id'";
  $result = mysqli_query($conn,$sql) or die ("Could not execute query in view");
  $row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="../Complaint/css/complaintStyle.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />
</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/userNavBar.php');
  ?>

  <section>
    <div class="container text-center pt-3 pb-2"> 
      <h4>Update Profile</h4>
      <p>You need Admin approval before successfully update your profile</p>
    </div>
    <div class="container mt-3 p-3 align-items-center">
      <div class="col-sm-7 mx-auto col-10 col-md-8 col-lg-6">
        <form id="updateProfile" action="../../Model/User/updateProfile.php" method="POST">
        <div class="row mb-2">
            <div class="col" >
              <label class="form-label" for="id">ID <span style="color: red;"> *</span></label>
              <input type="text" id="id" class="form-control" placeholder="CA21100" value="<?php echo $row['user_id'] ?>" disabled/>
            </div>
            <div class="col" >
              <label class="form-label" for="name">Userame <span style="color: red;"> *</span></label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your username" value="<?php echo $row['user_name'] ?>" required/>
            </div>
        </div>
        <div class="mb-2">
            <label class="form-label" for="fullName">Full Name <span style="color: red;"> *</span></label>
            <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Enter your full name" value="<?php echo $row['user_fullName'] ?>" required/>
          </div>
          <div class="mb-2">
            <label class="form-label" for="email">Email <span style="color: red;"> *</span></label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $row['user_email'] ?>" required />
          </div>
        <div class="row mb-2">
            <div class="col" >
              <label class="form-label" for="age">Age <span style="color: red;"> *</span></label>
              <input type="text" id="age" name="age" class="form-control" placeholder="Enter your age" value="<?php echo $row['user_age'] ?>" required/>
            </div>
            <div class="col" >
              <label class="form-label" for="phoneNum">Phone Number <span style="color: red;"> *</span></label>
              <input type="text" id="phoneNum" name="phoneNum" class="form-control" placeholder="Enter your phone number" value="<?php echo $row['user_phoneNum'] ?>" required/>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col">
                <label class="form-label" for="date">Academic Level <span style="color: red;"> *</span></label>
                <select class="form-select" name="academicStatus" aria-label="typeComplaint" required>
                  <?php
                  if ($row['user_academicStatus'] != ""){
                  ?>
                  <option value="<?php echo $row['user_academicStatus']; ?> " selected hidden><?php echo $row['user_academicStatus']; ?></option>
                  <?php } else {?>
                  <option disabled selected>Please Select...</option>
                  <?php } ?>
                  <option value="Diploma">Diploma</option>
                  <option value="Degree">Degree</option>
                  <option value="Master">Master</option>
                  <option value="PhD">PhD</option>
                </select>
            </div>
            <div class="col">
              <label class="form-label" for="phoneNum">Social Media <span style="color: red;"> *</span></label>
              <input type="text" id="age" name="socialMedia" class="form-control" placeholder="Enter your link of social media" value="<?php echo $row['user_socialMedia'] ?>" required/>
            </div>
          </div>

          <div class="mb-3">
              <label class="form-label" for="type">Research Area <span style="color: red;"> *</span></label>
              <select class="form-select" name="researchArea" aria-label="typeComplaint">
                <?php
                if ($row['user_researchArea'] != ""){
                ?>
                <option value="<?php echo $row['user_researchArea']; ?> " selected hidden><?php echo $row['user_researchArea']; ?></option>
                <?php } else {?>
                <option disabled selected>Please Select...</option>
                <?php } ?>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Computer System & Networking">Computer System & Networking</option>
                <option value="Graphics & Multimedia Technology">Graphics & Multimedia Technology</option>
                <option value="Cyber Security">Cyber Security</option>
              </select>
          </div>
          
          <!-- button -->
          <div class="button-box col-lg-12 mb-2">
            <a href="profile.php" class="btn btn-gray fw-bold">Cancel</a>
            <button class="btn btn-primary ml-5 fw-bold text-white">Submit</button>
          </div>
        </form>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>