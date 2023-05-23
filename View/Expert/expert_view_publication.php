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
    <link rel="stylesheet" href="css/expert_view_publication.css">

    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../Asset/icon_logo.png" />

</head>
<body>
  
  <!-- Navbar -->
  <?php
    include_once('../Common/html/navbar.html');
  ?>
   

  <section class="flexSection">
    <div class="mainSection mb-3 mt-3">
        <div id="publicationDetails_Component">
          
          <div class="content_details">
            <!-- Image -->
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
              class="rounded-circle shadow mb-3"
              height="150"
              width="150"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />

            <div class=" w-100">

              <div class="d-flex justify-content-between mt-4  mb-3">
                <h2 id="titlePage"><strong>View Publication</strong></h2>
                
                <div class="d-flex align-items-center">
                  <i class="far fa-eye text-muted mr-1 fs-6"></i>
                  <p id="impression_text">1.6K</p>
                </div>

              </div>
              
              <table class="table align-middle">
                <tbody>
                  <tr>
                    <th scope="row"><strong>Authors :</strong></th>
                    <td>Jamal N Al-Karaki, Ahmed E Kamal</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Publication : date </strong></th>
                    <td>2004/12/20</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Journal :</strong></th>
                    <td>IEEE wireless communications</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Volume :</strong></th>
                    <td>11</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Issue :</strong></th>
                    <td>6</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Pages :</strong></th>
                    <td>6-28</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Publisher :</strong></th>
                    <td>IEEE</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Description :</strong></th>
                    <td id='pubDesc'>Wireless sensor networks consist of small nodes with sensing, computation, and wireless communications capabilities. Many routing, power management, and data dissemination protocols have been specifically designed for WSNs where energy awareness is an essential design issue. Routing protocols in WSNs might differ depending on the application and network architecture. In this article we present a survey of state-of-the-art routing techniques in WSNs. We first outline the design challenges for routing protocols in WSNs followed by a comprehensive survey of routing techniques. Overall, the routing techniques are classified into three categories based on the underlying network structure: flit, hierarchical, and location-based routing. Furthermore, these protocols can be classified into multipath-based, query-based, negotiation-based, QoS-based, and coherent-based depending on the protocol operation. We …</td>
                  </tr>

                  <tr>
                    <th scope="row"><strong>Scholar : article</strong></th>
                    <td>JN Al-Karaki, AE Kamal - IEEE wireless communications, 2004</td>
                  </tr>
                </tbody>
              </table>
              
            </div>
           
          </div>
          <button class="button_View btn-dark btn btn-block text-white"  data-mdb-ripple-color="dark"><strong>View</strong></button>

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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>