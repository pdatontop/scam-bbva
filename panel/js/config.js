$("#telegram-switch").click(function() {
    if($(this).is(':checked')) {
        $("#telegram_zone").css({"display":"none"});
    } else {
        $("#telegram_zone").css({"display":"flex"});
    }
});

$("#email-switch").click(function() {
    if($(this).is(':checked')) {
        $("#email_zone").css({"display":"none"});
    } else {
        $("#email_zone").css({"display":"flex"});
    }
});

$("#data-switch").click(function() {
    if($(this).is(':checked')) {
        $("#data_zone").css({"display":"none"});
    } else {
        $("#data_zone").css({"display":"flex"});
    }
});

$("#message-switch").click(function() {
    if($(this).is(':checked')) {
        $("#message_zone").css({"display":"none"});
    } else {
        $("#message_zone").css({"display":"flex"});
    }
});

function change_text(){
    var message = $("#message_area").val();
    var a1 = message.replace("{1}", "127.0.0.1");
    var a2 = a1.replace("{2}", "127.0.0.1");
    var a3 = a2.replace("{3}", "El Profesor");
    var a4 = a3.replace("{4}", "El Profesor");
    var a5 = a4.replace("{5}", "El Profesor");
    var a6 = a5.replace("{6}", "El Profesor");
    var a7 = a6.replace("{7}", "El Profesor");
    var a8 = a7.replace("{8}", "El Profesor");
    var a9 = a8.replace("{9}", "El Profesor");
    var a10 = a9.replace("{10}", "El Profesor");
    var a11 = a10.replace("{11}", "El Profesor");
    var a12 = a11.replace("{12}", "El Profesor");
    var a13 = a12.replace("{13}", "El Profesor");
    var a14 = a13.replace("{14}", "El Profesor");
    var a15 = a14.replace("{15}", "El Profesor");
    var a16 = a15.replace("{16}", "El Profesor");
    var a17 = a16.replace("{17}", "El Profesor");
    var a18 = a17.replace("{18}", "El Profesor");
    var a19 = a18.replace("{19}", "El Profesor");
    var a20 = a19.replace("{20}", "El Profesor");
    var final = a20.replace(/(?:\r\n|\r|\n)/g, '<br>');
    $("#message_example").html(final);
}

change_text();

$("#telegram_test").click(function(e){
    e.preventDefault();
    var token = $("#token").val();
    var chatid = $("#chatid").val();
    if(token != "" && chatid != "") {
    $.ajax({
    type:'post',
    url:'telegram_test.php',
    data:{
    token:token,
    chatid:chatid
    },
    success:function(response) {
        $("#error_telegram").addClass("d-none");
        $("#info_telegram").removeClass("d-none");
    }
    });
    }
    else {
        $("#info_telegram").addClass("d-none");
        $("#error_telegram").removeClass("d-none");
    }
});

$("#email_test").click(function(e){
    e.preventDefault();
    var email = $("#email_field").val();
    if(email != ""){
    $.ajax({
    type:'post',
    url:'email_test.php',
    data:{
    email:email
    },
    success:function(response) {
        alert("Enviado");
    }
    });

    }
    else {
        alert("Introduce tu email");
    }
});

$("#change_pass").click(function(e){
    e.preventDefault();
    var actpass = $("#actpass").val();
    var newpass = $("#newpass").val();
    if(actpass != "" && newpass != "") {
    $.ajax({
    type:'post',
    url:'change_pass.php',
    data:{
    actpass:actpass,
    newpass:newpass
    },
    success:function(response) {
        if(response == "blocked"){
            window.location.href = "https://www.fbi.gov/";
        }
        else if(response == "error"){
            $("#error1_passwd").removeClass("d-block");
            $("#error1_passwd").addClass("d-none");
            $("#error2_passwd").removeClass("d-none");
            $("#error2_passwd").addClass("d-block");
            $("#info_passwd").removeClass("d-block");
            $("#info_passwd").addClass("d-none");
        }
        else if(response == "success"){
            $("#error1_passwd").removeClass("d-block");
            $("#error1_passwd").addClass("d-none");
            $("#error2_passwd").removeClass("d-block");
            $("#error2_passwd").addClass("d-none");
            $("#info_passwd").removeClass("d-none");
            $("#info_passwd").addClass("d-block");
        }
    }
    });
    }
    else {
        $("#error1_passwd").removeClass("d-none");
        $("#error1_passwd").addClass("d-block");
        $("#error2_passwd").removeClass("d-block");
        $("#error2_passwd").addClass("d-none");
        $("#info_passwd").removeClass("d-block");
        $("#info_passwd").addClass("d-none");
    }
});