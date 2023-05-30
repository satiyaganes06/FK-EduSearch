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
    include("../../Config/database_con.php");

    $idURL = 1;

    $sql = "SELECT * FROM posting WHERE posting_id  = '$idURL'";
    $result = mysqli_query($conn,$sql) or die ("Could not execute query in view");
    $row = mysqli_fetch_assoc($result);

    $_SESSION["route"] = "post";
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
      include_once('../Common/html/expertNavbar.php');
    ?>
    
    <section class="flexSection">
        <div class="mainSection mb-5">
            <h1><strong>View Post</strong></h1>
    
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
                                <h6 class="w-75"><strong>CB21132</strong></h6>
                                
                                <div class="d-flex">
                                    <p id="datetime_text" class="pr-1"><?php echo $row['posting_date']; ?></p>
                                    <p id="datetime_text"><?php echo $row['posting_assign_time']; ?></p>
                                </div>
                
                            </div>

                            <p id="post_desc"><?php echo $row['posting_content']; ?></p>
            
                        </div>
                        
                    </div>

                    <div class="d-flex mb-2">

                        <button type="button" class="btn btn-outline-light mr-2"><p class="likeRate_text"><i class="fas fa-heart text-danger mr-2"></i> 15 Likes</p></button>

                        <button type="button" class="btn btn-outline-light"><p class="likeRate_text"><i class="fas fa-star text-warning mr-2"></i> 15 Rates</p></button>

                        
                        
                    </div>

                    <form id="comment-form">
                        <div class="input-group mb-4 mt-3">
                            <textarea name="reply" id="reply" class="form-control" id="exampleFormControlTextarea1" placeholder="Reply" required="text"></textarea>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <h6><strong>Comments</strong></h6>
                    
                    

                    <div id="reply-container">
                        <!-- Comments will be loaded dynamically here -->
                    </div>

                    

                </div>

            </div>  
        </div>
      </section>
    
    <!-- Footer -->
    <?php
      include_once('../Common/html/footer.html');
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Load comments on page load
            loadComments();

            // Add new comment
            $('#comment-form').on('submit', function(e){
                e.preventDefault();
                var posting_id = <?php echo $row['posting_id']; ?>;
                var reply = $('#reply').val();
                var user_id = 1452;

                if(reply !== ''){
                    $.ajax({
                        type: 'POST',
                        url: '../../Model/Expert/save_reply.php',
                        data: $(this).serialize(),
                        success: function(){
                            $('#reply').val('');
                            loadComments();
                        }
                    });
                }
            });

            // Function to load comments
            function loadComments(){
                $.ajax({
                    type: 'POST',
                    url: '../../Model/Expert/load_reply.php',
                    success: function(response){
                        $('#reply-container').html(response);
                    }
                });
            }
        });
    </script>

    <!-- MDB -->
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>