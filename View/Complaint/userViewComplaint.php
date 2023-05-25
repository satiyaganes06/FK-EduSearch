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
    <link rel="stylesheet" href="css/complaintStyle.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

    <!-- Pie Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>                  

    

</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/userNavBar.html');
  ?>

  <section>
    <div class="container pt-3 pb-2"> 
        <h6 class="fw-bold">Complaint Overview</h6>
        <div class="row mt-3">
            <div class="col-sm-3">
                <div class="box" style="border-color:#FF0000;">
                    <h5>In Investigation</h5>
                    <p>3</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box" style="border-color:#FFD600;">
                    <h5>On Hold</h5>
                    <p>2</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box" style="border-color:#1FB712;">
                    <h5>Resolved</h5>
                    <p>1</p>
                </div>
            </div>
            <div class="col-sm-3">
                <canvas id="myChart" style="width:80%;max-width:300px"></canvas>
            </div>
        </div>
    </div>
    <div class="container mt-3 p-3 align-items-center">
      
    </div>
  </section>

  <!-- Footer -->
  <?php
    include_once('../Common/html/footer.html');
  ?>

<script>

    var xValues = ["In Investigation", "On Hold", "Resolved"];
    var yValues = [3, 2, 1];
    var barColors = [
    "#FF0000",
    "#FFD600",
    "#1FB712"
    ];

    new Chart("myChart", {
    type: "doughnut",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
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