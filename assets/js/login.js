$(document).ready(function() {

            // Get the checkbox and button elements
            var checkbox = document.getElementById("terms_box");
            var button = document.getElementById("register_btn");

            // Add an event listener to the checkbox
            checkbox.addEventListener("change", function() {
                // Enable or disable the button based on the checkbox state
                button.disabled = !checkbox.checked;
            });

    auto_add_patient()
    
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
    $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password2 input').attr("type") == "text") {
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass("fa-eye-slash");
            $('#show_hide_password2 i').removeClass("fa-eye");
        } else if ($('#show_hide_password2 input').attr("type") == "password") {
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass("fa-eye-slash");
            $('#show_hide_password2 i').addClass("fa-eye");
        }
    });
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

function login() {
    var username_err = $("#input_username").val()
    var password_err = $("#input_password").val()

    if(username_err == "") { 
        document.getElementById("username_error").innerHTML = "Please enter username"
        return false
    }else if(password_err == ""){
        document.getElementById("username_error").innerHTML = "Please enter your password"
        return false
    }else{
        document.getElementById("username_error").innerHTML = ""

    }

    $.ajax({
        url: base_url + "login",
        type: "POST",
        data: {
            username_err:username_err,
            password_err:password_err
        },
        success: function(res) {
            alert(res)
            window.location.reload()
        }
    })

}

function register() {
    // alert(base_url)
    // var userfname = $("#user_fname").val()
    var userfname     = (document.getElementById('user_fname').value).charAt(0).toUpperCase() + (document.getElementById('user_fname').value).slice(1)
    var usermname     = (document.getElementById('user_mname').value).charAt(0).toUpperCase() + (document.getElementById('user_mname').value).slice(1)
    var userlname     = (document.getElementById('user_lname').value).charAt(0).toUpperCase() + (document.getElementById('user_lname').value).slice(1)
    var userbday      = (document.getElementById('user_bday').value).charAt(0).toUpperCase() + (document.getElementById('user_bday').value).slice(1)
    var usergender    = (document.getElementById('user_gender').value).charAt(0).toUpperCase() + (document.getElementById('user_gender').value).slice(1)
    var usercity      = (document.getElementById('city-list').value).charAt(0).toUpperCase() + (document.getElementById('city-list').value).slice(1)
    var userprovince  = (document.getElementById('select_prov').value).charAt(0).toUpperCase() + (document.getElementById('select_prov').value).slice(1)
    var usermobileno  = $("#user_mobilenumber").val()
    var useremail     = $("#user_email").val()
    var usertype      = $("#user_type").val()
    var user_username = $("#user_username").val()
    var userpass      = $("#user_pass").val()
    var userrpass     = $("#user_rpass").val()
    var userstat      = "Inactive"

    var regexname     = /^[a-zA-Z\s\,\-]+$/;
    var regexaddress  = /^[a-zA-Z0-9\d\s\.\-]+$/;
    var regexmobileno = /^[09|+639]+[0-9\d]{10}$/;
    var regexemail    = /^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d]{2,}$/;
    var regexpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;

    if(userfname == "") {
        document.getElementById("userrfname_error").innerHTML = "Please enter user first name"
        return false
    }else if(!regexname.test(userfname)) {
        document.getElementById("userrfname_error").innerHTML = "Please enter a valid first name"
        return false
    }

    if(!regexname.test(usermname)) {
        document.getElementById("userrmname_error").innerHTML = "Please enter a valid middle name"
        return false
    }

    if(userlname == "") {
        document.getElementById("userlname_error").innerHTML = "Please enter user last name"
        return false
    }else if(!regexname.test(userlname)) {
        document.getElementById("userlname_error").innerHTML = "Please enter a valid last name"
        return false
    }

    if(userbday == "") {
        document.getElementById("userbday_error").innerHTML = "Please select a birthdate"
        return false
    }

    if(usergender == "") {
        document.getElementById("usergender_error").innerHTML = "Please select a gender"
        return false
    }

    if(usercity == "") {
        document.getElementById("usercity_error").innerHTML = "Please select a city/municipality"
        return false
    }

    if(userprovince == "") {
        document.getElementById("userprov_error").innerHTML = "Please select a province"
        return false
    }

    if(usermobileno == "") {
        document.getElementById("usermobileno_error").innerHTML = "Please enter mobile number"
        return false
    }else if(!regexmobileno.test(usermobileno)) {
        document.getElementById("usermobileno_error").innerHTML = "Please enter a valid character or follow the format (09XXXXXXXXX or +639XXXXXXXXX)"
        return false
    }

    if(useremail.trim() == "") {
        document.getElementById("useremail_error").innerHTML = "Please enter an e-mail address"
        return false
    } else if(!validateEmail(useremail) && !regexemail.test(useremail)) {
        document.getElementById("useremail_error").innerHTML = "Please enter a valid email address"
        return false
    }

    if(usertype == "") {
        document.getElementById("usertype_error").innerHTML = "Please select usertype"
        return false
    }

    if(user_username == "") {
        document.getElementById("username_error").innerHTML = "Please enter username"
        return false
    }

    if(userpass == "") {
        document.getElementById("pass_error").innerHTML = "Please enter user password"
        return false
    }else if(!regexpassword.test(userpass)) {
        document.getElementById("pass_error").innerHTML = "Your password must contain 8 or more characters with a mix of upper and lowercase letters, numbers & symbols"
        return false
    }

    if(userrpass == "") {
        document.getElementById("rpass_error").innerHTML = "Please repeat password"
        return false
    }else if(userrpass !== userpass) {
        document.getElementById("rpass_error").innerHTML = "Password did not match"
        return false
    }

    $.ajax({
        url: base_url + "Login_Controller/register_user",
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
            useremail:useremail,
            usertype:usertype,
            user_username:user_username,
            userpass:userpass,
            userrpass:userrpass,
            userstat:userstat
        },
        success: function(response) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your data has been saved',
                showConfirmButton: false,
                timer: 1500
              });

            setTimeout(redirectHomePage(), 2000);
        }
    })

}

