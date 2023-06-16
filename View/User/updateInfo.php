<?php
session_start();

if (!isset($_SESSION["Current_user_id"])) {
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
$result = mysqli_query($conn, $sql) or die("Could not execute query in view");
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
        <form id="updateProfile" action="../../Model/User/updateProfile.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-2">
            <div class="col">
              <label class="form-label" for="id">ID <span style="color: red;"> *</span></label>
              <input type="text" id="id" class="form-control" placeholder="CA21100" value="<?php echo $row['user_id'] ?>" disabled />
            </div>
            <div class="col">
              <label class="form-label" for="name">Username <span style="color: red;"> *</span></label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your username" value="<?php echo $row['user_name'] ?>" required />
            </div>
          </div>
          <div class="mb-2">
            <label class="form-label" for="fullName">Full Name <span style="color: red;"> *</span></label>
            <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Enter your full name" value="<?php echo $row['user_fullName'] ?>" required />
          </div>
          <div class="mb-2">
            <label class="form-label" for="email">Email <span style="color: red;"> *</span></label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $row['user_email'] ?>" required />
          </div>
          <div class="row mb-2">
            <div class="col">
              <label class="form-label" for="age">Age <span style="color: red;"> *</span></label>
              <input type="text" id="age" name="age" class="form-control" placeholder="Enter your age" value="<?php echo $row['user_age'] ?>" required />
            </div>
            <div class="col">
              <label class="form-label" for="phoneNum">Phone Number <span style="color: red;"> *</span></label>
              <input type="text" id="phoneNum" name="phoneNum" class="form-control" placeholder="Enter your phone number" value="<?php echo $row['user_phoneNum'] ?>" required />
            </div>
          </div>
          <div class="row mb-2">
            <div class="col">
              <label class="form-label" for="profBack">Profile Background</label>
              <input type="file" name="imgBack" id="imgBack" class="form-control" />
            </div>
            <div class="col">
              <label class="form-label" for="imgProfile">Profile Picture</label>
              <input type="file" name="imgProfile" id="imgProfile" class="form-control" />
            </div>
          </div>

          <div class="row mb-2">
            <div class="col">
              <label class="form-label" for="date">Academic Level <span style="color: red;"> *</span></label>
              <select class="form-select" name="academicStatus" aria-label="typeComplaint" required>
                <?php
                if ($row['user_academicStatus'] != "") {
                ?>
                  <option value="<?php echo $row['user_academicStatus']; ?> " selected hidden><?php echo $row['user_academicStatus']; ?></option>
                <?php } else { ?>
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
              <input type="text" id="socialMedia" name="socialMedia" class="form-control" placeholder="Enter your link of social media" value="<?php echo $row['user_socialMedia'] ?>" required />
            </div>
          </div>

          <div class="row mb-2">
            <div class="col">
              <label class="form-label" for="type">Research Area (Course) <span style="color: red;"> *</span></label>
              <select onchange="myFunction()" class="form-select" name="researchArea" id="researchArea" aria-label="typeComplaint">
                <?php
                if ($row['user_researchArea'] != "") {
                ?>
                  <option value="<?php echo $row['user_researchArea']; ?> " selected hidden><?php echo $row['user_researchArea']; ?></option>
                <?php } else { ?>
                  <option hidden selected>Please Select...</option>
                <?php } ?>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Computer System & Networking">Computer System & Networking</option>
                <option value="Graphics & Multimedia Technology">Graphics & Multimedia Technology</option>
                <option value="Cyber Security">Cyber Security</option>
              </select>
            </div>
            <div class="col" id="checkbox" style="display:none">
              <label class="form-label" for="categoriesRA">Research Area (Categories) <span style="color: red;"> *</span></label>
              <div class="form-check" id="BCS" style="display:none">
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Human Computer Interaction">
                <label class="form-check-label" for="defaultCheck1">Human Computer Interaction</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Web Engineering">
                <label class="form-check-label" for="defaultCheck1">Web Engineering</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Software Maintenance & Evolution">
                <label class="form-check-label" for="defaultCheck1">Software Maintenance & Evolution</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Software Testing">
                <label class="form-check-label" for="defaultCheck1">Software Testing</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Formal Method">
                <label class="form-check-label" for="defaultCheck1">Formal Method</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Software Quality Assurance">
                <label class="form-check-label" for="defaultCheck1">Software Quality Assurance</label><br>
              </div>
              <div class="form-check" id="BCN" style="display:none">
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Network technologies">
                <label class="form-check-label" for="defaultCheck1">Network technologies</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Network Services Administration">
                <label class="form-check-label" for="defaultCheck1">Network Services Administration</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Distributed & Parallel Computing">
                <label class="form-check-label" for="defaultCheck1">Distributed & Parallel Computing</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Network Analysis & Design">
                <label class="form-check-label" for="defaultCheck1">Network Analysis & Design</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Network Management">
                <label class="form-check-label" for="defaultCheck1">Network Management</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Structured Networks Cabling">
                <label class="form-check-label" for="defaultCheck1">Structured Networks Cabling</label><br>
              </div>
              <div class="form-check" id="BCG" style="display:none">
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Fundamental of Digital Media Design">
                <label class="form-check-label" for="defaultCheck1">Fundamental of Digital Media Design</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Computer Graphics">
                <label class="form-check-label" for="defaultCheck1">Computer Graphics</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Computer Games Programming I">
                <label class="form-check-label" for="defaultCheck1">Computer Games Programming I</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Virtual Reality">
                <label class="form-check-label" for="defaultCheck1">Virtual Reality</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="3D Modelling & Animation">
                <label class="form-check-label" for="defaultCheck1">3D Modelling & Animation</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Project Development Workshop">
                <label class="form-check-label" for="defaultCheck1">Project Development Workshop</label><br>
              </div>
              <div class="form-check" id="BCY" style="display:none">
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Cyber Law & Security Policy">
                <label class="form-check-label" for="defaultCheck1">Cyber Law & Security Policy</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Cyber Threat Intelligence">
                <label class="form-check-label" for="defaultCheck1">Cyber Threat Intelligence</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Cybersecurity Operations">
                <label class="form-check-label" for="defaultCheck1">Cybersecurity Operations</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Cybercrime & Forensics Computing">
                <label class="form-check-label" for="defaultCheck1">Cybercrime & Forensics Computing</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Penetration Testin">
                <label class="form-check-label" for="defaultCheck1">Penetration Testin</label><br>
                <input class="form-check-input" name="categoriesRA[]" type="checkbox" value="Cryptography">
                <label class="form-check-label" for="defaultCheck1">Cryptography</label><br>
              </div>
            </div>
          </div>

          <!-- button -->
          <div class="button-box col-lg-12 mb-2">
            <a href="profile.php" class="btn btn-gray fw-bold">Cancel</a>
            <button class="btn btn-primary ml-5 fw-bold text-white">Submit</button>
            <!--<a href="#confirmModal" data-toggle="modal" class="btn btn-primary ml-5 fw-bold text-white">Submit</a>-->
            <?php include('popup.php'); ?>
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
  <script src="../../js/updateProfile.js"></script>
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>