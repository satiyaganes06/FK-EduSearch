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
    <link rel="stylesheet" href="css/complaintStyle.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/userNavBar.html');
  ?>

  <section>
    <div class="container text-center pt-3 pb-2"> 
      <h4>Complaint Form</h4>
      <p>Please fill out the following form with 
        <br>your complaint. We will review your report
        <br>and follow up as soon as possible</p>
    </div>
    <div class="container mt-3 p-3 align-items-center">
      <div class="col-sm-7 mx-auto col-10 col-md-8 col-lg-6">
        <form>
          <div class="mb-2">
            <label class="form-label" name="name">Name</label>
            <input type="text" id="name" class="form-control" placeholder="James Cooper" disabled/>
          </div>
          <div class="mb-2">
            <label class="form-label" name="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="jamescooper@gmail.com" disabled />
          </div>

          <div class="row mb-2">
            <div class="col">
                <label class="form-label" name="date">Date</label>
                <input type="date" id="date" class="form-control" />
            </div>
            <div class="col">
                <label class="form-label" name="phoneNum">Phone Number</label>
                <input type="tel" id="phoneNum" class="form-control" />
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" name="type">Type of Complaints</label>
            <select class="form-select" aria-label="typeComplaint">
              <option selected>Please Select...</option>
              <option value="1">Unsatisfied Expert's Feedback</option>
              <option value="2">Wrongly Assigned Research Area</option>
            </select>
          </div>

          <!-- Message input -->
          <div class="mb-3">
            <label class="form-label" for="desc">Brief Description</label>
            <textarea class="form-control" id="desc" rows="4"></textarea>
          </div>
          
          <!-- button -->
          <div class="button-box col-lg-12 mb-2">
            <a href="userViewComplaint.php" class="btn btn-gray fw-bold">Cancel</a>
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
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>