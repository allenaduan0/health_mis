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

                                <li class="<?php if ($page == 'appointment') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>create_appointment">
                                        Apply Appointment
                                    </a>
                                </li>

                                <li class="<?php if ($page == 'appointment_list') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>user_appointment">
                                        My Appointments
                                    </a>
                                </li>

                                <li class="<?php if ($page == 'medical_records') { echo 'active'; } ?>">
                                    <a href="<?= BASE_URL ?>user_med_history">
                                        View Medical Records
                                    </a>
                                </li>
                            
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
                        <?php // include 'includes/top_navbar.php'; ?>
                    </nav>
                    <!-- DASHBOARD CONTENT/BOXES -->
                    <div class="container-fluid-dashboard dashboard-row">
                        <div class="row dashboard-row1">

                            <?php foreach($user_dash AS $res): ?>
                                    <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="card-container text-center">
                                            <button type="button" class="p-3 mb-4 bg-white rounded dashboard-btn btn-light dashboard-btn-hover ">
                                                <a href="<?= BASE_URL ?>create_appointment">
                                                    <img src="<?= BASE_URL ?>assets/icons/medicine.png" class="dashboard-img" />
                                                    <p class="dashboard-p "><?= $res['name'] ?></p>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                            <?php endforeach ?>
                            
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