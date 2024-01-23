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

function add_patient() {
    var f_name   = $("#f_name").val()
    var m_name   = $("#m_name").val()
    var l_name   = $("#l_name").val()
    var address  = $("#address").val()
    var birthday = $("#bday").val()
    var gender   = $("#gender").val()
    var age      = $("#age").val()
    var contact  = $("#contact").val()

    var regexname = /^[a-zA-Z0-9\d\s.\-\/()\&]+$/

    if(f_name == ""){
        document.getElementById("f_name_error").innerHTML = "Please enter patient first name"
        return false
    } else if (!regexname.test(f_name)) {
        document.getElementById("f_name_error").innerHTML = "Please enter valid patient first name"
        return false
    }

    if(m_name == ""){
        document.getElementById("m_name_error").innerHTML = "Please enter patient middle name"
        return false
    } else if (!regexname.test(m_name)) {
        document.getElementById("m_name_error").innerHTML = "Please enter valid patient middle name"
        return false
    }

    if(l_name == ""){
        document.getElementById("l_name_error").innerHTML = "Please enter patient last name"
        return false
    } else if (!regexname.test(l_name)) {
        document.getElementById("l_name_error").innerHTML = "Please enter valid patient last name"
        return false
    }

    if(address == ""){
        document.getElementById("address_error").innerHTML = "Please enter address"
        return false
    }

    if(birthday == ""){
        document.getElementById("bday_error").innerHTML = "Please enter birthday"
        return false
    }

    if(gender == ""){
        document.getElementById("gender_error").innerHTML = "Please enter gender"
        return false
    }

    if(age == ""){
        document.getElementById("age_error").innerHTML = "Please enter age"
        return false
    }

    if(contact == ""){
        document.getElementById("contact_error").innerHTML = "Please enter contact"
        return false
    }

    $.ajax({
        url: base_url + "Main_Controller/add_patient_record",
        type: "POST",
        data: {
            f_name:f_name,
            m_name:m_name,
            l_name:l_name,
            address:address,
            birthday:birthday,
            gender:gender,
            age:age,
            contact:contact
        },
        success: function(response){
            var final = response.trim()

            if(final == "success"){
                alert(f_name + " was successfully added!")

                setTimeout(redirectPatient(), 2000);
            }
            
        }
    })
    
    
}

function redirectPatient(){
    return window.location.href = base_url + "patient";
}

