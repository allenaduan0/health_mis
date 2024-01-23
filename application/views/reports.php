<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Select report</title>

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
            $page = 'reports';
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
                        <h5 class="navbar-header-text">Select report</h5>
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
                        <div class="py-20">
                            <div class="container px-4 py-8 mx-auto">
                                <h3 class="text-md font-bold">Filter report</h3>
                            </div>
                            <form method="post" id="filter-form" class="form-inline" onsubmit="event.preventDefault(); show_filter()">
                                <div class="form-group mx-sm-3 mb-2">
                                    <select name="filter" id="filter" class="form-control" style="width: 240px;">
                                    <option value="">Select type of report</option>
                                        <option value="appointment">Appointment</option>
                                        <option value="inventory">Inventory</option>
                                        <option value="service">Service</option>
                                        <option value="child_records">Child records</option>
                                        <option value="nurse">Nurse</option>
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-primary mb-2" style="width: 100px; margin-top: 10px;">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="appointment_generator" style="display:none">
                        <div class="container-fluid-settings">
                            <div class="shadow card">
                                <div class="py-3 card-header">
                                    <p class="m-0 text-primary font-weight-normal">Generate Appointments</p>
                                </div>
                                <div class="card-body">
                                    <!-- <form class="mt-2 row g-3" method="POST" action='reports/appointment_result.php'> -->
                                    <?php $form_attributes = array("class" => "mt-2 row g-3") ?>
                                    <?php echo form_open('Main_Controller/dummy_appointment_generator', $form_attributes); ?>
                                        <div class="col-auto">
                                            <label for="staticEmail2">From:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="ag_startdate" name="ag_startdate" />
                                        </div>
                                        <div class="col-auto">
                                            <label for="staticEmail2">To:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="ag_enddate" name="ag_enddate" />
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="mb-3 btn btn-primary" name="searchreportdate">Generate report</button>
                                        </div>
                                    <?php echo form_close(); ?>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div> 
                    

                    <div id="inventory_generator" style="display:none">
                        <div class="container-fluid-settings">
                            <div class="shadow card">
                                <div class="py-3 card-header">
                                    <p class="m-0 text-primary font-weight-normal">Generate Inventory report</p>
                                </div>
                                <div class="card-body">
                                    <?php $form_attributes = array("class" => "mt-2 row g-3") ?>
                                    <?php echo form_open('Main_Controller/dummy_inventory_generator', $form_attributes); ?>
                                        <div class="col-auto">
                                            <label for="staticEmail2">From:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="ig_startdate" name="ig_startdate" />
                                        </div>
                                        <div class="col-auto">
                                            <label for="staticEmail2">To:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="ig_enddate" name="ig_enddate" />
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="mb-3 btn btn-primary" name="searchreportdate">Generate report</button>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div id="child_records_generator" style="display:none">
                        <div class="container-fluid-settings">
                            <div class="shadow card">
                                <div class="py-3 card-header">
                                    <p class="m-0 text-primary font-weight-normal">Generate Child record</p>
                                </div>
                                <div class="card-body">
                                    <?php $form_attributes = array("class" => "mt-2 row g-3") ?>
                                    <?php echo form_open('Main_Controller/dummy_child_records_generator', $form_attributes); ?>
                                        <div class="col-auto">
                                            <label for="staticEmail2">From:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="cg_startdate" name="cg_startdate" />
                                        </div>
                                        <div class="col-auto">
                                            <label for="staticEmail2">To:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="cg_enddate" name="cg_enddate" />
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="mb-3 btn btn-primary" name="searchreportdate">Generate report</button>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div id="nurse_generator" style="display:none">
                        <div class="container-fluid-settings">
                            <div class="shadow card">
                                <div class="py-3 card-header">
                                    <p class="m-0 text-primary font-weight-normal">Generate Nurse Report</p>
                                </div>
                                <div class="card-body">
                                    <?php $form_attributes = array("class" => "mt-2 row g-3") ?>
                                    <?php echo form_open('Main_Controller/dummy_nurse_generator', $form_attributes); ?>
                                        <div class="col-auto">
                                            <label for="staticEmail2">From:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="ng_startdate" name="ng_startdate" />
                                        </div>
                                        <div class="col-auto">
                                            <label for="staticEmail2">To:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="ng_enddate" name="ng_enddate" />
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="mb-3 btn btn-primary" name="searchreportdate">Generate report</button>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div> 


                    <div id="service_generator" style="display:none">
                        <div class="container-fluid-settings">
                            <div class="shadow card">
                                <div class="py-3 card-header">
                                    <p class="m-0 text-primary font-weight-normal">Generate Availed Services</p>
                                </div>
                                <div class="card-body">
                                    <?php $form_attributes = array("class" => "mt-2 row g-3") ?>
                                    <?php echo form_open('Main_Controller/dummy_service_generator', $form_attributes); ?>
                                        <div class="col-auto">
                                            <label for="staticEmail2">From:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="sg_startdate" name="sg_startdate" />
                                        </div>
                                        <div class="col-auto">
                                            <label for="staticEmail2">To:</label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="date" class="form-control" id="sg_enddate" name="sg_enddate" />
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="mb-3 btn btn-primary" name="searchreportdate">Generate report</button>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div> <?php // include '../includes/footer.php'; ?>
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
                    searchPlaceholder: "Search Activity Log"
                },
                columnDefs: [{
                    'targets': [6],
                    'orderable': false,
                }],
                "order": [
                    [0, "desc"]
                ],
                dom: 'Blfrtip',
                // dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5] //Your Column value those you want
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5] //Your Column value those you want
                        },
                    }, {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5] //Your Column value those you want
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