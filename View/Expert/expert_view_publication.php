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

    $_SESSION["route"] = "post";
    $expert_id = $_SESSION["expertID"];

    $idURL = $_GET['id'];

    $sql = "SELECT * FROM publication WHERE publication_id  = '$idURL'";
    $result = mysqli_query($conn,$sql) or die ("Could not execute query in view");
    $row = mysqli_fetch_assoc($result);

    $updateImpression = ++$row['publication_impression'];

    $sql1 = "UPDATE publication set publication_impression = '$updateImpression' WHERE publication_id = '$idURL'";
    $result1 = mysqli_query($conn,$sql1) or die ("Could not execute query in update");


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
    include_once('../Common/html/expertNavbar.php');
  ?>
   

  <section class="flexSection">
    <div class="mainSection mb-3 mt-3">
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

              <div class="d-flex justify-content-between mt-4  mb-3">
                <h2 id="titlePage"><strong>View Publication</strong></h2>
                
                <div class="d-flex align-items-center">
                  <i class="far fa-eye text-muted mr-1 fs-6"></i>
                  <p id="impression_text"><?php echo $updateImpression; ?></p>
                </div>

              </div>
              
              <table class="table align-middle">
                <tbody>

                <?php
                  if($row['publication_status'] == "Accept"){
                    $color = "color:green";
                  }elseif($row['publication_status'] == "Reject"){
                    $color = "color:red";
                  }else{
                    $color = "color:blue";
                  }
                
                ?>
                
                <?php if($row["expert_id"] == $expert_id){
                  ?><tr>
                  <th scope="row"><strong>Status :</strong></th>
                  <td style="<?php echo $color ?>"><strong><?php echo $row["publication_status"]; ?></strong></td>
                </tr>

                <?php
                  if ($row["publication_status"] == "Reject") {
                      echo "<tr>";
                      echo "<th scope='row'><strong>Reason to: reject</strong></th>";
                      echo "<td>" . $row["publication_reject_reason"] . "</td>";
                      echo "</tr>";
                  }
                }
                ?>
                

                  
                

                  <tr>
                    <th scope="row"><strong>Title :</strong></th>
                    <td><?php echo $row["publication_title"]; ?></td>
                  </tr>
                  <tr>
                    <th scope="row"><strong>Authors :</strong></th>
                    <td><?php echo $row["publication_author"]; ?></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Publication : date </strong></th>
                    <td><?php echo $row["publication_date"]; ?></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Journal :</strong></th>
                    <td><?php echo $row["publication_journal"]; ?></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Volume :</strong></th>
                    <td><?php echo $row["publication_volume"]; ?></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Issue :</strong></th>
                    <td><?php echo $row["publication_issue"]; ?></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Pages :</strong></th>
                    <td><?php echo $row["publication_pages"]; ?></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Publisher :</strong></th>
                    <td><?php echo $row["publication_publisher"]; ?></td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Description :</strong></th>
                    <td id='pubDesc'><?php echo $row["publication_description"]; ?></td>
                  </tr>

                </tbody>
              </table>
              
            </div>
           
          </div>

          <button class="button_View btn-dark btn btn-block text-white" onClick="javascript:window.open('<?php echo $row["publication_link"]; ?>', '_blank');" data-mdb-ripple-color="dark"><strong>View</strong></button>
          
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