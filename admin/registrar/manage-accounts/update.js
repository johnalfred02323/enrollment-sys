$("#edit_usertype option[value=Cashier]").hide();
  
function reset(){
  $("#user_form").trigger("reset");
  $("#user_forms_new").show();
	  $("#user_forms").hide();
}
$("#edit_firstname").keyup(function(){
  var div = $("#edit_f");
  if($(this).val() != ""){
    div.removeAttr("errr");
  }
  else{
    div.attr("errr","");
  }
});
$("#edit_lastname").keyup(function(){
  var div = $("#edit_l");
  if($(this).val() != ""){
    div.removeAttr("errr");
  }
  else{
    div.attr("errr","");
  }
});
$("#edit_middlename").keyup(function(){
  var div = $("#edit_m");
  if($(this).val() != ""){
    div.removeAttr("errr");
  }
  else{
    div.attr("errr","");
  }
});
$("#edit_username").keyup(function(){
  var div = $("#edit_u");
  if($(this).val() != ""){
    div.removeAttr("errr");
  }
  else{
    div.attr("errr","");
  }
});


$('#update_btn').click(function(){
  var fdiv = $('#edit_f');
  var ldiv = $('#edit_l');
  var mdiv = $('#edit_m');
  var udiv = $('#edit_u');
  var pdiv = $('#edit_p');
  var cpdiv = $('#edit_cp');

  var umsg = $('errorun');

  var id = $('#id_val').val();
  var fname = $('#edit_firstname').val();
  var lname = $('#edit_lastname').val();
  var mname = $('#edit_middlename').val();
  var uname = $('#edit_username').val();
  var pass = $('#edit_password').val();
  var cpass = $('#edit_confirm_pass').val();
  var usertype = $('#edit_usertype').val();
  var dept = $('#edit_department').val();

  if(fname == '' || lname == '' || mname == '' || uname == '' || pass == ''){
    if(fname == ''){
      fdiv.attr('errr','');
    }
    if(lname == ''){
      ldiv.attr('errr','');
    }
    if(mname == ''){
      mdiv.attr('errr','');
    }
    if(uname == ''){
      udiv.attr('errr','');
    }
    if(pass == ''){
      pdiv.attr('errr','');
    }
    if(cpass == ''){
      cpdiv.attr('errr','');
    }
  }
  else if(pass != cpass){
    cpdiv.attr('errr','');
  }
  else{
    $.ajax({
      url:'process.php',
      method:'POST',
      data:{"updateuser":1,id:id,fname:fname,lname:lname,mname:mname,uname:uname,pass:pass,usertype:usertype,dept:dept},
      success:function(data){
        if(data == "0"){
          udiv.attr('errr','');
          umsg.html('User already exists.');
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('User already exists.');
        }else if(data == "1"){
          $('#user_modal').modal('hide');
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html('User updated successfully.');
          $('#user_table').DataTable().destroy();
          fetch_data();
          reset();
        }
      }
    });
  }
});