<?php

if(!function_exists('converter')) {

    function converter() {

    }
}

if(!function_exists('log_data')){

    function log_data($CI, $current_user, $user_activity, $details){

        date_default_timezone_set('Asia/Manila');

        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date("Y-m-d");
        $time = date('H:i:s', time());

        $data2 = array(
                    "ip_address"    => $ip,
                    "emp_id"        => $current_user,
                    "user_activity" => $user_activity,
                    "details"       => $details,
                    "date"          => $date,
                    "time"          => $time
                );
        
        $CI->db->insert('audit_trail', $data2);
    }
}