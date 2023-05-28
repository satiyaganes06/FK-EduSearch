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
    <link rel="stylesheet" href="css/expert_profile.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>
<body>
  
    
   <!-- Navbar -->
    <?php
      include_once('../Common/html/navbar.html');
    ?>
    
    <section class="flexSection">
        <div class="mainSection mb-5 mt-3">
    
            <div id="profile_Component">
    
                <div id="profile_details" class="position-relative">
                    <img 
                        id="profile-background-pic"
                        src="https://marketplace.canva.com/EAE2cQaUHVA/1/0/1600w/canva-black-minimal-motivation-quote-linkedin-banner-HoRi-2buBWk.jpg" 
                        class="shadows"
                        width="100%"
                        alt="Black profile background"
                        loading="lazy"
                    />

                    <img
                        src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                        class="rounded-circle shadow-5 profile_Avatar"
                        alt="Black and White Portrait of a Man"
                        loading="lazy"
                    />

                    <div class="profile_content">
                        <div class="d-flex justify-content-between">
                       
                            <div class="d-flex">
                                <h2><strong>SHATTHIYA GANES</strong></h2>
                                <i class="fas fa-circle-check fa-2x ml-3" style="color: #00FF00;"></i>
                            </div>
    
                            <div class="rounded-circle text-center" style="height: 30px; width: 30px; background-color: rgb(210, 210, 210);">
                                <i class="fas fa-pen-to-square"></i>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start mt-3">
                            <p class="w-50 text-truncate mr-3">satiyaganes@gmail.com</p>
                            <p class="w-50 text-truncate">Age : 28</p>
                        </div>

                        <div class="d-flex justify-content-start">
                            <p class="w-50 text-truncate mr-3">Academic Level : Master & PHD</p>
                            <p class="w-50 text-truncate">Last Seen : 05-06-2023</p>
                        </div>

                        <p class="w-50 text-truncate mr-3">Social Media : <a href="https://www.instagram.com/satiyaganes06/" target="_blank">@satiyaganes</a></p>

                        <div class="d-flex justify-content-start">
                            <p class="mr-3">Research Area : </p>
                            <p class="bg-secondary  rounded-6" style="font-size: 12px; padding-top: 2px; padding-right: 10px; padding-left: 10px; color: white;">Cloud Computing</p>
                            <p class=" ml-2 bg-secondary  rounded-6" style="font-size: 12px; padding-top: 2px; padding-right: 10px; padding-left: 10px; color: white;">Autonomic Computing</p>
                        </div>

                        <button class="button_View btn-dark btn rounded-8 text-white mt-3 mb-3" data-mdb-ripple-color="dark"><i class="fas fa-arrow-up-from-bracket mr-1"></i><strong> Upload CV</strong></button>
                    </div>
                </div>
                
                <div id="profile_details" class="p-5">
                  <h2><strong>Publication Popularity</strong></h2>
                    
                  <canvas id="myChart" style="width: 100%;height: 250px;"></canvas>
                </div>

                <div id="profile_details" class="p-5">
                  <div class="d-flex justify-content-between mb-3">
                    <h2 class="m-0"><strong>List of Publication</strong></h2>
                    <button class="button_View btn-dark btn rounded-8 text-white pt-1 pb-1" data-mdb-ripple-color="dark"><i class="fas fa-circle-plus mr-1"></i><strong>Add</strong></button>
                  </div>

                  <div id="inMainContentOutline" class="table-responsive p-4">

                    <table class="table table-borderless  mb-0 align-middle">
                      <thead id="tableHeaderBg">
                          <tr>
                            <th style="border-top-left-radius: 20px; border-bottom-left-radius: 20px;">Bil</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;">Impression</th>
                          </tr>
                      </thead>
                      <tbody>

                         <!-- Table Content 1 -->
                        <tr>
                          <td style="width: 5%; padding: 10px;">
                              1
                          </td>

                          <td style="width: 75%; padding: 10px;">
                              
                              <div class="nameEllipsis">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, accusamus!</div>
                          </td>

                          <td style="width: 10%; padding: 10px;">
                              <span>2016</span>
                          </td>

                          <td style="width: 15%; padding: 10px; text-align: center;">
                            5012
                          </td>
                        </tr>

                        <!-- Table Content 2 -->
                        <tr>
                          <td style="width: 5%; padding: 10px;">
                              2
                          </td>

                          <td style="width: 75%; padding: 10px;">
                              
                              <div class="nameEllipsis">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, accusamus!</div>
                          </td>

                          <td style="width: 10%; padding: 10px;">
                              <span>2016</span>
                          </td>

                          <td style="width: 15%; padding: 10px; text-align: center;">
                            100000
                          </td>
                        </tr>
                        
                        <!-- Table Content 3 -->
                        <tr>
                          <td style="width: 5%; padding: 10px;">
                              3
                          </td>

                          <td style="width: 75%; padding: 10px;">
                              
                              <div class="nameEllipsis">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, accusamus!</div>
                          </td>

                          <td style="width: 10%; padding: 10px;">
                              <span>2016</span>
                          </td>

                          <td style="width: 15%; padding: 10px; text-align: center;">
                            100
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
        
        
    </section>
    
    <!-- Footer -->
    <?php
      include_once('../Common/html/footer.html');
    ?>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <script>
    const xValues = [50,60,70,80,90,100,110,120,130,140,150,160,170,180,190,200,210,220];
    const yValues = [7,8,8,9,9,9,10,11,14,14,15,8,7,14,14,15,8,7];
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,160,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
  </script>

  <!-- MDB -->
  <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
  <!--Bootstrap 4 & 5 & jQuery Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>