$(document).ready(function() {
    auto_add_patient()
})

function auto_add_patient() {
    var dummy = "success auto add"

    $.ajax({
        url: base_url + "Main_Controller/auto_add_patient",
        type: "POST",
        data: {
            dummy: dummy
        },
        success: function(res) {
            console.log(res)
        }
    })
}

function audit_result() {
    var start_date  = $("#startdate").val()
    var end_date    = $("#enddate").val()

    $.ajax({
        url: base_url + "audit_result",
        type: "POST",
        data: {
            start_date:start_date,
            end_date:end_date
        },
        success: function(res){
            setTimeout(redirectAudit(), 2000);
        }
    })
}

function redirectAudit(){
    return window.location.href = base_url + "audit_result";
}

function show_filter() {
    var filter = $("#filter").val()

    if(filter == "appointment"){
        $("#appointment_generator").show()

        $("#inventory_generator").hide()
        $("#child_records_generator").hide()
        $("#nurse_generator").hide()
        $("#service_generator").hide()
    }else if(filter == "inventory") {
        $("#inventory_generator").show()

        $("#appointment_generator").hide()
        $("#child_records_generator").hide()
        $("#nurse_generator").hide()
        $("#service_generator").hide()
    }else if(filter == "child_records") {
        $("#child_records_generator").show()

        $("#appointment_generator").hide()
        $("#inventory_generator").hide()
        $("#nurse_generator").hide()
        $("#service_generator").hide()
    }else if(filter == "nurse") {
        $("#nurse_generator").show()

        $("#appointment_generator").hide()
        $("#inventory_generator").hide()
        $("#child_records_generator").hide()
        $("#service_generator").hide()
    }else if(filter == "service") {
        $("#service_generator").hide()

        $("#appointment_generator").show()
        $("#inventory_generator").hide()
        $("#child_records_generator").hide()
        $("#nurse_generator").hide()
    }else {
        alert("Please Choose a Report!")
    }
}

