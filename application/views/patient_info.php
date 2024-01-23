<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
    <title>Patient Information </title>

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

</head>

<body>
    <div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
    <div class="wrapper ">

        <?php
        $page = 'patient';
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

                    <h5 class="navbar-header-text">Patient Information</h5>

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
                            <div class="col-lg-4">
                                <div class="text-center shadow card card-body">
                                    <div>
                                        <h3 class="mt-3"> <?= $f_name, ' ', $l_name  ?> </h3>
                                    </div>
                                    <span class="mt-3 mb-3 border border-primary border-1"> </span>
                                    <div class="mb-3 row">
                                        <div class="text-right col-6">
                                            <div class="text-secondary"> Patient ID</div>
                                        </div>
                                        <div class="text-left col-6">
                                            <div>
                                                <?php if ($id <= 9) {
                                                    // echo 'PTNT-0', $fetch['id'];
                                                    echo '202303000', htmlspecialchars($id);
                                                } elseif ($id <= 99) {
                                                    echo '20230300', htmlspecialchars($id);
                                                } elseif ($id <= 999) {
                                                    echo '2023030', htmlspecialchars($id);
                                                } else {
                                                    echo '202303', htmlspecialchars($id);
                                                }  ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-right col-6">
                                            <div class="text-secondary"> Gender</div>
                                        </div>
                                        <div class="text-left col-6">
                                            <div>
                                                <?= htmlspecialchars($gender); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-right col-6">
                                            <div class="text-secondary"> Age</div>
                                        </div>
                                        <div class="text-left col-6">
                                            <div>
                                                <?php
                                                $dateofbirth = $bday;
                                                $today = date("Y-m-d");
                                                $diff = date_diff(date_create($dateofbirth), date_create($today));
                                                echo  $diff->format('%y');

                                                $age = $diff->format('%y');
                                                if ($age > 1) {
                                                    echo ' years old';
                                                } else {
                                                    echo ' year old';
                                                }  ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-right col-6">
                                            <div class="text-secondary"> Address</div>
                                        </div>
                                        <div class="text-left col-6">
                                            <div>
                                                <?= htmlspecialchars($address); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-right col-6">
                                            <div class="text-secondary">Birthday</div>
                                        </div>
                                        <div class="text-left col-6">
                                            <div>
                                                <?= htmlspecialchars($bday); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="text-right col-6">
                                            <div class="text-secondary"> Contact</div>
                                        </div>
                                        <div class="text-left col-6">
                                            <div>
                                                <?= htmlspecialchars($contact); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 ">
                                <div class="shadow card">
                                    <div class="py-3 card-header">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ">
                                                <p class="m-0 text-primary font-weight-normal">Medical Records</p>
                                            </div>
                                            <?php // if (isset($_SESSION["loggedin"]) && ($_SESSION["utstaff"])) { ?>
                                                <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="btn-group dropleft float-lg-right float-md-right float-xl-right">
                                                        <button class="btn btn-primary btn-sm " data-toggle="modal" type="button" data-target="#add_document<?php // echo $fetch['id'] ?>" data-toggle-title="tooltip" data-placement="bottom" title="Add Document">
                                                            <i class="fa fa-plus"> </i>
                                                            <span class="mobile-icon-only">Add Document</span>
                                                        </button>
                                                    </div>
                                                </div> -->
                                            <?php // } else { ?>
                                                <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <div class="text-lg-right text-xl-right text-md-right ">

                                                      
                                                        <div class="btn-group dropleft">
                                                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-plus"> </i>
                                                                Medical Diagnosis
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" type="button" data-toggle="modal" data-target="#add_medicalrecord<?php // echo $fetch['id'] ?>">Add Medical report</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div> -->
                                            <?php // } ?>
                                            <?php
                                                // include '../includes/modal/add_patient_medical_records.php';
                                            ?>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4 table-responsive">
                                            <table id="dataTable" class="table table-bordered table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle ">Reason</th>
                                                        <th class="align-middle ">Findings</th>
                                                        <th class="align-middle ">Prescription</th>
                                                        <th class="align-middle ">Description</th>
                                                        <th class="align-middle ">Create Date</th>
                                                        <th class="action ">Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($medical_records AS $record): ?>
                                                        <tr>
                                                            <td><?= $record['reason'] ?></td>
                                                            <td><?= $record['findings'] ?></td>
                                                            <td><?= $record['prescription'] ?></td>
                                                            <td><?= $record['description'] ?></td>
                                                            <td><?php
                                                                $source = $record['date_created'];
                                                                $date = new DateTime($source);
                                                                echo $date->format('F d\, Y');
                                                                ?>
                                                            </td>
                                                            <td>
                                                                    <a 
                                                                        type="button" 
                                                                        class="btn text-light btn-sm update" 
                                                                        type="button" 
                                                                        href="<?= BASE_URL ?>medical_record/<?= $record['medical_records_id'] ?>" 
                                                                        data-toggle-title="tooltip" 
                                                                        data-placement="bottom" 
                                                                        title="View" 
                                                                        style="background-color:#3895D3;"
                                                                    >
                                                                        <i class="fa fa-eye"></i>
                                                                        <span class="mobile-icon-only">View</span>
                                                                    </a>
                                                               

                                                                <a 
                                                                    role="button" 
                                                                    class="btn btn-info text-light btn-sm" 
                                                                    data-toggle="modal" 
                                                                    href="#view-info-docu<?php echo $record['medical_records_id']; ?>" 
                                                                    data-toggle-title="tooltip" 
                                                                    data-placement="bottom" 
                                                                    title="View Information"
                                                                >
                                                                    <i class="fa fa-info"></i>
                                                                    <span class="mobile-icon-only">Information</span>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                           <!--VIEW CLIENT Modal -->
                                                            <div class="modal fade" id="view-info-docu<?php echo $record['medical_records_id']; ?>" tabindex="-1" aria-labelledby="view-info-docu" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">View Information </h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                        </div>
                                                                        <div class="modal-body ml-5 mr-5 mb-3 mt-3">

                                                                            <!-- IF NOT EMPTY YUNG FILE NAME -->
                                                                            <?php if (!empty($record['file_name'])) { ?>
                                                                                <div class="row mb-2 ">
                                                                                    <div class="col-4">
                                                                                        <div class="text-secondary mb-2 text-right"> File Name</div>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <?php echo htmlspecialchars($record['file_name']) ?>
                                                                                    </div>
                                                                                </div>
                                                                                <?php if (!empty($record['description'])) {  ?>
                                                                                    <div class="row mb-2 ">
                                                                                        <div class="col-4">
                                                                                            <div class="text-secondary mb-2 text-right"> Description</div>
                                                                                        </div>
                                                                                        <div class="col-8">
                                                                                            <?php echo htmlspecialchars($record['description']) ?>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } else {
                                                                                    } ?>
                                                                                <div class="row mb-2 ">
                                                                                    <div class="col-4">
                                                                                        <div class="text-secondary mb-2 text-right"> Uploaded on</div>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <?php
                                                                                            $source = htmlspecialchars($record['date_created']);
                                                                                            $date = new DateTime($source);
                                                                                            echo $date->format('F d\, Y'); // 31-07-2012
                                                                                            ?>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-2 ">
                                                                                    <div class="col-4">
                                                                                        <div class="text-secondary mb-2 text-right">Provider</div>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <?php echo htmlspecialchars($record['user_fname']), ' ', htmlspecialchars($record['user_lname']) ?>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <?php if (!empty($record['description'])) {  ?>
                                                                                    <div class="row mb-2 ">
                                                                                        <div class="col-4">
                                                                                            <div class="text-secondary mb-2 text-right"> Description</div>
                                                                                        </div>
                                                                                        <div class="col-8">
                                                                                            <?php echo htmlspecialchars($record['description']) ?>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } else {
                                                                                    } ?>
                                                                                <div class="row mb-2 ">
                                                                                    <div class="col-4">
                                                                                        <div class="text-secondary mb-2 text-right"> Created on</div>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <?php
                                                                                            $source = htmlspecialchars($record['date_created']);
                                                                                            $date = new DateTime($source);
                                                                                            echo $date->format('F d\, Y'); // 31-07-2012
                                                                                            ?>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-2 ">
                                                                                    <div class="col-4">
                                                                                        <div class="text-secondary mb-2 text-right">Provider</div>
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <?php echo htmlspecialchars($record['user_fname']), ' ', htmlspecialchars($record['user_lname']) ?>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                    <?php endforeach; // include '../includes/modal/view_info_of_docu.php'; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>


            </div><?php // include '../includes/footer.php'; ?>
        </div>
        <!--Icon-->
        <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
        <!--OUR JS-->
        
        <!-- DATA TABLE -->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"> </script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"> </script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

        <script>
            $('#dataTable').dataTable({
                processing: true,
                // serverSide: true,
                // ajax: "patient_list.inc.php",
                lengthMenu: [10, 5, 10, 25, 50, 100],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Appointment"
                },
                columnDefs: [{
                    'targets': [0,1,2,3,4],
                    'orderable': false,
                }],
                // "order": [
                //     [0, "desc"]
                // ],
                dom: 'Blfrtip',
                // dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3] //Your Column value those you want
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3] //Your Column value those you want
                        },
                    }, {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3] //Your Column value those you want
                        },
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },

                    },
                ]
            });
        </script>
</body>

</html>