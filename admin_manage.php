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
                                            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Manage Accounts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="admin_create.php"><i class="bx bx-bell me-1"></i> Create Admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card ps-5 pe-5 pt-5">
                                <h3>User Management</h3>
                                <div class="table-responsive text-nowrap">
                                    <table id="admin_management_table" class="table">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Full Name</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be dynamically loaded -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
            const table = $('#admin_management_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "server/fetch_admin.inc.php",
                    "type": "GET",
                    "dataSrc": function(json) {
                        console.log(json); // Log the entire response to the console
                        return json.data; // Return the 'data' part of the JSON response
                    }
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
                            <li><a class="dropdown-item" href="javascript:void(0);" data-value="LOCKED">LOCKED</a></li>
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
            $('#admin_management_table').on('click', '.dropdown-item', function() {
                const statusInput = $(this).closest('.input-group').find('.status-input');
                const newStatus = $(this).data('value');
                statusInput.val(newStatus); // Update the input field with the selected value
            });

            // Save status change
            $('#admin_management_table').on('click', '.save-btn', function() {
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
            $('#admin_management_table').on('click', '.delete-btn', function() {
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