<?php
$mpg = 'Profile';
$spg = 'pfp';
$tit = 'profile';
?>

<?php include 'partials/_header.php'; ?>

<title><?php echo $tit; ?></title>

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
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile Settings /</span> Profile</h4>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Details</h5>
                                    <!-- Account -->

                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <!-- Profile Image Section -->
                                                <div class="d-flex align-items-start align-items-sm-center gap-4 mb-2">
                                                    <img
                                                        src="server/<?php echo isset($_SESSION['user']['photo']) ? $_SESSION['user']['photo'] : '/assets/img/avatars/1.png'; ?>"
                                                        alt="user-avatar"
                                                        class="d-block rounded"
                                                        height="100"
                                                        width="100"
                                                        id="uploadedAvatar" />
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                            <span class="d-none d-sm-block">Upload new photo</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input
                                                                type="file"
                                                                id="upload"
                                                                name="photo"
                                                                class="account-file-input"
                                                                hidden
                                                                accept="image/png, image/jpeg" />
                                                        </label>
                                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Reset</span>
                                                        </button>
                                                        <p class="text-muted mb-0">Allowed JPG, GIF, or PNG. Max size of 800K</p>
                                                    </div>
                                                </div>
                                                <hr class="my-0" />

                                                <!-- Profile Details -->
                                                <div class="mt-3">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-3">
                                                            <label for="firstName" class="form-label">First Name</label>
                                                            <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $_SESSION['user']['fname']; ?>" />
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="middleName" class="form-label">Middle Name</label>
                                                            <input class="form-control" type="text" id="middleName" name="middleName" value="<?php echo $_SESSION['user']['mname']; ?>" />
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label for="lastName" class="form-label">Last Name</label>
                                                            <input class="form-control" type="text" id="lastName" name="lastName" value="<?php echo $_SESSION['user']['lname']; ?>" />
                                                        </div>
                                                        <div class="mb-3 col-md-3 mt-1">
                                                            <label for="suffix" class="form-label">Suffix</label>
                                                            <select class="form-select" id="suffix" name="suffix">
                                                                <option selected><?php echo $_SESSION['user']['suffix']; ?></option>
                                                                <option value="Jr.">Jr.</option>
                                                                <option value="Sr.">Sr.</option>
                                                                <option value="II">II</option>
                                                                <option value="III">III</option>
                                                                <option value="IV">IV</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6 mt-1">
                                                    <label for="department" class="form-label">Department</label>
                                                    <select id="department" name="department" class="select2 form-select">
                                                        <option value=""><?php echo $_SESSION['user']['department']; ?></option>
                                                        <option value="BSCPE">BSCPE</option>
                                                        <option value="BSEE">BSEE</option>
                                                        <option value="BSECE">BSECE</option>
                                                        <option value="BSCE">BSCE</option>
                                                        <option value="BSME">BSME</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" id="saveChanges" class="btn btn-primary me-2">Save changes</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                                </div>
                                            </div>

                                            <!-- Invisible input for Full Name -->
                                            <input type="hidden" id="fullName" name="fullName" />
                                        </form>

                                        <!-- Feedback Message -->
                                        <div id="feedbackMessage" style="display: none;" class="alert"></div>

                                    </div>
                                    <!-- /Account -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer JS Include -->
                <?php include 'partials/_footerjs.php'; ?>

                <script>
                    document.getElementById('formAccountSettings').addEventListener('submit', function(e) {
                        e.preventDefault(); // Prevent default form submission

                        // Get values from the input fields
                        const firstName = document.getElementById('firstName').value;
                        const middleName = document.getElementById('middleName').value;
                        const lastName = document.getElementById('lastName').value;
                        const suffix = document.getElementById('suffix').value;

                        // Construct the full name
                        const fullName = firstName + (middleName ? ' ' + middleName : '') + ' ' + lastName +
                            (suffix && suffix !== 'Please Select your suffix.' ? ' ' + suffix : '');

                        // Set the full name value in the hidden input field
                        document.getElementById('fullName').value = fullName;

                        // Create a FormData object from the form
                        const formData = new FormData(this);

                        const feedbackMessage = document.getElementById('feedbackMessage');

                        fetch('server/update_profile.inc.php', {
                                method: 'POST',
                                body: formData,
                            })
                            .then(response => response.json())
                            .then(data => {
                                feedbackMessage.style.display = 'block';
                                feedbackMessage.classList.remove('alert-success', 'alert-danger');

                                if (data.status === 'success') {
                                    feedbackMessage.textContent = 'Profile updated successfully!';
                                    feedbackMessage.classList.add('alert-success');
                                } else {
                                    feedbackMessage.textContent = `Error: ${data.message}`;
                                    feedbackMessage.classList.add('alert-danger');
                                }

                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                });
                            })
                            .catch(error => {
                                feedbackMessage.style.display = 'block';
                                feedbackMessage.textContent = 'An unexpected error occurred. Please try again.';
                                feedbackMessage.classList.add('alert-danger');
                            });
                    });
                </script>

            </div>
        </div>
    </div>
</body>