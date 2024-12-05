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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin Management /</span> Manage Accounts</h4>

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
                                    <label class="col-sm-2 col-form-label" for="user_id">User ID</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="user_id"
                                                name="user_id"
                                                placeholder="Ex:(Student ID/Employee ID)" />
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
            const table = $('#user_management_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "server/fetch_users.inc.php",
                    "type": "GET"
                },
                "columns": [{
                        "data": "user_id"
                    },
                    {
                        "data": "fullname"
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row) {
                            return `
              <div class="input-group">
                <input
                  type="text"
                  class="form-control status-input"
                  placeholder="Select status"
                  value="${data}"
                  readonly
                  data-id="${row.user_id}"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                />
                <button
                  class="btn btn-outline-secondary dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                ></button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:void(0);" data-value="ACTIVE">ACTIVE</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);" data-value="INACTIVE">INACTIVE</a></li>
                </ul>
              </div>
            `;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `
              <button class="save-btn btn btn-success" data-id="${row.user_id}">Save</button>
              <button class="delete-btn btn btn-danger" data-id="${row.user_id}">Delete</button>
            `;
                        },
                        "orderable": false
                    }
                ]
            });

            // Handle status selection
            $('#user_management_table').on('click', '.dropdown-item', function() {
                const statusInput = $(this).closest('.input-group').find('.status-input');
                const newStatus = $(this).data('value');
                statusInput.val(newStatus); // Update the input field with the selected value
            });

            // Save status change
            $('#user_management_table').on('click', '.save-btn', function() {
                const userId = $(this).data('id');
                const newStatus = $(`.status-input[data-id="${userId}"]`).val();

                $.post('server/update_user_status.inc.php', {
                    user_id: userId,
                    status: newStatus
                }, function(response) {
                    if (response.success) {
                        alert('Status updated successfully.');
                        table.ajax.reload();
                    } else {
                        alert('Failed to update status.');
                    }
                }, 'json');
            });

            // Delete user
            $('#user_management_table').on('click', '.delete-btn', function() {
                const userId = $(this).data('id');
                if (confirm('Are you sure you want to delete this user?')) {
                    $.post('server/delete_user.inc.php', {
                        user_id: userId
                    }, function(response) {
                        if (response.success) {
                            alert('User deleted successfully.');
                            table.ajax.reload();
                        } else {
                            alert('Failed to delete user.');
                        }
                    }, 'json');
                }
            });
        });
    </script>

</body>

</html>