function redirectHomePage(){
    return window.location.href = base_url;
}

function validateEmail(email) {
    // Regular expression for email validation
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function getCitiesbyProcvince() {
    var province = $("#select_prov").val()

    $.ajax({
        url: 'Login_Controller/get_city_provinces',
        type: 'POST',
        dataType: 'json',
        data: {
             province: province 
        },
        success: function(response) {
            let cityDropdown = $('#city-list');

            $.each(response, function(index, city) {
                cityDropdown.append('<option value="' + city.id + '">' + city.citymunicipality_name + '</option>');
            });
        }
    })
}

function check_username() {
    var user_name = $("#user_username").val()

    $.ajax({
        url: base_url + "Login_Controller/check_username",
        type: "POST",
        data: {
            user_name:user_name
        },
        success:function(response){
            final = response.trim()

            if(final == "success"){
                document.getElementById("username_error").innerHTML = "Username already existed!"
                document.getElementById("register_btn").style.visibility = "hidden";
            }else{
                document.getElementById("username_error").innerHTML = ""
                document.getElementById("register_btn").style.visibility = "visible";
            }
        }
    })
}

function check_email() {
    var email = $("#user_email").val()

    $.ajax({
        url: base_url + "Login_Controller/check_email",
        type: "POST",
        data: {
            email:email
        },
        success:function(response){
            final = response.trim()

            if(final == "success"){
                document.getElementById("useremail_error").innerHTML = "Email Address already existed!"
                document.getElementById("register_btn").style.visibility = "hidden";
            }else{
                document.getElementById("useremail_error").innerHTML = ""
                document.getElementById("register_btn").style.visibility = "visible";
            }
        }
    })
}

function showEnglishModal(id) {
    // AJAX request to CodeIgniter controller
    $.ajax({
        url: 'Login_Controller/get_privacy_data',
        type: 'GET',
        dataType: 'json',
        data:{id:id},
        success: function(response) {
            // Update the modal content with the data from the server
            $('#englishModal .modal-body').html(response.text_en);
            // Show the English modal
            $('#languageModal').modal('hide');
            $('#englishModal').modal('show');
        },
        error: function(xhr, status, error) {
            // Handle errors if needed
            console.error(xhr.responseText);
        }
    });
}

function showTagalogModal(id) {
    // AJAX request to CodeIgniter controller
    $.ajax({
        url: 'Login_Controller/get_privacy_data',
        type: 'GET',
        dataType: 'json',
        data:{id:id},
        success: function(response) {
            // Update the modal content with the data from the server
            $('#tagalogModal .modal-body').html(response.text_en);
            // Show the English modal
            $('#languageModal').modal('hide');
            $('#tagalogModal').modal('show');
        },
        error: function(xhr, status, error) {
            // Handle errors if needed
            console.error(xhr.responseText);
        }
    });
}