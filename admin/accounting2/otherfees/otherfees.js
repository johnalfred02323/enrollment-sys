  
function reset(){
  $("#ofees_form").trigger("reset");
  $("#ofees_forms_new").show();
  $("#ofees_forms").hide();
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
  var description = $('#edit_price').val();
  var price = $('#edit_desc').val();
  

  if(description == '' || price == ''){
    if(description == ''){
      pdiv.attr('errr','');
    }
    if(price == ''){
      ddiv.attr('errr','');
    }
  }
  else if(description == ''){
    pdiv.attr('errr','');
  }
  else{
    $.ajax({
      url:'otherfees_process.php',
      method:'POST',
      data:{"updatefees":1,id:id,description:description,price:price},
      success:function(data){
        if(data == "0"){    
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        }else if(data == "1"){
          $('#otherfees_modal').modal('hide');
          $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#successmsg").html('Edit successfully.');
          $('#otfees').DataTable().destroy();
          fetch_data();
          reset();
        }
      }
    });
  }
});