<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller{

    public function __construct() {
        parent::__construct();

        $this->load->model("LoginModel", "login_mdl", TRUE);
    }

    public function index() {
        error_reporting(0);
        $this->load->view("login");
    }

    public function login() {
        $username    = $this->input->post("username_err");
        $password   = $this->input->post("password_err");

        if($this->login_mdl->resolve_user_login($username, $password)) {

            $user_id = $this->login_mdl->get_user_id_from_username($username);

            // $get_access = $this->login_mdl->get_access($user_id);
            $user    = $this->login_mdl->get_user($user_id);

            $_SESSION['logged_in']  = (bool)true;
            $_SESSION['user_id']    = (int)$user->empid;
            $_SESSION['username']   = (string)$user->username;
            $_SESSION['user_type']  = (string)$user->user_type;
            $_SESSION['user_stat']  = (string)$user->user_status;
            $_SESSION['first_name'] = (string)$user->user_fname;
            $_SESSION['last_name']  = (string)$user->user_lname;

            $_SESSION['page_load_count'] = 0;

            // header("Refresh:0");

            echo "Successfully Logged in!";

        }else{
            $current_user   = 1;
            $user_activity  = "Login was not successful";
            $details        = "Someone trying to login with incorrect credentials";

            log_data($this, $current_user, $user_activity, $details);

            echo "Invalid attempt - username password not matching";
        }

    }

    public function register() {
        // $data['cities']     = $this->login_mdl->get_citymunicipality();
        $data['provinces']  = $this->login_mdl->get_provinces();

        $this->load->view("register", $data);
    }

    public function terms_conditions() {

        $this->load->view("terms_conditions");
    }

    public function get_city_provinces() {
        $province_id = $this->input->post("province");

        $get_cities = $this->login_mdl->get_cities_by_province($province_id);
        echo json_encode($get_cities);
    }

    public function get_privacy_data() {
        $id = $this->input->get("id");
        
        $privacy_data = $this->login_mdl->get_privacy_data($id);

        header('Content-Type: application/json');
        echo json_encode($privacy_data);
    }

    public function register_user() {

        $userfname      = $this->input->post("userfname");
        $usermname      = $this->input->post("usermname");
        $userlname      = $this->input->post("userlname");
        $userbday       = $this->input->post("userbday");
        $usergender     = $this->input->post("usergender");
        $usercity       = $this->input->post("usercity");
        $userprovince   = $this->input->post("userprovince");
        $usermobileno   = $this->input->post("usermobileno");
        $useremail      = $this->input->post("useremail");
        $usertype       = $this->input->post("usertype");
        $user_username  = $this->input->post("user_username");
        $userpass       = $this->input->post("userpass");
        $userstat       = $this->input->post("userstat");

        $userpass = password_hash($userpass, PASSWORD_DEFAULT);
        
        $data = array(
                    "user_type" => $usertype,
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

        $current_user   = 1;
        $user_activity  = "Add User";
        $details        = "Add User named : ". $userfname . " id : ". $insert_id;

        log_data($this, $current_user, $user_activity, $details);
            
    }

    public function check_username() {
        $user_name = $this->input->post("user_name");

        $query = "SELECT * FROM users WHERE username = '$user_name'";

        $result = $this->db->query($query);

        if($result->num_rows() > 0) {
            echo "success";
        }else{
            echo "error";
        }
    }

    public function check_email() {
        $email = $this->input->post("email");

        $query = "SELECT * FROM users WHERE email = '$email'";

        $result = $this->db->query($query);

        if($result->num_rows() > 0) {
            echo "success";
        }else{
            echo "error";
        }
    }

    public function logout() {

		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION AS $key => $value) {
				unset($_SESSION[$key]);
			}

			redirect('/');
			
		} else {

			redirect('/');
			
		}
		
	}



}