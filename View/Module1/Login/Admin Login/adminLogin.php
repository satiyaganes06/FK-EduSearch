<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FK-Edu Search</title>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!--Bootstrap Script-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- MDB -->
    <link rel="stylesheet" href="/Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link
      rel="stylesheet"
      href="/View/Module 1/Login/Admin Login/adminlogin.css"
    />
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="/Asset/icon_logo.png" />
  </head>
  <body>
    <div class="container-fluid p-0">
      <div
        class="d-flex justify-content-space bg-light w-100 h-100 mw-100 mh-100 overflow-hidden"
      >
        <div class="content">
          <div class="logo text-center"><img src="/Asset/Logo Login.png" alt="Logo" /></div>
          <div class="loginform mt-5">
            <div class="title text-center text-dark">
              <h2><b>Login</b></h2>
            </div>
            <form class="inputfields" id="LoginForm" action="../../../../Model/Authentication/adminAuthentication.php" method="post">
            
              
          
              <div class="w-50 mt-3">
                <label class="form-label text-dark" for="userID"><b>User ID</b></label>
                <input type="text" id="userID" name="userID" class="form-control" />
                <div id="userIDError" class="error"></div>
              </div>
          
             
          
              <div class="w-50 mt-3">
                <label class="form-label text-dark" for="password"><b>Password</b></label>
                <input type="password" id="password" name="password" class="form-control" />
                <div id="passwordError" class="error"></div>
              </div>
          
              <div class="text-center pt-4 pb-3 loginbtn">
                <button type="submit" class="btn btn-primary" id="submitButton" style="background-color: rgba(44, 88, 100, 1)"><b>Login</b></button>
              </div>

              
            </form>
          </div>
        </div>
        <div class="w-50 backgroundImg">
          <img
            src="/Asset/adminloginbackground.jpg"
            alt="user login background"
            style="width: 820px; height: 688px; object-fit: fill"
          />
        </div>
      </div>
      <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div
          class="text-center text-white p-3"
          style="background-color: rgba(44, 88, 100, 1)"
        >
        © 2019  2023. FK-EDU SEARCH
        </div>
        <!-- Copyright -->
      </footer>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--Form Validation-->
    <script>
      const form = document.querySelector('#LoginForm');

// Get the form inputs

const userID = form.querySelector('#userID');
const password = form.querySelector('#password');
const userIDError = form.querySelector('#userIDError');
const passwordError = form.querySelector('#passwordError');
const submitButton = form.querySelector('#submitButton');

// Add an event listener to the form submission
form.addEventListener('submit', function(event) {
// Prevent the form from submitting
event.preventDefault();

// Clear previous error messages

userIDError.textContent = '';
passwordError.textContent = '';

// Validate the role select


// Validate the user ID
if (userID.value.trim() === '') {
 userIDError.textContent = 'Please enter a user ID.';
 return;
}


// Validate the password
if (password.value.trim() === '') {
 passwordError.textContent = 'Please enter a password.';
 return;
}

// If all validations pass, submit the form
form.submit();
});
 </script>
  </body>
</html>
