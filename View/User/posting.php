<?php
session_start();
$researchArea = $_GET["researchArea"];

if (!isset($_SESSION["Current_user_id"])) {
?>
    <script>
        alert("Access denied !!!")
        window.location = "../Module1/Login/GeneralUserLogin/userLogin.php";
    </script>
<?php
}

include("../../Config/database_con.php");
$id = $_SESSION["Current_user_id"];
//$row = mysqli_fetch_assoc($result);

$sql_modal = "SELECT user_profile.*, posting.* FROM user_profile 
        RIGHT JOIN posting ON user_profile.user_id = posting.user_id
        WHERE posting_course='$researchArea'";
$result_modal = mysqli_query($conn, $sql_modal) or die("Could not execute query in view");
$row_modal = mysqli_fetch_assoc($result_modal);

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

    <!-- MDB -->
    <link rel="stylesheet" href="../../Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/posting.css">
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
        <!-- Title Posting -->
        <div class="titlePosting">
            <script>
                var valueResearch = '<?php echo $researchArea; ?>';
            </script>
            <p class="title">
                <?php
                echo $researchArea;
                ?>
            </p>
            <form class="pt-2 pr-2 input-group w-auto" action="" method="POST">
                <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            </form>

            <?php
            if (isset($_POST['search'])) {
                $searchq = $_POST['search'];
                $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
                
                $sql = "SELECT user_profile.*, posting.* FROM user_profile 
                RIGHT JOIN posting ON user_profile.user_id = posting.user_id
                WHERE posting_course='$researchArea' AND posting_content LIKE '%$searchq%'";
        
                $result = mysqli_query($conn, $sql) or die("Could not execute query in view");
                $count = mysqli_num_rows($result);

                if($count == 0){
            ?>
                <script>
                    alert("There was no search result!");
                    window.history.back();
                </script>
            <?php
            }}else{
                $sql = "SELECT user_profile.*, posting.* FROM user_profile 
                        RIGHT JOIN posting ON user_profile.user_id = posting.user_id
                        WHERE posting_course='$researchArea'";
                $result = mysqli_query($conn, $sql) or die("Could not execute query in view");
            }

            ?>

            <!--
            <select onchange="myFunction()" class="form-select" aria-label="questionForm" id="categoriesDropdown">
                <option value="all" selected>All Categories</option>
            </select>-->
            <?php //include_once('../../Model/User/dropdownPosting.php'); 
            ?>
            <?php include('../../Model/User/filter.php'); ?>
        </div>

        <!-- Lower section -->
        <div class="container-fluid d-flex">
            <div class="col-10">
                <!-- Posting section -->
                <div class="d-flex flex-column">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $posting_id = $row['posting_id'];
                            $user_id = $row['user_id'];
                    ?>
                            <div class="pb-2">
                                <div class="question">
                                    <div class="d-flex pb-3">
                                        <!-- Image -->
                                        <div class="profileImg">
                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['user_profile_img']); ?>" class="rounded-circle shadow" height="50" width="50" ; alt="Black and White Portrait of a Man" loading="lazy" />
                                        </div>
                                        <div class="d-flex flex-column pl-2">
                                            <strong><?php echo $row['user_name']; ?></strong>
                                            <p><?php echo $row['posting_content']; ?></p>
                                        </div>
                                        <!-- Determine the color of status -->
                                        <?php
                                        $status = $row['posting_status'];
                                        if ($status == "Assign") {
                                            $colorStatus = "FFFFFF";
                                        } else if ($status == "Accepted") {
                                            $colorStatus = "3E9BA8";
                                        } else if ($status == "Revised") {
                                            $colorStatus = "DFF45C";
                                        } else if ($status == "Completed") {
                                            $colorStatus = "84D17E";
                                        }
                                        ?>
                                        <div class="right ml-auto d-flex text-center" id="status">
                                            <?php if ($user_id == $id) { ?>
                                                <div class="col-1">
                                                    <?php
                                                    if ($status == "Completed" && $row['posting_rating'] == 0) { ?>
                                                        <a class="dropdown-item" href="#ratePosting<?php echo $posting_id ?>" data-toggle="modal"><i class="pt-3 fa-solid fa-star fa-xl"></i></a>
                                                    <?php } else if ($status == "Revised") { ?>
                                                        <a class="dropdown-item" href="#closeCase<?php echo $posting_id ?>" data-toggle="modal"><i class="pt-3 fas fa-edit fa-xl"></i></a>
                                                    <?php } else if ($status == "Assign") { ?>
                                                        <a class="dropdown-item" href="#editQues<?php echo $posting_id ?>" data-toggle="modal"><i class="pt-3 fas fa-edit fa-xl"></i></a>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-1">
                                                    <a class="dropdown-item" href="#deleteQues<?php echo $posting_id ?>" data-toggle="modal"><i class="pt-3 fas fa-trash fa-xl"></i></a>
                                                    <?php include('popup.php'); ?>
                                                </div>
                                            <?php } ?>
                                            <div class="col-1">
                                                <div class="circle1" style="background-color: #<?php echo $colorStatus; ?>;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- icon section -->
                                    <div class="d-flex pt-1 pb-1">
                                        <?php include("interaction.php") ?>
                                        <?php
                                        if ($status == "Completed") {
                                        ?>
                                            <div class="rates">
                                                <i id="iconRate" class="fa-regular fa-star fa-l"></i>
                                            </div>
                                            <div class="rateCounter">
                                                <p><?php echo $row['posting_rating']; ?> Rates</p>
                                            </div>
                                        <?php } ?>
                                        <div class="ml-auto">
                                            <p><?php echo $row['posting_date']; ?></p>
                                        </div>
                                    </div>
                                    <!-- Comment section -->
                                    <hr class="solid">
                                    <div class="py-4">
                                        <strong>Comments</strong>
                                    </div>
                                    <?php if ($user_id == $id) {
                                        if ($status == 'Revised') {
                                    ?>
                                            <form id="comment-form" action="../../Model/User/addComment.php" method="POST">
                                                <div class="input-group mb-4 mt-3">
                                                    <textarea name="reply" id="reply" class="form-control" id="exampleFormControlTextarea1" placeholder="Reply" required="text"></textarea>
                                                    <input type="hidden" name="posting_id" value="<?php echo $posting_id; ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                    <?php }
                                    } ?>
                                    <?php
                                    $sql2 = "SELECT * FROM discussion 
                                                INNER JOIN posting ON  discussion.posting_id=posting.posting_id 
                                                INNER JOIN user_profile ON discussion.user_id=user_profile.user_id
                                                WHERE discussion.posting_id='$posting_id'
                                                ORDER BY discussion.discussion_date, discussion.discussion_time ASC";
                                    $result2 = mysqli_query($conn, $sql2) or die("Could not execute query in view");
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                    ?>
                                            <div class="d-flex flex-column pl-5">
                                                <div class="d-flex pb-3">
                                                    <div class="profileImg">
                                                        <!-- Image -->
                                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row2['user_profile_img']); ?>" class="rounded-circle shadow" height="40" width="40" ; alt="Black and White Portrait of a Man" loading="lazy" />
                                                    </div>
                                                    <div class="d-flex flex-column pl-2">
                                                        <div class="d-flex">
                                                            <strong><?php echo $row2['user_name']; ?></strong>
                                                            <p style="font-size:small" class="pl-2 pt-1"> (<?php echo $row2['discussion_date'] . " " . $row2['discussion_time']; ?>)</p>
                                                        </div>

                                                        <p><?php echo $row2['discussion_content']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <div class="text-center pb-2">
                                            <p><?php echo "No comment."; ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }
                    } else {
                        ?>
                        <div class="text-center" style="height: 200px; margin:100px">
                            <p><?php echo "No post found."; ?></p>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
            <div class="col-2">
                <!-- Info Status -->
                <div class="infoBoard">
                    <p><strong>Info Status</strong></p>
                    <p>
                    <div class="rounded-circle mr-2 float-left" style="width:20px;height:20px;background-color: #84D17E;"></div> Completed</p>
                    <p>
                    <div class="rounded-circle mr-2 float-left" style="width:20px;height:20px;background-color: #DFF45C;"></div>Revised</p>
                    <p>
                    <div class="rounded-circle mr-2 float-left" style="width:20px;height:20px;background-color: #3E9BA8;"></div>Accepted</p>
                    <p>
                    <div class="rounded-circle mr-2 float-left" style="width:20px;height:20px;background-color: #FFFFFF;"></div>Assign</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include_once('../Common/html/footer.html');
    ?>


    <!-- MDB -->
    <script src="../../js/posting.js"></script>
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
session_abort();
?>

</html>