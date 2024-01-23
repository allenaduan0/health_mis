<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller{

    public function __construct() {
        parent::__construct();

        $this->load->model("MainModel", "main_mdl", TRUE);
    }

    public function index() {
        error_reporting(0);
        $session_data = $this->session->userdata;
        if($session_data['logged_in']){

            $user_type      = $_SESSION['user_type'];

            if($user_type == "Admin" || $user_type == "Nurse" || $user_type == "Midwife" || $user_type == "Health worker"){
                $current_user   = $_SESSION['user_id'];
                $user_activity  = "Login successfully";
                $details        = "Login successfully";

                log_data($this, $current_user, $user_activity, $details);

                $this->load->view("dashboard");

                if (!isset($_SESSION['page_load_count'])) {
                    $_SESSION['page_load_count'] = 1;
                } else {
                    $_SESSION['page_load_count']++;
                }

                if ($_SESSION['page_load_count'] == 1) {
                    header("Refresh:0");
                }
            }else{
                $data['user_dash'] = $this->main_mdl->get_user_dashboard();

                $current_user   = $_SESSION['user_id'];
                $user_activity  = "Login successfully";
                $details        = "Login successfully";

                log_data($this, $current_user, $user_activity, $details);

                $this->load->view("nurse_dashboard", $data);

                if (!isset($_SESSION['page_load_count'])) {
                    $_SESSION['page_load_count'] = 1;
                } else {
                    $_SESSION['page_load_count']++;
                }

                if ($_SESSION['page_load_count'] == 1) {
                    header("Refresh:0");
                }
            }
            

        }else{
            $this->load->view("login");
        }


        // $this->load->view("dashboard");
        // $this->load->view("nurse_dashboard");
    }

    public function auto_add_patient() {
        $dummy = $this->input->post("dummy");
        $data_to_insert = $this->main_mdl->get_data_to_insert();

        foreach($data_to_insert AS $data){
            $empid      = $data['empid'];
            $user_fname = $data['user_fname'];
            $user_mname = $data['user_mname'];
            $user_lname = $data['user_lname'];
            $gender     = $data['gender'];
            $bday       = $data['bday'];
            $contact    = $data['contact_no'];
            $address    = $data['citymunicipality_name'] . " " .$data['province_name'];
            $username   = $data['username'];

            $this->db->where("user_id", $empid);
            $query = $this->db->get("patient");

            if($query->num_rows() === 0) {
                $data2 = array(
                            "user_id"   => $empid,
                            "f_name"    => $user_fname,
                            "m_name"    => $user_mname,
                            "l_name"    => $user_lname,
                            "gender"    => $gender,
                            "bday"      => $bday,
                            "contact"   => $contact,
                            "address"   => $address,
                            "type"      => "Auto Add",
                            "user_name"  => $username
                        );
                $this->db->insert("patient", $data2);

                $insert_id = $this->db->insert_id();

                $current_user   = 0;
                $user_activity  = "Auto Add User";
                $details        = "Auto Add Users. Id : " . $insert_id;

                log_data($this, $current_user, $user_activity, $details);

                echo "dummy";
            }
        }
    }

    public function restricted() {
        $this->load->view("restricted");
    }

    public function patient() {
        $data['patients']   = $this->main_mdl->get_patient_details();

        $this->load->view("patient", $data);
    }

    public function add_patient() {

        $this->load->view("add_patient");
    }

    public function add_patient_record() {
        $f_name     = $this->input->post("f_name");
        $m_name     = $this->input->post("m_name");
        $l_name     = $this->input->post("l_name");
        $address    = $this->input->post("address");
        $birthday   = $this->input->post("birthday");
        $gender     = $this->input->post("gender");
        $age        = $this->input->post("age");
        $contact    = $this->input->post("contact");

        $data = array(
                    "f_name"    => $f_name,
                    "m_name"    => $m_name,
                    "l_name"    => $l_name,
                    "address"   => $address,
                    "bday"      => $birthday,
                    "gender"    => $gender,
                    "age"       => $age,
                    "contact"   => $contact,
                    "user_name" => "Admin"
                );

        $this->db->insert("patient", $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add patient";
        $details        = "Added patient name '$f_name $m_name $l_name'. patient id :  $insert_id";

        log_data($this, $current_user, $user_activity, $details);

        echo "success";
    }

    public function patient_info($id) {

        $get_patients_data = $this->main_mdl->get_patients_id($id);

        foreach($get_patients_data AS $row) {
            $data['id']     = $row['id'];
            $data['f_name'] = $row['f_name'];
            $data['m_name'] = $row['m_name'];
            $data['l_name'] = $row['l_name'];
            $data['address'] = $row['address'];
            $data['bday']   = $row['bday'];
            $data['gender'] = $row['gender'];
            $data['age']    = $row['age'];
            $data['contact'] = $row['contact'];
        }

        $data['medical_records'] = $this->main_mdl->get_medical_records($id);


        $this->load->view("patient_info", $data);
    }

    public function medical_record($id) {

        $get_medical_clinic = $this->main_mdl->get_patient_medical_clinic($id);

        foreach($get_medical_clinic AS $res) {
            $data['cl_clinic_name']            = $res['clinic_name'];
            $data['cl_citymunicipality_name']  = $res['citymunicipality_name'];
            $data['cl_province_name']          = $res['province_name'];
            $data['cl_clinic_contactno']       = $res['clinic_contactno'];
            $data['cl_date_created']           = $res['date_created'];
            $data['cl_patient_id']             = $res['patient_id'];
            $data['cl_name']                   = $res['f_name'];
            $data['cl_bday']                   = $res['bday'];
            $data['cl_f_name']                 = $res['f_name'];
            $data['cl_l_name']                 = $res['l_name'];
            $data['cl_gender']                 = $res['gender'];
        }

        $data['patient_record'] = $this->main_mdl->patient_record($id);
        $get_medical_provider = $this->main_mdl->medical_provider($id);

        foreach($get_medical_provider AS $row) {
            $data['user_fname'] = $row['user_fname'];
            $data['user_lname'] = $row['user_lname'];
        }

        $this->load->view("medical_record", $data);
    }

    public function nurse() {
        $data['provinces'] = $this->main_mdl->get_provinces();

        $data['nurse_data'] = $this->main_mdl->get_nurse_data();

        $this->load->view("nurse", $data);
    }

    public function update_employee_stat() {
        $empid      = $this->input->post("empid");
        $emp_stat   = $this->input->post("emp_stat");
        $fname      = $this->input->post("fname");
        $lname      = $this->input->post("lname");
        $username   = $this->input->post("username");

        $data = array(
            'user_status' => $emp_stat,
        );
        
        $this->db->where('empid', $empid);
        $this->db->update('users', $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update User Status";
        $details        = "Employee name '$fname $lname', id '$empid', changed user status to '$emp_stat'";

        log_data($this, $current_user, $user_activity, $details);

        echo $fname . " ". $lname . " account status has changed to " . $emp_stat ;
    }

    public function update_user_security() {
        $empid        = $this->input->post("empid");
        $new_pass     = $this->input->post("new_pass");
        $confirm_pass = $this->input->post("confirm_pass");
        $fname        = $this->input->post("fname");
        $lname        = $this->input->post("lname");

        $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        $data = array("pass" => $hash_pass);

        $this->db->where("empid", $empid);
        $this->db->update("users", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update User's Password";
        $details        = "Updated password with name '$fname $lname', id '$empid'";

        log_data($this, $current_user, $user_activity, $details);

        echo $fname . " " . $lname . " password has been changed";
    }

    public function update_user_username() {
        $emloyeepid     = $this->input->post("emloyeepid");
        $user_username  = $this->input->post("user_username");
        $fname = $this->input->post("fname");
        $lname = $this->input->post("lname");

        $query = "SELECT empid FROM users WHERE username = '$user_username'";
        $result = $this->db->query($query);

        if($result->num_rows() > 0) {
            echo "Sorry, this username is already taken. Please try something different.";
        }else{
            $data = array("username" => $user_username);

            $this->db->where("empid", $emloyeepid);
            $this->db->update("users", $data);

            $current_user   = $_SESSION['user_id'];
            $user_activity  = "Update User's Information";
            $details        = "Updated username with name '$fname $lname', id '$emloyeepid'";

            log_data($this, $current_user, $user_activity, $details);

            echo $fname . " " . $lname . " username has been changed";
        }
    }

    public function update_user_info() {
        $uid                = $this->input->post("uid");
        $fname              = $this->input->post("fname");
        $mname              = $this->input->post("mname");
        $lname              = $this->input->post("lname");
        $gender             = $this->input->post("gender");
        $bday               = $this->input->post("bday");
        $citymunicipality   = $this->input->post("citymunicipality");
        $prov               = $this->input->post("email");
        $email              = $this->input->post("contactno");
        $contactno          = $this->input->post("contactno");
        $usertype           = $this->input->post("usertype");
        $status             = $this->input->post("status");

        $data = array(
                    "user_fname"    => $fname,
                    "user_mname"    => $mname,
                    "user_lname"    => $lname,
                    "gender"        => $gender,
                    "bday"          => $bday,
                    "city"          => $citymunicipality,
                    "province"      => $prov,
                    "email"         => $email,
                    "contact_no"    => $contactno,
                    "user_status"   => $status,
                    "user_type"     => $usertype
                );
        $this->db->where("empid", $uid);
        $this->db->update("users", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update User's Information";
        $details        = "Update user information with name '$fname $lname', id '$uid'";

        log_data($this, $current_user, $user_activity, $details);

        echo $fname . " " . $lname . " is successfully updated!";
    }

    public function child_report() {
        $data['child_data'] = $this->main_mdl->get_child_data();
        
        $this->load->view("child_report", $data);
    }

    public function add_child() {
        $data['child_province'] = $this->main_mdl->get_child_province();

        $this->load->view("add_child", $data);
    }

    public function add_child_data() {
        $userfname      = $this->input->post("userfname");
        $usermname      = $this->input->post("usermname");
        $userlname      = $this->input->post("userlname");
        $userbday       = $this->input->post("userbday");
        $usergender     = $this->input->post("usergender");
        $usercity       = $this->input->post("usercity");
        $userprovince   = $this->input->post("userprovince");
        $usermobileno   = $this->input->post("usermobileno");
        $height         = $this->input->post("height");
        $weight         = $this->input->post("weight");
        $vaccination    = $this->input->post("vaccination");

        $data = array(
                    "child_fname"   => $userfname,
                    "child_mname"   => $usermname,
                    "child_lname"   => $userlname,
                    "contact_no"    => $usermobileno,
                    "province"      => $userprovince,
                    "city"          => $usercity,
                    "bday"          => $userbday,
                    "gender"        => $usergender,
                    "height"        => $height,
                    "weight"        => $weight,
                    "vaccination"   => $vaccination,
                    "created_date"  => date("Y-m-d H:i:s")
                );

        $this->db->insert('child_report', $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add User";
        $details        = "Add child named '$userfname $userlname', id '$insert_id'";

        log_data($this, $current_user, $user_activity, $details);

        echo $userfname . " " . $userlname . " is successfully added!" ;
    }

    public function medicine() {
        $data['medicine_list']  = $this->main_mdl->medicine_list();

        $this->load->view("medicine", $data);
    }

    public function update_product_stock() {
        $stockid    = $this->input->post("stockid");
        $name       = $this->input->post("name");
        $quantity   = $this->input->post("quantity");
        $addstock   = $this->input->post("addstock");

        $new_stock = $quantity + $addstock;

        $data = array("quantity_on_hand" => $new_stock);

        $this->db->where("product_id", $stockid);
        $this->db->update("products", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add Stock";
        $details        = "Added new '$addstock' stock for the product name '$name', id '$stockid'";

        log_data($this, $current_user, $user_activity, $details);

        echo $name . " stock is successfully updated!" ;
    }

    public function delete_stocks() {
        $stockid = $this->input->post("stockid");

        $this->db->where("product_id", $stockid);
        $this->db->delete("products");

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Delete Stock";
        $details        = "Delete stock for the product id '$stockid', id '$stockid'";

        log_data($this, $current_user, $user_activity, $details);

        echo $stockid . " stock is successfully deleted!" ;
    }

    public function add_product() {

        $data['product_category'] = $this->main_mdl->get_product_category();

        $this->load->view("add_product", $data);
    }

    public function add_products() {
        $prodcategory   = $this->input->post("prodcategory");
        $name           = $this->input->post("name");
        $quantity       = $this->input->post("quantity");
        $description    = $this->input->post("description");

        $data = array(
                    "product_category"  => $prodcategory,
                    "product_name"      => $name,
                    "quantity_on_hand"  => $quantity,
                    "description"       => $description
                );

        $this->db->insert("products", $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add Product";
        $details        = "Added product name '$name', id '$insert_id'";

        log_data($this, $current_user, $user_activity, $details);

        echo $name . " was successfully added!";

    }

    public function appointment() {
        $data['appointment_list'] = $this->main_mdl->get_appointment_list();

        $this->load->view("appointment", $data);
    }

    public function update_apt_status() {
        $aptid        = $this->input->post("aptid");
        $aptstatus    = $this->input->post("aptstatus");
        $date         = $this->input->post("date");
        $time         = $this->input->post("time");
        $orig_aptstat = $this->input->post("orig_aptstat");
        $orig_date    = $this->input->post("orig_date");
        $orig_time    = $this->input->post("orig_time");
        $orig_service = $this->input->post("orig_service");
        $comment = $this->input->post("comment");

        $scheduled = "Scheduled";

        if (($aptid) <= 9) {
            $appointmentid  = 'APT-000';
            $appointmentid  .= $aptid;
        } elseif (($aptid) <= 99) {
            $appointmentid  = 'APT-00';
            $appointmentid  .= $aptid;
        } elseif (($aptid) <= 999) {
            $appointmentid =  'APT-0';
            $appointmentid  .= $aptid;
        } else {
            $appointmentid  =  'APT-';
            $appointmentid  .= $aptid;
        }

        if($aptstatus != $scheduled) {

            $data = array("status" => $aptstatus, "comment" => $comment);
            $this->db->where("id", $aptid);
            $this->db->update("appointment", $data);
    
            $current_user   = $_SESSION['user_id'];
            $user_activity  = "Update appointment status";
            $details        = "Appointment id '$aptid' was successfully changed to '$aptstatus'";

            log_data($this, $current_user, $user_activity, $details);

            echo $appointmentid . " is successfully updated";

        }else{
            $query = "SELECT 
                            * 
                        FROM 
                            appointment 
                        WHERE 
                            `date` = '$orig_date' AND `time` = '$orig_time' AND `status` = '$aptstatus'
                    ";
            $result = $this->db->query($query);

            if($result->num_rows() > 0){
                echo "Sorry, this schedule is already occupied. Please try again";
            }else{

                $data = array("status" => $aptstatus, "comment" => $comment);
                $this->db->where("id", $aptid);
                $this->db->update("appointment", $data);

                $current_user   = $_SESSION['user_id'];
                $user_activity  = "Update appointment status";
                $details        = "Appointment id '$aptid' was successfully changed to '$aptstatus'";

                log_data($this, $current_user, $user_activity, $details);

                echo $appointmentid . " is successfully updated";
            }
        }
    }

    public function update_appointment() {
        $id             = $this->input->post("id");
        $patientname    = $this->input->post("patientname");
        $service        = $this->input->post("service");
        $date           = $this->input->post("date");
        $time           = $this->input->post("time");
        $aptstatus      = $this->input->post("aptstatus");
        $orig_aptstat   = $this->input->post("orig_aptstat");
        $orig_date      = $this->input->post("orig_date");
        $orig_time      = $this->input->post("orig_time");
        $orig_service   = $this->input->post("orig_service");
        $comment        = $this->input->post("comment");

        $aptsched = 'Scheduled';

        if($aptstatus != $aptsched) {
            
            $data = array(
                        "service"   => $service,
                        "date"      => $date,
                        "time"      => $time,
                        "status"    => $aptstatus,
                        "comment"   => $comment
                    );

            $this->db->where("id", $id);
            $this->db->update("appointment", $data);

            $current_user   = $_SESSION['user_id'];
            $user_activity  = "Update appointment";
            $details        = "Update appointment id '$id'";

            log_data($this, $current_user, $user_activity, $details);

            echo $patientname . " appointment is successfully updated!";

        }else{
            if($orig_aptstat == $aptstatus && $orig_date == $date && $orig_time == $time){
                $data = array(
                    "service"   => $service,
                    "date"      => $date,
                    "time"      => $time,
                    "status"    => $aptstatus,
                    "comment"   => $comment
                );

                $this->db->where("id", $id);
                $this->db->update("appointment", $data);

                $current_user   = $_SESSION['user_id'];
                $user_activity  = "Update appointment";
                $details        = "Update appointment id '$id'";

                log_data($this, $current_user, $user_activity, $details);

                echo $patientname . " appointment is successfully updated!";

            }else{
                $query = "SELECT
                                *
                            FROM
                                appointment
                            WHERE
                                date = '$date' AND time = '$time'
                            AND
                                status = '$aptstatus'
                        ";
                $result = $this->db->query($query);

                if($result->num_rows() > 0) {
                    echo "Sorry, this schedule is already occupied. Please try again";
                }else{
                    $data = array(
                        "service"   => $service,
                        "date"      => $date,
                        "time"      => $time,
                        "status"    => $aptstatus,
                        "comment"   => $comment
                    );
    
                    $this->db->where("id", $id);
                    $this->db->update("appointment", $data);
    
                    $current_user   = $_SESSION['user_id'];
                    $user_activity  = "Update appointment";
                    $details        = "Update appointment id '$id'";
    
                    log_data($this, $current_user, $user_activity, $details);
    
                    echo $patientname . " appointment is successfully updated!";
                }
            }
        }
    }

    public function walk_in() {
        $data['patient_name'] = $this->main_mdl->walkin_patient_name();
        $data['services']   = $this->main_mdl->walkin_services();

        $this->load->view("walk_in", $data); 
    }

    public function settings() {

        $this->load->view("settings");
    }

    public function process_form() {

        $start_date = $this->input->post('startdate');
        $end_date   = $this->input->post('enddate');
 
        redirect('Main_Controller/audit_result/' . urlencode($start_date) . '/' . urlencode($end_date));
    }

    public function audit_result($start_date, $end_date) {
        // $start_date = urldecode($start_date);
        // $end_date   = urldecode($end_date);

        $data['attendance_report'] = $this->main_mdl->get_attendance_report($start_date, $end_date);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Generate audit trail";
        $details        = "Generate audit trail, from '$start_date' to '$end_date'";
    
        log_data($this, $current_user, $user_activity, $details);

        $this->load->view("attendance_report", $data);

    }

    public function reports() {

        $this->load->view("reports");
    }

    public function dummy_appointment_generator() {
        $start_date = $this->input->post('ag_startdate');
        $end_date   = $this->input->post('ag_enddate');
 
        redirect('Main_Controller/appointment_generator/' . urlencode($start_date) . '/' . urlencode($end_date));
    }

    public function appointment_generator($start_date, $end_date) {

        $data['appointment_generator'] = $this->main_mdl->appointment_generator($start_date, $end_date);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Generate appointment report";
        $details        = "Generate appointment report, from '$start_date' to '$end_date'";
    
        log_data($this, $current_user, $user_activity, $details);

        $this->load->view("generator_appointment", $data);
    }

    public function dummy_inventory_generator() {
        $start_date = $this->input->post('ig_startdate');
        $end_date   = $this->input->post('ig_enddate');
 
        redirect('Main_Controller/inventory_generator/' . urlencode($start_date) . '/' . urlencode($end_date));
    }

    public function inventory_generator($start_date, $end_date) {
        $data['inventory_generator'] = $this->main_mdl->inventory_generator($start_date, $end_date);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Generate inventory report";
        $details        = "Generate inventory report, from '$start_date' to '$end_date'";
    
        log_data($this, $current_user, $user_activity, $details);

        $this->load->view("generator_inventory", $data);
    }

    public function dummy_child_records_generator() {
        $start_date = $this->input->post('cg_startdate');
        $end_date   = $this->input->post('cg_enddate');
 
        redirect('Main_Controller/child_records_generator/' . urlencode($start_date) . '/' . urlencode($end_date));
    }

    public function child_records_generator($start_date, $end_date) {
        $data['child_records_generator'] = $this->main_mdl->child_records_generator($start_date, $end_date);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Generate child report";
        $details        = "Generate child report, from '$start_date' to '$end_date'";
    
        log_data($this, $current_user, $user_activity, $details);

        $this->load->view("generator_child_report", $data);
    }

    public function dummy_nurse_generator() {
        $start_date = $this->input->post('ng_startdate');
        $end_date   = $this->input->post('ng_enddate');
 
        redirect('Main_Controller/nurse_generator/' . urlencode($start_date) . '/' . urlencode($end_date));
    }

    public function nurse_generator($start_date, $end_date) {
        $data['nurse_generator'] = $this->main_mdl->nurse_generator($start_date, $end_date);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Generate  Nurse report";
        $details        = "Generate  Nurse report, from '$start_date' to '$end_date'";
    
        log_data($this, $current_user, $user_activity, $details);

        $this->load->view("generator_nurse", $data);
    }

    public function dummy_service_generator() {
        $start_date = $this->input->post('sg_startdate');
        $end_date   = $this->input->post('sg_enddate');
 
        redirect('Main_Controller/service_generator/' . urlencode($start_date) . '/' . urlencode($end_date));
    }

    public function service_generator($start_date, $end_date) {
        $data['service_generator'] = $this->main_mdl->service_generator($start_date, $end_date);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Generate  service report";
        $details        = "Generate  service report, from '$start_date' to '$end_date'";
    
        log_data($this, $current_user, $user_activity, $details);

        $this->load->view("generator_service", $data);
    }

    public function worker_activity() {
        
        $this->load->view("worker_activity");
    }

    public function dummy_worker_generator() {
        $start_date = $this->input->post('wo_startdate');
        $end_date   = $this->input->post('wo_enddate');
 
        redirect('Main_Controller/worker_generator/' . urlencode($start_date) . '/' . urlencode($end_date));
    }

    public function worker_generator($start_date, $end_date) {
        $data['worker_generator'] = $this->main_mdl->worker_generator($start_date, $end_date);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Generate audit trail";
        $details        = "Generate audit trail, from '$start_date' to '$end_date'";
    
        log_data($this, $current_user, $user_activity, $details);

        $this->load->view("generator_worker", $data);
    }

    public function queue_list() {
        $data['queue_list'] = $this->main_mdl->get_queue_list();

        $this->load->view("queue_list", $data);
    }

    public function add_new_patient() {
        $fname   = $this->input->post("fname"); 
        $mname   = $this->input->post("mname"); 
        $lname   = $this->input->post("lname"); 
        $address = $this->input->post("address");    
        // $contact = $this->input->post("contact"); 
        $bday    = $this->input->post("bday"); 
        $age     = $this->input->post("age"); 

        $data = array(
                    "f_name"    => $fname,
                    "m_name"    => $mname,
                    "l_name"    => $lname,
                    "address"   => $address,
                    "bday"      => $bday,
                    "age"       => $age,
                    "type"      => "Walk In",
                    "created_at" => date("Y-m-d H:i:s")
                );

        $this->db->insert("patient", $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add patient walk in";
        $details        = "Added patient name '$fname $mname $lname'. patient id :  $insert_id";

        log_data($this, $current_user, $user_activity, $details);

        echo "Walk In Patient Successfully Added!";
    }

    public function add_walkin() {
        $name    = $this->input->post("name");
        $date    = $this->input->post("date");
        $time    = $this->input->post("time");
        $service = $this->input->post("service");

        $get_patient_name = "SELECT f_name, l_name FROM patient WHERE id = '$name'";
        $result = $this->db->query($get_patient_name);

        foreach($result->result_array() AS $row){
            $fname = $row['f_name'];
            $lname = $row['l_name'];
        }

        $data = array(
                    "name"       => $fname . " ". $lname,
                    "service"    => $service,
                    "date"       => $date,
                    "time"       => $time,
                    "status"     => "Scheduled",
                    "type"       => "walk_in",
                    "created_at" => date("Y-m-d H:i:s")
                );
        $this->db->insert("appointment", $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add appointment walk in";
        $details        = "Added patient name '$fname $lname'. appointment id :  $insert_id";

        log_data($this, $current_user, $user_activity, $details);

        echo "Walk In Patient Successfully Scheduled!";
    }

    public function consultation() {
        $data['patients']   = $this->main_mdl->get_patient_details();

        $this->load->view("consultation", $data);
    }

    public function add_consultation() {
        $patient  = $this->input->post("patient");
        $findings = $this->input->post("findings");
        $desc     = $this->input->post("desc");
        $presc    = $this->input->post("presc");

        $data = array(
                    "patient_id"   => $patient,
                    "findings"     => $findings,
                    "prescription" => $presc,
                    "description"  => $desc,
                    "provider"     => $_SESSION['user_id'],
                    "date_created" => date("Y-m-d")
                );
        $this->db->insert("medical_records", $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add Medical Record";
        $details        = "Added medical record for patient id '$insert_id'";

        log_data($this, $current_user, $user_activity, $details);

        echo "Medical record is successfully added!";
    }

    public function manage_roles() {
        $data['get_users']  = $this->main_mdl->get_users_data();

        $this->load->view("roles", $data);
    }

    public function manage_vaccine() {
        $data['get_vaccines']  = $this->main_mdl->get_vaccines();

        $this->load->view("vaccine", $data);
    }

    public function manage_service() {
        $data['get_services'] = $this->main_mdl->get_services();

        $this->load->view("services", $data);
    }

    public function update_service_status() {
        $service_id = $this->input->post("service_id");
        $status     = $this->input->post("status");

        $data = array(
                    "status" => $status
                );
        $this->db->where("service_id", $service_id);
        $this->db->update("service", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update Service Status";
        $details        = "Updated Service Status";

        log_data($this, $current_user, $user_activity, $details);

        echo "Service Status Updated Successfully!";
    }

    public function add_service() {
        $name  = $this->input->post("name");
        $stat  = $this->input->post("stat");
        $price = $this->input->post("price");

        $data = array(
                    "name"    => $name,
                    "price"   => $price,
                    "status"  => $stat
                );
        $this->db->insert("service", $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add Service";
        $details        = "Added service record id '$insert_id'";

        log_data($this, $current_user, $user_activity, $details);

        echo "Service is successfully added!";
    }

    public function update_service() {
        $name  = $this->input->post("name");
        $price = $this->input->post("price");
        $id = $this->input->post("id");

        $data = array(
                    "name"    => $name,
                    "price"   => $price
                );
        $this->db->where("service_id", $id); 
        $this->db->update("service", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update Service";
        $details        = "Update service";

        log_data($this, $current_user, $user_activity, $details);

        echo "Service is successfully updated!";
    }

    public function delete_service() {
        $delete_id = $this->input->post("delete_id");

        $this->db->where("service_id", $delete_id);
        $this->db->delete("service");

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Delete Service";
        $details        = "Delete service for the service id '$delete_id', id '$delete_id'";

        log_data($this, $current_user, $user_activity, $details);

        echo $delete_id . " service is successfully deleted!" ;
    }

    public function add_user() {
        $data['provinces'] = $this->main_mdl->get_provinces();

        $this->load->view("add_user", $data);
    }

    public function add_user_account() {
        $userfname       = $this->input->post("userfname");
        $usermname       = $this->input->post("usermname");
        $userlname       = $this->input->post("userlname");
        $userbday        = $this->input->post("userbday");
        $usergender      = $this->input->post("usergender");
        $usercity        = $this->input->post("usercity");
        $userprovince    = $this->input->post("userprovince");
        $usermobileno    = $this->input->post("usermobileno");
        $useremail       = $this->input->post("useremail");
        $usertype        = $this->input->post("usertype");
        $user_username   = $this->input->post("user_username");
        $userpass        = $this->input->post("userpass");
        $userrpass       = $this->input->post("userrpass");
        $userstat        = "Inactive";

        $userpass = password_hash($userpass, PASSWORD_DEFAULT);

        $data = array(
                    "user_type"     => $usertype,
                    "user_status"   => $userstat,
                    "user_fname"    => $userfname,
                    "user_mname"    => $usermname,
                    "user_lname"    => $userlname,
                    "gender"        => $usergender,
                    "bday"          => $userbday,
                    "city"          => $usercity,
                    "province"      => $userprovince,
                    "email"         => $useremail,
                    "username"      => $user_username,
                    "pass"          => $userpass,
                    "contact_no"    => $usermobileno
                );

        $this->db->insert('users', $data);

        $insert_id = $this->db->insert_id();

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Add User";
        $details        = "Add User named : ". $userfname . " id : ". $insert_id;

        log_data($this, $current_user, $user_activity, $details);

        echo $userfname .' '. $userlname . " is successfully added!";
    }

    public function update_user_stat_settings() {
        $empid      = $this->input->post("empid");
        $emp_stat   = $this->input->post("emp_stat");
        $fname      = $this->input->post("fname");
        $lname      = $this->input->post("lname");
        $username   = $this->input->post("username");

        $data = array("user_status" => $emp_stat);

        $this->db->where("empid", $empid);
        $this->db->update("users", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update User Status";
        $details        = "Employee name '$fname $lname', id '$empid', changed user status to '$emp_stat'";

        log_data($this, $current_user, $user_activity, $details);

        echo $fname. ' '. $lname  . ' account status has changed to ' . $emp_stat ;
    }

    public function update_username_settings() {
        $emloyeepid     = $this->input->post("emloyeepid");
        $user_username  = $this->input->post("user_username");
        $fname          = $this->input->post("fname");
        $lname          = $this->input->post("lname");

        $final_user = trim($user_username);

        $query = "SELECT empid FROM users WHERE username='$final_user'";
        $result = $this->db->query($query);

        if($result->num_rows() > 0){
            echo "Sorry, this username is already taken. Please try something different.";
        }else{
            $data = array("username" => $final_user);
            $this->db->where("empid", $emloyeepid);
            $this->db->update("users", $data);

            $current_user   = $_SESSION['user_id'];
            $user_activity  = "Update User's Information";
            $details        = "Updated username with name '$fname $lname', id '$emloyeepid'";

            log_data($this, $current_user, $user_activity, $details);

            echo $fname. ' '. $lname  . ' username has been changed ';
        }


    }

    public function update_password_settings() {
        $empid        = $this->input->post("empid");
        $new_pass     = $this->input->post("new_pass");
        $confirm_pass = $this->input->post("confirm_pass");
        $fname        = $this->input->post("fname");
        $lname        = $this->input->post("lname");

        $final_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        $data = array("pass" => $final_pass);
        $this->db->where("empid", $empid);
        $this->db->update("users", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update User's Password";
        $details        = "Updated password with name '$fname $lname', id '$empid'";

        log_data($this, $current_user, $user_activity, $details);

        echo $fname. ' '. $lname  . ' password has been changed ';
    }

    public function update_userdata_settings() {
        $uid        = $this->input->post("uid");
        $fname      = $this->input->post("fname");
        $mname      = $this->input->post("mname");
        $lname      = $this->input->post("lname");
        $gender     = $this->input->post("gender");
        $bday       = $this->input->post("bday");
        $email      = $this->input->post("email");
        $contactno  = $this->input->post("contactno");
        $usertype   = $this->input->post("usertype");
        $status     = $this->input->post("status");

        $data = array(
                    "user_fname"    => $fname,
                    "user_mname"    => $mname,
                    "user_lname"    => $lname,
                    "gender"        => $gender,
                    "bday"          => $bday,
                    "email"         => $email,
                    "contact_no"    => $contactno,
                    "user_status"   => $status,
                    "user_type"     => $usertype
                );
        $this->db->where("empid", $uid);
        $this->db->update("users", $data);

        $current_user   = $_SESSION['user_id'];
        $user_activity  = "Update User's Information";
        $details        = "Update user information with name '$fname $lname', id '$uid'";

        log_data($this, $current_user, $user_activity, $details);

        echo $fname. ' '. $lname  . ' is successfully updated!';
    }

    public function create_appointment() {
        $id = $_SESSION['user_id'];

        $get_user_data = $this->main_mdl->get_user_dash_data($id);
        $get_services = $this->main_mdl->get_user_services();
        foreach($get_user_data as $row){
            $name    = $row['user_fname'] . " " . $row['user_mname'] . " " . $row['user_lname'];
            $contact = $row['contact_no'];
        }

        $data['full_name'] = $name;
        $data['contact']   = $contact;
        $data['services']  = $get_services;

        $this->load->view("create_appointment", $data);
    }

    public function add_appointment_user() {
        $name    = $this->input->post("name");
        $service = $this->input->post("service");
        $date    = $this->input->post("date");
        $time    = $this->input->post("time");
        $concern = $this->input->post("concern");
        $mobnum  = $this->input->post("mobnum");
        $stat    = $this->input->post("stat");

        $currentDateTime = new DateTime();
        $currentDate = $currentDateTime->format("Y-m-d");
        $currentTime = $currentDateTime->format("H:i:s");
        // echo $date;
        $nightValid = "18:00:00";

        $appointment_timestamp = strtotime($date);

        $time_difference = $appointment_timestamp - time();

        $days_difference = floor($time_difference / (60 * 60 * 24));

        if($days_difference > 14) {
            echo "Error: Appointment date is beyond 2 weeks from now.";
            return false;
        }

        if ($currentDate > $date || ($currentDate == $date && $currentTime >= $nightValid)){
            echo "In valid Date. We cannot appoint you in the past date!";
        }else{
            $user_id = $_SESSION['user_id'];

            $data = array(
                    "name"      => $name,
                    "service"   => $service,
                    "date"      => $date,
                    "time"      => $time,
                    "mob_num"   => $mobnum,
                    "concerns"  => $concern,
                    "status"    => $stat,
                    "apt_id"    => $user_id,
                    "type"      => "online",
                    "created_at" => date("Y-m-d H:i:s")
                );

            $this->db->insert("appointment", $data);

            $insert_id = $this->db->insert_id();

            $current_user   = $_SESSION['user_id'];
            $user_activity  = "Add User Appointment";
            $details        = "Add User Appointment  id : ". $insert_id;

            log_data($this, $current_user, $user_activity, $details);

            echo "You successfully added an appointment!";
        }

    }

    public function user_appointment() {
        $id = $_SESSION['user_id'];
        $data['get_apt'] = $this->main_mdl->get_appointment_user($id);
        
        $this->load->view("user_appointment", $data);
    }

    public function user_medical_history() {
        $id = $_SESSION['user_id'];
        
        $query = "SELECT id FROM patient WHERE user_id = $id LIMIT 1";
        $result = $this->db->query($query);
        foreach($result->result_array() as $row){
            $patient_id = $row['id'];
        }

        $data['med_record'] = $this->main_mdl->get_medical_history_user($patient_id);

        $this->load->view("user_medical_history", $data);
    }



    
    

}