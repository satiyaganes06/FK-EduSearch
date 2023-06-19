<?php
session_start();
$_SESSION["user_route"] = "home";
if (!isset($_SESSION["Current_user_id"])) {

?>
    <script>
        alert("Access denied !!!")
        window.location = "../Module1/Login/GeneralUserLogin/userLogin.php";
    </script>
<?php

}

include("../../Config/database_con.php");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="css/dashboardStyle.css">
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>

<body>

    <!-- Navbar -->
    <?php
    include_once('../Common/html/userNavBar.php');
    ?>

    <section>
        <div class="container mt-3 p-3">
            <h5 class="fw-bold ml-4">Publication List</h5>
            <div class="container row align-items-center mt-2">
                <div class="table-responsive">
                    <table id="myTable" class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Bil</th>
                                <th>Expert Name</th>
                                <th>Publication Title</th>
                                <th>Publication Date</th>
                                <th>Impression</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM publication WHERE publication_status = 'Approve'";
                                $result = mysqli_query($conn, $sql)or die("Could not execute query in publication list");
                                $countResult = mysqli_num_rows($result);
                                $count = 1;

                                if($countResult > 0){
                                            while ($row = mysqli_fetch_array($result)){
                                                $pubID = $row['publication_id'];
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['publication_author'];?></td>
                                <td><?php echo $row['publication_title']; ?></td>
                                <td><?php echo $row['publication_date']; ?></td>
                                <td><?php echo $row['publication_impression']; ?></td>
                                <td>
                                    <a href="publicationView.php?publication_id=<?php echo urlencode($pubID); ?>"><i class="fas fa-eye" style="padding-right:15px;color:green"></i></a>
                                </td>
                            </tr>
                            <?php
                                $count++;
                                }}
                            ?>
                        </tbody>
                    </table>
                </div>
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
        var barColors = [
            "#FF0000",
            "#FFD600",
            "#1FB712",
        ];
    </script>

    <!-- MDB -->
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>