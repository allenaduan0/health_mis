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

        <!-- JS CDN  -->
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>

        <script> var base_url = '<?= BASE_URL ?>'; </script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/reports.js"></script>
    </head>

    <body>
        <div class="navbar-title"><a href="../dashboard.php">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'settings';
            // include 'bars/sidebar.php';
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
                        <h5 class="navbar-header-text">User List </h5>
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
                    <div class='add_user-class'> 
                                <button 
                                    class="btn btn-primary text-light btn-sm update" 
                                    data-toggle="modal" 
                                    type="button" 
                                    data-target="#add_services" 
                                    data-toggle-title="tooltip" 
                                    data-placement="bottom" 
                                    title="Add Service"
                                >
                                    <i class="fa fa-user"></i>
                                    <span class="mobile-icon-only"></span>
                                    Add Service
                                </button>
                            </div>
                        <div class="shadow card">
                            
                            <div class="py-3 card-header">
                                <p class="m-0 text-primary font-weight-normal">System User List </p>
                            </div>
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Service Name</th>
                                                <!-- <th class="align-middle">Price</th> -->
                                                <th class="align-middle">Status</th>
                                                <th class="align-middle">Action</th>
                                                <!-- <th class="align-middle">Account Status</th>
                                                <th class="align-middle">Action </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($get_services AS $fetch): ?>
                                                <tr>
                                                    <td><?= $fetch['name'] ?></td>
                                                    <!-- <td><?php // $fetch['price']?></td> -->
                                                    <td>
                                                        <button 
                                                            class="btn btn-sm  action-btn btn-no-border  
                                                                <?php if ($fetch['status'] == 'Active') {
                                                                        echo "btn-outline-primary";
                                                                       } elseif ($fetch['status'] == 'Inactive') {
                                                                         echo "btn-outline-danger";
                                                                       }  ?>" 
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#status<?= $fetch['service_id'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Change Account Status"
                                                        >

                                                            <?= $fetch['status'] ?>
                                                    </td>
                                                    <td>
                                                        <button 
                                                            class="btn btn-orange text-light btn-sm update" 
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#update_modal<?= $fetch['service_id'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Update Information"
                                                        >
                                                            <i class="fa fa-pencil">Update</i>
                                                            <span class="mobile-icon-only"></span>
                                                        </button>

                                                        <button 
                                                            class="btn btn-danger text-light btn-sm update" 
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#deleteservice<?= $fetch['service_id'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Delete Service"
                                                        >
                                                            <i class="fa fa-user">Delete</i>
                                                            <span class="mobile-icon-only"></span>
                                                        </button>

                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="update_modal<?= $fetch['service_id'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="update_modal">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class=" modal-content bg-light">
                                                            <form method="POST" onsubmit="event.preventDefault(); add_service()">
                                                                <div class="modal-header">
                                                                    <h5> Update Service</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                    <div class="col">
                                                                        
                                                                        <div class="mt-2 form-group">
                                                                            <label for="mod_ser_name"> Service Name </label>
                                                                            <input class="form-control" id="mod_ser_name" name="mod_ser_name" required="required" placeholder="Enter Service Name"/>
                                                                               
                                                                        </div>

                                                                        <div class="mt-2 form-group">
                                                                            <label for="mod_price">Price </label>
                                                                            <input class="form-control" id="mod_price" name="mod_price" required="required" placeholder="Enter Price"/>
                                                                               
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

                                                <div class="modal fade" id="status<?= $fetch['service_id'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="status">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class=" modal-content bg-light">
                                                            <form method="POST" onsubmit="event.preventDefault(); update_service_status(<?= $fetch['service_id'] ?>)">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Update <?php if (($fetch['service_id']) <= 9) {
                                                                                                        echo 'SRVC-000', $fetch['service_id'];
                                                                                                    } elseif (($fetch['service_id']) <= 99) {
                                                                                                        echo 'SRVC-00', $fetch['service_id'];
                                                                                                    } elseif (($fetch['service_id']) <= 999) {
                                                                                                        echo 'SRVC-0', $fetch['service_id'];
                                                                                                    } else {
                                                                                                        echo 'SRVC-', $fetch['service_id'];
                                                                                                    }  ?> Status</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                    <div class="col">
                                                                        <!-- <div class="form-group"> -->
                                                                        <input id="srv_user_id_<?= $fetch['service_id'] ?>" name="srv_user_id_" type="hidden" value="<?= htmlspecialchars($fetch['service_id'])  ?>" class="form-control">

                                                                        <div class="mt-2 form-group">
                                                                            <label for="srv_user_stat_<?= $fetch['service_id'] ?>"> Service Status </label>
                                                                            <select class="form-control placeholder" id="srv_user_stat_<?= $fetch['service_id'] ?>" name="srv_user_stat" required="required">
                                                                                <option value="">Select Service Status </option>
                                                                                <option value="Active" <?php if ($fetch['status'] == 'Active') {
                                                                                                            echo "selected";
                                                                                                        } ?>>Active </option>

                                                                                <option value="Inactive" <?php if ($fetch['status'] == 'Inactive') {
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

                                                        <div class="modal fade" id="deleteservice<?= $fetch['service_id']; ?>" aria-hidden="true" tabindex="-1" aria-labelledby="deleteservice">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class=" modal-content bg-light">
                                                                    <form method="POST" onsubmit="event.preventDefault(); delete_service(<?= $fetch['service_id'] ?>)"">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Delete <?php if (($fetch['service_id']) <= 9) {
                                                                                                            // echo 'PTNT-0', $fetch['id'];
                                                                                                            echo 'SRV-000', htmlspecialchars($fetch['service_id']);
                                                                                                        } elseif (($fetch['service_id']) <= 99) {
                                                                                                            echo 'SRV-00', htmlspecialchars($fetch['service_id']);
                                                                                                        } elseif (($fetch['service_id']) <= 999) {
                                                                                                            echo 'SRV-0', htmlspecialchars($fetch['service_id']);
                                                                                                        } else {
                                                                                                            echo 'SRV-', htmlspecialchars($fetch['service_id']);
                                                                                                        }  ?> Stock</h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                        </div>
                                                                        
                                                                        <input type="hidden" id="d_serviceid_<?= $fetch['service_id'] ?>" name="serviceid" value="<?= htmlspecialchars($fetch['service_id']); ?>">

                                                                        <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                            <p> Do you want to delete this service?</p>
                                                                            <button class="btn btn-outline-secondary col-md-4" type="button" data-dismiss="modal">No</button>
                                                                            <button name="delete" class="btn btn-danger col-md-4">Yes</button>
                                                                        </div>
                                                                        <div style="clear:both;"></div>
                                                                        <!-- <div class="modal-footer">
                                                                            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>
                                                                            <button name="add" class="btn btn-primary">Add Stock</button>
                                                                        </div> -->
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                <?php
                                                // include '../includes/modal/update_emp_status.php';
                                                // include '../includes/modal/update_user.php';
                                                // include '../includes/modal/update_user_security.php';
                                                // include '../includes/modal/view_info_of_user.php';
                                                // include '../includes/modal/update_username.php';
                                                ?>
                                            <?php 
                                                endforeach
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                                                <div class="modal fade" id="add_services" aria-hidden="true" tabindex="-1" aria-labelledby="add_services">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class=" modal-content bg-light">
                                                            <form method="POST" onsubmit="event.preventDefault(); add_service()">
                                                                <div class="modal-header">
                                                                    <h5> Add Service</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <div class="ml-3 mr-3 modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3">
                                                                    <div class="col">
                                                                        
                                                                        <div class="mt-2 form-group">
                                                                            <label for="mod_ser_name"> Service Name </label>
                                                                            <input class="form-control" id="mod_ser_name" name="mod_ser_name" required="required" placeholder="Enter Service Name"/>
                                                                               
                                                                        </div>

                                                                        <div class="mt-2 form-group">
                                                                            <label for="mod_price">Price </label>
                                                                            <input class="form-control" id="mod_price" name="mod_price" required="required" placeholder="Enter Price"/>
                                                                               
                                                                        </div>

                                                                        <div class="mt-2 form-group">
                                                                            <label for="mod_user_stat"> Service Status </label>
                                                                            <select class="form-control placeholder" id="mod_user_stat" name="mod_user_stat" required="required">
                                                                                <option value="">Select Service Status </option>
                                                                                <option value="Active">Active </option>

                                                                                <option value="Inactive">Inactive</option>

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
                </div>


            </div>


            <script>
                $('#dataTable').dataTable({
                    lengthMenu: [10, 5, 10, 25, 50, 100],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search User"
                    },
                    columnDefs: [{
                        'targets': [0],
                        'orderable': true,
                    }],
                    order: [
                        [0, "desc"]
                    ],
                });
            </script>
            
    </body>

    </html>