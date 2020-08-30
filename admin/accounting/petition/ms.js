  
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
  var miscellaneous = $('#edit_price').val();
  var price = $('#edit_desc').val();
  

  if(miscellaneous == '' || price == ''){
    if(miscellaneous == ''){
      pdiv.attr('errr','');
    }
    if(price == ''){
      ddiv.attr('errr','');
    }
  }
  else if(miscellaneous == ''){
    pdiv.attr('errr','');
  }
  else{
    $.ajax({
      url:'ms_process.php',
      method:'POST',
      data:{"updatefees":1,id:id,miscellaneous:miscellaneous,price:price},
      success:function(data){
        if(data == "0"){    
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        }else if(data == "1"){
          $('#ms_modal').modal('hide');
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html('Edit successfully.');
          $('#misc').DataTable().destroy();
          fetch_data();
          reset();
        }
      }
    });
  }
});