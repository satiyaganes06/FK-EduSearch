<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>FK-Edu Search</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!--Bootstrap Script-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- MDB -->
  <link rel="stylesheet" href="/Bootstrap/mdb.min.css" />
  <!--CSS-->
  <link rel="stylesheet" href="adminDashboard.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>




  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" type="image/jpg" href="/Asset/icon_logo.png" />
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="/Asset/Logo Login.png" alt="Logo" style="width: 180px;" id="imglogo" />

      <i class='bx bx-menu' id="btn"></i>
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
          <a href="#" class="active">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="adminViewUserList.php">
            <i class="fa-solid fa-user-group"></i>
            <span class="links_name">User List</span>
          </a>
          <span class="tooltip">User List</span>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-user-check"></i>
            <span class="links_name">Approval List</span>
          </a>
          <span class="tooltip">Messages</span>
        </li>
        <li>
          <a href="adminManageComplaint.php">
            <i class="fa-solid fa-rectangle-list"></i>
            <span class="links_name">Complain List</span>
          </a>
          <span class="tooltip">Complain List</span>
        </li>
        <!-- <li>
          <a href="#">
            <i class='bx bx-folder' ></i>
            <span class="links_name">File Manager</span>
          </a>
          <span class="tooltip">Files</span>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cart-alt' ></i>
            <span class="links_name">Order</span>
          </a>
          <span class="tooltip">Order</span>
        </li> -->

      </ul>
    </div>

    <!-- Profile section -->
    <div class="profile-section">
      <h2 class="section-heading">Profile</h2>
      <ul class="nav-list">
        <li>
          <a href="adminProfile.php">
            <i class="fa-solid fa-user"></i>
            <span class="links_name">View Profile</span>
          </a>
          <span class="tooltip">View Profile</span>
        </li>
        <li style="margin-top: 10px;">
          <a href="#">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="links_name">Logout</span>
          </a>
          <span class="tooltip">Logout</span>
        </li>

      </ul>
    </div>
  </div>


  <div class="container-fluid p-0">
    <div class="main-section">
      <!--Tulis coding kat sini-->
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="column">
              <div class="title">
                All <br>Department
              </div>
            </div>
            <div class="column">
              <div class="activity-title">
                Total Posts
                <h5 class="total-number">85</h5>
                <div class="container">
                  <div class="left">
                    <span>17 %</span>
                  </div>
                  <div class="right">
                    <span>than last week</span>
                  </div>
                </div>
                <div class="vl"></div>
              </div>
            </div>

            <div class="column">
              <div class="activity-title">
                Total Likes
                <h5 class="total-number">85</h5>
                <div class="container">
                  <div class="left">
                    <span>17 %</span>
                  </div>
                  <div class="right">
                    <span>than last week</span>
                  </div>
                </div>
                <div class="vl" style="left:75%;"></div>
              </div>
            </div>

            <div class="column">
              <div class="activity-title">
                Total Comments
                <h5 class="total-number">85</h5>
                <div class="container">
                  <div class="left">
                    <span>17 %</span>
                  </div>
                  <div class="right">
                    <span>than last week</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="clearfix">
      <div class="box" style="width: 65%;">
        <div class="second-section">
          <!--Tulis coding kat sini-->
          <div class="card">
            <div class="card-body">
              <canvas id="lineChart" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="box" style="width: 23%; margin-left: 2%;">
        <div class="second-section">
          <!--Tulis coding kat sini-->
          <div class="card">
            <div class="card-body">
            <canvas id="pieChart" style="width:100%;max-width:600px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>




    <footer class="text-center text-white fixed-bottom overflow-hidden" style="background-color: #21081a;">


      <!-- Copyright -->
      <div class="text-center text-white p-3" style="background-color: rgba(44, 88, 100, 1)">
        © 2019 2023. FK-EDU SEARCH
      </div>
      <!-- Copyright -->
    </footer>
  </div>



  <!-- Graph Line Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script>
    const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

    new Chart("lineChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
          borderColor: "red",
          fill: false
        }, {
          data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
          borderColor: "green",
          fill: false
        }, {
          data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
          borderColor: "blue",
          fill: false
        }]
      },
      options: {
        legend: {
          display: false
        }
      }
    });
  </script>
  <!-- Pie Chart -->
  <script>
    var zValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];

    new Chart("pieChart", {
      type: "doughnut",
      data: {
        labels: zValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "World Wide Wine Production 2018"
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

    searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
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
</body>

</html>