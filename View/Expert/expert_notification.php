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
    <link rel="stylesheet" href="css/expert_post_list.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>
<body>
  
    
    <!-- Navbar -->
    <?php
        include_once('../Common/html/navbar.html');
    ?>
    
    <section class="flexSection">
        <div class="mainSection mb-5">
            <h1><strong>Assign Post</strong></h1>
    
            <div id="publication_Component">
    
                <!-- Post 1 -->
                <div class="post">
                    <div class="d-flex">
                        <!-- Image -->
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                            class="rounded-circle shadow"
                            height="60"
                            alt="Black and White Portrait of a Man"
                            loading="lazy"
                        />
            
                        <!-- Content -->
                        <div class="w-100 pl-3">
            
                            <div class="d-flex justify-content-between">
                                <h6><strong>CB21132</strong></h6>
                                
                                <div class="d-flex">
                                    <p id="datetime_text" class="pr-1">2023-05-17</p>
                                    <p id="datetime_text">12:07AM</p>
                                </div>
                
                            </div>

                            <p id="post_desc">Why wireless sensor networks consist of small nodes with sensing, computation, and wireless communs capabilities ?</p>
            
                        </div>
                        
                    </div>

                    <div class="d-flex mb">

                        <div class="d-flex align-items-center mr-4">
                            <i class="fas fa-heart text-danger"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-star text-warning"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>
                        
                        
                    </div>

                    <hr>

                    <div class="d-flex ">
                        <button class="btn-danger btn btn-block text-white mt-2 mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Reject</strong></button>
                        <button class="btn-success btn btn-block text-white mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Accept</strong></button>
                    </div>
                    

                </div>

                <!-- Post 2 -->
                <div class="post">
                    <div class="d-flex">
                        <!-- Image -->
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                            class="rounded-circle shadow"
                            height="60"
                            alt="Black and White Portrait of a Man"
                            loading="lazy"
                        />
            
                        <!-- Content -->
                        <div class="w-100 pl-3">
            
                            <div class="d-flex justify-content-between">
                                <h6><strong>CB21132</strong></h6>
                                
                                <div class="d-flex">
                                    <p id="datetime_text" class="pr-1">2023-05-17</p>
                                    <p id="datetime_text">12:07AM</p>
                                </div>
                
                            </div>

                            <p id="post_desc">Why wireless sensor networks consist of small nodes with sensing, computation, and wireless communs capabilities ?</p>
            
                        </div>
                        
                    </div>

                    <div class="d-flex mb">

                        <div class="d-flex align-items-center mr-4">
                            <i class="fas fa-heart text-danger"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-star text-warning"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>
                        
                        
                    </div>

                    <hr>

                    <div class="d-flex ">
                        <button class="btn-danger btn btn-block text-white mt-2 mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Reject</strong></button>
                        <button class="btn-success btn btn-block text-white mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Accept</strong></button>
                    </div>
                    

                </div>

                <!-- Post 2 -->
                <div class="post">
                    <div class="d-flex">
                        <!-- Image -->
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                            class="rounded-circle shadow"
                            height="60"
                            alt="Black and White Portrait of a Man"
                            loading="lazy"
                        />
            
                        <!-- Content -->
                        <div class="w-100 pl-3">
            
                            <div class="d-flex justify-content-between">
                                <h6><strong>CB21132</strong></h6>
                                
                                <div class="d-flex">
                                    <p id="datetime_text" class="pr-1">2023-05-17</p>
                                    <p id="datetime_text">12:07AM</p>
                                </div>
                
                            </div>

                            <p id="post_desc">Why wireless sensor networks consist of small nodes with sensing, computation, and wireless communs capabilities ?</p>
            
                        </div>
                        
                    </div>

                    <div class="d-flex mb">

                        <div class="d-flex align-items-center mr-4">
                            <i class="fas fa-heart text-danger"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-star text-warning"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>
                        
                        
                    </div>

                    <hr>

                    <div class="d-flex ">
                        <button class="btn-danger btn btn-block text-white mt-2 mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Reject</strong></button>
                        <button class="btn-success btn btn-block text-white mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Accept</strong></button>
                    </div>
                    

                </div>


                <!-- Post 4 -->
                <div class="post">
                    <div class="d-flex">
                        <!-- Image -->
                        <img
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                            class="rounded-circle shadow"
                            height="60"
                            alt="Black and White Portrait of a Man"
                            loading="lazy"
                        />
            
                        <!-- Content -->
                        <div class="w-100 pl-3">
            
                            <div class="d-flex justify-content-between">
                                <h6><strong>CB21132</strong></h6>
                                
                                <div class="d-flex">
                                    <p id="datetime_text" class="pr-1">2023-05-17</p>
                                    <p id="datetime_text">12:07AM</p>
                                </div>
                
                            </div>

                            <p id="post_desc">Why wireless sensor networks consist of small nodes with sensing, computation, and wireless communs capabilities ?</p>
            
                        </div>
                        
                    </div>

                    <div class="d-flex mb">

                        <div class="d-flex align-items-center mr-4">
                            <i class="fas fa-heart text-danger"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-star text-warning"></i>
                            <p class="likeRate_text">15 Likes</p>
                        </div>
                        
                        
                    </div>

                    <hr>

                    <div class="d-flex ">
                        <button class="btn-danger btn btn-block text-white mt-2 mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Reject</strong></button>
                        <button class="btn-success btn btn-block text-white mr-2 ml-2"  data-mdb-ripple-color="dark"><strong>Accept</strong></button>
                    </div>
                    

                </div>
              
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