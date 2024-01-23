<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
    <title>Dashboard </title>

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

</head>

<body>
    <div class="navbar-title"><a href="dashboard.php">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">
            <?php $page = 'dashboard'; ?>
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
                <div class="content">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
                        <button type="button" id="sidebarCollapse" class="btn menu-btn">
                            <i class="fa fa-align-justify"> </i>
                        </button>
                        <h5 class="navbar-header-text"> Dashboard</h5>
                        <?php // include 'includes/top_navbar.php'; ?>
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
                    <div class="container-fluid dashboard-row">
                        <div class="row dashboard-row1">
                            <!-- Patient -->
                            <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife" || $_SESSION['user_type'] == "Health worker"){ ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center ">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>patient">
                                                <img src="<?= BASE_URL ?>assets/icons/patient.png" class="dashboard-img" />
                                                <p class="dashboard-p">Patient</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php }else { ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center ">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>restricted">
                                                <img src="<?= BASE_URL ?>assets/icons/patient.png" class="dashboard-img" />
                                                <p class="dashboard-p">Patient</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>


                            <!-- Nurse -->
                            <?php if($_SESSION['user_type'] == "Admin"){ ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>nurse">
                                                <img src="<?= BASE_URL ?>assets/icons/nurse.png" class="dashboard-img" />
                                                <p class="dashboard-p">Nurse</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php }else { ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>restricted">
                                                <img src="<?= BASE_URL ?>assets/icons/nurse.png" class="dashboard-img" />
                                                <p class="dashboard-p">Nurse</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?> 
                            
                            
                            <!-- Appointment -->
                            <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife" || $_SESSION['user_type'] == "Health worker"){ ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>appointment">
                                                <img src="<?= BASE_URL ?>assets/icons/appointment.png" class="dashboard-img " />
                                                <p class="dashboard-p ">Appointment</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php }else { ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>restricted">
                                                <img src="<?= BASE_URL ?>assets/icons/appointment.png" class="dashboard-img " />
                                                <p class="dashboard-p ">Appointment</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?> 
                        </div>


                        <!-- Child Report -->
                        <div class="row dashboard-row2 ">
                            <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Health worker"){ ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="text-center ">
                                        <button type="button " class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>child_report">
                                                <img src="<?= BASE_URL ?>assets/icons/child-report.png" class="dashboard-img " />
                                                <p class="dashboard-p ">Child Report</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php }else { ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="text-center ">
                                        <button type="button " class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>restricted">
                                                <img src="<?= BASE_URL ?>assets/icons/child-report.png" class="dashboard-img " />
                                                <p class="dashboard-p ">Child Report</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>


                            <!-- Medicine -->
                            <?php if($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Nurse" || $_SESSION['user_type'] == "Midwife"){ ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>medicine">
                                                <img src="<?= BASE_URL ?>assets/icons/medicine.png" class="dashboard-img" />
                                                <p class="dashboard-p">Medication</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php }else { ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="text-center">
                                        <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>restricted">
                                                <img src="<?= BASE_URL ?>assets/icons/medicine.png" class="dashboard-img" />
                                                <p class="dashboard-p">Medication</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>


                            <!-- Settings -->
                            <?php if($_SESSION['user_type'] == "Admin"){ ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="text-center ">
                                        <button type="button " class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>settings">
                                                <img src="<?= BASE_URL ?>assets/icons/settings.png" class="dashboard-img " />
                                                <p class="dashboard-p ">Settings</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php }else { ?>
                                <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                    <div class="text-center ">
                                        <button type="button " class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                            <a href="<?= BASE_URL ?>restricted">
                                                <img src="<?= BASE_URL ?>assets/icons/settings.png" class="dashboard-img " />
                                                <p class="dashboard-p ">Settings</p>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <footer class="py-4 bg-light">
                    <div class="container text-center">
                        <p>&copy; 2023 HEALTH CENTER MANAGEMENT SYSTEM</p>
                    </div>
                </footer>

            </div>
        </div>
</body>

</html>