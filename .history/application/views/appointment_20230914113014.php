<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
    <title>Appointment List </title>

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
    <script type="text/javascript" src="<?= BASE_URL ?>assets/js/main.js"></script>
    
</head>

<body>

<div class="navbar-title" ><a href="../dashboard.php">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
    <div class="wrapper ">

        <?php
        $page = 'appointment';
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

                                <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife"): ?>
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


                                <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife"): ?>
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
                    <h5 class="navbar-header-text">Appointment List</h5>
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
                <div class="container-fluid-child">
                    <div class='my-3'>
						<div class="d-flex justify-content-between mb-2">
						<a href="<?= BASE_URL ?>walk_in" class="btn btn-primary rounded-md px-3 py-2" title="Add User">
							<i class="fa fa-plus"></i>
							<span>Walk In</span>
						</a>
						</div>
					</div>
                    <div class="shadow card">
                        <div class="py-3 card-header">
                            <p class="m-0 text-primary font-weight-normal">Appointment List</p>
                        </div>
                        <div class="card-body">

                            <!-- ADMIN -->
                            <?php // if (isset($_SESSION["loggedin"]) && ($_SESSION["utadmin"])) { ?>
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Appointment ID </th>
                                                <th class="align-middle">Patient Name </th>
                                                <th class="align-middle">Service</th>
                                                <th class="align-middle">Date </th>
                                                <th class="align-middle">Time </th>
                                                <th class="align-middle">Status</th>
                                                <th class="align-middle">Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($appointment_list AS $fetch): ?>
                                                <tr>
                                                    <td><?php if (($fetch['id']) <= 9) {
                                                            // echo 'PTNT-0', $fetch['id'];
                                                            echo 'APT-000', $fetch['id'];
                                                        } elseif (($fetch['id']) <= 99) {
                                                            echo 'APT-00', $fetch['id'];
                                                        } elseif (($fetch['id']) <= 999) {
                                                            echo 'APT-0', $fetch['id'];
                                                        } else {
                                                            echo 'APT-', $fetch['id'];
                                                        }  ?></td>
                                                    <td><?= $fetch['name'] ?></td>
                                                    <td><?= $fetch['service'] ?></td>
                                                    <td> <?php
                                                            $source =  $fetch['date'];
                                                            $date = new DateTime($source);
                                                            echo $date->format('F d, Y');
                                                            ?></td>
                                                    <td> <?php
                                                            $source =  $fetch['time'];
                                                            $date = new DateTime($source);
                                                            echo $date->format('h:i a'); // 31-07-2012
                                                            ?></td>
                                                    <td>
                                                        <button class="btn btn-sm  action-btn btn-no-border  <?php if ($fetch['status'] == 'Pending') {
                                                                    echo "btn-outline-dark";
                                                                }   elseif ($fetch['status'] == 'Scheduled') {
                                                                    echo "btn-outline-primary";
                                                                } elseif ($fetch['status'] == 'Cancelled') {
                                                                    echo "btn-outline-danger";
                                                                } elseif ($fetch['status'] == 'Completed') {
                                                                    echo "btn-outline-success";
                                                                } elseif ($fetch['status'] == 'No Show') {
                                                                    echo "btn-outline-dark";
                                                                } ?>" 
                                                                data-toggle="modal" 
                                                                type="button" 
                                                                data-target="#status<?= $fetch['id'] ?>" 
                                                                data-toggle-title="tooltip" 
                                                                data-placement="bottom" 
                                                                title="Change Appointment Status"
                                                        >

                                                            <?= $fetch['status'] ?>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button 
                                                            class="btn btn-orange text-light btn-sm update" 
                                                            data-toggle="modal" 
                                                            type="button" 
                                                            data-target="#update_modal<?= $fetch['id'] ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="Update Information"
                                                        >
                                                            <i class="fa fa-pencil"></i>
                                                            <span class="mobile-icon-only">Update</span>
                                                        </button>
                                                        <a 
                                                            role="button" 
                                                            class="btn btn-info text-light btn-sm" 
                                                            data-toggle="modal" 
                                                            href="#view-apt<?= $fetch['id']; ?>" 
                                                            data-toggle-title="tooltip" 
                                                            data-placement="bottom" 
                                                            title="View Information"
                                                        >
                                                            <i class="fa fa-info"></i>
                                                            <span class="mobile-icon-only"> Information</span>
                                                        </a>

                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="status<?= $fetch['id'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="status">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class=" modal-content bg-light">
                                                            <form method="POST" onsubmit="event.preventDefault(); update_apt_status(<?= $fetch['id'] ?>)">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Update <?php if (($fetch['id']) <= 9) {
                                                                                                        echo 'APT-000', htmlspecialchars($fetch['id']);
                                                                                                    } elseif (($fetch['id']) <= 99) {
                                                                                                        echo 'APT-00', htmlspecialchars($fetch['id']);
                                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                                        echo 'APT-0', htmlspecialchars($fetch['id']);
                                                                                                    } else {
                                                                                                        echo 'APT-', htmlspecialchars($fetch['id']);
                                                                                                    }  ?> Status</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <div class="modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3 ml-3 mr-3">
                                                                    <div class="col">
                                                                        <!-- <div class="form-group"> -->
                                                                        <input id="id_update_<?= $fetch['id'] ?>" name="id_update" type="hidden" value="<?= htmlspecialchars($fetch['id'])  ?>" class="form-control">
                                                                        <input id="apt_date_update_<?= $fetch['id'] ?>" name="apt_date_update" type="hidden" value="<?= $fetch['date']; ?>" class="form-control">
                                                                        <input id="apt_time_update_<?= $fetch['id'] ?>" name="apt_time_update" type="hidden" value="<?= $fetch['time'];  ?>" class="form-control">

                                                                        <?php 
                                                                            $orgistatus  = $fetch['status'];
                                                                            $orgiservice = $fetch['service'];
                                                                            $orgidate    = $fetch['date'];
                                                                            $orgitime    = $fetch['time'];
                                                                        ?>
                                                                        <input id="orig_aptstat_<?= $fetch['id'] ?>" name="orig_aptstat" type="hidden" value="<?= $orgistatus; ?>">
                                                                        <input id="orig_date_<?= $fetch['id'] ?>" name="orig_date" type="hidden" value="<?= $orgidate;  ?>" class="form-control">
                                                                        <input id="orig_time_<?= $fetch['id'] ?>" name="orig_time" type="hidden" value="<?= $orgitime;  ?>" class="form-control">
                                                                        <input id="orig_service_<?= $fetch['id'] ?>" name="orig_service" type="hidden" value="<?= $orgiservice;  ?>" class="form-control">
                                                                        <!-- </div> -->
                                                                        <div class="form-group mt-2">
                                                                            <label for="apt_stat_update"> Status </label>
                                                                            <select class="form-control placeholder" id="apt_stat_update_<?= $fetch['id'] ?>" name="apt_stat_update" onchange="toggleCommentField2(<?= $fetch['id'] ?>)" required="required">
                                                                                <option value="">Select Appointment Status </option>
                                                                                <option value="Scheduled" <?php if ($fetch['status'] == 'Scheduled') {
                                                                                                                echo "selected";
                                                                                                            } ?>>Scheduled </option>

                                                                                <option value="Canceled" <?php if ($fetch['status'] == 'Canceled') {
                                                                                                                echo "selected";
                                                                                                            }  ?>>Canceled</option>
                                                                                <option value="Completed" <?php if ($fetch['status'] == 'Completed') {
                                                                                                                echo "selected";
                                                                                                            } ?>>Completed </option>

                                                                                <option value="No Show" <?php if ($fetch['status'] == 'No Show') {
                                                                                                            echo "selected";
                                                                                                        }  ?>>No Show</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mt-2" id="commentField2_<?= $fetch['id'] ?>">
                                                                            <!-- <label for="comment">Comment</label>
                                                                            <textarea class="form-control" name="comment"></textarea> -->
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

                                                <div class="modal fade" id="view-apt<?= $fetch['id']; ?>" tabindex="-1" aria-labelledby="view-apt" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><?php if (($fetch['id']) <= 9) {
                                                                                                echo 'APT-000', htmlspecialchars($fetch['id']);
                                                                                            } elseif (($fetch['id']) <= 99) {
                                                                                                echo 'APT-00', htmlspecialchars($fetch['id']);
                                                                                            } elseif (($fetch['id']) <= 999) {
                                                                                                echo 'APT-0', htmlspecialchars($fetch['id']);
                                                                                            } else {
                                                                                                echo 'APT-', htmlspecialchars($fetch['id']);
                                                                                            }  ?> </h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                            </div>
                                                            <div class="modal-body ml-5 mr-5 mb-3 mt-3">
                                                                <div class="row mb-2 ">
                                                                    <div class="col-6">
                                                                        <div class="text-secondary mb-2 text-right"> Appointment ID</div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <!-- <?= htmlspecialchars($fetch['id']) ?> -->
                                                                        <?php if (($fetch['id']) <= 9) {
                                                                                echo 'APT-000', htmlspecialchars($fetch['id']);
                                                                            } elseif (($fetch['id']) <= 99) {
                                                                                echo 'APT-00', htmlspecialchars($fetch['id']);
                                                                            } elseif (($fetch['id']) <= 999) {
                                                                                echo 'APT-0', htmlspecialchars($fetch['id']);
                                                                            } else {
                                                                                echo 'APT-', htmlspecialchars($fetch['id']);
                                                                            }  ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2 ">
                                                                    <div class="col-6">
                                                                        <div class="text-secondary mb-2 text-right">Name </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <?= htmlspecialchars($fetch['name']) ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2 ">
                                                                    <div class="col-6">
                                                                        <div class="text-secondary mb-2 text-right"> Service </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <?= htmlspecialchars($fetch['service']) ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2 ">
                                                                    <div class="col-6">
                                                                        <div class="text-secondary mb-2 text-right"> Date </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <?php
                                                                            $source = $fetch['date'];
                                                                            $date = new DateTime($source);
                                                                            // echo $date->format('m-d-Y'); // 31-07-2012
                                                                            echo $date->format('F d\, Y');
                                                                            ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2 ">
                                                                    <div class="col-6">
                                                                        <div class="text-secondary mb-2 text-right">Time </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <?php
                                                                            $source =  htmlspecialchars($fetch['time']);
                                                                            $date = new DateTime($source);
                                                                            echo $date->format('h:i a'); // 31-07-2012
                                                                            ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2 ">
                                                                    <div class="col-6">
                                                                        <div class="text-secondary mb-2 text-right"> Appointment Status </div>
                                                                    </div>
                                                                    <div class="col-6 <?php if ($fetch['status'] == 'Scheduled') {
                                                                                                echo "text-primary";
                                                                                            } elseif ($fetch['status'] == 'Canceled') {
                                                                                                echo "text-danger";
                                                                                            } elseif ($fetch['status'] == 'Completed') {
                                                                                                echo "text-success";
                                                                                            } elseif ($fetch['status'] == 'No Show') {
                                                                                                echo "text-dark";
                                                                                            } ?>">
                                                                        <?= htmlspecialchars($fetch['status']) ?>
                                                                    </div>
                                                                </div>   
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="modal fade" id="update_modal<?= $fetch['id'] ?>" aria-hidden="true" tabindex="-1" aria-labelledby="update_client">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class=" modal-content bg-light">
                                                            <form method="POST" onsubmit="event.preventDefault(); update_appointment(<?= $fetch['id'] ?>)">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Update <?php if (($fetch['id']) <= 9) {
                                                                                                        echo 'APT-000', htmlspecialchars($fetch['id']);
                                                                                                    } elseif (($fetch['id']) <= 99) {
                                                                                                        echo 'APT-00', htmlspecialchars($fetch['id']);
                                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                                        echo 'APT-0', htmlspecialchars($fetch['id']);
                                                                                                    } else {
                                                                                                        echo 'APT-', htmlspecialchars($fetch['id']);
                                                                                                    }  ?>
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <div class="modal-body ml-xl-5 mr-xl-5 mr-lg-5 ml-lg-5 mr-sm-3 ml-sm-3 ml-md-3 mr-md-3 ml-3 mr-3">
                                                                    <input id="up_id_<?= $fetch['id'] ?>" name="id" type="hidden" value="<?= htmlspecialchars($fetch['id'])  ?>" class="form-control">


                                                                    <?php 
                                                                        $orgistatus = $fetch['status'];
                                                                        $orgiservice = $fetch['service'];
                                                                        $orgidate = $fetch['date'];
                                                                        $orgitime = $fetch['time'];
                                                                    ?>
                                                                    <input id="up_orig_aptstat_<?= $fetch['id'] ?>" name="orig_aptstat" type="hidden" value="<?= $orgistatus; ?>">
                                                                    <input id="up_orig_date_<?= $fetch['id'] ?>" name="orig_date" type="hidden" value="<?= $orgidate;  ?>" class="form-control">
                                                                    <input id="up_orig_time_<?= $fetch['id'] ?>" name="orig_time" type="hidden" value="<?= $orgitime;  ?>" class="form-control">
                                                                    <input id="up_orig_service_<?= $fetch['id'] ?>" name="orig_service" type="hidden" value="<?= $orgiservice;  ?>" class="form-control">


                                                                    <div class="form-group mt-2">
                                                                        <label>Pet Name <span class="text-danger"> * </span></label>
                                                                        <input type="text" id="up_pname_<?= $fetch['id'] ?>" name="pname" value="<?= htmlspecialchars($fetch['name']) ?>" class="form-control" disabled>
                                                                        <input type="hidden" id="up_pname_<?= $fetch['id'] ?>" name="pname" value="<?= htmlspecialchars($fetch['name']) ?>">
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="service">Service <span class="text-danger"> * </span> </label>
                                                                        <select class="form-control placeholder" id="up_service_<?= $fetch['id'] ?>" name="service" required="required">
                                                                            <option value="">Select service</option>
                                                                            <option value="Behavioral Counseling" <?php if (isset($service) && $service == "Behavioral Counseling") echo "selected" ?>>Behavioral Counseling</option>
                                                                            <option value="Dietary Counseling" <?php if (isset($service) && $service == "Dietary Counseling") echo "selected" ?>>Dietary Counseling</option>
                                                                            <option value="Diagnostic and Therapeutic Services
                                                                            " <?php if (isset($service) && $service == "Diagnostic and Therapeutic Services
                                                                            ") echo "selected" ?>>Diagnostic and Therapeutic Services
                                                                            </option>
                                                                            <option value="Emergency Care" <?php if (isset($service) && $service == "Emergency Care") echo "selected" ?>>Emergency Care</option>
                                                                            <option value="Dental care" <?php if (isset($service) && $service == "Dental care") echo "selected" ?>>Dental care</option>
                                                                            <option value="Wellness and Preventive Care" <?php if (isset($service) && $service == "Wellness and Preventive Care") echo "selected" ?>>Wellness and Preventive Care</option>
                                                                            <option value="Laboratory" <?php if (isset($service) && $service == "Laboratory") echo "selected" ?>>Laboratory</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="apt_date"><span> Date</span> <span class="text-danger"> * </span></label>
                                                                        <input class="form-control" type="date" id="up_apt_date_<?= $fetch['id'] ?>" name="apt_date" required="required" value="<?= htmlspecialchars($fetch['date']) ?>">
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="apt_time"><span>Time</span> <span class="text-danger"> * </span></label>
                                                                        <input class="form-control" type="time" id="up_apt_time_<?= $fetch['id'] ?>" name="apt_time" required="required" value="<?= htmlspecialchars($fetch['time']) ?>">
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="status">Status <span class="text-danger"> * </span></label>
                                                                        <select class="form-control placeholder" id="up_status_<?= $fetch['id'] ?>" name="status" required="required" onchange="toggleCommentField(<?= $fetch['id'] ?>)">
                                                                            <option value="">Select Appointment Status</option>
                                                                            <option value="Scheduled" <?php if ($fetch['status'] == 'Scheduled') echo "selected"; ?>>Scheduled</option>
                                                                            <option value="Pending" <?php if ($fetch['status'] == 'Pending') echo "selected"; ?>>Pending</option>
                                                                            <option value="Canceled" <?php if ($fetch['status'] == 'Canceled') echo "selected"; ?>>Canceled</option>
                                                                            <option value="Completed" <?php if ($fetch['status'] == 'Completed') echo "selected"; ?>>Completed</option>
                                                                            <option value="No Show" <?php if ($fetch['status'] == 'No Show') echo "selected"; ?>>No Show</option>
                                                                            <option value="Followup" <?php if ($fetch['status'] == 'Followup') echo "selected"; ?>>Follow Up</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mt-2" id="commentField_<?= $fetch['id'] ?>">
                                                                        <!-- <label for="comment">Comment</label>
                                                                        <textarea class="form-control" name="comment"></textarea> -->
                                                                    </div>

                                                                    
                                                                    
                                                                </div>
                                                                <div style="clear:both;"></div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>
                                                                    <button name="update" class="btn btn-primary"> Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php
                                                // include '../includes/modal/update_apt_status.php';
                                                // include '../includes/modal/update_appointment.php';
                                                // include '../includes/modal/view_info_of_apt.php';
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php // }  ?>
                        </div>
                    </div>
                </div>
                </div>

            <?php // include '../includes/footer.php'; ?>

        </div>

        <script>
            jQuery.extend(jQuery.fn.dataTableExt.oSort, {
                "date-custom-pre": function (dateStr) {
                var dateParts = dateStr.split(' ');
                var month = dateParts[0];
                var day = dateParts[1].replace(',', '');
                var year = dateParts[2];
                var dateObj = new Date(month + ' ' + day + ', ' + year);
                return Date.parse(dateObj);
                },
                "date-custom-asc": function (a, b) {
                return a - b;
                },
                "date-custom-desc": function (a, b) {
                return b - a;
                },
            });

            $('#dataTable').dataTable({
                "columnDefs": [
                    {
                    "type": "date-custom", 
                    "targets": 3 
                    }
                ],
                "order": [[3, "desc"]]

            });
        </script>
</body>

</html>