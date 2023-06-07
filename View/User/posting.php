<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
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
    <link rel="stylesheet" href="css/posting.css">
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />
</head>
<body>
  <!-- Navbar -->
  <?php
    include_once('../Common/html/userNavBar.html');
    $researchArea = $_GET["researchArea"];
  ?>

<section>
        <!-- Title Posting -->
        <div class="titlePosting">
        <script> var valueResearch = '<?php echo $researchArea; ?>';</script>
            <p class="title">
                <?php 
                    echo $researchArea;
                ?>
            </p>
            <select class="form-select" aria-label="questionForm" id="categoriesDropdown">
                <option disabled selected>Select your categories</option>
            </select>
            <div class=box1> <button> <i class="fa-solid fa-filter" style="color: #757D8A;"></i></button></div>
        </div>

        <!-- Lower section -->
        <div class="container-fluid d-flex">
            <div class="col-10" >
                <!-- Posting section -->
                <div class="d-flex flex-column" >
                    <div class="perPosting" >
                        <div class="question" >
                            <div class="d-flex pb-3" >
                                <!-- Image -->
                                <div class="profileImg" >
                                    <img
                                        src= "../../../Asset/pp.jpg"
                                        class="rounded-circle shadow"
                                        height="50"
                                        width= "50";
                                        alt="Black and White Portrait of a Man"
                                        loading="lazy"
                                        />
                                </div>
                                <div class="content d-flex flex-column pl-2">
                                    <strong>James Cooper</strong>
                                    <p>What is a MAC address in networking?</p>
                                </div>
                                <div class="status" id="status">
                                    <div class="circle1" style="background-color: #84D17E;"></div>
                                </div>
                            </div>
                            <!-- icon section -->
                            <div class="d-flex pt-1 pb-1">
                                <div id="like">
                                    <i id="iconLike" class="fa-regular fa-heart fa-l"></i>
                                </div>
                                <div class="likeCounter">
                                    <p>Like</p>
                                </div>
                                <div class="views">
                                    <i class="fa-solid fa-eye fa-l"></i>
                                </div>
                                <div class="viewCounter">
                                    <p>View</p>
                                </div>
                                <div class="comment">
                                    <i id="iconComment" class="fa-regular fa-comment fa-l"></i>
                                </div>
                                <div class="commentCounter">
                                    <p>Comment</p>
                                </div>
                                <div class="rates">
                                    <i id="iconRate" class="fa-regular fa-star fa-l"></i>
                                </div>
                                <div class="rateCounter">
                                    <p>Rates</p>
                                </div>
                                <div class="ml-auto">
                                    <p>DateTime</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2" >
            <!-- Info Status -->
                <div class="infoBoard" >
                    <p><strong>Info Status</strong></p>
                    <p><div class="circle" style="background-color: #84D17E;"></div> Completed</p>
                    <p><div class="circle" style="background-color: #DFF45C;"></div>Revised</p>
                    <p><div class="circle" style="background-color: #3E9BA8;"></div>Accepted</p>
                    <p><div class="circle" style="background-color: #FFFFFF;"></div>Assign</p>
                </div>
            </div>
            
        </div>
</section>

    <!-- Footer -->
    <?php
    include_once('../Common/html/footer.html');
  ?>


  <!-- MDB -->
  <script src="../../js/profile.js"></script>
  <script src="../../js/posting.js"></script>
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
session_abort();
?>
</html>