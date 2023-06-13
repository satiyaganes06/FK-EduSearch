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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- MDB -->
    <link rel="stylesheet" href="/Bootstrap/mdb.min.css" />

    <!--CSS-->
    <link
      rel="stylesheet"
      href="../GeneralUserLogin/userLogin.css"
    />
    <!-- Icon -->
    <link rel="shortcut icon" type="image/jpg" href="../../../../Asset/icon_logo.png" />
  </head>
  <body>
    <div class="container-fluid p-0">
      <div
        class="d-flex justify-content-space bg-light w-100 h-100 mw-100 mh-100 overflow-hidden"
      >
        <div class="content">
          <div class="logo text-center">
            <img src="../../../../Asset/Logo Login.png" alt="Logo" />
          </div>
          <div class="loginform mt-5">
            <div class="title text-center text-dark">
              <h2><b>Login</b></h2>
            </div>
            <form class="inputfields" id="LoginForm" action="../../../../Model/Authentication/userAuthentication.php" method="post">
              <div class="dropdown">
                <select
                  class="form-select w-50"
                  aria-label="Default select example"
                  id="roleSelect"
                  name="roleSelect"
                >
                  <option selected disabled>Roles</option>
                  <option value="User">User</option>
                  <option value="Staff">Staff</option>
                  <option value="Expert">Expert</option>
                </select>
                <div id="selectError" class="error"></div>
              </div>

              <div class="w-50 mt-3">
                <label class="form-label text-dark" for="userID"
                  ><b>User ID</b></label
                >
                <input
                  type="text"
                  id="userID"
                  name="userID"
                  class="form-control"
                />
                <div id="userIDError" class="error"></div>
              </div>

              <div class="w-50 mt-3">
                <label class="form-label text-dark" for="password"
                  ><b>Password</b></label
                >
                <input type="password" id="password" name="password" class="form-control" />
                <div id="passwordError" class="error"></div>
                <div class="forgotpasswordtxt">
                  <button
                    type="button"
                    class="btn btn-tertiary"
                    data-mdb-ripple-color="light"
                    data-bs-toggle="modal" 
                    data-bs-target="#staticBackdrop"
                  >
                    Forgot Password ?
                  </button>
                </div>
              </div>

              <div class="text-center pt-4 pb-3 loginbtn">
                <button type="submit" class="btn btn-primary" id="submitButton">
                  <b>Login</b>
                </button>
              </div>

              <div class="signuptxt">
                <p>
                  Don't have an account?<a href="userSignUpInterface.php"
                    >Sign Up Here</a
                  >
                </p>
              </div>
            </form>
          </div>
        </div>
        <div class="w-50 backgroundImg">
          <img
            src="../../../../Asset/userLoginbackground.jpg"
            alt="user login background"
            style="width: 820px; height: 688px; object-fit: fill"
          />
        </div>
      
        
      </div>

      <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div
          class="text-center text-white p-3"
          style="background-color: rgba(45, 89, 172, 1)"
        >
        © 2019  2023. FK-EDU SEARCH
          
          
        </div>
        <!-- Copyright -->
      </footer>
    

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../../../../Api/PHPMailer/sendOTP.php" method="POST">
      <div class="modal-body">
      
          <div class="form-outline">
            <input type="text" id="fpuserid" name="fpuserid" class="form-control" />
            <label class="form-label" for="fpuserid">User ID</label>
          </div>
          <div class="form-outline mt-3">
            <input type="text" id="fpemail" name="fpemail" class="form-control" />
            <label class="form-label" for="fpemail">Email</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
       
        
     ` </div>
    `</form>
      </div>
    </div>
  </div>
</div>
<form action="../../../../Model/Authentication/userChangePassword.php" method="POST" onsubmit="return validateForm()">
<div class="modal fade" id="otpModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">OTP Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                </div>
                <div class="modal-body text-center">
                    <!-- OTP input field -->
                    <span class="badge badge-success rounded-pill d-inline align-center">OTP Code Has Been Sent To Your Email!</span>

                    <div class="form-outline mt-3">
                       
                        <input type="text" class="form-control" id="otp" name="otp" required>
                        <label class="form-label" for="otp">OTP</label>
                    </div>
                    <div class="form-outline mt-3">
                        <input type="password" id="newPassword" name="newPassword" class="form-control" />
                        <label class="form-label" for="newPassword">New Password</label>
                     </div>
                     <div class="form-outline mt-3">
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" />
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                     </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- MDB -->
    <script type="text/javascript" src="../../../../Bootstrap/mdb.min.js"></script>
    <!--Bootstrap 4 & 5 & jQuery Script-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--Form Validation-->
    <script>
      const form = document.querySelector("#LoginForm");

      // Get the form inputs
      const roleSelect = form.querySelector("#roleSelect");
      const userID = form.querySelector("#userID");
      const username = form.querySelector("#username");
      const password = form.querySelector("#password");
      const select = form.querySelector("#selectError");
      const userIDError = form.querySelector("#userIDError");
      const passwordError = form.querySelector("#passwordError");
      const submitButton = form.querySelector("#submitButton");

      // Add an event listener to the form submission
      form.addEventListener("submit", function (event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Clear previous error messages
        select.textContent = "";
        userIDError.textContent = "";
        passwordError.textContent = "";

        // Validate the role select
        if (roleSelect.value === "Roles") {
          select.textContent = "Please select a role.";
          return;
        }

        // Validate the user ID
        if (userID.value.trim() === "") {
          userIDError.textContent = "Please enter a user ID.";
          return;
        }

        // Validate the password
        if (password.value.trim() === "") {
          passwordError.textContent = "Please enter a password.";
          return;
        }

        // If all validations pass, submit the form
        form.submit();
      });


      $(document).ready(function() {
    // Check if the OTP modal should be shown
    var urlParams = new URLSearchParams(window.location.search);
    var showOTPModal = urlParams.get('showOTPModal');

    if (showOTPModal === 'true') {
        // Open the OTP verification modal
        $('#otpModal').modal('show');
    }
});

function validateForm() {
        var newPassword = document.getElementById("newPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        // Check if the passwords match
        if (newPassword !== confirmPassword) {
            alert("Passwords do not match!");
            return false; // Prevent form submission
        }

        // Passwords match, allow form submission
        return true;
    }

    </script>
  </body>
</html>
