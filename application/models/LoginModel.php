<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function get_citymunicipality() {

    }

    public function get_provinces() {
        $query = "SELECT * FROM province ORDER BY province_name";
        return $this->db->query($query)->result_array();
    }

    public function get_cities_by_province($province_id) {
        $query = "SELECT * FROM city_municipality WHERE province_id = $province_id ORDER BY citymunicipality_name";
        return $this->db->query($query)->result();
    }

    public function check_username($username) {
        
    }

    public function get_privacy_data($id){
        $query = $this->db->get_where('terms_conditions', array('id' => $id));
        // echo $this->db->last_query();
        return $query->row_array();
    }

    public function resolve_user_login($username, $password) {
        $this->db->select("pass");
        $this->db->from("users");
        $this->db->where("username", $username);
        $this->db->where("user_status", "Active");

        $hash = $this->db->get()->row("pass");

        return $this->verify_hash_password($password, $hash);
    }

    public function verify_hash_password($password, $hash){
        return password_verify($password, $hash);
    }

    public function get_user_id_from_username($username) {	
		$this->db->select('empid');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('empid');	
	}

    public function get_user($user_id) {
		$this->db->from('users');
		$this->db->where('empid', $user_id);
        
		return $this->db->get()->row();
	}

    public function get_access($id) {
        $query = "SELECT * FROM users WHERE emppid = $id";
        $result = $this->db->query($query)->result_array();


    }

    

}