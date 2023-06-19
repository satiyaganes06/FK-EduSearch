<?php
session_start();

//If the user is not logged in, send them to the login form
if (!isset($_SESSION["Current_admin_id"])) {
?>
  <script>
    alert("Access denied !!!")
    window.location = "../Login/Admin%20Login/adminLogin.php";
  </script>
<?php
} else {
  include("../../../Config/database_con.php");
  //For pie chart to past value degrre, diploma, master, phd
  $acaDiploma = "SELECT * FROM user_profile WHERE user_academicStatus = 'Diploma'";
  $result1 = $conn->query($acaDiploma);
  $diploma = $result1->num_rows;

  $acaDegree = "SELECT * FROM user_profile WHERE user_academicStatus = 'Degree'";
  $result2 = $conn->query($acaDegree);
  $degree = $result2->num_rows;

  $acaMaster = "SELECT * FROM user_profile WHERE user_academicStatus = 'Master'";
  $result3 = $conn->query($acaMaster);
  $master = $result3->num_rows;

  $acaPHD = "SELECT * FROM user_profile WHERE user_academicStatus = 'PHD'";
  $result4 = $conn->query($acaPHD);
  $phd = $result4->num_rows;

  //For line graph value to past value view & like
  $graph = "SELECT * FROM posting";
  $result5 = $conn->query($graph);
  if ($result5->num_rows > 0) {
    $view = array();
    $like = array();
    while ($row = $result5->fetch_assoc()) {
      $view[] = $row["posting_view"];
      $like[] = $row["posting_like"];
    }
  }

  //Dispaly total post percentage
  // current month
  $currentPostQuery = "SELECT COUNT(posting_id) AS post FROM posting WHERE MONTH(posting_date) = MONTH(CURRENT_DATE)";
  $resultCurrentPost = mysqli_query($conn, $currentPostQuery);
  $rowCurrentPost = mysqli_fetch_assoc($resultCurrentPost);
  $currentPost = $rowCurrentPost['post'];
  

  // Retrieve previous month's value
  $previousPosthQuery = "SELECT COUNT(posting_id) AS post FROM posting WHERE MONTH(posting_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
  $resultPreviousPost = mysqli_query($conn, $previousPosthQuery);
  $rowPreviousPost = mysqli_fetch_assoc($resultPreviousPost);
  $previousPost = $rowPreviousPost["post"];

  // Calculate percentage difference
  if ($previousPost != 0) {
    $post = (($currentPost - $previousPost) / $previousPost) * 100;
  } else {
    $previousPost = 0; // Avoid division by zero
    $post = 0;
  }
  $percentagePost = number_format($post, 2);


  //Dispaly total like percentage
  // current month
  $currentLikeQuery = "SELECT COUNT(*) AS likes FROM posting_like WHERE MONTH(date) = MONTH(CURRENT_DATE)";
  $resultCurrentLike = mysqli_query($conn, $currentLikeQuery);
  $rowCurrentLike = mysqli_fetch_assoc($resultCurrentLike);
  $currentLike = $rowCurrentLike["likes"];

  // Retrieve previous month's value
  $previousLikeQuery = "SELECT COUNT(*) AS likes FROM posting_like WHERE MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
  $resultPreviousLike = mysqli_query($conn, $previousLikeQuery);
  $rowPreviousLike = mysqli_fetch_assoc($resultPreviousLike);
  $previousLike = $rowPreviousLike["likes"];

  // Calculate percentage difference
  if ($previousLike != 0) {
    $like = (($currentLike - $previousLike) / $previousLike) * 100;
  } else {
    $previousLike = 0; // Avoid division by zero
    $like = 0;
  }
  $percentageLike = number_format($like, 2);

  //Dispaly total comment percentage
  // current month
  $currentDQuery = "SELECT SUM(posting_id) AS discuss FROM posting WHERE MONTH(posting_date) = MONTH(CURRENT_DATE)";
  $resultCurrentD = mysqli_query($conn, $currentDQuery);
  $rowCurrentD= mysqli_fetch_assoc($resultCurrentD);
  $currentD = $rowCurrentD["discuss"];

  // Retrieve previous month's value
  $previousDQuery = "SELECT SUM(discussion_id) AS discuss FROM discussion WHERE MONTH(discussion_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
  $resultPreviousD = mysqli_query($conn, $previousDQuery);
  $rowPreviousD = mysqli_fetch_assoc($resultPreviousD);
  $previousD = $rowPreviousD["discuss"];

  // Calculate percentage difference
  if ($previousD != 0) {
    $discuss = (($currentD - $previousD) / $previousD) * 100;
  } else {
    $previousD = 0; // Avoid division by zero
    $discuss = 0;
  }
  $percentageD = number_format($discuss, 2);
}
?>

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
          <a href="./adminUserApprovalList.php">
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
          <a href="../../../Config/adminlogout.php">
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

    <!-- Diplay total posts,likes & comment -->
      <?php
      include("../../../Config/database_con.php");
      $posts = "SELECT (SELECT COUNT(posting_id) FROM posting) AS total_posts,  
                (SELECT COUNT(*) FROM discussion) AS total_dicusssion,
                (SELECT COUNT(*) FROM posting_like) AS total_likes";
      $total = mysqli_query($conn, $posts);
      if ($total) {
        $row = mysqli_fetch_assoc($total);
        $totalPosts = $row['total_posts'];
        $totalDiscussion = $row['total_dicusssion'];
        $totalLike = $row['total_likes'];
      ?>
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
                  <h5 class="total-number"><?php echo $totalPosts; ?></h5>
                  <div class="container">
                    <div class="left">
                      <span><?php echo $percentagePost; ?>%</span>
                    </div>
                    <div class="right">
                      <span>than last month</span>
                    </div>
                  </div>
                  <div class="vl"></div>
                </div>
              </div>

              <div class="column">
                <div class="activity-title">
                  Total Likes
                  <h5 class="total-number"><?php echo $totalLike; ?></h5>
                  <div class="container">
                    <div class="left">
                      <span><?php echo $percentageLike; ?>%</span>
                    </div>
                    <div class="right">
                      <span>than last month</span>
                    </div>
                  </div>
                  <div class="vl" style="left:75%;"></div>
                </div>
              </div>

              <div class="column">
                <div class="activity-title">
                  Total Comments
                  <h5 class="total-number"><?php echo $totalDiscussion; ?></h5>
                  <div class="container">
                    <div class="left">
                      <span><?php echo $percentageD; ?>%</span>
                    </div>
                    <div class="right">
                      <span>than last month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } else {
        echo "Error retrieving total number of complaints: " . mysqli_error($conn);
      }

      mysqli_close($conn);
      ?>
    </div>

    <!--Line Chart dan Pie Chart-->
    <div class="clearfix">
      <div class="box" style="width: 65%;">
        <div class="second-section">
          <div class="card">
            <div class="card-body">
            <div class="card-body title" style="padding:0;font-size:large">
              <p>User Activity Statistics</p>
            </div>
              <label for="filter">Select Filter:</label>
              <select id="filter" onchange="timeFrame(this)">
                <option value="day">By Date</option>
                <option value="week">By Week</option>
                <option value="month">By Month</option>
              </select>
              <div class="container">
                <div class="left" style="padding-left:100px;">
                  <canvas id="myChart" style="width:100%;width:600px"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box" style="width: 23%; margin-left: 2%;">
        <div class="second-section">
          <div class="card">
            <div class="card-body">
            <div class="card-body title" style="padding:0;font-size:large">
              <p>User Academic Level</p>
            </div>
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

  <!-- script for line chart graph -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <script>
    const today = new Date(); // Get the current date and time
    const day1 = new Date(today); // Create a new date object with the value of today
    const day2 = new Date(today);
    const day3 = new Date(today);
    const day4 = new Date(today);
    const day5 = new Date(today);
    const day6 = new Date(today);

    day1.setDate(today.getDate() - 1); // Subtract 1 day from the date
    day2.setDate(today.getDate() - 2);
    day3.setDate(today.getDate() - 3);
    day4.setDate(today.getDate() - 4);
    day5.setDate(today.getDate() - 5);
    day6.setDate(today.getDate() - 6);

    const dayEngagement = [
      {x: day6.getTime(),y: 0,view: 0},
      {x: day5.getTime(),y: 0,view: 0},
      {x: day4.getTime(),y: 0,view: 0},
      {x: day3.getTime(),y: 0,view: 0},
      {x: day2.getTime(), y: 0,view: 0},
      {x: day1.getTime(),y: 0,view: 0},
      {x: today.getTime(),y: 0,view: 0},
    ];

    const daySatisfaction = [
      {x: day6.getTime(), y: 0,like: 0},
      {x: day5.getTime(),y: 0,like: 0},
      {x: day4.getTime(),y: 0,like: 0},
      {x: day3.getTime(),y: 0,like: 0},
      {x: day2.getTime(),y: 0,like: 0},
      {x: day1.getTime(),y: 0,like: 0},
      {x: today.getTime(),y: 0,like: 0},
    ];


    const week = [
      {x: Date.parse('2023-6-4 00:00:00 GMT+0800'),y: 35},
      {x: Date.parse('2023-6-11 00:00:00 GMT+0800'),y: 0 },
      {x: Date.parse('2023-6-18 00:00:00 GMT+0800'), y: 70},
      {x: Date.parse('2023-6-25 00:00:00 GMT+0800'),y: 60},
      {x: Date.parse('2023-7-2 00:00:00 GMT+0800'),y: 50},
    ];


    const month = [
      {x: Date.parse('2023-1-01 00:00:00 GMT+0800'), y: 25},
      {x: Date.parse('2023-2-01 00:00:00 GMT+0800'),y: 10},
      {x: Date.parse('2023-3-01 00:00:00 GMT+0800'),y: 50},
      {x: Date.parse('2023-4-01 00:00:00 GMT+0800'),y: 20,},
      {x: Date.parse('2023-5-01 00:00:00 GMT+0800'), y: 20},
      {x: Date.parse('2023-6-01 00:00:00 GMT+0800'), y: 25},
      {x: Date.parse('2023-7-01 00:00:00 GMT+0800'),y: 10},
      {x: Date.parse('2023-8-01 00:00:00 GMT+0800'),y: 50},
      {x: Date.parse('2023-9-01 00:00:00 GMT+0800'),y: 20,},
      {x: Date.parse('2023-10-01 00:00:00 GMT+0800'), y: 20},
    ];

    // setup 
    const like = <?php echo json_encode($like); ?>;
    const view = <?php echo json_encode($view); ?>;

    function updateDayData() {
      view.forEach((dataPoint, index) => {
        myChart.config.data.datasets[0].data[index].y = dataPoint;
        myChart.config.data.datasets[0].data[index].view = view[index];
        myChart.config.data.datasets[1].data[index].like = like[index];
      });
    }

    const data = {
      datasets: [{
          label: 'Engagement Rate',
          data: dayEngagement,
          backgroundColor: 'blue',
          borderColor: 'blue',
          borderWidth: 1
        },
        {
          label: 'User Satisfaction',
          data: daySatisfaction,
          backgroundColor: 'green',
          borderColor: 'green',
          borderWidth: 1
        },
      ]
    };

    // config 
    const config = {
      type: 'line',
      data,
      options: {
        scales: {
          x: {
            type: 'time',
            time: {
              unit: 'day'
            }
          },
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    function timeFrame(period) {
      console.log(period.value)
      if (period.value == 'day') {
        myChart.config.options.scales.x.time.unit = period.value;
        updateDayData();
      }
      if (period.value == 'week') {
        myChart.config.options.scales.x.time.unit = period.value;
        myChart.config.data.datasets[0].data = week;
      }
      if (period.value == 'month') {
        myChart.config.options.scales.x.time.unit = period.value;
        myChart.config.data.datasets[0].data = month;
      }
      myChart.update();

    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <!-- Pie Chart -->
  <script>
    var zValues = ["Diploma", "Degree", "Master", "PHD"];
    var yValues = [<?php echo $diploma; ?>, <?php echo $degree; ?>, <?php echo $master; ?>, <?php echo $phd; ?>];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9"
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
          text: "User Academic Level"
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