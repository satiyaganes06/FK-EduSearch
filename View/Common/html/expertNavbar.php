<?php
  $route = $_SESSION["route"];

  $user_id =  $_SESSION['Current_user_id'];
  $sql1 = "SELECT * FROM user_profile WHERE user_id  = '$user_id'";
  $result1 = mysqli_query($conn,$sql1) or die ("Could not execute query in view");
  $row1 = mysqli_fetch_assoc($result1);

  if($route == 'home'){
    $home = 'active' ;

  }elseif($route == 'notifi'){
      $notifi = 'active' ;

  }elseif($route == 'post'){
      $post = 'active' ;

  }else{
     
  } 
?>

<html>
    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark text-white sticky-top">

    <!-- Container wrapper -->
    <div class="container-fluid">

      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-lg-0 ml-3" href="/View/Expert/expert_homepage.php">
          <img id="fk_logo"
            src="../../Asset/logo.png"
            alt="Fk-edu Logo"
            height="25"
            loading="lazy"
          />
        </a>

        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item <?php echo $home?>">
            <a class="nav-link ml-2" href="/View/Expert/expert_homepage.php"><strong>PUBLICATION</strong></a>
          </li>
          <li class="nav-item <?php echo $post ?>">
            <a class="nav-link ml-2" href="/View/Expert/expert_post_list.php"><strong>POST</strong></a>
          </li>
          <li class="nav-item <?php echo $notifi ?>">
            <a class="nav-link ml-2" href="/View/Expert/expert_notification.php"><strong>NOTIFICATION</strong></a>
          </li>
        </ul>
      </div>
  
      <!-- Right elements -->
      <div class="d-flex align-items-center search_Section">
        <form class="d-flex input-group w-auto">
          <input
            type="search"
            class="form-control rounded"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="search-addon"
          />
          <span class="input-group-text text-white border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </form>

        
          <div class="dropdown d-flex profile_section">

            <div class="mr-3 profile_name_Section">
            <h6 id="navName"><strong><?php echo $row1['user_name']; ?></strong></h6>
              <h6 id="navUsername"><?php echo $row1['user_id']; ?></h6>
            </div>
            <a
              class="dropdown-toggle d-flex align-items-center hidden-arrow"
              href="#"
              id="navbarDropdownMenuAvatar"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src= <?php echo $row1['user_profile_img']; ?>
                class="rounded-circle"
                height="35"
                alt="Black and White Portrait of a Man"
                loading="lazy"
              />
            </a>

            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuAvatar"
            >
              <li>
                <a class="dropdown-item" href="/View/Expert/expert_profile.php">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="/Config/logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
  
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</html>