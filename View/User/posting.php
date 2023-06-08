<?php
  session_start();
  $researchArea = $_GET["researchArea"];

  if(!isset( $_SESSION["Current_user_id"] )) {
    ?>
        <script>
            alert("Access denied !!!")
            window.location = "../Module1/Login/GeneralUserLogin/userLogin.php";
        </script>
    <?php
    }

  include("../../Config/database_con.php");

  $sql = "SELECT * FROM posting INNER JOIN user_profile 
            ON posting.user_id=user_profile.user_id WHERE posting_course='$researchArea'";
  $result = mysqli_query($conn,$sql) or die ("Could not execute query in view");
  //$row = mysqli_fetch_assoc($result);

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
    <link rel="stylesheet" href="css/posting.css">
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
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="pb-2" >
                        <div class="question" >
                            <div class="d-flex pb-3" >
                                <!-- Image -->
                                <div class="profileImg" >
                                    <img
                                        src= <?php echo $row['user_profile_img']; ?>
                                        class="rounded-circle shadow"
                                        height="50"
                                        width= "50";
                                        alt="Black and White Portrait of a Man"
                                        loading="lazy"
                                        />
                                </div>
                                <div class="d-flex flex-column pl-2">
                                    <strong><?php echo $row['user_name']; ?></strong>
                                    <p><?php echo $row['posting_content']; ?></p>
                                </div>
                                <!-- Determine the color of status -->
                                <?php
                                $status = $row['posting_status'];
                                if($status == "Assign"){
                                    $colorStatus = "FFFFFF";
                                }else if($status == "Accepted"){
                                    $colorStatus = "3E9BA8";
                                }else if($status == "Revised"){
                                    $colorStatus = "DFF45C";
                                }else if($status == "Completed"){
                                    $colorStatus = "84D17E";
                                }
                                ?>
                                <div class="status" id="status">
                                    <div class="circle1" style="background-color: #<?php echo $colorStatus;?>;"></div>
                                </div>
                            </div>
                            <!-- icon section -->
                            <div class="d-flex pt-1 pb-1">
                                <div id="like">
                                    <i id="iconLike" class="fa-regular fa-heart fa-l"></i>
                                </div>
                                <div class="likeCounter">
                                    <p><?php echo $row['posting_like']; ?> Like</p>
                                </div>
                                <div class="views">
                                    <i class="fa-solid fa-eye fa-l"></i>
                                </div>
                                <div class="viewCounter">
                                    <p><?php echo $row['posting_view']; ?> View</p>
                                </div>
                                <div class="comment">
                                    <i id="iconComment" class="fa-regular fa-comment fa-l"></i>
                                </div>
                                <div class="commentCounter">
                                    <p>Comment</p>
                                </div>
                                <?php 
                                  if ($status == "Completed"){
                                ?>
                                <div class="rates">
                                    <i id="iconRate" class="fa-regular fa-star fa-l"></i>
                                </div>
                                <div class="rateCounter">
                                    <p><?php echo $row['posting_rating']; ?> Rates</p>
                                </div>
                                <?php } ?>
                                <div class="ml-auto">
                                    <p><?php echo $row['posting_date']; ?></p>
                                </div>
                            </div>

                            <!-- Comment section -->
                            <hr class="solid" >
                            <div class="py-4">
                                <strong>Comments</strong>
                            </div>
                            <div class="d-flex flex-column pl-5">
                                <div class="d-flex pb-3">
                                    <div class="profileImg">
                                        <!-- Image -->
                                        <img
                                            src= "../../../Asset/pp.jpg"
                                            class="rounded-circle shadow"
                                            height="40"
                                            width= "40";
                                            alt="Black and White Portrait of a Man"
                                            loading="lazy"
                                            />
                                    </div>
                                    <div class="d-flex flex-column pl-2">
                                        <strong>James Cooper</strong>
                                        <p>This is the additional container below the left side.</p>
                                    </div>
                                </div>
                                <textarea id="textareaComment" placeholder="Enter your text..."></textarea>
                            </div>
                        </div>
                    </div>
                    <?php }}else {
                        ?>
                            <div class="text-center" style="height: 200px; margin:100px">
                                <p><?php echo "No post found.";?></p>
                            </div>
                        <?php
                } ?>
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