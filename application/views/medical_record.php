<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
    <title>Medical Record Information </title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/dataTables.bootstrap4.min.css"> 

    <!-- OUR CUSTOM CSS-->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <!-- <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/tb.css"> -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/print.css" media="print">

    <!-- JS CDN  -->
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>


</head>

<body>
<div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
    <div class="wrapper ">
        <?php $page = 'patient';
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
                <nav class="navbar navbar-expand-lg navbar-light bg-light top-header printccs">
                    <button type="button" id="sidebarCollapse" class="btn menu-btn">
                        <i class="fa fa-align-justify"> </i>
                    </button>

                    <h5 class="navbar-header-text">Medical Record Information</h5>

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
                <div class="container-fluid printbg">

                        <div class="row mb-3 my-flex-card">
                            <div class="col">
                                <!-- <div class="card shadow mb-3"> -->
                                <div class="no-shadow no-border mb-3" style="background-color: white;">
                                    <div class="card-header py-3 printccs">
                                        <p class="text-primary m-0 font-weight-normal"> Medical Record Information
                                        </p>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row mt-3 mb-3">
                                            <div class="col text-right">
                                                <button onclick="window.print()" class="btn btn-primary printccs" data-toggle-title="tooltip" data-placement="bottom" title="Print">
                                                    <i class="fa fa-print"></i>
                                                    <span class="mobile-icon-only">Print</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <h2> <?= strtoupper($cl_clinic_name); ?> </h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <span> <strong> Address: </strong>
                                                        <?= $cl_citymunicipality_name, ', ', $cl_province_name; ?>
                                                </div>
                                                <div class="row">
                                                    <span> <strong> Contact Number: </strong>
                                                        <?= $cl_clinic_contactno; ?> </span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row mt-5 text-right">
                                                    <div class="col">
                                                        <span> <strong> Date: </strong>
                                                            <?php
                                                            $source = htmlspecialchars($cl_date_created);
                                                            $date = new DateTime($source);
                                                            echo $date->format('F d\, Y'); // 31-07-2012
                                                            ?> </span>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row mt-4">
                                            <div class="col">
                                                <h5 class="text-primary">PATIENT DETAILS</h5>
                                            </div>

                                        </div>
                                        <?php
                                        if ($cl_patient_id === '54') { ?>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <span> <strong> Name: </strong>
                                                            <?= $cl_name; ?> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <span> <strong> Patient ID: </strong>

                                                            <?php if (($cl_patient_id) <= 9) {
                                                                echo 'PT-000', $cl_patient_id;
                                                            } elseif (($cl_patient_id) <= 99) {
                                                                echo 'PT-00', $cl_patient_id;
                                                            } elseif (($cl_patient_id) <= 999) {
                                                                echo 'PT-0', $cl_patient_id;
                                                            } else {
                                                                echo 'PT-', $cl_patient_id;
                                                            }  ?> </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <span> <strong> Age: </strong>
                                                            <?php
                                                            $dateofbirth = $cl_bday;
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
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <span> <strong> Name: </strong>
                                                            <?= $cl_f_name . ' '  .$cl_l_name; ?> </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <span> <strong> Gender: </strong>
                                                        <?= $cl_gender; ?> </span>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php foreach($patient_record AS $res) :?>
                                            <div class="row mt-4">
                                                    <?php if (empty($res['findings'])) {
                                                        echo  $res['prescription'], '<br><br>', $res['description'];
                                                    } elseif (empty($res['prescription'])) {
                                                        echo  $res['findings'], '<br><br>', $res['description'];
                                                    } elseif (empty($res['prescription']) and empty($res['findings'])) {
                                                        echo  $res['description'];
                                                    } else {
                                                        echo  $res['findings'], '<br><br>', $res['prescription'], '<br><br>', $res['description'];
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col">
                                                    <?php if (empty($res['findings'])) { ?>
                                                        <h4 class='mt-3 text-primary'> Prescription (Rx): </h4>
                                                        <h6> <?php echo $res['prescription']; ?> </h6>
                                                        <h6 class="mt-5 mb-5"> <?php echo $res['description']; ?> </h6>
                                                    <?php  } elseif (empty($res['prescription'])) { ?>
                                                        <h4 class='mt-3 text-primary'>Findings: </h4>
                                                        <h6> <?php echo $res['findings']; ?> </h6>
                                                        <h6 class="mt-5 mb-5"> <?php echo $res['description']; ?> </h6>
                                                    <?php } elseif (empty($res['prescription']) and empty($res['findings'])) { ?>
                                                        <h6 class="mb-5"> <?php echo $res['description']; ?> </h6>
                                                    <?php } else { ?>
                                                        <h4 class='mt-3  text-primary'>Findings: </h4>
                                                        <h6> <?php echo $res['findings']; ?> </h6>
                                                        <h4 class='mt-5 text-primary'> Prescription (Rx): </h4>
                                                        <h6> <?php echo $res['prescription']; ?> </h6>
                                                        <h6 class="mt-5 mb-5"> <?php echo $res['description']; ?> </h6>
                                                    <?php } ?>
                                                </div>

                                        <?php endforeach; ?>

                                        <?php ?>
                                            <div class="row mt-4">
                                                <div class="col-8">
                                                </div>
                                                <div class="col-4 text-center">
                                                    <span>
                                                        <?= $user_fname, ' ', $user_lname ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col-8">
                                                </div>
                                                <div class="col-4 text-center">
                                                    <span>
                                                        <strong> HEALTH CENTER </strong>
                                                    </span>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>


            </div>

            <script>
                $('#dataTable').dataTable({
                    processing: true,
                    // serverSide: true,
                    // ajax: "patient_list.inc.php",
                    lengthMenu: [10, 5, 10, 25, 50, 100],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search"
                    },
                    //Disable Action sorting (yung arrow up and down)
                    columnDefs: [{
                        'targets': [1],
                        /* column index */
                        'orderable': false,
                        /* true or false */
                    }]
                });
            </script>
</body>

</html>