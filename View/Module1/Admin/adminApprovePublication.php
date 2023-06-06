<?php
 include("../../../Config/database_con.php");



 $idURL = $_GET['posting_id'];

 $sql = "SELECT * FROM publication WHERE publication_id  = '$idURL'";
 $result = mysqli_query($conn,$sql) or die ("Could not execute query in view");
 $row = mysqli_fetch_assoc($result);

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
    <link rel="stylesheet" href="adminViewApprovalDetails.css" />
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
        
          <li>
            <a href="adminDashboard.php">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
          </li>
          <li>
            <a href="adminViewUserList.html" >
              <i class="fa-solid fa-user-group"></i>
              <span class="links_name">User List</span>
            </a>
            <span class="tooltip">User List</span>
          </li>
          <li>
            <a href="adminUserApprovalList.php" class="active">
              <i class="fa-solid fa-user-check"></i>
              <span class="links_name">Approval List</span>
            </a>
            <span class="tooltip">Approval List</span>
          </li>
          <li>
            <a href="adminManageComplaint.php">
              <i class="fa-solid fa-rectangle-list"></i>
              <span class="links_name">Complaint List</span>
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
              <h5 class="card-title fw-bold text-center">Approval</h5>
              <div
                class="d-flex w-100 justify-content-center align-items-center"
              ></div>
              <div class="tabletitle">
                <h4>Before Change</h4>
            </div>
            <div class="mainSection mb-3 mt-3">
                <div id="publicationDetails_Component">
                  
                  <div class="content_details">
                    <!-- Image -->
                    <img
                      src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                      class="rounded-circle shadow mb-3"
                      height="150"
                      width="150"
                      alt="Black and White Portrait of a Man"
                      loading="lazy"
                    />
        
                    <div class=" w-100">
        
                      <div class="d-flex justify-content-between mt-4  mb-3">
                        <h2 id="titlePage"><strong>View Publication</strong></h2>
                        
                        <div class="d-flex align-items-center">
                          <i class="far fa-eye text-muted mr-1 fs-6"></i>
                          <p id="impression_text"><?php echo $row['publication_impression'] ?></p>
                        </div>
        
                      </div>
                      
                      <table class="table align-middle">
                        <tbody>
        
                          <tr>
                            <th scope="row"><strong>Status :</strong></th>
                            <td><?php echo $row["publication_status"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Title :</strong></th>
                            <td><?php echo $row["publication_title"]; ?></td>
                          </tr>
                          <tr>
                            <th scope="row"><strong>Authors :</strong></th>
                            <td><?php echo $row["publication_author"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Publication : date </strong></th>
                            <td><?php echo $row["publication_date"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Journal :</strong></th>
                            <td><?php echo $row["publication_journal"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Volume :</strong></th>
                            <td><?php echo $row["publication_volume"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Issue :</strong></th>
                            <td><?php echo $row["publication_issue"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Pages :</strong></th>
                            <td><?php echo $row["publication_pages"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Publisher :</strong></th>
                            <td><?php echo $row["publication_publisher"]; ?></td>
                          </tr>
        
                          <tr>
                            <th scope="row"><strong>Description :</strong></th>
                            <td id='pubDesc'><?php echo $row["publication_description"]; ?></td>
                          </tr>
        
                        </tbody>
                      </table>
                      
                    </div>
                   
                  </div>
        
                  <button class="button_View btn-dark btn btn-block text-white" onClick="javascript:window.open('<?php echo $row["publication_link"]; ?>', '_blank');" data-mdb-ripple-color="dark"><strong>View</strong></button>
        
                </div>
            </div>
             

                <div class="text-end">
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addReasonModal">Reject</button>
                  <a type="button" class="btn btn-success me-2" href="../../../Model/Expert/approvePublication.php?pub_id=<?php echo $row["publication_id"]; ?>&status=Accept">Approve</a>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Add Reason -->
  <div class="modal fade" id="addReasonModal" tabindex="-1" role="dialog" aria-labelledby="addReasonModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <form action="../../../Model/Expert/approvePublication.php?pub_id=<?php echo $row["publication_id"]; ?>&status=Reject" method="post" accept-charset="utf-8" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h5 class="modal-title" id="addReasonModalLabel">Reason</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- Profile bg -->
            <div class="form-group">
              <label for="profile-image">Reason</label>
              <textarea type="text"  class="form-control-file" id="reason" name="reason" required></textarea>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
          </div>

        </form>
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
  </body>
</html>
