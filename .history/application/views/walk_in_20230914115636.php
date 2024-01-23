<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Add Walk In </title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/dataTables.bootstrap4.min.css"> 

        <!-- OUR CUSTOM CSS-->
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/form.css">

        <!-- JS CDN  -->
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>

        <script> var base_url = '<?= BASE_URL ?>'; </script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/main.js"></script>

    </head>

    <body>
        <div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'appointment';
            //include_once 'bars/sidebar.php';
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

                        <h5 class="navbar-header-text">Add Walk-In</h5>

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
                    <div class="container-fluid">
                    <button 
                        class="btn btn-primary text-light btn-sm update" 
                        data-toggle="modal" 
                        type="button" 
                        data-target="#add_walkin_patient" 
                        data-toggle-title="tooltip" 
                        data-placement="bottom" 
                        title="Update Information"
                    >
                        Add Patient
                    </button>
                        <div class="mb-3 row my-flex-card">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 shadow card">
                                            <div class="py-3 card-header">
                                                <p class="m-0 text-primary font-weight-normal">Walk-In Information</p>
                                            </div>
                                            <div class="card-body">
                                                <!-- <form id="form1" action="add_patient.result.php" method="POST"> -->
                                                <form method="post" onsubmit="event.preventDefault(); add_walk_in()">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="walk_fname">
                                                                    <span> Patient Name</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <select class="form-control" onchange="" name="walk_fname" id="walk_fname">
                                                                    <option value='' disabled selected hidden>Select Patient Name</option>
                                                                    <?php foreach($patient_name AS $row): ?>
                                                                            <option value="<?= $row['id'] ?>"><?= $row['f_name']. " ". $row['m_name']. " ". $row['l_name']  ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="walk_full_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="walk_service">
                                                                    <span> Service</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <select class="form-control placeholder" id="walk_service" name="walk_service" required="required">
                                                                    <option value="">Select service</option>
                                                                    <?php foreach($services AS $service): ?>
                                                                        <option value="<?= $service['name'] ?>"><?= $service['name'] ?></option>
                                                                    <?php endforeach; ?> 
                                                                    <!-- <option value="">Select service</option>
                                                                    <option value="Behavioral Counseling">Behavioral Counseling</option>
                                                                    <option value="Dietary Counseling">Dietary Counseling</option>
                                                                    <option value="Diagnostic and Therapeutic Services">Diagnostic and Therapeutic Services</option>
                                                                    <option value="Emergency Care">Emergency Care</option>
                                                                    <option value="Dental care">Dental care</option>
                                                                    <option value="Wellness and Preventive Care">Wellness and Preventive Care</option>
                                                                    <option value="Laboratory">Laboratory</option> -->
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="walk_service_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="walk_date">Date<span class="text-danger"> * </span>
                                                                </label>
                                                                <input class="form-control" type="date" id="walk_date" name="walk_date" required="required" />
                                                                <small class="text-danger">
                                                                    <p id="walk_date_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="walk_time">Time<span class="text-danger"> * </span> </label>
                                                                <input class="form-control" type="time" id="walk_time" name="walk_time" required="required" />
                                                                <small class="text-danger">
                                                                    <p id="walk_time_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-danger ">
                            <span> Please make sure all fields are filled in correctly </span>
                        </div>
                        <div class="form-group ">
                            <button class="mt-3 btn btn-primary " type="submit" name="submit">Submit</button>
                        </div>
                        </form>
                    </div>

                                                <div class="modal fade" id="add_walkin_patient" aria-hidden="true" tabindex="-1" aria-labelledby="add_walkin_patient">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class=" modal-content bg-light">
                                                        <div class="card-body">
                                                            <form method="POST" onsubmit="event.preventDefault(); add_new_patient()">
                                                                <div class="modal-header">
                                                                    
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label for="pt_fname">
                                                                                <span> First Name</span> <span class="text-danger"> * </span>
                                                                            </label>
                                                                            <input 
                                                                                class="form-control" 
                                                                                type="text" 
                                                                                placeholder="Enter User First Name" 
                                                                                name="pt_fname" 
                                                                                id="pt_fname"
                                                                                required="required"
                                                                            />
                                                                            <small class="text-danger">
                                                                                <p id="pt_fname_error"></p>
                                                                            </small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label for="pt_mname">
                                                                                <span> Middle Name</span>
                                                                            </label>
                                                                            <input 
                                                                                class="form-control" 
                                                                                type="text" 
                                                                                placeholder="Enter User Middle Name" 
                                                                                name="pt_mname" 
                                                                                id="pt_mname"
                                                                            />
                                                                            <small class="text-danger">
                                                                                <p id="pt_mname_error"></p>
                                                                            </small>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label for="pt_lname">
                                                                                <span> Last Name</span> <span class="text-danger"> * </span>
                                                                            </label>
                                                                            <input 
                                                                                class="form-control" 
                                                                                type="text" 
                                                                                placeholder="Enter User Last Name" 
                                                                                name="pt_lname" 
                                                                                id="pt_lname"
                                                                                required="required"
                                                                            />
                                                                            <small class="text-danger">
                                                                                <p id="pt_lname_error"></p>
                                                                            </small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label for="pt_mobile">
                                                                                <span>Contact Number</span> <span class="text-danger"> * </span>
                                                                            </label>
                                                                            <input 
                                                                                class="form-control" 
                                                                                type="text" 
                                                                                placeholder="Enter Contact Number" 
                                                                                name="pt_mobile" 
                                                                                id="pt_mobile"
                                                                                required="required"
                                                                            />
                                                                            <small class="text-danger">
                                                                                <p id="pt_mobile_error"></p>
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label for="pt_address">
                                                                                <span> Address</span> <span class="text-danger"> * </span>
                                                                            </label>
                                                                            <input 
                                                                                class="form-control" 
                                                                                type="text" 
                                                                                placeholder="Enter User Address" 
                                                                                name="pt_address" 
                                                                                id="pt_address"
                                                                                required="required"
                                                                            />
                                                                            <small class="text-danger">
                                                                                <p id="pt_address_error"></p>
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label for="pt_bday">
                                                                                <span> Birth Date</span> <span class="text-danger"> * </span>
                                                                            </label>
                                                                            <input 
                                                                                class="form-control" 
                                                                                type="date" 
                                                                                placeholder="Enter User Birth Date" 
                                                                                name="pt_bday" 
                                                                                id="pt_bday"
                                                                                required="required"
                                                                            />
                                                                            <small class="text-danger">
                                                                                <p id="pt_bday_error"></p>
                                                                            </small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                        <div class="form-group">
                                                                            <label for="pt_age">
                                                                                <span> Age</span>
                                                                            </label>
                                                                            <input 
                                                                                class="form-control" 
                                                                                type="text" 
                                                                                placeholder="Enter User Age" 
                                                                                name="pt_age" 
                                                                                id="pt_age"
                                                                            />
                                                                            <small class="text-danger">
                                                                                <p id="pt_age_error"></p>
                                                                            </small>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div style="clear:both;"></div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal"> Close</button>
                                                                    <button name="add" class="btn btn-primary"> Add</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>

                </div>

                <?php // include '../includes/footer.php'; ?>

            </div>


    </body>

    </html>