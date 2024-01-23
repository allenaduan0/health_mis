<?php ?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Login History</title>

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
    <div class="navbar-title" ><a href="../dashboard.php">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'settings';
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
                        <h5 class="navbar-header-text">Login History</h5>
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
                                <p class="m-0 text-primary font-weight-normal">User Activity Log</p>
                            </div><div class="card-body">
                                        <hr>
                                        <div class="mt-4 table-responsive">
                                            <table id="dataTable" class="table table-bordered table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Log ID </th>
                                                        <th class="align-middle">IP Address </th>
                                                        <th class="align-middle">User Name</th>
                                                        <th class="align-middle">Date</th>
                                                        <th class="align-middle">Time</th>
                                                        <th class="align-middle">User Activity </th>
                                                        <th class="align-middle">Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($attendance_report AS $fetch): ?>
                                                        <tr>
                                                            <td><?php if (($fetch['id']) <= 9) {
                                                                    echo 'ACT-00000', $fetch['id'];
                                                                } elseif (($fetch['id']) <= 99) {
                                                                    echo 'ACT-0000', $fetch['id'];
                                                                } elseif (($fetch['id']) <= 999) {
                                                                    echo 'ACT-000', $fetch['id'];
                                                                } elseif (($fetch['id']) <= 999) {
                                                                    echo 'ACT-00', $fetch['id'];
                                                                } elseif (($fetch['id']) <= 999) {
                                                                    echo 'ACT-0', $fetch['id'];
                                                                } else {
                                                                    echo 'ACT-', $fetch['id'];
                                                                }  ?></td>
                                                            <td><?= $fetch['ip_address'] ?></td>
                                                            <td><?= $fetch['user_fname'], ' ', $fetch['user_lname'] ?></td>
                                                            <td>
                                                                <?php $dt = $fetch['date'];
                                                                $date = new DateTime($dt);
                                                                echo $date->format('m-d-Y'); ?>
                                                            </td>
                                                            <td>
                                                                <?php $tm = $fetch['time'];
                                                                $time = new DateTime($tm);
                                                                echo $time->format('h:i:s a'); ?>
                                                            </td>
                                                            <td><?= $fetch['user_activity'] ?></td>
                                                            <td>
                                                                <a 
                                                                    role="button" 
                                                                    class="btn btn-info text-light btn-sm" 
                                                                    data-toggle="modal" 
                                                                    href="#view-apt<?= $fetch['id']; ?>" 
                                                                    data-toggle-title="tooltip" 
                                                                    data-placement="bottom" 
                                                                    title="View Information"
                                                                >
                                                                    <i class="fa fa-info"></i>
                                                                    <span class="mobile-icon-only">Details</span>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <div class="modal fade" id="view-apt<?= $fetch['id']; ?>" tabindex="-1" aria-labelledby="view-apt" aria-hidden="true">
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
                                                                                <?= htmlspecialchars($fetch['ip_address']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">User's Name</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?= htmlspecialchars($fetch['user_fname']), ' ', htmlspecialchars($fetch['user_lname']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary ">Activity</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?= htmlspecialchars($fetch['user_activity']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2 row ">
                                                                            <div class="col-5">
                                                                                <div class="mb-2 text-right text-secondary">Details</div>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <?= htmlspecialchars($fetch['details']) ?>
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
                                                        //include '../includes/modal/view_info_of_user_act_log.php';
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                            </div>
                            </div>
                        </div>
                    </div> <?php // include '../includes/footer.php'; ?>
                </div>
            </div>


  
            <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"> </script>
            <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"> </script>
            <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
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
                            customize: function (doc) {
        var imgData = 'path/to/your/image.png'; // Local file path

        doc.content.splice(0, 0, {
            image: imgData,
            width: 50, // adjust the width as needed
            margin: [0, 0, 10, 0] // top, right, bottom, left margins
        });
    }}
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