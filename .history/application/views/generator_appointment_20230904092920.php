<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Appointment report</title>

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
        <div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
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
                        <h5 class="navbar-header-text">Appointment report</h5>
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
                        <div class="shadow card">
                            <div class="py-3 card-header">
                                <p class="m-0 text-primary font-weight-normal">Appointment report</p>
                            </div>
                            <div class="card-body">
                                        <hr>
                                        <div class="mt-4 table-responsive">
                                            <table id="dataTable" class="table table-bordered table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Appointment ID </th>
                                                        <th class="align-middle">Patient Name </th>
                                                        <th class="align-middle">Service</th>
                                                        <th class="align-middle">Date </th>
                                                        <th class="align-middle">Time </th>
                                                        <th class="align-middle">Other Concerns </th>
                                                        <th class="align-middle">Mobile number</th>
                                                        <th class="align-middle">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($appointment_generator AS $fetch): ?>
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
                                                            <td><?php echo $fetch['name'] ?></td>
                                                            <td><?php echo $fetch['service'] ?></td>
                                                            <td> <?php
                                                                    $source =  $fetch['date'];
                                                                    $date = new DateTime($source);
                                                                    echo $date->format('F d\, Y');
                                                                    ?></td>
                                                            <td> <?php
                                                                    $source =  $fetch['time'];
                                                                    $date = new DateTime($source);
                                                                    echo $date->format('h:i a'); // 31-07-2012
                                                                    ?></td>
                                                            <td>
                                                                <?php if (($fetch['concerns']) == "") {
                                                                    echo 'No other concerns';
                                                                } else {
                                                                    echo $fetch['concerns'];
                                                                }  ?></td>
                                                            <td><?php echo $fetch['mob_num'] ?></td>
                                                            <td class="<?php if ($fetch['status'] == 'Pending') {
                                                                            echo " bg-secondary";
                                                                        } elseif ($fetch['status'] == 'Scheduled') {
                                                                            echo " bg-primary";
                                                                        } elseif ($fetch['status'] == 'Cancelled') {
                                                                            echo " bg-danger";
                                                                        } elseif ($fetch['status'] == 'Completed') {
                                                                            echo " bg-success";
                                                                        } elseif ($fetch['status'] == 'No Show') {
                                                                            echo " bg-dark";
                                                                        } ?>">
                                                                <p class="h6 <?php if ($fetch['status'] == 'Pending') {
                                                                                    echo "text-white";
                                                                                } elseif ($fetch['status'] == 'Scheduled') {
                                                                                    echo "text-white";
                                                                                } elseif ($fetch['status'] == 'Cancelled') {
                                                                                    echo "text-white";
                                                                                } elseif ($fetch['status'] == 'Completed') {
                                                                                    echo "text-white";
                                                                                } elseif ($fetch['status'] == 'No Show') {
                                                                                    echo "text-white";
                                                                                } ?>">
                                                                    <?php echo $fetch['status'] ?>
                                                                </p>
                                                            </td>

                                                        </tr>

                                                        <div class="modal fade" id="view-apt<?php echo $fetch['id']; ?>" tabindex="-1" aria-labelledby="view-apt" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"><?php if (($fetch['id']) <= 9) {
                                                                                                        echo 'LOG-00000', $fetch['id'];
                                                                                                    } elseif (($fetch['id']) <= 99) {
                                                                                                        echo 'LOG-0000', $fetch['id'];
                                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                                        echo 'LOG-000', $fetch['id'];
                                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                                        echo 'LOG-00', $fetch['id'];
                                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                                        echo 'LOG-0', $fetch['id'];
                                                                                                    } else {
                                                                                                        echo 'LOG-', $fetch['id'];
                                                                                                    }  ?></h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                    </div>
                                                                    <div class="mt-3 mb-3 ml-5 mr-5 modal-body">
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary"> Log ID</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php if (($fetch['id']) <= 9) {
                                                                                        echo 'LOG-00000', $fetch['id'];
                                                                                    } elseif (($fetch['id']) <= 99) {
                                                                                        echo 'LOG-0000', $fetch['id'];
                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                        echo 'LOG-000', $fetch['id'];
                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                        echo 'LOG-00', $fetch['id'];
                                                                                    } elseif (($fetch['id']) <= 999) {
                                                                                        echo 'LOG-0', $fetch['id'];
                                                                                    } else {
                                                                                        echo 'LOG-', $fetch['id'];
                                                                                    }  ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary"> IP Address</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php echo htmlspecialchars($fetch['ip_address']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">User's Name</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php echo htmlspecialchars($fetch['user_fname']), ' ', htmlspecialchars($fetch['user_lname']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary ">Activity</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php echo htmlspecialchars($fetch['user_activity']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">Details</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php echo htmlspecialchars($fetch['details']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary"> Date</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php $dt = $fetch['date'];
                                                                                    $date = new DateTime($dt);
                                                                                    echo $date->format('m-d-Y'); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">Time</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?php $tm = $fetch['time'];
                                                                                    $time = new DateTime($tm);
                                                                                    echo $time->format('h:i:s a'); ?>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php
                                                        // include '../../includes/modal/view_info_of_user_act_log.php';
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div> <?php // include '../../includes/footer.php'; ?>
            </div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>


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
                        customize: function (doc) {
                // Create a new jsPDF instance
                var pdf = new jsPDF();

                // Add the logo to the PDF
                var imgData = 'path/to/your/logo.png'; // Replace with your logo's path
                pdf.addImage(imgData, 'PNG', 10, 10, 40, 40); // Adjust coordinates and dimensions as needed

                // Modify other PDF properties as needed
                pdf.setPageMargins(10, 50, 10, 10); // Adjust margins
                pdf.setFontSize(12); // Set font size

                // Add the content from DataTables to the PDF using jspdf-autotable
                var table = pdf.autoTableHtmlToJson(document.getElementById('dataTable'));
                pdf.autoTable(table.columns, table.data, {
                    startY: 60, // Adjust the starting position
                });

                // Save the PDF
                pdf.save('table.pdf');
            }
                    }, 
                    {
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