<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Add Child report </title>

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
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/script.js"></script>

    </head>

    <body>
        <div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'child-report';
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

                        <h5 class="navbar-header-text">Add Child</h5>

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
                                                <p class="m-0 text-primary font-weight-normal">Child Information</p>
                                            </div>
                                            <div class="card-body">
                                                <!-- <form id="form1" action="add_patient.result.php" method="POST"> -->
                                                <form method="post" onsubmit="event.preventDefault(); add_child()">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="child_fname">
                                                                    <span> First Name</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User First Name" 
                                                                    name="child_fname" 
                                                                    id="child_fname"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="child_fname_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="child_mname">
                                                                    <span> Middle Name</span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Middle Name" 
                                                                    name="child_mname" 
                                                                    id="child_mname"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="child_mname_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="child_lname">
                                                                    <span> Last Name</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Last Name" 
                                                                    name="child_lname" 
                                                                    id="child_lname"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="child_lname_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="child_mobilenumber">
                                                                    <span> Mobile Number</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Mobile Number" 
                                                                    name="child_mobilenumber" 
                                                                    id="child_mobilenumber"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="child_mobilenumber_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="select_prov">Province<span class="text-danger"> * </span>
                                                                </label>
                                                                <select class="form-control" onchange="get_child_city()" name="select_prov" id="c_select_prov">
                                                                    <option value='' disabled selected hidden>Select Province</option>
                                                                    <?php foreach($child_province AS $row): ?>
                                                                            <option value="<?= $row['id'] ?>"><?= $row['province_name'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="c_select_prov_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="select_city">City / Municipality<span class="text-danger"> * </span> </label>
                                                                <select class="form-control" name="select_city" id="c_city-list">
                                                                        <option value='' disabled selected hidden>Select City / Municipality</option>
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="c_select_city_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="child_bday"><span> Birthdate</span> <span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="date" 
                                                                    placeholder="Select Birthdate" 
                                                                    name="child_bday" 
                                                                    id="child_bday" 
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="child_bday_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="child_gender">Gender <span class="text-danger"> * </span> </label>
                                                                <select class="form-control placeholder" name="child_gender" id="child_gender" required="required">
                                                                    <option value="">Select Gender</option>
                                                                    <option value="Male">Male </option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="child_gender_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="height">
                                                                    <span>Height</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter height" 
                                                                    name="height" 
                                                                    id="height"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="child_height_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="weight">
                                                                    <span>Weight</span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Weight Name" 
                                                                    name="weight" 
                                                                    id="weight"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="child_weight_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="vaccination">
                                                                    <span>Vaccine Type</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <select class="form-control placeholder" name="vaccination" id="vaccination" required="required">
                                                                    <option value="">Select Vaccine</option>
                                                                    <?php foreach($vaccines AS $vac): ?>
                                                                        <option value="<?= $vac['vaccine_name'] ?>"><?= $vac['vaccine_name'] ?></option>
                                                                    <?= endforeach; ?>
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="vaccination_error"></p>
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

                </div>

                <?php // include '../includes/footer.php'; ?>

            </div>


    </body>

    </html>