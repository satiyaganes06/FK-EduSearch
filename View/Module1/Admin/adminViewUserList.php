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

  

  }
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
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
    <link rel="stylesheet" href="adminViewUserList.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="shortcut icon" type="image/jpg" href="/Asset/icon_logo.png" />
   </head>
<body>

  <div class="sidebar">
    <div class="logo-details">
      <a href="adminDashboard.html"><img src="/Asset/Logo Login.png" alt="Logo" style="width: 180px;" id="imglogo"/></a>
      
      <i class='bx bx-menu' id="btn" ></i>
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
          <a href="adminDashboard.html">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="" class="active">
            <i class="fa-solid fa-user-group"></i>
            <span class="links_name">User List</span>
          </a>
          <span class="tooltip">User List</span>
        </li>
        <li>
          <a href="adminUserApprovalList.php">
            <i class="fa-solid fa-user-check"></i>
            <span class="links_name">Approval List</span>
          </a>
          <span class="tooltip">Approval List</span>
        </li>
        <li>
          <a href="#">
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
        <li style="margin-top: 10px;">
          <a href="../../../Config/adminlogout.php">
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
            <h5 class="card-title fw-bold text-center">User List</h5>
            <div class="d-flex w-100 justify-content-center align-items-center">
              <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
              <div class="totalusers">
                <h4>Total Users</h4>
                <p>556</p>
              </div>
              
            </div>
            <div class="input-group d-flex w-25">
              <div class="form-outline d-flex">
                <input type="search" id="form1" class="form-control rounded" style="border-radius: 25px;" />
                <label class="form-label" for="form1">Search</label>
                <button type="button" class="btn" style="background-color:rgba(44, 88, 100, 1); color: white;">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              
            </div>
            <div>
              <table class="table align-middle mb-0 bg-white mt-4 table-responsive-sm table-hover">


                <thead>
                  <tr>
                    <th class="firstcol">No</th>
                    <th>Username</th>
                    <th>User ID</th>
                    <th>Roles</th>
                    <th class="lastcol">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                          include("../../../Config/database_con.php");
                          $bilNum = 0;
                          

                          $sql = "SELECT * FROM user_profile";
                          $result = mysqli_query($conn,$sql);
                          
                         
                          if ($result->num_rows > 0) {
                            // Loop through each row and display the data
                            
                          while ($row = mysqli_fetch_assoc($result)){
                            $userID = $row['user_id'];


                            $sql2 = "SELECT * FROM account WHERE user_id = '$userID'";
                            $result2 = mysqli_query($conn,$sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            
                             ?>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        
                        <div class="ms-3">
                          <p class="fw-bold mb-1"><?php echo ++$bilNum; ?></p>
                          
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="fw-normal mb-1"><?php echo $row['user_name']; ?></p>
                     
                    </td>
                    <td> <p class="fw-normal mb-1"><?php echo $row['user_id']; ?></p></td>
                    <td>
                    <span class="badge badge-success rounded-pill d-inline"><?php echo $row2['acc_role']; ?></span>
                    </td>
                   
                    <td>
                      <div class="btn-group shadow-0" role="group">
                        <button type="button" class="btn btn-link" data-mdb-color="dark" onclick="location.href='adminViewUserProfile.html'"><i class="fa-solid fa-eye" style="color: #00ff59; font-size: 20px;"></i></button>
                        <button type="button" class="btn btn-link" data-mdb-color="dark" onclick="location.href='adminEditUserProfile?user_id=<?php echo $id ?>'"><i class="fa-regular fa-pen-to-square" style="color: #624de3; font-size: 20px;"></i></button>
                        <button type="button" class="btn btn-link" data-mdb-color="dark"><i class="fa-regular fa-trash-can" style="color: #a30d11; font-size: 20px;"></i></button>
                      </div>
                    </td>
                  </tr>
                  <?php  } } ?>
                  
                </tbody>
              </table>
            </div>
           
          </div>
        </div>
      </div>

     
      
    </div>
      
  </section>
  <footer class="text-center text-white fixed-bottom overflow-hidden" style="background-color: #21081a; margin-top: 20px;">
        
      
    <!-- Copyright -->
    <div
      class="text-center text-white p-3"
      style="background-color: rgba(44, 88, 100, 1)"
    >
    © 2019  2023. FK-EDU SEARCH
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
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
   
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
     imagelogo.style.display = "block";
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
     imagelogo.style.display = "none";
   }
  }
  </script>
  <script>

var xValues = ["User", "Expert", "Staff"];
var yValues = [55, 49, 44];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "List of Users"
    }
  }
});


  </script>
</body>
</html>