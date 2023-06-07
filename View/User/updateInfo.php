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
        <form id="questionForm" action="#">
        <div class="mb-2">
            <label class="form-label" for="id">ID</label>
            <input type="text" id="id" class="form-control" placeholder="CA21100" disabled/>
          </div>
        <div class="mb-2">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" class="form-control" placeholder="James Cooper" disabled/>
          </div>
          <div class="mb-2">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="jamescooper@gmail.com" disabled />
          </div>
        <div class="mb-2">
            <label class="form-label" for="age">Age</label>
            <input type="text" id="age" class="form-control" placeholder="28"/>
          </div>

          <div class="row mb-2">
            <div class="col">
                <label class="form-label" for="date">Academic Level</label>
                <select class="form-select" aria-label="typeComplaint">
              <option disabled selected>Please Select...</option>
              <option value="Diploma">Diploma</option>
              <option value="Degree">Degree</option>
              <option value="Master">Master</option>
              <option value="PhD">PhD</option>
            </select>
            </div>
            <div class="col">
                <label class="form-label" for="phoneNum">Social Media</label>
                <input type="text" id="age" class="form-control"/>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="type">Research Area</label>
            <select class="form-select" aria-label="typeComplaint">
              <option disabled selected>Please Select...</option>
              <option value="1">Software Engineering</option>
              <option value="2">Computer System & Networking</option>
              <option value="3">Graphics & Multimedia Technology</option>
              <option value="4">Cyber Security</option>
            </select>
          </div>
          
          <!-- button -->
          <div class="button-box col-lg-12 mb-2">
            <a href="profile.php" class="btn btn-gray fw-bold">Cancel</a>
            <a class="btn btn-primary ml-5 fw-bold text-white">Submit</a>
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
  <script src="../../js/posting.js"></script>    
  <script src="../../js/question.js"></script>
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>