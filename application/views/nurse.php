    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>User List </title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/dataTables.bootstrap4.min.css"> 

        <!-- OUR CUSTOM CSS-->
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/dashboard.css">
        
        <!-- JS CDN  -->
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>
        

        <script> var base_url = '<?= BASE_URL ?>'; </script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/main.js"></script>

    </head>

    <body>
    <div class="navbar-title" ><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'nurse';
            //include 'bars/sidebar.php';
            ?>
            <nav id="sidebar" class="printccs">
                <div class="adminsidebar">
                    <div class="p-0 container-fluid d-flex flex-column">
                        <a href="dashboard.php">
                            <div class="sidebar-header">
                                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="logo-sidebar">
                            </div>
                        </a>
                        <div class="sidebar_nav" id="collapsibleNavbar">
                            <ul class="list-unstyled components">
                                <li class="<?php if ($page == 'dashboard') { echo 'active';} ?>">
                                    <a href="<?= BASE_URL ?>main_controller">
                                        Dashboard
                                    </a>
                                </li>

                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'patient') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>patient">
                                        Patient
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'nurse') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>nurse">
                                        Nurse
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife" || $_SESSION['user_type'] == "Health worker"): ?>
                                <li class="<?php if ($page == 'appointment') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>appointment">
                                        Appointment
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'queue') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>queue_list">
                                        Patient Queue
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'consult') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>consultation">
                                        Consultation
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'child-report') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>child_report">
                                        Child Record
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'medicine') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>medicine">
                                        Medicine and supplements
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'reports') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>reports">
                                        Reports
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Admin"): ?>
                                <li class="<?php if ($page == 'settings') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>settings">
                                        Settings
                                    </a>
                                </li>
                                <?php endif ?>


                                <?php if($_SESSION['user_type'] == "Health worker"): ?>
                                <li class="<?php if ($page == 'activity') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>worker_activity">
                                        Activity
                                    </a>
                                </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="d-flex flex-column" id="content-wrapper">
                <!--CONTENT-->
                <div class="content">

                    <!--TOP NAVBAR/ HEADER-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
                        <button type="button" id="sidebarCollapse" class="btn menu-btn">
                            <i class="fa fa-align-justify"> </i>
                        </button>
                        <h5 class="navbar-header-text">Nurse List </h5>
                        <?php // include 'bars/top_navbar.php'; ?>
                        <li class="ml-auto nav-item dropdown printccs">
                            <div class="nav-item dropdown ">
                                <a class="nav-link " data-toggle="dropdown" aria-expanded="false" href="#">
                                <b>ROLE:</b>
                                    <span class="mr-2 d-none d-lg-inline ">
                                        <?php 
                                           echo $_SESSION['user_type']
                                        ?>
                                    </span>
                                    <ion-icon name="caret-down-outline"></ion-icon>

                                </a>

                                <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in">
                                    <form action="<?= BASE_URL ?>logout" method="POST">
                                        <button class="border-0 dropdown-item" name="logout" type="submit">
                                            <ion-icon name="log-out-outline"></ion-icon> Logout
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </li>
                    </nav>

                    <!--MAIN CONTENT-->
                    <div class="container-fluid-settings">
                        <div class="shadow card">
                            <div class="py-3 card-header">
                                <p class="m-0 text-primary font-weight-normal">Nurse List </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Nurse ID </th>
                                                <th class="align-middle">Nurse Name </th>
                                                <th class="align-middle">User Type</th>
                                                <th class="align-middle">Mobile Number </th>
                                                <th class="align-middle">Account Status</th>
                                                <th class="align-middle">Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($nurse_data AS $row) : ?>
                                                <tr>
                                                    <td><?php if (($row['empid']) <= 9) {
                                                            // echo 'PTNT-0', $fetch['id'];
                                                            echo 'MHC-000', $row['empid'];
                                                        } elseif (($row['empid']) <= 99) {
                                                            echo 'MHC-00', $row['empid'];
                                                        } elseif (($row['empid']) <= 999) {
                                                            echo 'MHC-0', $row['empid'];
                                                        } else {
                                                            echo 'MHC-', $row['empid'];
                                                        }  ?></td>
                                                    <td><?= $row['user_fname'], ' ', $row['user_lname'] ?></td>
                                                    <td><?= $row['user_type'] ?></td>
                                                    <td><?= $row['contact_no'] ?></td>
                                                    <td>
                                                        <button 
                                                            class="btn btn-sm action-btn btn-no-border <?php if ($row['user_status'] == 'Active') {
                                                                                                                    echo "btn-outline-primary";
                                                                                                                } elseif ($row['user_status'] == 'Inactive') {
                                                                                                                    echo "btn-outline-danger";
                                                                                                                }  ?>"
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#status<?= $row['empid'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Change Account Status">

                                                            <?= $row['user_status'] ?></button>
                                                    </td>
                                                    <td>
                                                        <a 
                                                            role="button" 
                                                            class="btn btn-info text-light btn-sm" 
                                                            data-toggle="modal" 
                                                            href="#view-user<?= $row['empid']; ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="View Information"
                                                        >
                                                            <i class="fa fa-info"></i>
                                                            <span class="mobile-icon-only">View</span>
                                                        </a>

                                                        <button 
                                                            class="btn btn-orange text-light btn-sm update" 
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#update_modal<?= $row['empid'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Update Information"
                                                        >
                                                            <i class="fa fa-pencil"></i>
                                                            <span class="mobile-icon-only">Update</span>
                                                        </button>
                                                        <button 
                                                            class="btn btn-primary text-light btn-sm update" 
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#update_username<?= $row['empid'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Change Username"
                                                        >
                                                            <i class="fa fa-user"></i>
                                                            <span class="mobile-icon-only">Username</span>
                                                        </button>
                                                        <button 
                                                            class="btn btn-dark text-light btn-sm update" 
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#update_user_security<?= $row['empid'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Change Password"
                                                        >
                                                            <i class='fa fa-lock'></i>
                                                            <span class="mobile-icon-only">Password</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                // include '../includes/modal/update_emp_status.php';
                                                // include '../includes/modal/update_user.php';
                                                // include '../includes/modal/update_user_security.php';
                                                // include '../includes/modal/view_info_of_user.php';
                                                // include '../includes/modal/update_username.php';
                                                ?>
                                                <!-- Note hindi pwede tong ilipat sa ibang folder. Dapat nandito or sa pinakang file talaga to, kasi kapag nilipat hindi gagana ang select breed -->
                                                <script>
                                                    // function getcitymodal<?= $row['empid']; ?>(val) {
                                                    //     $.ajax({
                                                    //         type: "POST",
                                                    //         url: "get_citymunicipality.php",
                                                    //         data: 'prov_id=' + val,
                                                    //         success: function(data) {
                                                    //             $("#city-list<?= $row['empid']; ?>").html(data);
                                                    //         }
                                                    //     });
                                                    // }
                                                </script>
                                                    <div class="modal fade" id="status<?= $row['empid'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="status">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class=" modal-content bg-light">
                                                                <form method="POST" onsubmit="event.preventDefault(); update_employee_status(<?= $row['empid'] ?>)">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Update <?php if (($row['empid']) <= 9) {
                                                                                                            echo 'MHC-000', $row['empid'];
                                                                                                        } elseif (($row['empid']) <= 99) {
                                                                                                            echo 'MHC-00', $row['empid'];
                                                                                                        } elseif (($row['empid']) <= 999) {
                                                                                                            echo 'MHC-0', $row['empid'];
                                                                                                        } else {
                                                                                                            echo 'MHC-', $row['empid'];
                                                                                                        }  ?> Status</h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                    </div>
                                                                    <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                        <div class="col">
                                                                            <!-- <div class="form-group"> -->
                                                                            <input name="id" id="id_<?= $row['empid'] ?>" type="hidden" value="<?= htmlspecialchars($row['empid'])  ?>" class="form-control">
                                                                            <input name="fname" id="fname_<?= $row['empid'] ?>" type="hidden" value="<?= htmlspecialchars($row['user_fname'])  ?>" class="form-control">
                                                                            <input name="lname" id="lname_<?= $row['empid'] ?>" type="hidden" value="<?= htmlspecialchars($row['user_lname'])  ?>" class="form-control">
                                                                            <input name="username" id="username_<?= $row['empid'] ?>" type="hidden" value="<?= htmlspecialchars($row['username'])  ?>" class="form-control">
                                                                            <!-- </div> -->
                                                                            <div class="mt-2 form-group">
                                                                                <label for="user_stat"> Employee Status </label>
                                                                                <select class="form-control placeholder" name="user_stat" id="user_stat_<?= $row['empid'] ?>" required="required">
                                                                                    <option value="">Select Employee Status </option>
                                                                                    <option value="Active" <?php if ($row['user_status'] == 'Active') {
                                                                                                                echo "selected";
                                                                                                            } ?>>Active </option>

                                                                                    <option value="Inactive" <?php if ($row['user_status'] == 'Inactive') {
                                                                                                                    echo "selected";
                                                                                                                }  ?>>Inactive</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="clear:both;"></div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>
                                                                        <button name="update" class="btn btn-primary"> Update</button>
                                                                    </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="update_user_security<?= $row['empid'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="update_user_security">
                                                        <?php if ($row['user_status'] == 'Active') { ?>
                                                            <div class="modal-dialog modal-dialog-centered ">
                                                                <div class=" modal-content bg-light">
                                                                    <form method="POST" onsubmit="event.preventDefault(); update_user_security(<?= $row['empid'] ?>)">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Change <?php if (($row['empid']) <= 9) {
                                                                                                                // echo 'PTNT-0', $fetch['id'];
                                                                                                                echo 'MHC-000', $row['empid'];
                                                                                                            } elseif (($row['empid']) <= 99) {
                                                                                                                echo 'MHC-00', $row['empid'];
                                                                                                            } elseif (($row['empid']) <= 999) {
                                                                                                                echo 'MHC-0', $row['empid'];
                                                                                                            } else {
                                                                                                                echo 'MHC-', $row['empid'];
                                                                                                            }  ?> Password
                                                                            </h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                        </div>
                                                                        <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                            <!-- EMPLOYEE/USER ID -->
                                                                            <input class="form-control" type="hidden" name="empid" id="sec_empid_<?= $row['empid'] ?>" value="<?= $row['empid']; ?>" required="required">
                                                                            <input class="form-control" type="hidden" name="fname" id="sec_fname_<?= $row['empid'] ?>" value="<?= $row['user_fname']; ?>" required="required">
                                                                            <input class="form-control" type="hidden" name="lname" id="sec_lname_<?= $row['empid'] ?>" value="<?= $row['user_lname']; ?>" required="required">
                                                                            <div class="mt-2 row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="user_newpass">
                                                                                            <span> New Password</span>
                                                                                            <span class="text-danger"> * </span>
                                                                                        </label>
                                                                                        <div class="input-group" id="show_hide_password">
                                                                                            <input class="form-control" type="password" minlength="8" placeholder="Enter New Password" name="user_newpass" id="sec_user_newpass_<?= $row['empid'] ?>" required="required">
                                                                                            <div class="input-group-prepend input-group-addon">
                                                                                                <div class="input-group-text">
                                                                                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <small class="text-danger">
                                                                                            <p id="newpass_error"></p>
                                                                                        </small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2 row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="user_confirmpass">
                                                                                            <span> Confirm Password</span>
                                                                                            <span class="text-danger"> * </span>
                                                                                        </label>
                                                                                        <div class="input-group" id="show_hide_password2">
                                                                                            <input class="form-control" type="password" placeholder="Repeat Password" name="user_confirmpass" id="sec_user_confirmpass_<?= $row['empid'] ?>" required="required">
                                                                                            <div class="input-group-prepend input-group-addon">
                                                                                                <div class="input-group-text">
                                                                                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>

                                                                            <button name="update" class="btn btn-primary"> Update</button>
                                                                        </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class=" modal-content bg-light">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                    </div>
                                                                    <div class="mt-3 mb-3 ml-5 mr-5 modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <i class="float-left fa fa-exclamation-circle text-info" style="font-size:50px"> </i>

                                                                                <p class="mt-3 text-center h6 text-dark"> You cannot change the password for the inactive user</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="clear:both;"></div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }  ?>
                                                    </div>

                                                    <div class="modal fade" id="view-user<?= $row['empid']; ?>" tabindex="-1" aria-labelledby="view-user" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"> <?php if (($row['empid']) <= 9) {
                                                                                                    echo 'MHC-000', $row['empid'];
                                                                                                } elseif (($row['empid']) <= 99) {
                                                                                                    echo 'MHC-00', $row['empid'];
                                                                                                } elseif (($row['empid']) <= 999) {
                                                                                                    echo 'MHC-0', $row['empid'];
                                                                                                } else {
                                                                                                    echo 'MHC-', $row['empid'];
                                                                                                }  ?> </h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <div class="mt-3 mb-3 ml-5 mr-5 modal-body">
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary"> System User ID</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?php if (($row['empid']) <= 9) {
                                                                                    // echo 'PTNT-0', $fetch['id'];
                                                                                    echo 'MHC-000', $row['empid'];
                                                                                } elseif (($row['empid']) <= 99) {
                                                                                    echo 'MHC-00', $row['empid'];
                                                                                } elseif (($row['empid']) <= 999) {
                                                                                    echo 'MHC-0', $row['empid'];
                                                                                } else {
                                                                                    echo 'MHC-', $row['empid'];
                                                                                }  ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary">Name</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?= htmlspecialchars($row['user_fname']), ' ',  htmlspecialchars($row['user_mname']), ' ', htmlspecialchars($row['user_lname']) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary"> Gender</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?= htmlspecialchars($row['gender']) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary">Date of Birth</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?php
                                                                                $source = $row['bday'];
                                                                                $date = new DateTime($source);
                                                                                echo $date->format('F d\, Y');

                                                                                ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary">Age</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?php
                                                                                $dateofbirth = $row['bday'];
                                                                                $today = date("Y-m-d");
                                                                                $diff = date_diff(date_create($dateofbirth), date_create($today));
                                                                                echo  $diff->format('%y');

                                                                                $age = $diff->format('%y');
                                                                                if ($age > 1) {
                                                                                    echo ' years old';
                                                                                } else {
                                                                                    echo ' year old';
                                                                                }
                                                                                ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary"> Address</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?= $row['citymunicipality_name'], ', ', $row['province_name'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary"> Mobile Number</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?= htmlspecialchars($row['contact_no']) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary"> User Type</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?= htmlspecialchars($row['user_type']) ?>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary"> Created Date</div>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <?php
                                                                                $source = htmlspecialchars($row['created_date']);
                                                                                $date = new DateTime($source);
                                                                                echo $date->format('m-d-Y h:i:s a'); // 31-07-2012
                                                                                ?>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="mb-2 row ">
                                                                        <div class="col-5">
                                                                            <div class="mb-2 text-right text-secondary"> User Status</div>
                                                                        </div>
                                                                        <div class="col-7 <?php if ($row['user_status'] == 'Active') {
                                                                                                    echo "text-primary";
                                                                                                } elseif ($row['user_status'] == 'Inactive') {
                                                                                                    echo "text-danger";
                                                                                                } ?>">
                                                                            <?= htmlspecialchars($row['user_status']) ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="update_username<?= $row['empid'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="update_username">
                                                        <?php if ($row['user_status'] == 'Active') { ?>
                                                            <div class="modal-dialog modal-dialog-centered ">
                                                                <div class=" modal-content bg-light">
                                                                    <form method="POST" onsubmit="event.preventDefault(); update_user_username(<?= $row['empid'] ?>)">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Change <?php if (($row['empid']) <= 9) {
                                                                                                                // echo 'PTNT-0', $fetch['id'];
                                                                                                                echo 'MHC-000', $row['empid'];
                                                                                                            } elseif (($row['empid']) <= 99) {
                                                                                                                echo 'MHC-00', $row['empid'];
                                                                                                            } elseif (($row['empid']) <= 999) {
                                                                                                                echo 'MHC-0', $row['empid'];
                                                                                                            } else {
                                                                                                                echo 'MHC-', $row['empid'];
                                                                                                            }  ?> Username
                                                                            </h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                        </div>
                                                                        <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                            <!-- EMPLOYEE/USER ID -->
                                                                            <input class="form-control" type="hidden" id="un_employeeid_<?= $row['empid'] ?>" name="employeeid" value="<?= $row['empid']; ?>" required="required">
                                                                            <input class="form-control" type="hidden" id="un_fname_<?= $row['empid'] ?>" name="fname" value="<?= $row['user_fname']; ?>" required="required">
                                                                            <input class="form-control" type="hidden" id="un_lname_<?= $row['empid'] ?>" name="lname" value="<?= $row['user_lname']; ?>" required="required">
                                                                            <div class="mt-2 row">
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="username">
                                                                                            <span> Username</span>
                                                                                            <span class="text-danger"> * </span>
                                                                                        </label>

                                                                                        <input class="form-control" type="text" placeholder="Enter New Username" id="un_username_<?= $row['empid'] ?>" name="username" required="required">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2 row">
                                                                                <div class="col-12">

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>
                                                                            <button name="update" class="btn btn-primary"> Update</button>
                                                                        </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class=" modal-content bg-light">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                    </div>
                                                                    <div class="mt-3 mb-3 ml-5 mr-5 modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <i class="float-left fa fa-exclamation-circle text-info" style="font-size:50px"> </i>

                                                                                <p class="mt-3 text-center h6 text-dark"> You cannot change the username for the inactive user</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="clear:both;"></div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }  ?>
                                                    </div>

                                                    

                                                    <div class="modal fade" id="update_modal<?= $row['empid'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="update_modal">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class=" modal-content bg-light">
                                                                <form method="POST" onsubmit="event.preventDefault(); update_user_query(<?= $row['empid'] ?>)">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Update <?php if (($row['empid']) <= 9) {
                                                                                                            // echo 'PTNT-0', $fetch['id'];
                                                                                                            echo 'MHC-000', $row['empid'];
                                                                                                        } elseif (($row['empid']) <= 99) {
                                                                                                            echo 'MHC-00', $row['empid'];
                                                                                                        } elseif (($row['empid']) <= 999) {
                                                                                                            echo 'MHC-0', $row['empid'];
                                                                                                        } else {
                                                                                                            echo 'MHC-', $row['empid'];
                                                                                                        }  ?>
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                    </div>
                                                                    <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <label>First Name <span class="text-danger"> * </span></label>
                                                                                    <input name="userid" id="l_userid_<?= $row['empid'] ?>" type="hidden" value="<?= htmlspecialchars($row['empid'])  ?>" class="form-control">
                                                                                    <input type="text" placeholder="Enter First Name" id="l_fname_<?= $row['empid'] ?>" name="fname" value="<?= htmlspecialchars($row['user_fname']) ?>" class="form-control" required="required">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <label>Middle Name <span class="text-danger"> * </span></label>
                                                                                    <input type="text" placeholder="Enter Middle Name" id="l_mname_<?= $row['empid'] ?>" name="mname" value="<?= htmlspecialchars($row['user_mname']) ?>" class="form-control" required="required">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <label>Last Name <span class="text-danger"> * </span></label>
                                                                                    <input type="text" placeholder="Enter Last Name" id="l_lname_<?= $row['empid'] ?>" name="lname" value="<?= htmlspecialchars($row['user_lname']) ?>" class="form-control" required="required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <label for="gender">Gender <span class="text-danger"> * </span> </label>
                                                                                    <select class="form-control placeholder" id="l_gender_<?= $row['empid'] ?>" name="gender" required="required">
                                                                                        <option value="">Select Gender </option>
                                                                                        <option value="Male" <?php if ($row['gender'] == 'Male') {
                                                                                                                    echo "selected";
                                                                                                                } ?>>Male </option>

                                                                                        <option value="Female" <?php if ($row['gender'] == 'Female') {
                                                                                                                    echo "selected";
                                                                                                                }  ?>>Female</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <label>Birthdate<span class="text-danger"> * </span> </label>
                                                                                    <input type="date" id="l_bday_<?= $row['empid'] ?>" name="bday" value="<?= $row['bday'] ?>" class="form-control" required="required" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-2 row">
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="select_prov">Province<span class="text-danger"> * </span>
                                                                                    </label>

                                                                                    <select class="form-control" id="l_select_prov_<?= $row['empid'] ?>" onChange="get_city_prov_modal(<?= $row['empid'] ?>)" name="select_prov" required="required">

                                                                                        <?php 
                                                                                        if (!empty($row['province'])) { ?>
                                                                                            <option value='<?= $row['province']; ?>'><?= $row['province_name'] ?></option>
                                                                                        <?php } else { ?>
                                                                                            <option value='' disabled selected hidden>Select Province</option>
                                                                                        <?php } ?>

                                                                                        <?php foreach($provinces AS $rez): ?>
                                                                                                <option value="<?= $rez['id'] ?>"><?= $rez['province_name'] ?></option>
                                                                                        <?php endforeach ?>   

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="select_city">City / Municipality<span class="text-danger"> * </span> </label>

                                                                                    <select class="form-control"  name="select_city" id="city-list<?= $row['empid']; ?>" required="required">
                                                                                        <?php

                                                                                        if (!empty($row['city'])) { ?>
                                                                                            <option value='<?= $row['city']; ?>'><?= $row['citymunicipality_name'] ?></option>
                                                                                            <?php
                                                                    
                                                                                        } else { ?>
                                                                                            <option value='' disabled selected hidden>Select City / Municipality</option>
                                                                                        <?php } ?>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <span> Mobile Number <span class="text-danger"> * </span> </span>
                                                                                    <input type="text" placeholder="Enter Mobile Number" id="l_contactno_<?= $row['empid'] ?>" name="contactno" value="<?= $row['contact_no'] ?>" class="form-control" required="required" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <span> E-mail Address <span class="text-danger"> * </span> </span>
                                                                                    <input type="text" placeholder="Enter E-mail Address" id="l_email_<?= $row['empid'] ?>" name="email" value="<?= $row['email'] ?>" class="form-control" required="required" />

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <?php $usertype = $row['user_type'] ?>
                                                                                    <label for="user_type">User Type <span class="text-danger"> * </span> </label>
                                                                                    <select class="form-control placeholder" id="l_user_type_<?= $row['empid'] ?>" name="user_type" required="required">
                                                                                        <option value="">Select User Type</option>
                                                                                        <option value="Admin" <?php if (isset($usertype) && $usertype == "Admin") echo "selected" ?>>Admin </option>
                                                                                        <option value="Doctor" <?php if (isset($usertype) && $usertype == "Doctor") echo "selected" ?>>Doctor</option>
                                                                                        <option value="Nurse" <?php if (isset($usertype) && $usertype == "Nurse") echo "selected" ?>>Nurse</option>
                                                                                        <option value="Staff" <?php if (isset($usertype) && $usertype == "Staff") echo "selected" ?>>Staff</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="mt-2 form-group">
                                                                                    <label for="user_stat"> User Status </label>
                                                                                    <select class="form-control placeholder" id="l_user_stat_<?= $row['empid'] ?>" name="user_stat" required="required">
                                                                                        <option value="">Select User Status </option>
                                                                                        <option value="Active" <?php if ($row['user_status'] == 'Active') {
                                                                                                                    echo "selected";
                                                                                                                } ?>>Active </option>

                                                                                        <option value="Inactive" <?php if ($row['user_status'] == 'Inactive') {
                                                                                                                        echo "selected";
                                                                                                                    }  ?>>Inactive</option>

                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="clear:both;"></div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>

                                                                        <button name="update" class="btn btn-primary"> Update</button>
                                                                    </div>
                                                            </div>
                                                            </form>
                                                        </div>


                                                    </div>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php // include '../includes/footer.php'; ?>

            </div>

            <script>
                $('#dataTable').dataTable({
                    // processing: true,
                    // serverSide: true,
                    // ajax: "patient_list.inc.php",
                    lengthMenu: [10, 5, 10, 25, 50, 100],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search User"
                    },
                    //Disable Action sorting (yung arrow up and down)
                    columnDefs: [{
                        'targets': [5],
                        /* column index */
                        'orderable': false,
                        /* true or false */
                    }],
                    order: [
                        [0, "desc"]
                    ],
                });
            </script>

            <script>
                // $(document).ready(function() {
                //     $("#show_hide_password a").on('click', function(event) {
                //         event.preventDefault();
                //         if ($('#show_hide_password input').attr("type") == "text") {
                //             $('#show_hide_password input').attr('type', 'password');
                //             $('#show_hide_password i').addClass("fa-eye-slash");
                //             $('#show_hide_password i').removeClass("fa-eye");
                //         } else if ($('#show_hide_password input').attr("type") == "password") {
                //             $('#show_hide_password input').attr('type', 'text');
                //             $('#show_hide_password i').removeClass("fa-eye-slash");
                //             $('#show_hide_password i').addClass("fa-eye");
                //         }
                //     });
                //     $("#show_hide_password2 a").on('click', function(event) {
                //         event.preventDefault();
                //         if ($('#show_hide_password2 input').attr("type") == "text") {
                //             $('#show_hide_password2 input').attr('type', 'password');
                //             $('#show_hide_password2 i').addClass("fa-eye-slash");
                //             $('#show_hide_password2 i').removeClass("fa-eye");
                //         } else if ($('#show_hide_password2 input').attr("type") == "password") {
                //             $('#show_hide_password2 input').attr('type', 'text');
                //             $('#show_hide_password2 i').removeClass("fa-eye-slash");
                //             $('#show_hide_password2 i').addClass("fa-eye");
                //         }
                //     });
                // });
            </script>
    </body>

    </html>