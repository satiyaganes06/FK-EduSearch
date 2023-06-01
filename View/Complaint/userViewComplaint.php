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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="../Common/css/navbar.css">
    <link rel="stylesheet" href="../Common/css/footer.css">
    <link rel="stylesheet" href="css/complaintStyle.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

    <!-- Pie Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <!-- MDB -->
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script-->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- Navbar -->
    <?php
    include_once('../Common/html/userNavBar.html');
    ?>

    <section>
        <div class="container pt-3 pb-2">
            <h5 class="fw-bold ml-4">Complaint Overview</h5>
            <div class="row">
                <div class="col-sm-3 mt-4">
                    <div class="box" style="border-color:#FF0000;">
                        <h5>In Investigation</h5>
                        <p>3</p>
                    </div>
                </div>
                <div class="col-sm-3 mt-4">
                    <div class="box" style="border-color:#FFD600;">
                        <h5>On Hold</h5>
                        <p>2</p>
                    </div>
                </div>
                <div class="col-sm-3 mt-4">
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
        <div class="container mt-3 p-3">
            <h5 class="fw-bold ml-4">My Complaint</h5>
            <div class="container row align-items-center mt-2">
                <div class="col-auto text-end ms-auto my-3">
                    <a href="userAddComplaint.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Complaint</a>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Bil</th>
                                <th>Date</th>
                                <th>Complaint Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>12/2/2022</td>
                                <td>Unsatisfied Expert's Feedback</td>
                                <td>
                                    <span class="badge badge-danger rounded-pill d-inline">In Investigation</span>
                                </td>
                                <td>
                                    <a href="#editModal" data-toggle="modal"><i class="fas fa-edit" style="padding-right:15px;color:blue"></i></a>
                                    <a href="#viewModal"  data-toggle="modal"><i class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                                    <a href="#deleteModal" data-toggle="modal"><i class="fas fa-trash" style="padding-right:15px;color:rgb(255, 5, 5)"></i></a>
                                    <?php include('modal.php');?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
</section>

    <!-- Footer -->
    <?php
    include_once('../Common/html/footer.html');
    ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

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
</body>

</html>