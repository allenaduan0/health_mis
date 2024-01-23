<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Create appointment</title>

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
        <div class="navbar-title"><a href="<?= BASE_URL ?>">HEALTH CENTER MANAGEMENT SYSTEM</a></div>
        <div class="wrapper ">

            <?php
            $page = 'appointment';
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

                        <h5 class="navbar-header-text">Create appointment</h5>
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

                        <?php // include 'bars/top_navbar.php'; ?>

                    </nav>

                    <!--MAIN CONTENT-->
                    <div class="container-fluid">
                        <div class="mb-3 row my-flex-card">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 shadow card">
                                            <div class="py-3 card-header">
                                                <p class="m-0 text-primary font-weight-normal">Appointment Information</p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" onsubmit="event.preventDefault(); add_appointment_user()">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label for="name">
                                                                    <span>Name</span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter Name" 
                                                                    id="name"
                                                                    name="name" 
                                                                    value="<?= $full_name ?>"
                                                                    disabled
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="name_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label for="service">Service<span class="text-danger"> * </span> </label>
                                                                <select class="form-control placeholder" id="service" name="service" required="required">
                                                                    <!-- <option value="">Select service</option>
                                                                    <option value="Behavioral Counseling">Behavioral Counseling</option>
                                                                    <option value="Dietary Counseling">Dietary Counseling</option>
                                                                    <option value="Diagnostic and Therapeutic Services">Diagnostic and Therapeutic Services</option>
                                                                    <option value="Emergency Care">Emergency Care</option>
                                                                    <option value="Dental care">Dental care</option>
                                                                    <option value="Wellness and Preventive Care">Wellness and Preventive Care</option>
                                                                    <option value="Laboratory">Laboratory</option> -->
                                                                </select>
                                                                <small class="text-danger">
                                                                    <p id="service_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="date"><span>Date</span> <span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="date" 
                                                                    placeholder="Select date" 
                                                                    id="date"
                                                                    name="date" 
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="date_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="time"><span>Time</span> <span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="time" 
                                                                    placeholder="Select time"
                                                                    id="time" 
                                                                    name="time" 
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="time_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="user_mobilenumber">
                                                                    <span> Mobile Number</span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter User Mobile Number" 
                                                                    id="user_mobilenumber"
                                                                    name="user_mobilenumber" 
                                                                    value="<?= $contact ?>"
                                                                    disabled
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="mobnum_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="concerns">
                                                            <span>Other concerns</span>
                                                        </label>
                                                        <textarea 
                                                            class="form-control" 
                                                            type="text" 
                                                            placeholder="Other concerns..." 
                                                            id="concerns"
                                                            name="concerns" 
                                                        >
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <button class="mt-3 btn btn-primary " type="submit" name="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php // include '../includes/footer.php'; ?>
            </div>

            <script>

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