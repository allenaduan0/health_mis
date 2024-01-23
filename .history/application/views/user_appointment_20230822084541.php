<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.png">
    <title>My Appointment List </title>

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
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/user.js"></script>
</head>

<body>
    <div class="navbar-title"><a href="../dashboard.php">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
    <div class="wrapper ">

        <?php
        $page = 'appointment_list';
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
            <!--CONTENT-->
            <div class="content">

                <!--TOP NAVBAR/ HEADER-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
                    <button type="button" id="sidebarCollapse" class="btn menu-btn">
                        <i class="fa fa-align-justify"> </i>
                    </button>
                    <h5 class="navbar-header-text">My Appointment List</h5>
                    <?php //  include 'bars/top_navbar.php'; ?>
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
                    <div class="shadow card">
                        <div class="py-3 card-header">
                            <p class="m-0 text-primary font-weight-normal">Appointment List</p>
                        </div>
                        <div class="card-body">

                                <div class="table-responsive">
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

                                            <?php foreach($get_apt AS $fetch) : ?>
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
                                                    <td><?= $fetch['mob_num'] ?></td>
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
                                                            <?= $fetch['status'] ?>
                                                        </p>
                                                    </td>

                                                </tr>
                                            <?php
                                            endforeach
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php // include '../includes/footer.php'; ?>

        </div>


        <script>
            $('#dataTable').dataTable({
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
                ]

            });
        </script>
</body>

</html>