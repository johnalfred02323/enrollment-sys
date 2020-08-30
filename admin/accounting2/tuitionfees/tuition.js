  
function reset(){
  $("#fees_form").trigger("reset");
  $("#fees_forms_new").show();
  $("#fees_forms").hide();
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
  var tuition_fees = $('#edit_price').val();
  var remarks = $('#edit_desc').val();
  

  if(tuition_fees == '' || remarks == ''){
    if(tuition_fees == ''){
      pdiv.attr('errr','');
    }
    if(remarks == ''){
      ddiv.attr('errr','');
    }
  }
  else if(tuition_fees == ''){
    pdiv.attr('errr','');
  }
  else{
    $.ajax({
      url:'tuition_process.php',
      method:'POST',
      data:{"updatefees":1,id:id,tuition_fees:tuition_fees,remarks:remarks},
      success:function(data){
        if(data == "0"){    
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        }else if(data == "1"){
          $('#tuitionfees_modal').modal('hide');
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html('Edit successfully.');
          $('#fees').DataTable().destroy();
          fetch_data();
          reset();
        }
      }
    });
  }
});