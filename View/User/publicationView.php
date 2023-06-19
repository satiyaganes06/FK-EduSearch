<?php
session_start();
$pubID = $_GET['publication_id'];
$_SESSION["user_route"] = "view";

if (!isset($_SESSION["Current_user_id"])) {
?>
    <script>
        alert("Access denied !!!")
        window.location = "../Module1/Login/GeneralUserLogin/userLogin.php";
    </script>
<?php
}

include("../../Config/database_con.php");

$sql = "SELECT * FROM publication WHERE publication_id = '$pubID'";
$result = mysqli_query($conn, $sql) or die("Could not execute query in publication list");
$row = mysqli_fetch_assoc($result);
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
            <h5 class="fw-bold ml-4">Publication View</h5>
            <div class="container row align-items-center mt-2">
                <div class="table-responsive">
                    <table id="myTable" class="table align-middle mb-0 bg-white">
                        <tbody class="bg-light">

                            <tr>
                                <th scope="row"><strong>Title :</strong></th>
                                <td><?php echo $row["publication_title"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><strong>Authors :</strong></th>
                                <td><?php echo $row["publication_author"]; ?></td>
                            </tr>

                            <tr>
                                <th scope="row"><strong>Publication date :  </strong></th>
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
                    </table><br>
                    <button onclick="history.back()" type="button" class="btn btn-light text-muted mr-2">BACK</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include_once('../Common/html/footer.html');
    ?>

    <!-- MDB -->
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>