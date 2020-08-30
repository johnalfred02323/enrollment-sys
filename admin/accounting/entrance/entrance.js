  
function reset(){
  $("#exam_form").trigger("reset");
  $("#exam_forms_new").show();
  $("#exam_forms").hide();
}
$("#edit_desc").keyup(function(){
  var div = $("#edit_d");
  if($(this).val() != ""){
    div.removeAttr("errr");
  }
  else{
    div.attr("errr","");
  }
});
$("#edit_price").keyup(function(){
  var div = $("#edit_p");
  if($(this).val() != ""){
    div.removeAttr("errr");
  }
  else{
    div.attr("errr","");
  }
});




$('#update_btn').click(function(){
  var ddiv = $('#edit_d');
  var pdiv = $('#edit_p');

  var umsg = $('errorun');

  var id = $('#id_val').val();
  var srp = $('#edit_price').val();
  var des = $('#edit_desc').val();
  

  if(srp == '' || des == ''){
    if(srp == ''){
      pdiv.attr('errr','');
    }
    if(des == ''){
      ddiv.attr('errr','');
    }
  }
  else if(srp == ''){
    pdiv.attr('errr','');
  }
  else{
    $.ajax({
      url:'exam_process.php',
      method:'POST',
      data:{"updatefees":1,id:id,srp:srp,des:des},
      success:function(data){
        if(data == "0"){    
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        }else if(data == "1"){
          $('#entrance_modal').modal('hide');
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html('Edit successfully.');
          $('#entrance').DataTable().destroy();
          fetch_data();
          reset();
        }
      }
    });
  }
});