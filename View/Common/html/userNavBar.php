<?php
$user_route = $_SESSION["user_route"];
include("../../Config/database_con.php");

$id = $_SESSION["Current_user_id"];

$sql0 = "SELECT * FROM user_profile WHERE user_id  = '$id'";
$result0 = mysqli_query($conn, $sql0) or die("Could not execute query in view");
$row0 = mysqli_fetch_assoc($result0);


if ($user_route == 'home') {
  $home = 'active';
} elseif ($user_route == 'complaint') {
  $complaint = 'active';
} elseif ($user_route == 'question') {
  $question = 'active';
} elseif ($user_route == 'rating') {
  $rating = 'active';
} else {
}
?>
<html>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark text-white sticky-top">

  <!-- Container wrapper -->
  <div class="container-fluid">

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-lg-0 ml-3" href="../../View/User/dashboard.php">
        <img id="fk_logo" src="../../Asset/logo.png" alt="Fk-edu Logo" height="25" loading="lazy" />
      </a>

      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item <?php echo $home ?>">
          <a class="nav-link ml-2" href="../../View/User/dashboard.php"><strong>RESEARCH</strong></a>
        </li>
        <li class="nav-item <?php echo $complaint ?>">
          <a class="nav-link ml-2" href="../../View/Complaint/userViewComplaint.php"><strong>COMPLAINT</strong></a>
        </li>
        <li class="nav-item <?php echo $question ?>">
          <a class="nav-link ml-2" href="../../View/User/question.php"><strong>QUESTION</strong></a>
        </li>
        <li class="nav-item <?php echo $rating ?>">
          <a class="nav-link ml-2" href="../../../View/User/rating.php"><strong>RATING</strong></a>
        </li>
      </ul>
    </div>

    <!-- Right elements -->
    <div class="d-flex align-items-center search_Section">
      <form class="d-flex input-group w-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text text-white border-0" id="search-addon">
          <i class="fas fa-search"></i>
        </span>
      </form>


      <!-- Profile Avatar -->
      <div class="dropdown d-flex profile_section">

        <div class="mr-3 profile_name_Section">
          <h6 id="navName"><strong><?php echo $row0['user_name']; ?></strong></h6>
          <h6 id="navUsername">@<?php echo $row0['user_name']; ?></h6>
        </div>
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['user_profile_img']); ?>" class="rounded-circle shadow" height="40" alt="Black and White Portrait of a Man" loading="lazy" />
          </a>
          
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <!-- Dropdown content here -->
            <a class="dropdown-item" href="../../View/User/profile.php">Profile</a>
            <a class="dropdown-item" href="../../Config/logout.php">Logout</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

</html>