function update_service_status(id) {
    var service_id = $("#srv_user_id_"+id).val()
    var status     = $("#srv_user_stat_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_service_status",
        type: "POST",
        data: {
            service_id:service_id,
            status:status
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}

function redirectSettings(){
    return window.location.href = base_url + "settings";
}

function add_service() {
    var name = $("#mod_ser_name").val()
    var stat = $("#mod_user_stat").val()
    var price = $("#mod_price").val()

    $.ajax({
        url: base_url + "Main_Controller/add_service",
        type: "POST",
        data: {
            name:name,
            stat:stat,
            price:price
        },
        success: function(res){
            var final = res.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}

function add_vaccine() {
    var name = $("#vaccine_name").val()
    var qty = $("#vaccine_qty").val()

    $.ajax({
        url: base_url + "Main_Controller/add_vaccine",
        type: "POST",
        data: {
            name:name,
            qty:qty
        },
        success: function(res){
            var final = res.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}


function update_service(id) {
    var name = $("#ser_upt_name_"+id).val()
    var price = $("#ser_apt_price_"+id).val()
    var id = $("#ser_apt_id_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_service",
        type: "POST",
        data: {
            name:name,
            price:price,
            id:id
        },
        success: function(res){
            var final = res.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}

function delete_service(id) {
    var delete_id = $("#d_serviceid_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/delete_service",
        type: "POST",
        data: {
            delete_id:delete_id  
        },
        success: function(response) {
            var final = response.trim() 

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}

function get_city_province(){
    var province = $("#ze_select_prov").val()

    $.ajax({
        url: 'Login_Controller/get_city_provinces',
        type: 'POST',
        dataType: 'json',
        data: {
             province: province 
        },
        success: function(response) {
            let cityDropdown = $('#ze_select_city');
            cityDropdown.empty();
            $.each(response, function(index, city) {
                cityDropdown.append('<option value="' + city.id + '">' + city.citymunicipality_name + '</option>');
            });
        }
    })
}

function add_user_account() {
    var userfname       = (document.getElementById('ze_user_fname').value).charAt(0).toUpperCase() + (document.getElementById('ze_user_fname').value).slice(1)
    var usermname       = (document.getElementById('ze_user_mname').value).charAt(0).toUpperCase() + (document.getElementById('ze_user_mname').value).slice(1)
    var userlname       = (document.getElementById('ze_user_lname').value).charAt(0).toUpperCase() + (document.getElementById('ze_user_lname').value).slice(1)
    var userbday        = $("#ze_user_bday").val()
    var usergender      = $("#ze_user_gender").val()
    var usercity        = $("#ze_select_city").val()
    var userprovince    = $("#ze_select_prov").val()
    var usermobileno    = $("#ze_user_mobilenumber").val()
    var useremail       = $("#ze_user_email").val()
    var usertype        = $("#ze_user_type").val()
    var user_username   = $("#ze_user_username").val()
    var userpass        = $("#ze_user_pass").val()
    var userrpass       = $("#ze_user_rpass").val()

    var regexname     = /^[a-zA-Z\s\,\-]+$/;
    var regexaddress  = /^[a-zA-Z0-9\d\s\.\-]+$/;
    var regexmobileno = /^[09|+639]+[0-9\d]{10}$/;
    var regexemail    = /^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d]{2,}$/;
    var regexpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;


    if(userfname == "") {
        document.getElementById("ze_user_fname_error").innerHTML = "Please enter user first name"
        return false
    }else if(!regexname.test(userfname)) {
        document.getElementById("ze_user_fname_error").innerHTML = "Please enter a valid first name"
        return false
    }

    if(!regexname.test(usermname)) {
        document.getElementById("ze_user_mname_error").innerHTML = "Please enter a valid middle name"
        return false
    } 
    
    if(userlname == "") {
        document.getElementById("ze_user_lname_error").innerHTML = "Please enter user last name"
        return false
    }else if(!regexname.test(userlname)) {
        document.getElementById("ze_user_lname_error").innerHTML = "Please enter a valid last name"
        return false
    }

    if(userbday == "") {
        document.getElementById("ze_user_bday_error").innerHTML = "Please select a birthdate"
        return false
    }

    if(usergender == "") {
        document.getElementById("ze_user_gender").innerHTML = "Please select a gender"
        return false
    }

    if(usermobileno == "") {
        document.getElementById("ze_user_mobilenumber_error").innerHTML = "Please enter mobile number"
        return false
    }else if(!regexmobileno.test(usermobileno)) {
        document.getElementById("ze_user_mobilenumber_error").innerHTML = "Please enter a valid character or follow the format (09XXXXXXXXX or +639XXXXXXXXX)"
        return false
    }

    if(useremail == "") {
        document.getElementById("ze_user_email_error").innerHTML = "Please enter user email address"
        return false
    }else if(!regexemail.test(useremail)) {
        document.getElementById("ze_user_email_error").innerHTML = "Please enter a valid email address"
        return false
    }

    if(usertype == "") {
        document.getElementById("ze_user_type").innerHTML = "Please enter a usertype"
        return false
    }

    if(user_username == "") {
        document.getElementById("ze_user_username_error").innerHTML = "Please enter a username"
        return false
    }

    if(userpass == "") {
        document.getElementById("ze_user_pass_error").innerHTML = "Please enter user password"
        return false
    }else if(!regexpassword.test(userpass)) {
        document.getElementById("ze_user_pass_error").innerHTML = "Your password must contain 8 or more characters with a mix of upper and lowercase letters, numbers & symbols"
        return false
    }

    if(userrpass == "") {
        document.getElementById("ze_user_rpass_error").innerHTML = "Please repeat password"
        return false
    }else if(userrpass !== userpass) {
        document.getElementById("ze_user_rpass_error").innerHTML = "Password did not match"
        return false
    }

    $.ajax({
        base_url: base_url + "Main_Controller/add_user_account",
        type: "POST",
        data:{
            userfname:userfname,
            usermname:usermname,
            userlname:userlname,
            userbday:userbday,
            usergender:usergender,
            usercity:usercity,
            userprovince:userprovince,
            usermobileno:usermobileno,
            useremail:useremail,
            usertype:usertype,
            user_username:user_username,
            userpass:userpass,
            userrpass:userrpass
        },
        success: function(res) {
            var final = res.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })


}

function check_email() {
    var email = $("#ze_user_email").val()

    $.ajax({
        url: base_url + "Login_Controller/check_email",
        type: "POST",
        data: {
            email:email
        },
        success:function(response){
            final = response.trim()

            if(final == "success"){
                document.getElementById("ze_user_email_error").innerHTML = "Email Address already existed!"
                document.getElementById("user_register_btn").style.visibility = "hidden";
            }else{
                document.getElementById("ze_user_email_error").innerHTML = ""
                document.getElementById("user_register_btn").style.visibility = "visible";
            }
        }
    })
}

function check_username() {
    var user_name = $("#ze_user_username").val()

    $.ajax({
        url: base_url + "Login_Controller/check_username",
        type: "POST",
        data: {
            user_name:user_name
        },
        success:function(response){
            final = response.trim()

            if(final == "success"){
                document.getElementById("ze_user_username_error").innerHTML = "Username already existed!"
                document.getElementById("user_register_btn").style.visibility = "hidden";
            }else{
                document.getElementById("ze_user_username_error").innerHTML = ""
                document.getElementById("user_register_btn").style.visibility = "visible";
            }
        }
    })
}

function update_user_status_settings(id) {
    var empid       = $("#stat_id_"+id).val()
    var emp_stat    = $("#stat_user_stat_"+id).val()
    var fname       = $("#stat_fname_"+id).val()
    var lname       = $("#stat_lname_"+id).val()
    var username    = $("#stat_username_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_user_stat_settings",
        type: "POST",
        data: {
            empid:empid,
            emp_stat:emp_stat,
            fname:fname,
            lname:lname,
            username:username
        },
        success: function(response){
            var final = response.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}

function update_user_username_settings(id) {
    var emloyeepid      = $("#usr_employeeid_"+id).val()
    var user_username   = $("#usr_username_"+id).val()
    var fname           = $("#usr_fname_"+id).val()
    var lname           = $("#usr_lname_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_username_settings",
        type: "POST",
        data: {
            emloyeepid:emloyeepid,
            user_username:user_username,
            fname:fname,
            lname:lname
        },
        success: function(res){
            var final = res.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}

function updated_user_password_settings(id) {
    var empid        = $("#pss_empid_"+id).val()
    var new_pass     = $("#pss_user_newpass_"+id).val()
    var confirm_pass = $("#pss_user_confirm_pass_"+id).val()
    var fname        = $("#pss_fname_"+id).val()
    var lname        = $("#pss_lname_"+id).val()

    var regexpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;

    if(new_pass == "") {
        document.getElementById("pss_user_newpass_error_"+id).innerHTML = "Please enter user password"
        return false
    }else if(!regexpassword.test(new_pass)) {
        document.getElementById("pss_user_newpass_error_"+id).innerHTML = "Your password must contain 8 or more characters with a mix of upper and lowercase letters, numbers & symbols"
        return false
    }

    if(confirm_pass == "") {
        document.getElementById("pss_user_newpass_error_"+id).innerHTML = "Please repeat password"
        return false
    }else if(confirm_pass !== new_pass) {
        document.getElementById("pss_user_newpass_error_"+id).innerHTML = "Password did not match"
        return false
    }

    $.ajax({
        url: base_url + "Main_Controller/update_password_settings",
        type: "POST",
        data: {
            empid:empid,
            new_pass:new_pass,
            confirm_pass:confirm_pass,
            fname:fname,
            lname:lname,
        },
        success:function(res){
            var final = res.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);

        }
    })
}

function update_user_data_settings(id) {
    var uid       = $("#ne_userid_"+id).val()
    var fname     = $("#ne_fname_"+id).val()
    var mname     = $("#ne_mname_"+id).val()
    var lname     = $("#ne_lname_"+id).val()
    var gender    = $("#ne_gender_"+id).val()
    var bday      = $("#ne_bday_"+id).val()
    var email     = $("#ne_email_"+id).val()
    var contactno = $("#ne_contactno_"+id).val()
    var usertype  = $("#ne_user_type_"+id).val()
    var status    = $("#ne_user_stat_"+id).val()

    var regexname     = /^[a-zA-Z\s\,\-]+$/;
    var regexmobileno = /^[09|+639]+[0-9\d]{10}$/;
    var regexemail    = /^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d]{2,}$/;

    if(!regexname.test(fname)) {
        alert("Please enter a valid first name")
        return false
    }

    if(!regexname.test(mname)) {
        alert("Please enter a valid middle name")
        return false
    }

    if(!regexname.test(lname)) {
        alert("Please enter a valid last name")
        return false
    }

    if(!regexmobileno.test(contactno)) {
        alert("Please enter a valid mobile number or follow the format (09XXXXXXXXX or +639XXXXXXXXX)")
        return false
    }

    if(!regexemail.test(email)) {
        alert("Please enter a valid email address")
        return false
    }

    $.ajax({
        url: base_url + "Main_Controller/update_userdata_settings",
        type: "POST",
        data: {
            uid:uid,
            fname:fname,
            mname:mname,
            lname:lname,
            gender:gender,
            bday:bday,
            email:email,
            contactno:contactno,
            usertype:usertype,
            status:status
        },
        success: function(res){
            var final = res.trim()

            alert(final)

            setTimeout(redirectSettings(), 2000);
        }
    })
}