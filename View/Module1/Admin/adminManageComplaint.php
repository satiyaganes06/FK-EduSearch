<?php
session_start();

//If the user is not logged in send him/her to the login form
if (!isset($_SESSION["Current_admin_id"])) {

?>
    <script>
        alert("Access denied !!!")
        window.location = "../Login/Admin%20Login/adminLogin.php";
    </script>
<?php

} else {
    include("../../../Config/database_con.php");
    $query2 = "SELECT * FROM user_profile";
    $result2 = $conn->query($query2);

    $numberOfTotalUsers = $result2->num_rows;

    $query3 = "SELECT * FROM account WHERE acc_role = 'User'";
    $result3 = $conn->query($query3);

    $numberOfUsers = $result3->num_rows;
    $query4 = "SELECT * FROM account WHERE acc_role = 'Staff'";
    $result4 = $conn->query($query4);

    $numberOfStaff = $result4->num_rows;

    $query5 = "SELECT * FROM account WHERE acc_role = 'Expert'";
    $result5 = $conn->query($query5);

    $numberOfExpert = $result5->num_rows;

    $query6 = "SELECT * FROM complaint";
    $result6 = $conn->query($query6);

    $numberOfComplaint = $result6->num_rows;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
            <a href="adminDashboard.php"><img src="/Asset/Logo Login.png" alt="Logo" style="width: 180px;" id="imglogo" /></a>

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
                    <a href="adminDashboard.php">
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
                    <a href="adminUserApprovalList.php">
                        <i class="fa-solid fa-user-check"></i>
                        <span class="links_name">Approval List</span>
                    </a>
                    <span class="tooltip">Approval List</span>
                </li>
                <li>
                    <a href="" class="active">
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

    <div class="container-fluid p-0" style="  margin-bottom: 50px;">
        <div class="main-section">
            <?php

            $comp_status1 = "In Investigation";
            $comp_status2 = "On Hold";
            $comp_status3 = "Resolved";

            $complaints = "SELECT COUNT(*) AS total_complaints, 
                            SUM(complaint_status = '$comp_status1') AS total_investigation,
                            SUM(complaint_status = '$comp_status2') AS total_onHold,
                            SUM(complaint_status = '$comp_status3') AS resolved
                            FROM complaint";

            $total = mysqli_query($conn, $complaints);

            if ($total) {
                $row = mysqli_fetch_assoc($total);
                $totalComplaints = $row['total_complaints'];
                $totalInvestigation = $row['total_investigation'];
                $totalOnHold = $row['total_onHold'];
                $totalResolved = $row['resolved'];

            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="column">
                                <div class="vl" style="left:5%;"></div>
                                <div class="activity-title" style="margin-left:25%;">
                                    Total Complaint
                                    <h5 class="total-number"><?php echo $totalComplaints; ?></h5>
                                    <div class="container">
                                        <div class="left">
                                            <span>17 %</span>
                                        </div>
                                        <div class="right">
                                            <span>than last week</span>
                                        </div>
                                    </div>
                                    <div class="vl" style="left:40%;"></div>
                                </div>
                            </div>
                            <div class="column" style=" width: 70%;">
                                <div class="complaint">
                                    <div class="container">
                                        <div class="left">
                                            <span>Total Investigation</span>
                                        </div>
                                        <div class="right">
                                            <span><?php echo $totalInvestigation ?></span>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="left">
                                            <span>Total On Hold</span>
                                        </div>
                                        <div class="right">
                                            <span><?php echo $totalOnHold ?></span>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="left">
                                            <span>Total Resolved</span>
                                        </div>
                                        <div class="right">
                                            <span><?php echo $totalResolved ?></span>
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
    </div>

    <div class="container-fluid p-0">
        <div class="main-section">
            <!--Tulis coding kat sini-->
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-left">Complaint List</h5>
                    <div class="input-group d-flex w-25">
                        <div class="form-outline d-flex">
                            <input type="search" id="form1" class="form-control rounded" style="border-radius: 25px;" onkeyup="myFunction()" />
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
                                    <th>Bil</th>
                                    <th>User ID</th>
                                    <th>Complaint Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../../../Config/database_con.php");
                                $bilNum = 0;


                                $sql = "SELECT * FROM complaint
                                        INNER JOIN user_profile ON complaint.user_id=user_profile.user_id";
                                $result = mysqli_query($conn, $sql);


                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {


                                ?>
                                        <tr>
                                            <td><?php echo ++$bilNum; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['complaint_type']; ?></td>

                                            <?php

                                            if ($row['complaint_status'] === "In Investigation") {
                                                echo '<td><span class="badge badge-danger rounded-pill d-inline">In Investigation</span></td>';
                                            } elseif ($row['complaint_status'] === "On Hold") {
                                                echo '<td><span class="badge badge-warning rounded-pill d-inline">On Hold</span></td>';
                                            } else {
                                                echo '<td><span class="badge badge-success rounded-pill d-inline">Resolved</span></td>';
                                            }
                                            ?></span>
                                            <td>
                                                <a href="#editModal<?php echo $row['complaint_id'] ?>" data-toggle="modal"><i class="fas fa-edit" style="padding-right:15px;color:blue"></i></a>
                                                <a href="#viewModal<?php echo $row['user_id'] ?><?php echo $row['complaint_id'] ?>" data-toggle="modal"><i class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                                                <a href="#deleteModal<?php echo $row['complaint_id'] ?>" data-toggle="modal"><i class="fas fa-trash" style="padding-right:15px;color:rgb(255, 5, 5)"></i></a>
                                                <?php include('modal.php'); ?>
                                            </td>
                                        </tr>
                                <?php  }
                                } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        </section>
        <footer class="text-center text-white fixed-bottom overflow-hidden" style="background-color: #21081a; margin-top: 20px;">


            <!-- Copyright -->
            <div class="text-center text-white p-3" style="background-color: rgba(44, 88, 100, 1)">
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

            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("form1");
                filter = input.value.toUpperCase();
                table = document.getElementsByTagName("table")[0];
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1]; // Change index to match the column you want to search
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
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