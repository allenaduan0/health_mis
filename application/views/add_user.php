<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Add User </title>

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
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/reports.js"></script>

    </head>

    <body>
    <div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'settings';
            // include_once 'bars/sidebar.php';
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

                        <h5 class="navbar-header-text">Add User</h5>

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
                                                <p class="m-0 text-primary font-weight-normal">User Information</p>
                                            </div>
                                            <div class="card-body">
                                                <!-- <form id="form1" action="add_patient.result.php" method="POST"> -->
                                                <form method="POST" onsubmit="event.preventDefault(); add_user_account()">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="ze_user_fname">
                                                                    <span> First Name</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User First Name" 
                                                                    id="ze_user_fname"
                                                                    name="user_fname"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="ze_user_fname_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="ze_user_mname">
                                                                    <span> Middle Name</span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Middle Name" 
                                                                    id="ze_user_mname"
                                                                    name="user_mname" 
                                                                />

                                                                <small class="text-danger">
                                                                    <p id="ze_user_mname_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="user_lname">
                                                                    <span> Last Name</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Last Name"
                                                                    id="ze_user_lname" 
                                                                    name="user_lname"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="ze_user_lname_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="ze_user_bday"><span> Birthdate</span> <span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="date" 
                                                                    placeholder="Select Birthdate"
                                                                    id="ze_user_bday" 
                                                                    name="user_bday"  
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="ze_user_bday_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="ze_user_gender">Gender <span class="text-danger"> * </span> </label>
                                                                <select class="form-control placeholder" id="ze_user_gender" name="user_gender" required="required">
                                                                    <option value="">Select Gender</option>
                                                                    <option value="Male">Male </option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="ze_user_gender_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">

                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="ze_select_prov">Province<span class="text-danger"> * </span>
                                                                </label>
                                                                <select class="form-control" onchange="get_city_province()" id="ze_select_prov" name="select_prov">

                                                                    <option value='' disabled selected hidden>Select Province</option>
                                                                    <?php foreach($provinces AS $prov): ?>
                                                                        <option value="<?= $prov['id'] ?>"><?= $prov['province_name'] ?></option>
                                                                    <?php endforeach; ?>

                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="ze_select_city">City / Municipality<span class="text-danger"> * </span> </label>
                                                                <select class="form-control" id="ze_select_city" name="select_city">

                                                                        <option value='' disabled selected hidden>Select City / Municipality</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="ze_user_mobilenumber">
                                                                    <span> Mobile Number</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Mobile Number" 
                                                                    id="ze_user_mobilenumber"
                                                                    name="user_mobilenumber" 
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="ze_user_mobilenumber_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="ze_user_email">
                                                                    <span> E-mail</span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User E-mail" 
                                                                    id="ze_user_email"
                                                                    name="user_email"  
                                                                    required="required"
                                                                    oninput="check_email()"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="ze_user_email_error"></p>
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
                        <div class="mb-5 shadow card">
                            <div class="py-3 card-header">
                                <p class="m-0 text-primary font-weight-normal">Log in credentials</p>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ze_user_type">User Type <span class="text-danger"> * </span> </label>
                                            <select class="form-control placeholder" id="ze_user_type" name="user_type" required="required">
                                                <option value="">Select User Type</option>
                                                <option value="Admin">Admin </option>
                                                <option value="Midwife">Midwife</option>
                                                <option value="Nurse">Nurse</option>
                                                <option value="Health worker">Health worker</option>
                                            </select>
                                            <small class="text-danger">
                                                <p id="ze_user_type_error"></p>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ze_user_username">
                                                <span> Username</span> <span class="text-danger"> * </span>
                                            </label>
                                            <input 
                                                class="form-control" 
                                                type="text" 
                                                placeholder="Enter Username" 
                                                id="ze_user_username"
                                                name="user_username"
                                                required="required"
                                                oninput="check_username()"
                                            />
                                            <small class="text-danger">
                                                <p id="ze_user_username_error"></p>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ze_user_pass">
                                                <span> Password</span>
                                                <span class="text-danger"> * </span>
                                            </label>

                                            <div class="input-group" id="show_hide_password">
                                                <input 
                                                    class="form-control" 
                                                    type="password" 
                                                    minlength="8" 
                                                    placeholder="Enter User Password" 
                                                    id="ze_user_pass"
                                                    name="user_pass" 
                                                    required="required"
                                                />
                                                <div class="input-group-prepend input-group-addon">
                                                    <div class="input-group-text">
                                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <small class="text-danger">
                                                <p id="ze_user_pass_error"></p>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ze_user_rpass">
                                                <span> Repeat Password</span>
                                                <span class="text-danger"> * </span>
                                            </label>
                                            <div class="input-group" id="show_hide_password2">
                                                <input 
                                                    class="form-control" 
                                                    type="password" 
                                                    placeholder="Repeat Password" 
                                                    id="ze_user_rpass"
                                                    name="user_rpass" 
                                                    required="required"
                                                />
                                                <div class="input-group-prepend input-group-addon">
                                                    <div class="input-group-text">
                                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <small class="text-danger">
                                                <p id="ze_user_rpass_error"></p>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-danger ">
                                    <span> Please make sure all fields are filled in correctly </span>
                                </div>
                                <div class="form-group ">
                                    <button class="mt-3 btn btn-primary " type="submit" id="user_register_btn" name="submit">Submit</button>
                                </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

                <?php // include '../includes/footer.php'; ?>

            </div>



            <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>

            <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script> -->
            <script>
                // function getcity(val) {
                //     $.ajax({
                //         type: "POST",
                //         url: "get_citymunicipality.php",
                //         data: 'prov_id=' + val,
                //         success: function(data) {
                //             $("#city-list").html(data);
                //         }
                //     });
                // }
                $(document).ready(function() {
                    $("#show_hide_password a").on('click', function(event) {
                        event.preventDefault();
                        if ($('#show_hide_password input').attr("type") == "text") {
                            $('#show_hide_password input').attr('type', 'password');
                            $('#show_hide_password i').addClass("fa-eye-slash");
                            $('#show_hide_password i').removeClass("fa-eye");
                        } else if ($('#show_hide_password input').attr("type") == "password") {
                            $('#show_hide_password input').attr('type', 'text');
                            $('#show_hide_password i').removeClass("fa-eye-slash");
                            $('#show_hide_password i').addClass("fa-eye");
                        }
                    });
                    $("#show_hide_password2 a").on('click', function(event) {
                        event.preventDefault();
                        if ($('#show_hide_password2 input').attr("type") == "text") {
                            $('#show_hide_password2 input').attr('type', 'password');
                            $('#show_hide_password2 i').addClass("fa-eye-slash");
                            $('#show_hide_password2 i').removeClass("fa-eye");
                        } else if ($('#show_hide_password2 input').attr("type") == "password") {
                            $('#show_hide_password2 input').attr('type', 'text');
                            $('#show_hide_password2 i').removeClass("fa-eye-slash");
                            $('#show_hide_password2 i').addClass("fa-eye");
                        }
                    });
                });
            </script>

    </body>

    </html>