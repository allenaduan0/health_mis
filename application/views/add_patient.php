<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Add Patient </title>

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
        <div class="navbar-title"><a href="<?= BASE_URL ?>main_controller">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'patient';
            // include_once 'bars/sidebar.php';
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
                        <h5 class="navbar-header-text">Add patient</h5>
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
                        <div class="mb-3 row my-flex-card">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 shadow card">
                                            <div class="py-3 card-header">
                                                <p class="m-0 text-primary font-weight-normal">Patient Information</p>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" onsubmit="event.preventDefault(); add_patient()">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="f_name">
                                                                    <span> First Name</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User First Name" 
                                                                    name="f_name" 
                                                                    id="f_name"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="f_name_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="m_name">
                                                                    <span> Middle Name</span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Middle Name" 
                                                                    name="m_name" 
                                                                    id="m_name"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="m_name_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="l_name">
                                                                    <span> Last Name</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Last Name" 
                                                                    name="l_name" 
                                                                    id="l_name"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="l_name_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="mt-2 mb-2 form-group">
                                                                    <label for="address"><span>Address</span> <span class="text-danger"> * </span> </label>
                                                                    <input 
                                                                        class="form-control" 
                                                                        type="text" 
                                                                        placeholder="Enter address" 
                                                                        name="address" 
                                                                        id="address"
                                                                        required="required"
                                                                    />
                                                                    <small class="text-danger">
                                                                        <p id="address_error"></p>
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="bday"><span> Birthdate</span> <span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="date" 
                                                                    placeholder="Select Birthdate" 
                                                                    name="bday" 
                                                                    id="bday" 
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="bday_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="gender">Gender <span class="text-danger"> * </span> </label>
                                                                <select class="form-control placeholder" id="gender" name="gender" required="required">
                                                                    <option value="">Select Gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="gender_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="age"><span> Age</span> <span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="number" 
                                                                    placeholder="0" 
                                                                    name="age" 
                                                                    id="age" 
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="age_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="contact">Contact <span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="number" 
                                                                    placeholder="0" 
                                                                    name="contact" 
                                                                    id="contact"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="contact_error"></p>
                                                                </small>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


    </body>

    </html>