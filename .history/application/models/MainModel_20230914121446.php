<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function get_patient_details(){
        $query = "SELECT * FROM patient";
        return $this->db->query($query)->result_array();
    }

    public function get_user_dashboard() {
        $query = "SELECT * FROM service";
        return $this->db->query($query)->result_array();
    }

    public function walkin_services() {
        $query = "SELECT * FROM service ORDER BY name ASC";
        return $this->db->query($query)->result_array();
    }

    public function get_provinces() {
        $query = "SELECT * FROM province ORDER BY province_name";
        return $this->db->query($query)->result_array();
    }

    public function get_patients_id($id) {
        $query = "SELECT * FROM patient WHERE id = $id";
        return $this->db->query($query)->result_array();
    }

    public function get_medical_records($id){
        $query = "SELECT * FROM medical_records mr LEFT JOIN users u ON u.empid = mr.provider WHERE mr.patient_id = $id";
        return $this->db->query($query)->result_array();
    }

    public function get_data_to_insert() {
        $query = "SELECT 
                        a.empid,
                        a.user_fname,
                        a.user_mname,
                        a.user_lname,
                        a.gender,
                        a.contact_no,
                        a.bday,
                        a.username,
                        b.province_name,
                        c.citymunicipality_name
                    FROM
                        users a
                    LEFT JOIN
                        province b ON b.id = a.province
                    LEFT JOIN
                        city_municipality c ON c.id = a.city
                    WHERE
                        a.user_type = 'User' AND a.user_status = 'Active'
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_patient_medical_clinic($id) {
        $query = "SELECT 
                        *
                    FROM 
                        medical_records mr
                    LEFT JOIN 
                        patient p ON p.id = mr.patient_id
                    INNER JOIN 
                        company_info ci
                    LEFT JOIN 
                        city_municipality cm ON cm.id = ci.city
                    LEFT JOIN 
                        province prov ON prov.id = ci.province
                    WHERE
                        medical_records_id= '$id'
                ";
        return $this->db->query($query)->result_array();
    }

    public function patient_record($id) {
        $query = "SELECT 
                        * 
                    FROM 
                        medical_records mr
                    LEFT JOIN
                        patient p ON p.id = mr.patient_id
                    INNER JOIN
                        company_info
                    WHERE
                        medical_records_id = $id
                ";
        return $this->db->query($query)->result_array();
    }

    public function medical_provider($id){
        $query = "SELECT * FROM users u LEFT JOIN medical_records mr ON mr.provider = u.empid WHERE medical_records_id= $id";
        return $this->db->query($query)->result_array();
    }

    public function get_nurse_data() {
        $query ="SELECT
                    *
                FROM
                    users u
                LEFT JOIN
                    city_municipality cm ON cm.id = u.city
                LEFT JOIN
                    province prov ON prov.id = u.province
                WHERE
                    user_type = 'Nurse'
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_child_data(){
        $query ="SELECT
                    a.*,
                    b.province_name,
                    c.citymunicipality_name
                FROM
                    child_report a
                INNER JOIN
                    province b ON a.province = b.id
                INNER JOIN 
                    city_municipality c ON a.city = c.id
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_child_province() {
        $query = "SELECT * FROM province ORDER BY province_name";
        return $this->db->query($query)->result_array();
    }

    public function medicine_list() {
        $query = "SELECT
                        *
                    FROM
                        products i
                    LEFT JOIN
                        product_category pc ON pc.name = i.product_category
                ";

        return $this->db->query($query)->result_array();
    }

    public function get_product_category() {
        $query = "SELECT * FROM product_category ORDER BY name ASC";
        return $this->db->query($query)->result_array();
    }

    public function get_appointment_list() {
        $query = "SELECT * FROM appointment ORDER BY date DESC";
        return $this->db->query($query)->result_array();
    }

    public function get_attendance_report($start_date, $end_date){
        $query = "SELECT * FROM audit_trail au INNER JOIN users u ON au.emp_id = u.empid WHERE date BETWEEN '$start_date' AND '$end_date'";
        return $this->db->query($query)->result_array();
    }

    public function appointment_generator($start_date, $end_date) {
        $query = "SELECT * FROM appointment WHERE date BETWEEN '$start_date' AND '$end_date'";
        return $this->db->query($query)->result_array();
    }

    public function inventory_generator($start_date, $end_date) {
        $query = "SELECT * FROM products i LEFT JOIN product_category pc ON pc.name = i.product_category WHERE date_added BETWEEN '$start_date' AND '$end_date'";
        return $this->db->query($query)->result_array();
    }

    public function child_records_generator($start_date, $end_date) {
        $query = "SELECT
                        a.*,
                        b.province_name,
                        c.citymunicipality_name
                    FROM
                        child_report a
                    INNER JOIN 
                        province b ON a.province = b.id
                    INNER JOIN 
                        city_municipality c ON a.city = c.id
                    WHERE
                        created_date BETWEEN '$start_date' AND '$end_date'
                ";
        return $this->db->query($query)->result_array();
    }

    public function nurse_generator($start_date, $end_date) {
        $query = "SELECT
                        *
                    FROM
                        users u
                    LEFT JOIN 
                        city_municipality cm ON cm.id = u.city
                    LEFT JOIN 
                        province prov ON prov.id = u.province
                    WHERE 
                        user_type = 'nurse' AND created_date BETWEEN '$start_date' AND '$end_date'
                ";
        return $this->db->query($query)->result_array();
    }

    public function service_generator($start_date, $end_date) {
        $query = "SELECT * FROM appointment WHERE status = 'Completed' AND status='Scheduled' AND created_at BETWEEN '$start_date' AND '$end_date'";
        return $this->db->query($query)->result_array();
    }

    public function worker_generator($start_date, $end_date){
        $query = "SELECT 
                        * 
                    FROM 
                        audit_trail au 
                    INNER JOIN 
                        users u ON au.emp_id = u.empid
                    WHERE 
                        date BETWEEN '$start_date' AND '$end_date'
                    AND 
                        au.emp_id = 18
                ";
        // print_r($query);
        return $this->db->query($query)->result_array();
    }

    public function get_queue_list() {
        $query = "SELECT * FROM appointment WHERE status = 'Scheduled' ORDER BY date DESC";
        return $this->db->query($query)->result_array();
    }

    public function walkin_patient_name() {
        $query = "SELECT * FROM patient ORDER BY created_at DESC";
        return $this->db->query($query)->result_array();
    }

    public function get_users_data(){
        $query = "SELECT
                        *
                    FROM
                        users u
                    LEFT JOIN
                        city_municipality cm ON cm.id = u.city
                    LEFT JOIN
                        province prov ON prov.id = u.province
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_services() {
        $query = "SELECT * FROM service ORDER BY name ASC";
        return $this->db->query($query)->result_array();
    }

    public function get_vaccines() {
        $query = "SELECT * FROM vaccine ORDER BY name ASC";
        return $this->db->query($query)->result_array();
    }

    public function get_user_dash_data($id) {
        $query = "SELECT * FROM users WHERE empid = $id";
        return $this->db->query($query)->result_array();
    }

    public function get_appointment_user($id) {
        $query = "SELECT * FROM appointment WHERE apt_id = $id";
        return $this->db->query($query)->result_array();
    }

    public function get_medical_history_user($id) {
        $query = "SELECT * FROM medical_records WHERE patient_id = $id";
        return $this->db->query($query)->result_array();
    }

    public function get_user_services() {
        $query = "SELECT * FROM service";
        return $this->db->query($query)->result_array();
    }


}