function update_employee_status(id) {
    var empid       = $("#id_"+id).val()
    var emp_stat    = $("#user_stat_"+id).val()
    var fname       = $("#fname_"+id).val()
    var lname       = $("#lname_"+id).val()
    var username    = $("#username_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_employee_stat",
        type: "POST",
        data: {
            empid:empid,
            emp_stat:emp_stat,
            fname:fname,
            lname:lname,
            username:username
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function update_user_security(id) {
    var empid        = $("#sec_empid_"+id).val()
    var new_pass     = $("#sec_user_newpass_"+id).val()
    var confirm_pass = $("#sec_user_confirmpass_"+id).val()
    var fname        = $("#sec_fname_"+id).val()
    var lname        = $("#sec_lname_"+id).val()

    if(new_pass == confirm_pass) {

    }else{
        alert("Password did not match, Please try again later")
        return false
    }

    var regexpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;

    if (regexpassword.test(new_pass)) {
        // Password matches the regex
    } else {
        alert("Password must contain 8 or more characters with a mix of upper and lowercase letters, numbers and symbols. Please try again later.");
        return false
    }

    $.ajax({
        url: base_url + "Main_Controller/update_user_security",
        type: "POST",
        data: {
            empid:empid,
            new_pass:new_pass,
            confirm_pass:confirm_pass,
            fname:fname,
            lname:lname
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function update_user_username(id){
    var emloyeepid      = $("#un_employeeid_"+id).val()
    var user_username   = $("#un_username_"+id).val()
    var fname           = $("#un_fname_"+id).val()
    var lname           = $("#un_lname_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_user_username",
        type: "POST",
        data: {
            emloyeepid:emloyeepid,
            user_username:user_username,
            fname:fname,
            lname:lname
        },
        success:function(response){
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function get_city_prov_modal(id){
    var province = $("#l_select_prov_"+id).val()

    $.ajax({
        url: 'Login_Controller/get_city_provinces',
        type: 'POST',
        dataType: 'json',
        data: {
             province: province 
        },
        success: function(response) {
            let cityDropdown = $('#city-list'+id);
            cityDropdown.empty();
            $.each(response, function(index, city) {
                cityDropdown.append('<option value="' + city.id + '">' + city.citymunicipality_name + '</option>');
            });
        }
    })
}

function update_user_query(id) {
    var uid              = $("#l_userid_"+id).val()
    var fname            = (document.getElementById('l_fname_'+id).value).charAt(0).toUpperCase() + (document.getElementById('l_fname_'+id).value).slice(1)
    var mname            = (document.getElementById('l_mname_'+id).value).charAt(0).toUpperCase() + (document.getElementById('l_mname_'+id).value).slice(1)
    var lname            = (document.getElementById('l_lname_'+id).value).charAt(0).toUpperCase() + (document.getElementById('l_lname_'+id).value).slice(1)
    var gender           = (document.getElementById('l_gender_'+id).value).charAt(0).toUpperCase() + (document.getElementById('l_gender_'+id).value).slice(1)
    var bday             = $("#l_bday_"+id).val()
    var citymunicipality = $("#city-list"+id).val()
    var prov             = $("#l_select_prov_"+id).val()
    var email            = $("#l_email_"+id).val()
    var contactno        = $("#l_contactno_"+id).val()
    var usertype         = $("#l_user_type_"+id).val()
    var status           = $("#l_user_stat_"+id).val()

    var regexname     = /^[a-zA-Z\s\,\-]+$/;
    var regexmobileno = /^[09|+639]+[0-9\d]{10}$/;
    var regexemail    = /^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d]{2,}$/;

    if(fname == "") {
        alert("Please enter user first name")
        return false
    }else if(!regexname.test(fname)) {
        alert("Please enter a valid first name")
        return false
    }

    if(mname == "") {
        alert("Please enter user middle name")
        return false
    }else if(!regexname.test(mname)) {
        alert("Please enter a valid middle name")
        return false
    }

    if(lname == "") {
        alert("Please enter user last name")
        return false
    }else if(!regexname.test(lname)) {
        alert("Please enter a valid last name")
        return false
    }

    if(contactno == "") {
        alert("Please enter user contact number")
        return false
    }else if(!regexmobileno.test(contactno)) {
        alert("Please enter a valid contact number")
        return false
    }

    if(email == "") {
        alert("Please enter user email address")
        return false
    }else if(!regexemail.test(email)) {
        alert("Please enter a valid email address")
        return false
    }

    $.ajax({
        url: base_url + "Main_Controller/update_user_info",
        type: "POST",
        data:{
            uid:uid,
            fname:fname,
            mname:mname,
            lname:lname,
            gender:gender,
            bday:bday,
            citymunicipality:citymunicipality,
            prov:prov,
            email:email,
            contactno:contactno,
            usertype:usertype,
            status:status
        },
        success: function(response){
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function get_child_city() {
    var province = $("#c_select_prov").val()

    $.ajax({
        url: 'Login_Controller/get_city_provinces',
        type: 'POST',
        dataType: 'json',
        data: {
             province: province 
        },
        success: function(response) {
            let cityDropdown = $('#c_city-list');
            cityDropdown.empty();
            $.each(response, function(index, city) {
                cityDropdown.append('<option value="' + city.id + '">' + city.citymunicipality_name + '</option>');
            });
        }
    })
}

function add_child() {
    var userfname       = (document.getElementById('child_fname').value).charAt(0).toUpperCase() + (document.getElementById('child_fname').value).slice(1)
    var usermname       = (document.getElementById('child_mname').value).charAt(0).toUpperCase() + (document.getElementById('child_mname').value).slice(1)
    var userlname       = (document.getElementById('child_lname').value).charAt(0).toUpperCase() + (document.getElementById('child_lname').value).slice(1)
    var userbday        = $("#child_bday").val()
    var usergender      = $("#child_gender").val()
    var usercity        = $("#c_city-list").val()
    var userprovince    = $("#c_select_prov").val()
    var usermobileno    = $("#child_mobilenumber").val()
    var height          = $("#height").val()
    var weight          = $("#weight").val()
    var vaccination     = $("#vaccination").val()

    var regexname     = /^[a-zA-Z\s\,\-]+$/;
    var regexaddress  = /^[a-zA-Z0-9\d\s\.\-]+$/;
    var regexmobileno = /^[09|+639]+[0-9\d]{10}$/;
    var regexemail    = /^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d]{2,}$/;
    var regexpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;

    if(userfname == "") {
        document.getElementById("child_fname_error").innerHTML = "Please enter user first name"
        return false
    }else if(!regexname.test(userfname)) {
        document.getElementById("child_fname_error").innerHTML = "Please enter a valid first name"
        return false
    }

    if(!regexname.test(usermname)) {
        document.getElementById("child_mname_error").innerHTML = "Please enter a valid middle name"
        return false
    }

    if(userlname == "") {
        document.getElementById("child_lname_error").innerHTML = "Please enter user last name"
        return false
    }else if(!regexname.test(userlname)) {
        document.getElementById("child_lname_error").innerHTML = "Please enter a valid last name"
        return false
    }

    if(userbday == "") {
        document.getElementById("child_bday_error").innerHTML = "Please select a birthdate"
        return false
    }

    if(usergender == "") {
        document.getElementById("child_gender_error").innerHTML = "Please select a gender"
        return false
    }

    if(usercity == "") {
        document.getElementById("c_select_city_error").innerHTML = "Please enter city/municipality"
        return false
    }

    if(userprovince == "") {
        document.getElementById("c_select_prov_error").innerHTML = "Please enter province"
        return false
    }

    if(height == "") {
        document.getElementById("child_height_error").innerHTML = "Please enter height"
        return false
    }

    if(weight == "") {
        document.getElementById("child_weight_error").innerHTML = "Please enter weight"
        return false
    }

    if(vaccination == "") {
        document.getElementById("vaccination_error").innerHTML = "Please enter vaccination"
        return false
    }

    if(usermobileno == "") {
        document.getElementById("child_mobilenumber_error").innerHTML = "Please enter mobile number"
        return false
    }else if(!regexmobileno.test(usermobileno)) {
        document.getElementById("child_mobilenumber_error").innerHTML = "Please enter a valid character or follow the format (09XXXXXXXXX or +639XXXXXXXXX)"
        return false
    }

    $.ajax({
        url: base_url + "Main_Controller/add_child_data",
        type: "POST",
        data: {
            userfname:userfname,
            usermname:usermname,
            userlname:userlname,
            userbday:userbday,
            usergender:usergender,
            usercity:usercity,
            userprovince:userprovince,
            usermobileno:usermobileno,
            height:height,
            weight:weight,
            vaccination:vaccination
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })

}

function update_stocks(id) {
    var stockid = $("#stockid_"+id).val()
    var name    = $("#prodname_"+id).val()
    var quantity = $("#prod_quantity_"+id).val()
    var addstock = $("#add_stock_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_product_stock",
        type: "POST",
        data: {
            stockid:stockid,
            name:name,
            quantity:quantity,
            addstock:addstock
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function delete_stocks(id) {
    var stockid = $("#d_stockid_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/delete_stocks",
        type: "POST",
        data:{
            stockid:stockid
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function add_products() {
    var prodcategory = $("#p_prod_category").val()
    var name         = $("#p_prod_name").val()
    var quantity     = $("#p_prod_quantity").val()
    var description  = $("#p_prod_desc").val()

    var regexname     = /^[a-zA-Z\s\,\-]+$/;

    if(name == "") {
        document.getElementById("p_name_error").innerHTML = "Please enter a product name"
        return false
    }else if(!regexname.test(name)) {
        document.getElementById("p_name_error").innerHTML = "Please enter a valid product name"
        return false
    }

    $.ajax({
        url: base_url + "Main_Controller/add_products",
        type: "POST",
        data: {
            prodcategory:prodcategory,
            name:name,
            quantity:quantity,
            description:description
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function update_apt_status(id) {
    var aptid           = $("#id_update_"+id).val()
    var aptstatus       = $("#apt_stat_update_"+id).val()
    var date            = $("#apt_date_update_"+id).val()
    var time            = $("#apt_time_update_"+id).val()
    var orig_aptstat    = $("#orig_aptstat_"+id).val()
    var orig_date       = $("#orig_date_"+id).val()
    var orig_time       = $("#orig_time_"+id).val()
    var orig_service    = $("#orig_service_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/update_apt_status",
        type: "POST",
        data: {
            aptid:aptid,
            aptstatus:aptstatus,
            date:date,
            time:time,
            orig_aptstat:orig_aptstat,
            orig_date:orig_date,
            orig_time:orig_time,
            orig_service:orig_service
        },
        success: function(res) {
            var final = res.trim() 
            
            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })

}

function toggleCommentField(id) {
    const statusSelect = document.getElementById("up_status_"+id);
    const commentBoxContainer = document.getElementById("commentField_"+id);
  
    const selectedValue = statusSelect.value;
    
    // Check if the selected option is "cancelled"
    if (selectedValue === "Canceled") {
        // Create the comment box element
        const commentBox = document.createElement("textarea");
        commentBox.setAttribute("placeholder", "Enter your comment here");
        commentBox.setAttribute("id", "up_comment_"+id);
        commentBox.setAttribute("required", "true");
        commentBox.setAttribute("class", "form-control");
        
        // Append the comment box to the container
        commentBoxContainer.appendChild(commentBox);
    } else {
        // If the selected option is not "cancelled", remove any existing comment box
        const existingCommentBox = document.getElementById("up_comment_"+id);
        if (existingCommentBox) {
            commentBoxContainer.removeChild(existingCommentBox);
        }
    }
}

function toggleCommentField2(id) {
    const statusSelect = document.getElementById("apt_stat_update_"+id);
    const commentBoxContainer = document.getElementById("commentField2_"+id);
  
    const selectedValue = statusSelect.value;
    
    // Check if the selected option is "cancelled"
    if (selectedValue === "Canceled") {
        // Create the comment box element
        const commentBox = document.createElement("textarea");
        commentBox.setAttribute("placeholder", "Enter your comment here");
        commentBox.setAttribute("id", "up_comment_"+id);
        commentBox.setAttribute("required", "true");
        commentBox.setAttribute("class", "form-control");
        
        // Append the comment box to the container
        commentBoxContainer.appendChild(commentBox);
    } else {
        // If the selected option is not "cancelled", remove any existing comment box
        const existingCommentBox = document.getElementById("up_comment_"+id);
        if (existingCommentBox) {
            commentBoxContainer.removeChild(existingCommentBox);
        }
    }
}

function update_appointment(idz) {
    var id              = $("#up_id_"+idz).val()
    // var petid           = $("#up_id_"+id).val()
    var patientname     = $("#up_pname_"+idz).val()
    var service         = $("#up_service_"+idz).val()
    var date            = $("#up_apt_date_"+idz).val()
    var time            = $("#up_apt_time_"+idz).val()
    var aptstatus       = $("#up_status_"+idz).val()
    var orig_aptstat    = $("#up_orig_aptstat_"+idz).val()
    var orig_date       = $("#up_orig_date_"+idz).val()
    var orig_time       = $("#up_orig_time_"+idz).val()
    var orig_service    = $("#up_orig_service_"+idz).val()
    var comment         = $("#up_comment_"+idz).val()
    // var orig_vet        = $("#up_id_"+idz).val()
    // var assign_vet      = $("#up_id_"+idz).val()

    $.ajax({
        url: base_url + "Main_Controller/update_appointment",
        type: "POST",
        data: {
            id:id,
            patientname:patientname,
            service:service,
            date:date,
            time:time,
            aptstatus:aptstatus,
            orig_aptstat:orig_aptstat,
            orig_date:orig_date,
            orig_time:orig_time,
            orig_service:orig_service,
            comment:comment
        },
        success: function(response) {
            var final = response.trim() 

            alert(final)

            setTimeout(redirectAppointment(), 2000);
        }
    })
}

function redirectAppointment(){
    return window.location.href = base_url + "appointment";
}

function add_walk_in() {
    var name = $("#walk_fname").val()
    var date = $("#walk_date").val()
    var time = $("#walk_time").val()
    var service = $("#walk_service").val()

    $.ajax({
        url: base_url + "Main_Controller/add_walkin",
        type: "POST",
        data: {
            name:name,
            date:date,
            time:time,
            service:service
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectAppointment(), 2000);
        }
    })
}

function add_new_patient() {
    var fname = $("#pt_fname").val()
    var mname = $("#pt_mname").val()
    var lname = $("#pt_lname").val()

    var address = $("#pt_address").val()
    var contact = $("#pt_mobile").val()
    var bday    = $("#pt_bday").val()
    var age     = $("#pt_age").val()

    $.ajax({
        url: base_url + "Main_Controller/add_new_patient",
        type: "POST",
        data: {
            fname:fname,
            mname:mname,
            lname:lname,
            address:address,
            contact:contact,
            bday:bday,
            age:age
        },
        success: function(response) {
            var final = response.trim()

            alert(final)

            setTimeout(redirectAppointment(), 2000);
        }
    })
}

function add_consultation(id) {
    var patient  = $("#patient_id_"+id).val()
    var findings = $("#findings_"+id).val()
    var desc     = $("#description_"+id).val()
    var presc    = $("#prescription_"+id).val()

    $.ajax({
        url: base_url + "Main_Controller/add_consultation",
        type: "POST",
        data: {
            patient:patient,
            findings:findings,
            desc:desc,
            presc:presc
        },
        success: function(res) {
            var final = res.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}