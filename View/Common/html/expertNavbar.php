<?php
  $route = $_SESSION["route"];

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
  

        <!-- Profile Avatar -->
        <div class="dropdown d-flex profile_section">

          <div class="mr-3 profile_name_Section">
            <h6 id="navName"><strong>Satiya Ganes</strong></h6>
            <h6 id="navUsername">@satiyaganes06</h6>
          </div>

          <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="/View/Expert/expert_profile.php"
            role="button"
            aria-expanded="false"
          >
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
              class="rounded-circle shadow"
              height="40"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
          </a>

          
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</html>