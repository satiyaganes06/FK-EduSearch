<?php
session_start();
$_SESSION["user_route"] = "home";

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
    <link rel="stylesheet" href="css/dashboardStyle.css">
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />              

</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/userNavBar.php');
  ?>

  <section>
    <table class="allContent">
      <tr>
        <td rowspan="8">
          <!--First Row Section-->
          <div class="container pt-3 pb-2">
                <div class="row mt-3">
                    <div class="col-sm">
                        <div class="box" style="text-align: center;">
                            <h4>
                                  <?php $_SESSION["researchArea"] = "Software Engineering"; ?>
                              <a href="posting.php?researchArea=<?php echo urlencode($_SESSION["researchArea"]); ?>">Software Engineering
                              </a>
                            </h4> 
                            <table class="center">
                                <tr>
                                  <th>100</th>
                                  <th>98</th>
                                </tr>
                                <tr>
                                  <td>Question</td>
                                  <td>Solve</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="box" style="text-align: left;">
                            <h5>Human Computer Interaction</h5><br>
                            <h5>Web Engineering</h5><br>
                            <h5>Software Maintenance & Evolution</h5>
                        </div>
                    </div>
                    <div class="col-sm" >
                        <div class="box" style="text-align: left;">
                            <h5>Software Testing</h5><br>
                            <h5>Formal Method</h5><br>
                            <h5>Software Quality Assurance</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!--Second Row Section-->
            <div class="container mt-3 p-3 align-items-center">
                <div class="row mt-3">
                    <div class="col-sm">
                        <div class="box" style="text-align: center;">
                            <h4>
                              <?php $_SESSION["researchArea"] = "Computer System & Networking"; ?>
                              <a href="posting.php?researchArea=<?php echo urlencode($_SESSION["researchArea"]); ?>">Computer System & Networking
                              </a>
                            </h4> 
                            <table class="center">
                                <tr>
                                  <th>100</th>
                                  <th>98</th>
                                </tr>
                                <tr>
                                  <td>Question</td>
                                  <td>Solve</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="box" style="text-align: left;">
                            <h5>Network technologies</h5><br>
                            <h5>Network Services Administration</h5><br>
                            <h5>Distributed & Parallel Computing</h5>
                        </div>
                    </div>
                    <div class="col-sm" >
                        <div class="box" style="text-align: left;">
                            <h5>Network Analysis & Design</h5><br>
                            <h5>Network Management</h5><br>
                            <h5>Structured Networks Cabling</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!--Third Row Section-->
            <div class="container mt-3 p-3 align-items-center">
                <div class="row mt-3">
                    <div class="col-sm">
                        <div class="box" style="text-align: center;">
                            <h4>
                              <?php $_SESSION["researchArea"] = "Graphics & Multimedia Technology"; ?>
                              <a href="posting.php?researchArea=<?php echo urlencode($_SESSION["researchArea"]); ?>">Graphics & Multimedia Technology
                              </a>
                            </h4> 
                            <table class="center">
                                <tr>
                                  <th>100</th>
                                  <th>98</th>
                                </tr>
                                <tr>
                                  <td>Question</td>
                                  <td>Solve</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="box" style="text-align: left;">
                            <h5>Fundamental of Digital Media Design</h5><br>
                            <h5>Computer Graphics</h5><br>
                            <h5>Computer Games Programming I</h5>
                        </div>
                    </div>
                    <div class="col-sm" >
                        <div class="box" style="text-align: left;">
                            <h5>Virtual Reality</h5><br>
                            <h5>3D Modelling & Animation</h5><br>
                            <h5>Project Development Workshop</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!--Fourth Row Section-->
            <div class="container mt-3 p-3 align-items-center">
                <div class="row mt-3">
                    <div class="col-sm">
                        <div class="box" style="text-align: center;">
                            <h4>
                              <?php $_SESSION["researchArea"] = "Cyber Security"; ?>
                              <a href="posting.php?researchArea=<?php echo urlencode($_SESSION["researchArea"]); ?>">Cyber Security
                              </a>
                            </h4> 
                            <table class="center">
                                <tr>
                                  <th>100</th>
                                  <th>98</th>
                                </tr>
                                <tr>
                                  <td>Question</td>
                                  <td>Solve</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="box" style="text-align: left;">
                            <h5>Cyber Law & Security Policy</h5><br>
                            <h5>Cyber Threat Intelligence</h5><br>
                            <h5>Cybersecurity Operations</h5>
                        </div>
                    </div>
                    <div class="col-sm" >
                        <div class="box" style="text-align: left;">
                            <h5>Cybercrime & Forensics Computing</h5><br>
                            <h5>Penetration Testing</h5><br>
                            <h5>Cryptography</h5>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td class="cell1">
          <div class="imageDashboard"></div>
        </td>
      </tr>
      <tr>
        <td><i class="fa-solid fa-graduation-cap" style="color: #928b8b;"></i>     Total of student <h2> 180</h2></td>
      </tr>
      <tr>
        <td><i class="fa-solid fa-graduation-cap" style="color: #928b8b;"></i>     Total of lecturer <h2> 98</h2></td>
      </tr>
      <tr>
        <td><i class="fa-solid fa-graduation-cap" style="color: #928b8b;"></i>     Total of expert <h2> 40</h2></td>
      </tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
    </table>
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