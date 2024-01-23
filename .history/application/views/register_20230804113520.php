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
            max-height: 600px; /* Adjust this value as needed to fit your layout */
            overflow-y: auto;
            max-width: 800px;
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
                    <p>These Terms and Conditions ("Agreement") govern your use of the Health Center System ("System") provided by Barangay Malaya Health Center, located at Pililia, Rizal. By accessing and using the System, you agree to be bound by the terms and conditions set forth in this Agreement. If you do not agree with any of these terms, please refrain from using the System. System Usage 1.1 Access: You may access the System as a registered user, authorized staff member, or healthcare professional. 1.2 User Account: To access certain features of the System, you may be required to create a user account. You are responsible for maintaining the confidentiality of your account information, including your username and password. 1.3 Prohibited Activities: You agree not to use the System for any unlawful or unauthorized purpose. You shall not engage in any activity that could damage, disable, or impair the System functionality or interfere with other users access and use of the System. Privacy and Data Protection 2.1 Data Collection: By using the System, you acknowledge and agree that Barangay Malaya Health Center may collect and process certain personal information, including but not limited to, your name, contact details, medical history, and treatment records. Such data will be handled in accordance with applicable data protection laws and our Privacy Policy. 2.2 Data Security: Barangay Malaya Health Center takes reasonable measures to protect the confidentiality and integrity of the data stored in the System. However, we cannot guarantee absolute security, and you acknowledge that you provide information at your own risk. 2.3 Use of Data: Barangay Malaya Health Center may use aggregated and anonymized data derived from the System for research, statistical analysis, and improvement of healthcare services. Medical Advice and Disclaimer 3.1 Information Purposes Only: The content provided within the System, including but not limited to medical information, articles, and advice, is for informational purposes only. It should not be considered as a substitute for professional medical advice, diagnosis, or treatment. 3.2 Consultation: If you have specific health concerns or require medical attention, you should consult a qualified healthcare professional. Reliance on any information provided through the System is solely at your own risk. Intellectual Property 4.1 Ownership: The System and all related intellectual property rights are owned by Barangay Malaya Health Center or its licensors. You agree not to reproduce, modify, distribute, or create derivative works based on the System without prior written consent from Barangay Malaya Health Center. 4.2 Feedback: If you provide any feedback, suggestions, or ideas regarding the System, you grant Barangay Malaya Health Center a non-exclusive, worldwide, royalty-free, perpetual, and irrevocable license to use, modify, and incorporate such feedback into the System. Limitation of Liability 5.1 Disclaimer of Warranties: The System is provided "as is" and without warranties of any kind, whether express or implied. Barangay Malaya Health Center disclaims all warranties, including but not limited to, accuracy, reliability, and fitness for a particular purpose. 5.2 Limitation of Liability: Barangay Malaya Health Center shall not be liable for any direct, indirect, incidental, consequential, or special damages arising out of or in connection with the use of the System or inability to use the System, even if advised of the possibility of such damages. Modifications to the Agreement Barangay Malaya Health Center reserves the right to modify or update this Agreement at any time without prior notice. The revised terms will be effective upon posting within the System. Your continued use of the System after the modifications will signify your acceptance of the updated Agreement. Governing Law and Jurisdiction This Agreement shall be governed by and construed in accordance with the laws of the Republic of the Philippines. Any disputes arising out of or in connection with this Agreement shall be subject to the exclusive jurisdiction of the courts located in the Philippines. Please read this Agreement carefully before using the Health Center System. By accessing and using the System, you acknowledge that you have read, understood, and agreed to be bound by the terms and conditions outlined in this Agreement.</p>
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