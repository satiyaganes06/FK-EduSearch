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
    <link rel="stylesheet" href="css/expert_view_publication.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/navbar.html');
  ?>

  <section class="flexSection">
    <div class="mainSection d-flex flex-column mb-5 mt-3">

        <div id="publicationDetails_Component">
          
          <div class="content_details">
            <!-- Image -->
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
              class="rounded-circle shadow mb-3"
              height="150"
              width="150"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />

            <div class=" w-100">

              <div class="d-flex justify-content-between  mb-3">
                <h2 id="titlePage"><strong>Add Publication</strong></h2>
                
              </div>
              
              <table class="table align-middle">
                <tbody>
                  <tr>
                    <th scope="row"><strong>Authors :</strong></th>
                    <td>
                        
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    
                    </td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Publication : date </strong></th>
                    <td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Journal :</strong></th>
                    <td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" ></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Volume :</strong></th>
                    <td><input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Issue :</strong></th>
                    <td><input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Pages :</strong></th>
                    <td><input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Publisher :</strong></th>
                    <td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Description :</strong></th>
                    <td id='pubDesc'><textarea  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Scholar : article </strong></th>
                    <td><input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Article : Source </strong></th>
                    <td><input type="url" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></td>
                  </tr>
                </tbody>
              </table>
              
            </div>
           
          </div>
          <button class="button_View btn-dark btn btn-block text-white mt-3"  data-mdb-ripple-color="dark"><strong>Review</strong></button>

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