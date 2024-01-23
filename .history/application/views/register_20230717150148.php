<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?= BASE_URL ?>assets/img/logo.png">
        <title>Register</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bower_components/dataTables.bootstrap4.min.css">  
        <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css " rel="stylesheet">

        <!-- OUR CUSTOM CSS-->
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">
        <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/form.css">


        <!-- JS CDN  -->
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery3.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bower_components/bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap4/bootstrap4.min.js"></script>
        <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js "></script>

        <script> var base_url = '<?= BASE_URL ?>'; </script>
        <script type="text/javascript" src="<?= BASE_URL ?>assets/js/login.js"></script>
        <!-- <script type="text/javascript" src="<?= BASE_URL ?>assets/js/script.js"></script> -->
        
        <style>

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            max-width: 400px;
            text-align: center;
        }
    </style>

    </head>

    <body>
    <?php

        // session_start();
        $agreementAccepted = isset($_SESSION['agreement_accepted']);

        if (!$agreementAccepted) {
            echo '
            <div class="popup">
                <div class="popup-content">
                    <h2>Terms and Conditions</h2>
                    <p>Please read and accept the terms and conditions before proceeding.</p>
                    <button class="btn btn-success" onclick="acceptAgreement()">I Agree</button>
                </div>
            </div>
            ';
        }
        ?>

        <script>
            function acceptAgreement() {
                sessionStorage.setItem('agreement_accepted', 'true');
                document.querySelector('.popup').remove();
            }
        </script>
        
        <!--MAIN CONTENT-->
        <div class="register-container">
        <div class="container-fluid-register">
            
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
                                    <form onsubmit="event.preventDefault(); register()">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="user_fname">
                                                        <span>First Name</span> <span class="text-danger"> * </span>
                                                    </label>
                                                    <input 
                                                        class="form-control" 
                                                        type="text" 
                                                        placeholder="Enter User First Name" 
                                                        name="user_fname" 
                                                        id="user_fname"
                                                        required="required"
                                                    />
                                                    <small class="text-danger">
                                                        <p id="userrfname_error"></p>
                                                        
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <label for="user_mname">
                                                        <span> Middle Name</span>
                                                    </label>
                                                    <input 
                                                        class="form-control" 
                                                        type="text" 
                                                        placeholder="Enter User Middle Name" 
                                                        name="user_mname" 
                                                        id="user_mname"
                                                    />

                                                    <small class="text-danger">
                                                        <p id="userrmname_error"></p>
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
                                                        name="user_lname" 
                                                        id="user_lname"
                                                        required="required"
                                                    />
                                                    <small class="text-danger">
                                                        <p id="userlname_error"></p>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="user_bday"><span> Birthdate</span> <span class="text-danger"> * </span> </label>
                                                    <input 
                                                        class="form-control" 
                                                        type="date" 
                                                        placeholder="Select Birthdate" 
                                                        name="user_bday" 
                                                        id="user_bday"
                                                        required="required"
                                                    />
                                                    <small class="text-danger">
                                                        <p id="userbday_error"></p>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="user_gender">Gender <span class="text-danger"> * </span> </label>
                                                    <select class="form-control placeholder" id="user_gender" name="user_gender" required="required">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male </option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <small class="text-danger">
                                                        <p id="usergender_error"></p>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="select_prov">Province<span class="text-danger"> * </span>
                                                    </label>
                                                    <select class="form-control" name="select_prov" id="select_prov" onchange="getCitiesbyProcvince()">
                                                        <option value='' disabled selected hidden>Select Province</option>
                                                        <?php foreach($provinces AS $province): ?>
                                                            <option value="<?= $province['id']?>"><?= $province['province_name']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <small class="text-danger">
                                                        <p id="userprov_error"></p>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="select_city">City / Municipality<span class="text-danger"> * </span> </label>
                                                    <select class="form-control" name="select_city" id="city-list">
                                                        <option value='' disabled selected hidden>Select City / Municipality</option>
                                                    </select>
                                                    <small class="text-danger">
                                                        <p id="usercity_error"></p>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="user_mobilenumber">
                                                        <span> Mobile Number</span> <span class="text-danger"> * </span>
                                                    </label>
                                                    <input 
                                                        class="form-control" 
                                                        type="text" 
                                                        placeholder="Enter User Mobile Number" 
                                                        name="user_mobilenumber" 
                                                        id="user_mobilenumber"
                                                        required="required"
                                                    />
                                                    <small class="text-danger">
                                                        <p id="usermobileno_error"></p>
                                                    </small>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="user_email">
                                                        <span> E-mail</span> <span class="text-danger"> * </span>
                                                    </label>
                                                    <input 
                                                        class="form-control" 
                                                        type="text" 
                                                        placeholder="Enter User E-mail" 
                                                        name="user_email" 
                                                        id="user_email"
                                                        required="required"
                                                        oninput="check_email()"
                                                    />
                                                    <small class="text-danger">
                                                        <p id="useremail_error" style="color:red"></p>
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
                    <p class="m-0 text-primary font-weight-normal">Security</p>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="user_type">User Type <span class="text-danger"> * </span> </label>
                                <select class="form-control placeholder" id="user_type" name="user_type" required="required" >
                                    <option value="">Select User Type</option>
                                    <option value="User">User</option>
                                </select>
                                <small class="text-danger">
                                    <p id="usertype_error"></p>
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="user_username">
                                    <span> Username</span> <span class="text-danger"> * </span>
                                </label>
                                <input 
                                    class="form-control" 
                                    type="text" 
                                    placeholder="Enter Username" 
                                    name="user_username" 
                                    id="user_username"
                                    required="required"
                                    oninput="check_username()"
                                />
                                <small class="text-danger">
                                    <p id="username_error" style="color:red"></p>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="user_pass">
                                    <span> Password</span>
                                    <span class="text-danger"> * </span>
                                </label>

                                <div class="input-group" id="show_hide_password">
                                    <input 
                                        class="form-control" 
                                        type="password" 
                                        minlength="8" 
                                        placeholder="Enter User Password" 
                                        name="user_pass" 
                                        id="user_pass"
                                        required="required"
                                    />
                                    <div class="input-group-prepend input-group-addon">
                                        <div class="input-group-text">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-danger">
                                    <p id="pass_error"></p>
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="user_rpass">
                                    <span> Repeat Password</span>
                                    <span class="text-danger"> * </span>
                                </label>
                                <div class="input-group" id="show_hide_password2">
                                    <input 
                                        class="form-control" 
                                        type="password" 
                                        placeholder="Repeat Password" 
                                        name="user_rpass" 
                                        id="user_rpass"
                                        required="required"
                                    />
                                    <div class="input-group-prepend input-group-addon">
                                        <div class="input-group-text">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <small class="text-danger">
                                    <p id="rpass_error"></p>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-danger ">
                        <span> Please make sure all fields are filled in correctly </span>
                    </div>
                    <div class="form-group ">
                        <button class="mt-3 btn btn-primary" type="submit" id="register_btn" name="submit">Register</button>
                        Already have an account? <span><a href="<?= BASE_URL ?>" class="mt-3 text-center text-primary">
                            Login
                        </a></span>
                    </div>
                    
                    </form>
                </div>

            </div>
        </div>
        </div>

    </body>

    </html>