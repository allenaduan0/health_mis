<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Add Product </title>

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
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/main.js"></script>
        <!-- <script type="text/javascript" src="<?= BASE_URL ?>assets/js/script.js"></script> -->
    </head>

    <body>
        <div class="wrapper ">

            <?php
            $page = 'medicine';
            //include_once 'bars/sidebar.php';
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
                        <h5 class="navbar-header-text">Add Product</h5>
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
                                                <p class="m-0 text-primary font-weight-normal">Product Information</p>
                                            </div>
                                            <div class="card-body">
                                                <!-- <form id="form1" action="add_patient.result.php" method="POST"> -->
                                                <form method="POST" onsubmit="event.preventDefault(); add_products()">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="prod_name">
                                                                    <span> Product Name </span> <span class="text-danger"> * </span>
                                                                </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="text" 
                                                                    placeholder="Enter Product Name" 
                                                                    name="prod_name" 
                                                                    id="p_prod_name"
                                                                    required="required"
                                                                />
                                                                <small class="text-danger">
                                                                    <p id="p_name_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label for="prod_category">Product Category <span class="text-danger"> * </span> </label>
                                                                <select class="form-control placeholder" id="p_prod_category" name="prod_category" required="required">
                                                                    <option value="">Select Product Category</option>
                                                                    <?php foreach($product_category AS $res) :?>
                                                                        <option value="<?= $res['name'] ?>"><?= $res['name'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="prod_quantity">Quantity on Hand<span class="text-danger"> * </span> </label>
                                                                <input 
                                                                    class="form-control" 
                                                                    type="number" 
                                                                    min="0" 
                                                                    placeholder="Enter Quantity on Hand" 
                                                                    name="prod_quantity" 
                                                                    id="p_prod_quantity"
                                                                    required="required"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 col-12">
                                                            <div class="form-group">
                                                                <label for="exp_date">Expiration Date<span class="text-danger"> * </span>
                                                                </label>
                                                                <input class="form-control" type="date" id="exp_date" name="exp_date" required="required" />
                                                                <small class="text-danger">
                                                                    <p id="walk_date_error"></p>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="mt-2 mb-2 form-group">
                                                                    <label for="p_prod_det"><span>Product Details </span> <span class="text-danger"> * </span> </label>
                                                                    <textarea 
                                                                        class="form-control" 
                                                                        id="p_prod_det"
                                                                        name="prod_details" 
                                                                        rows="5" 
                                                                        required
                                                                    >

                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="mt-2 mb-2 form-group">
                                                                    <label for="prod_desc"><span>Product Description </span> <span class="text-danger"> * </span> </label>
                                                                    <textarea 
                                                                        class="form-control" 
                                                                        id="p_prod_desc"
                                                                        name="prod_desc" 
                                                                        rows="5" 
                                                                        required
                                                                    >

                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        
                                                    </div>
                                                    <div class="mt-3 text-danger ">
                                                        <span> Please make sure all fields are filled in correctly </span>
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


    </body>

    </html>