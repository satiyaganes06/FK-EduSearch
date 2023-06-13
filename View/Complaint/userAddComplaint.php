<?php
session_start();

//check session id ada ke tak
if (!isset($_SESSION['Current_user_id'])) {
  header("Location: ../Module1/Login/GeneralUserLogin/userLogin.php");
  exit;
} else {
  include("../../Config/database_con.php");

  $id = $_SESSION["Current_user_id"];
  $sql = "SELECT * FROM user_profile WHERE user_id  = '$id'";
  $result = mysqli_query($conn, $sql) or die("Could not execute query in view");
  $row = mysqli_fetch_assoc($result);
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
  <link rel="stylesheet" href="css/complaintStyle.css">

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
      <h4>Complaint Form</h4>
      <p>Please fill out the following form with
        <br>your complaint. We will review your report
        <br>and follow up as soon as possible
      </p>
    </div>
    <div class="container mt-3 p-3 align-items-center">
      <div class="col-sm-7 mx-auto col-10 col-md-8 col-lg-6">
        <form method="POST" action="../../Model/Complaint/addComplaint.php">
          <div class="mb-2">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" class="form-control" value="<?php echo $row['user_name']; ?>" disabled />
          </div>
          <div class="mb-2">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" class="form-control" value="<?php echo $row['user_email']; ?>" disabled />
          </div>
          <div class="mb-2">
            <label class="form-label" for="phoneNum">Phone Number</label>
            <input type="tel" id="phoneNum" class="form-control" value="<?php echo $row['user_phoneNum']; ?>" />
          </div>

          <div class="mb-3">
            <label class="form-label" for="type">Type of Complaints<span style="color: red;"> *</span></label>
            <select class="form-select" name="typeComplaint" required="required">
              <option>Please Select...</option>
              <option value="1">Unsatisfied Expert's Feedback</option>
              <option value="2">Wrongly Assigned Research Area</option>
            </select>
          </div>

          <!--<div class="mb-3">
            <label class="form-label" for="type">Choose Post</label>
            <select class="form-select" name="typePost">
              <option selected>Please Select...</option>
              <option value="1">Unsatisfied Expert's Feedback</option>
              <option value="2">Wrongly Assigned Research Area</option>
            </select>
          </div>-->

          <!-- Message input -->
          <div class="mb-3">
            <label class="form-label" for="desc">Brief Description<span style="color: red;"> *</span></label>
            <textarea class="form-control" id="desc" name="desc" rows="4" required></textarea>
          </div>

          <div class="mb-5">
            <label class="form-label" for="phoneNum">Upload Attachment (Optional)</label>
            <input type="file" id="attachment" name="attachment" class="form-control"/>
          </div>

          <!-- button -->
          <div class="button-box col-lg-12 mb-2">
            <a href="userViewComplaint.php" class="btn btn-gray fw-bold">Cancel</a>
            <button type="submit" class="btn btn-primary ml-5 fw-bold text-white" name="submit">Submit</button>
          </div>

        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php
  include_once('../Common/html/footer.html');
  ?>

  <script>
    var date = new Date();

    var day = date.getDate(),
      month = date.getMonth() + 1,
      year = date.getFullYear(),
      hour = date.getHours(),
      min = date.getMinutes();

    month = (month < 10 ? "0" : "") + month;
    day = (day < 10 ? "0" : "") + day;
    hour = (hour < 10 ? "0" : "") + hour;
    min = (min < 10 ? "0" : "") + min;

    var today = year + "-" + month + "-" + day,
      displayTime = hour + ":" + min;

    document.getElementById('date').value = today;
    document.getElementById("time").value = displayTime;
  </script>

  <!-- MDB -->
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>