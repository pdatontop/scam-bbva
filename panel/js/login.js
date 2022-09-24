function do_login(){
  var token=$("#token").val();
  if(token != "") {
    $.ajax({
    type:'post',
    url:'validate.php',
    data:{
    token:token
    },
    success:function(response) {
    if(response=="success"){
      window.location.href="dashboard.php";
    }
    else{
      $("#error_alert").removeClass("d-none");
      $("#error_message").text(response);
    }
    }
    });
  }
  else {
      $("#error_alert").removeClass("d-none");
      $("#error_message").text("Introduce una contraseña");
  }

  return false;
}