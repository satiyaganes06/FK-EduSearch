<?php
  session_start();
  
  //If the user is not logged in send him/her to the login form
  if(!isset( $_SESSION["Current_admin_id"] )) {

      ?>
          <script>
              alert("Access denied !!!")
              window.location = "../Login/Admin%20Login/adminLogin.php";
          </script>
      <?php

  }else{
    include("../../../Config/database_con.php");

    $user_id = $_GET['user_id'];

  }
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>FK-Edu Search</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!--Bootstrap Script-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- MDB -->
    <link rel="stylesheet" href="/Bootstrap/mdb.min.css" />
    <!--CSS-->
    <link rel="stylesheet" href="adminEditUserProfile.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" type="image/jpg" href="/Asset/icon_logo.png" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
      <a href="adminDashboard.html"> <img
          src="/Asset/Logo Login.png"
          alt="Logo"
          style="width: 180px"
          id="imglogo"
        /></a> 

        <i class="bx bx-menu" id="btn"></i>
      </div>

      <!-- Menu section -->
      <div class="menu-section">
        <h2 class="section-heading">Menu</h2>
        <ul class="nav-list">
          <!-- <li>
          <i class='bx bx-search' ></i>
          <input type="text" placeholder="Search...">
          <span class="tooltip">Search</span>
        </li> -->
          <li>
            <a href="adminDashboard.php">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
          </li>
          <li>
            <a href="adminViewUserList.html" class="active">
              <i class="fa-solid fa-user-group"></i>
              <span class="links_name">User List</span>
            </a>
            <span class="tooltip">User List</span>
          </li>
          <li>
            <a href="adminUserApprovalList.html">
              <i class="fa-solid fa-user-check"></i>
              <span class="links_name">Approval List</span>
            </a>
            <span class="tooltip">Approval List</span>
          </li>
          <li>
            <a href="adminManageComplaint.php">
              <i class="fa-solid fa-rectangle-list"></i>
              <span class="links_name">Complain List</span>
            </a>
            <span class="tooltip">Complain List</span>
          </li>
         
        </ul>
      </div>

      <!-- Profile section -->
      <div class="profile-section">
        <h2 class="section-heading">Profile</h2>
        <ul class="nav-list">
          <li>
            <a href="#">
              <i class="fa-solid fa-user"></i>
              <span class="links_name">View Profile</span>
            </a>
            <span class="tooltip">View Profile</span>
          </li>
          <li style="margin-top: 10px">
            <a href="#">
              <i class="fa-solid fa-right-from-bracket"></i>
              <span class="links_name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
          </li>
        </ul>
      </div>
    </div>

    <section class="home-section">
      <div class="container-fluid p-0">
        <div class="main-section">
          <!--Tulis coding kat sini-->
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title fw-bold text-center">User Details</h5>
              <div
                class="d-flex w-100 justify-content-center align-items-center"
              ></div>
              <div id="profile_details" class="position-relative">
                <img
                  id="profile-background-pic"
                  src="https://marketplace.canva.com/EAE2cQaUHVA/1/0/1600w/canva-black-minimal-motivation-quote-linkedin-banner-HoRi-2buBWk.jpg"
                  class="shadows"
                  width="100%"
                  height="300px"
                  alt="Black profile background"
                  loading="lazy"
                />

                <img
                  src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                  class="rounded-circle shadow-5 profile_Avatar"
                  alt="Black and White Portrait of a Man"
                  loading="lazy"
                />
        <form action="" method="post">
                <div class="profile_content">
                  <div class="d-flex justify-content-between">
                    <div class="d-flex">
                      <h2><strong>SHATTHIYA GANES</strong></h2>
                      <i
                        class="fas fa-circle-check fa-2x ml-3"
                        style="color: #00ff00"
                      ></i>
                    </div>

                 
                  </div>
                  <div class="d-flex justify-content-start mt-3">
                <div class="input-group w-50 mr-3">
                    <input type="email" class="form-control " value="satiyaganes@gmail.com" id="email" name="email">
                    
                </div>
                <div class="input-group w-50">
                    <input type="text" class="form-control text-truncate" value="Age : 28" id="age" name="age" >
                </div>
                </div>

                <div class="d-flex justify-content-start mt-3">
                <div class="input-group w-50 mr-3">
                    <input type="text" class="form-control text-truncate" value="Academic Level : Master & PHD" id="academiclvl" name="academiclvl">
                </div>
                <div class="input-group w-50">
                <p class="w-50 text-truncate">Last Seen : 05-06-2023</p>
                </div>
                </div>

                <div class="input-group w-50 mt-3">
                <input type="text" class="form-control text-truncate" value="Social Media : @satiyaganes" id="socialmedia" name="socialmedia">
                </div>

                  <div class="d-flex justify-content-start mt-4">
                    <p class="mr-3">Research Area :</p>
                    <p
                      class="bg-secondary rounded-6"
                      style="
                        font-size: 12px;
                        padding-top: 2px;
                        padding-right: 10px;
                        padding-left: 10px;
                        color: white;
                      "
                    >
                      Cloud Computing
                    </p>
                    <p
                      class="ml-2 bg-secondary rounded-6"
                      style="
                        font-size: 12px;
                        padding-top: 2px;
                        padding-right: 10px;
                        padding-left: 10px;
                        color: white;
                      "
                    >
                      Autonomic Computing
                    </p>
                    
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center">
               

                <div class="text-end">
                  <button type="button" class="btn btn-warning me-2" >Save</button>

                </div>
              </div>
              </form>
              <?php 
              
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Are you Sure You Want to Delete This User?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <div class="modal-body">
            
            </div> -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Yes</button>
            </div>
          </div>
        </div>
      </div>
    <footer
      class="text-center text-white fixed-bottom overflow-hidden"
      style="background-color: #21081a; margin-top: 20px"
    >
      <!-- Copyright -->
      <div
        class="text-center text-white p-3"
        style="background-color: rgba(44, 88, 100, 1)"
      >
        © 2019 2023. FK-EDU SEARCH
      </div>
      <!-- Copyright -->
    </footer>

    <!-- MDB -->
    <script type="text/javascript" src="../../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      let sidebar = document.querySelector(".sidebar");
      let closeBtn = document.querySelector("#btn");
      let searchBtn = document.querySelector(".bx-search");
      let imagelogo = document.querySelector("#imglogo");
      imagelogo.style.display = "none";
      closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
      });

      searchBtn.addEventListener("click", () => {
        // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
      });

      // following are the code to change sidebar button(optional)
      function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
          closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
          imagelogo.style.display = "block";
        } else {
          closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
          imagelogo.style.display = "none";
        }
      }
    </script>
    <script>
      var xValues = ["User", "Expert", "Staff"];
      var yValues = [55, 49, 44];
      var barColors = ["#b91d47", "#00aba9", "#2b5797"];

      new Chart("myChart", {
        type: "doughnut",
        data: {
          labels: xValues,
          datasets: [
            {
              backgroundColor: barColors,
              data: yValues,
            },
          ],
        },
        options: {
          title: {
            display: true,
            text: "List of Users",
          },
        },
      });
    </script>
    <script>
        const email = document.getElementById('email');
        const age = document.getElementById('age');
        const academiclvl = document.getElementById('academiclvl');
        const socialmedia = document.getElementById('socialmedia');
        let clicked1 = false;
        let clicked2 = false;
        let clicked3 = false;
        let clicked4 = false;
        
        email.addEventListener('click', () => {
           
            if (!clicked1) {
                email.value = '';
                 clicked1 = true;
             }
        });
        age.addEventListener('click', () => {
            
            if (!clicked2) {
                age.value = '';
                 clicked2 = true;
             }
        });
        academiclvl.addEventListener('click', () => {
            if (!clicked3) {
                academiclvl.value = '';
                 clicked3 = true;
             }
            
        });
        socialmedia.addEventListener('click', () => {
            if (!clicked4) {
                socialmedia.value = '';
                 clicked4 = true;
             }
        });
    </script>
  </body>
</html>
