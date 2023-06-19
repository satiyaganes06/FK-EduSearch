<?php
session_start();

if (!isset($_SESSION["Current_user_id"])) {
?>
    <script>
        alert("Access denied !!!")
        window.location = "../Module1/Login/GeneralUserLogin/userLogin.php";
    </script>
<?php
}
$user_id = $_SESSION["Current_user_id"];

include("../../Config/database_con.php");

$sql = "SELECT * FROM user_profile WHERE user_id ='$user_id'";
$result = mysqli_query($conn, $sql) or die("Could not execute query in view");
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT * FROM posting WHERE user_id ='$user_id' ORDER BY posting_date DESC";
$result2 = mysqli_query($conn, $sql2) or die("Could not execute query in view");
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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />
</head>

<body>

    <!-- Navbar -->
    <?php
    include("../../Config/database_con.php");
    include_once('../Common/html/userNavBar.php');
    ?>

    <section>
        <div class="container-fluid d-flex">
            <!-- Info Profile -->
            <div class="col-3">
                <div class="infoProfile">
                    <div class="background">
                        <?php
                        if ($row['user_profile_bg'] == "") { ?>
                            <p class="text-center">Insert backround picture</p>
                        <?php } else { ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['user_profile_bg']); ?>" class="shadows" width="100%" height="100%" alt="Black profile background" loading="lazy" />
                        <?php } ?>
                    </div>
                    <div class="pictureProfile">
                        <hr class="solid">
                        <div class="centered">
                            <img id="profile-background-pic" src="data:image/jpeg;base64,<?php echo base64_encode($row['user_profile_img']); ?>" class="rounded-circle" height="100" width="100" alt="Black and White Portrait of a Man" />
                        </div>
                    </div>
                    <div class="infoUser">
                        <h4 class="userName">
                            <strong><?php echo $row['user_name']; ?></strong>
                            <a href="updateInfo.php"><i class="fa-solid fa-gear" style="color: #8d9096;"></i></a>
                        </h4>
                        <?php
                        if ($row['user_fullName'] == "") { ?>
                            <p class="text-center">Update your profile!</p>
                        <?php } else {
                        ?>
                            <div class="d-flex">
                                <p>ID: <?php echo $row['user_id']; ?></p>
                                <p class="ml-auto pr-3">Age: <?php echo $row['user_age']; ?></p>
                            </div>
                            <p>Name: <?php echo $row['user_fullName']; ?></p>
                            <p>Email: <?php echo $row['user_email']; ?></p>
                            <p>Academic Level: <?php echo $row['user_academicStatus']; ?></p>
                            <p>Social Media: <?php echo $row['user_socialMedia']; ?></p>
                            <p>Research Area: <br>
                                <?php
                                $user_researchArea = $row['user_researchArea'];
                                // Explode the comma-separated string into an array
                                $researchAreas = explode(",", $user_researchArea);

                                // Display the research areas with line breaks
                                foreach ($researchAreas as $area) {
                                    echo $area . "<br>";
                                }
                                ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <!-- Posting section -->
                <div class="d-flex flex-column">
                    <?php
                    if ($result2->num_rows > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $posting_id = $row2['posting_id'];
                            $sql3 = "SELECT * FROM discussion 
                                INNER JOIN posting ON  discussion.posting_id=posting.posting_id 
                                INNER JOIN user_profile ON discussion.user_id=user_profile.user_id
                                WHERE discussion.posting_id='$posting_id'
                                ORDER BY discussion.discussion_date, discussion.discussion_time ASC";
                            $result3 = mysqli_query($conn, $sql3) or die("Could not execute query in view");
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
                                            <i class="pt-2"  style="font-weight: normal;"><?php echo $row2['posting_title']; ?></i>
                                            <p><?php echo $row2['posting_content']; ?></p>
                                        </div>
                                        <!-- Determine the color of status -->
                                        <?php
                                        $status = $row2['posting_status'];
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
                                                    if ($status == "Completed" && $row2['posting_rating'] == 0) {
                                                    ?>
                                                        <a class="dropdown-item" href="#ratePosting<?php echo $posting_id ?>" data-toggle="modal"><i class="pt-3 fa-solid fa-star fa-xl"></i></a>
                                                    <?php
                                                    } else if ($status == "Revised") { ?>
                                                        <a class="dropdown-item" href="#closeCase<?php echo $posting_id ?>" data-toggle="modal"><i class="pt-3 fas fa-edit fa-xl"></i></a>
                                                    <?php } else if ($status == "Assign") { ?>
                                                        <a class="dropdown-item" href="#editPost<?php echo $posting_id ?>" data-toggle="modal"><i class="pt-3 fas fa-edit fa-xl"></i></a>
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
                                        <?php include("interactionProfile.php") ?>
                                        <?php
                                        if ($status == "Completed") {
                                        ?>
                                            <div class="rates">
                                                <i id="iconRate" class="fa-regular fa-star fa-l"></i>
                                            </div>
                                            <div class="rateCounter">
                                                <p><?php echo $row2['posting_rating']; ?> Rates</p>
                                            </div>
                                        <?php } ?>
                                        <div class="ml-auto">
                                            <p><?php echo $row2['posting_date']; ?></p>
                                        </div>
                                    </div>

                                    <!-- Comment section -->
                                    <hr class="solid">
                                    <div class="py-4">
                                        <strong>Comments</strong>
                                    </div>
                                    <?php if ($status == 'Revised') {
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
                                    <?php } ?>
                                    <?php
                                    if ($result3->num_rows > 0) {
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                    ?>
                                            <div class="d-flex flex-column pl-5">
                                                <div class="d-flex pb-3">
                                                    <div class="profileImg">
                                                        <!-- Image -->
                                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row3['user_profile_img']); ?>" class="rounded-circle shadow" height="40" width="40" ; alt="Black and White Portrait of a Man" loading="lazy" />
                                                    </div>
                                                    <div class="d-flex flex-column pl-2">
                                                        <div class="d-flex">
                                                            <strong><?php echo $row3['user_name']; ?></strong>
                                                            <p style="font-size:small" class="pl-2 pt-1"> (<?php echo $row3['discussion_date'] . " " . $row3['discussion_time']; ?>)</p>
                                                        </div>

                                                        <p><?php echo $row3['discussion_content']; ?></p>
                                                    </div>
                                                </div>
                                                <textarea id="textareaComment" placeholder="Enter your text..."></textarea>
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
        </div>
    </section>

    <!-- Footer -->
    <?php
    include_once('../Common/html/footer.html');
    ?>


    <!-- MDB -->
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>