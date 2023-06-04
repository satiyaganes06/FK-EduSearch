<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
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
    <link rel="stylesheet" href="css/posting.css">
    <link rel="stylesheet" href="../Common//css/navbar.css">
    <link rel="stylesheet" href="../Common//css/footer.css">
    
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />          

</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/userNavBar.html');
    $researchArea = $_GET["researchArea"];
  ?>

  <section>
    <script> var valueResearch = '<?php echo $researchArea; ?>';</script>
    <table class="titleTable">
        <tr>
            <td><p class="title">
                    <?php 
                        echo $researchArea;
                    ?>
                </p></td>
            <td>
              
                <select class="form-select" aria-label="questionForm" id="categoriesDropdown">
                <!--<option disabled selected>Select your categories</option>
                    <option value=""></option>-->
                </select>
            </td>
        </tr>
    </table>
  
  <div class="container pt-3 pb-2"> 
      <h4 id="output">hai</h4>
      <p>Please fill out the following form with 
        <br>your complaint. We will review your report
        <br>and follow up as soon as possible</p>
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