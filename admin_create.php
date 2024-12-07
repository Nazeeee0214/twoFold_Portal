<?php

$mpg = 'Admin Management';
$spg = 'am';
$tit = 'Admin Management';



include 'partials/_header.php' ?>


<title> <?php echo $tit; ?> </title>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar Include -->
            <?php include 'partials/_sidebar.php'; ?>

            <!-- Layout Page -->
            <div class="layout-page">
                <!-- Navbar Include -->
                <?php include 'partials/_navbar.php'; ?>

                <!-- Content Wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin Management /</span> Create Admin</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                        <li class="nav-item">
                                            <a class="nav-link " href="admin_manage.php"><i class="bx bx-user me-1"></i> Manage Accounts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-bell me-1"></i> Create Admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <form>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="user_id">Admin ID</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="user_id"
                                                name="user_id"
                                                placeholder="Admin ID" />
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
                                                <option selected>Select suffix</option>
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
                                                placeholder="  Full Name"
                                                readonly />
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
                                <input type="hidden" id="restriction" name="restriction" value="ADMIN">
                                <button class="btn btn-primary d-grid w-100" id="reg_adm">Create Admin</button>

                                <div class="row justify-content-end">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer JS Include -->
    <?php include 'partials/_footerjs.php'; ?>
    <script>
        $(document).ready(function() {
            // Update fullname field when any of the input fields change
            $('#fname, #mname, #lname, #suffix').on('input', function() {
                var fname = $('#fname').val();
                var mname = $('#mname').val();
                var lname = $('#lname').val();
                var suffix = $('#suffix').val();

                // Create the full name by concatenating the values
                var fullname = fname + (mname ? ' ' + mname : '') + ' ' + lname + (suffix && suffix !== 'Select suffix' ? ' ' + suffix : '');

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

                var user_id = $('#user_id').val();
                var email = $('#email').val();
                var fname = $('#fname').val();
                var mname = $('#mname').val();
                var lname = $('#lname').val();
                var suffix = $('#suffix').val();
                var fullname = $('#fullname').val();
                var restriction = $('#restriction').val();
                var password = $('#password').val();

                // Form validation
                if (!user_id || !email || !fname || !lname || !password) {
                    alert("Please fill all required fields.");
                    return;
                }

                // Send data via POST
                $.post("server/register_admin.inc.php", {
                    user_id: user_id,
                    email: email,
                    fname: fname,
                    mname: mname,
                    lname: lname,
                    suffix: suffix,
                    restriction: restriction,
                    fullname: fullname,
                    password: password,
                }, function(response) {
                    alert(response);
                    if (response === "Admin created successfuly!") {
                        window.location.href = "admin_create.php";
                    }
                });
            });
        });
    </script>

</body>

</html>