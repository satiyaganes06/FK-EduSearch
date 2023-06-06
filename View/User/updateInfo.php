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
    include_once('../Common/html/userNavBar.html');
  ?>

  <section>
    <div class="container text-center pt-3 pb-2"> 
      <h4>Update Profile</h4>
      <p>You need Admin approval before successfully update your profile</p>
    </div>
    <div class="container mt-3 p-3 align-items-center">
      <div class="col-sm-7 mx-auto col-10 col-md-8 col-lg-6">
        <form id="questionForm" action="#">
          <div class="row mb-2">
            <div class="col">
                <label class="form-label" for="researchArea">Research Area</label>
                <select class="form-select" aria-label="questionForm" id="researchArea">
                    <option disabled selected>Select your research area</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label" for="categories">Categories</label>
                <select class="form-select" aria-label="questionForm" id="categories">
                    <option disabled selected>Select your categories</option>
                </select>
            </div>
          </div>

          <!-- Message input -->
          <div class="mb-3">
            <label class="form-label" for="desc">Question</label>
            <textarea class="form-control" id="desc" rows="4"></textarea>
          </div>
          
          <!-- button -->
          <div class="button-box col-lg-12 mb-2">
            <button class="btn btn-gray fw-bold">Cancel</button>
            <button class="btn btn-primary ml-5 fw-bold">Submit</button>
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