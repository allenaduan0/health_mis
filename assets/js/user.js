$(document).ready(function() {

})

function add_appointment_user() {
    var name     = $("#name").val()
    var service  = $("#service").val()
    var date     = $("#date").val()
    var time     = $("#time").val()
    var concern  = $("#concerns").val()
    var mobnum   = $("#user_mobilenumber").val()
    var stat     = "Pending"

    $.ajax({
        url: base_url + "Main_Controller/add_appointment_user",
        type: "POST",
        data: {
            name:name,
            service:service,
            date:date,
            time:time,
            concern:concern,
            mobnum:mobnum,
            stat:stat
        },
        success: function(res){
            var final = res.trim()

            alert(final)

            setTimeout(redirectPatient(), 2000);
        }
    })
}

function redirectPatient(){
    return window.location.href = base_url 
}