<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>SignUp</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/b-logo3.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <h4 class="mb-2">Welcome to Sneat! 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="student_id">Student ID</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                    <input
                      type="text"
                      class="form-control"
                      id="student_id"
                      name="student_id"
                      placeholder="Student number" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">Email</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input
                      type="text"
                      id="email"
                      name="email"
                      class="form-control"
                      placeholder="john.doe"
                      autocomplete="new-email" />
                    <span id=" basic-icon-default-email2" class="input-group-text">@example.com</span>
                  </div>
                  <div class="form-text">You can use letters, numbers & periods</div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="fname">First Name</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                    <input
                      type="text"
                      class="form-control"
                      id="fname"
                      name="fname"
                      placeholder="John" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="mname">Middle Name</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                    <input
                      type="text"
                      class="form-control"
                      id="mname"
                      name="mname"
                      placeholder="Middle name" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="lname">Last Name</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                    <input
                      type="text"
                      class="form-control"
                      id="lname"
                      placeholder="Doe" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="suffix">Suffix</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                    <select class="form-select" id="suffix" name="suffix" aria-label="Default select example">
                      <option selected>Please Select your suffix.</option>
                      <option value="Jr.">Jr.</option>
                      <option value="Sr.">Sr.</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                      <option value="IV">IV</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="fullname">Full Name</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                    <input
                      type="text"
                      class="form-control"
                      id="fullname"
                      placeholder="  Your name"
                      readonly />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="department">Department</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <select class="form-select" id="department" name="department" aria-label="Default select example">
                      <option selected>Please select your Department</option>
                      <option value="1">BSCPE</option>
                      <option value="2">BSECE</option>
                      <option value="3">BSEE</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row mb-3 ">
                <label class="col-sm-2 col-form-label" for="password">Password</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      autocomplete="new-password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
              </div>

              <button class="btn btn-primary d-grid w-100" id="reg">Sign up</button>

              <div class="row justify-content-end">
              </div>
            </form>
            <div class="text-center mt-3">
              <a href="auth-login-basic.php" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Back to login
              </a>
            </div>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->


  <!-- Core JS -->
  <?php include("partials/_footerjs.php");
  ?>
  <!-- Page JS -->

  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script>
    $(document).ready(function() {
      // Update fullname field when any of the input fields change
      $('#fname, #mname, #lname, #suffix').on('input', function() {
        var fname = $('#fname').val();
        var mname = $('#mname').val();
        var lname = $('#lname').val();
        var suffix = $('#suffix').val();

        // Create the full name by concatenating the values
        var fullname = fname + (mname ? ' ' + mname : '') + ' ' + lname + (suffix && suffix !== 'Please Select your suffix.' ? ' ' + suffix : '');

        // Set the value to the readonly fullname field
        $('#fullname').val(fullname);
      });

      // Password visibility toggle
      $(".input-group-text.cursor-pointer").click(function() {
        var passwordField = $("#password");
        var type = passwordField.attr("type") === "password" ? "text" : "password";
        passwordField.attr("type", type);
        $(this).find("i").toggleClass("bx-hide bx-show");
      });

      // Handle form submission
      $("form").on('submit', function(event) {
        event.preventDefault();

        var student_id = $('#student_id').val();
        var email = $('#email').val();
        var fname = $('#fname').val();
        var mname = $('#mname').val();
        var lname = $('#lname').val();
        var suffix = $('#suffix').val();
        var fullname = $('#fullname').val();
        var department = $('#department').val();
        var password = $('#password').val();

        // Form validation
        if (!student_id || !email || !fname || !lname || !password) {
          alert("Please fill all required fields.");
          return;
        }

        // Send data via POST
        $.post("server/register.inc.php", {
          student_id: student_id,
          email: email,
          fname: fname,
          mname: mname,
          lname: lname,
          suffix: suffix,
          fullname: fullname,
          department: department,
          password: password,
        }, function(response) {
          alert(response);
          if (response === "Registration successful!") {
            window.location.href = "auth-login-basic.php";
          }
        });
      });
    });
  </script>

  <!-- Place this tag in your head or just before your close body tag. -->
</body>

</html>