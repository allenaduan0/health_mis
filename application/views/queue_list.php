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
        $page = 'queue';
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
                    <h5 class="navbar-header-text">Patient Queue List</h5>
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
                    <div class="shadow card">
                        <div class="py-3 card-header">
                            <p class="m-0 text-primary font-weight-normal">Patient Queue List</p>
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
                                                <th class="align-middle">Appointment Type</th>
                                                <!-- <th class="align-middle">Status</th>
                                                <th class="align-middle">Action </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($queue_list AS $fetch): ?>
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
                                                        <?php if($fetch['type'] == "walk_in"){ echo "Walk In";}else{ echo "Online";} ?>
                                                    </td>        
                                                </tr>

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