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
  $_SESSION["user_route"] = "rating";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/6en8XCp+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJoa3" crossorigin="anonymous">


    <!--Bootstrap Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="css/dashboardStyle.css">
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />   
 
  
    <style>
    .rating {
      display: inline-flex;
      flex-direction: row-reverse;
      justify-content: center;
    }
    
    .rating input[type="radio"] {
      display: none;
    }
    
    .rating label {
      font-size: 2rem;
      color: lightgray;
      cursor: pointer;
    }

    .rating input[type="radio"]:checked ~ label {
      color: gold;
    }
  </style>
    
</head>
<body>
    <!-- Navbar -->
    <?php
        include_once('../Common/html/userNavBar.php');
    ?>
    <section>
    <div class="container text-center pt-4 pb-3 bg-white">
      <div class="col">
        <h1>Star Rating</h1>
        <form action="save_rating.php" method="post">
          <div class="rating col">
            <input type="radio" name="rating" value="5" id="5">
            <label for="5"><i class="fa-solid fa-star"></i></label>
            <input type="radio" name="rating" value="4" id="4">
            <label for="4"><i class="fa-solid fa-star"></i></label>
            <input type="radio" name="rating" value="3" id="3">
            <label for="3"><i class="fa-solid fa-star"></i></label>
            <input type="radio" name="rating" value="2" id="2">
            <label for="2"><i class="fa-solid fa-star"></i></label>
            <input type="radio" name="rating" value="1" id="1">
            <label for="1"><i class="fa-solid fa-star"></i></label>
          </div>
          <button type="submit" id="submitRating" class="btn btn-primary fw-bold">Submit Rating</button>
        </form>
      </div>
    </div>
  </section>
    
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>