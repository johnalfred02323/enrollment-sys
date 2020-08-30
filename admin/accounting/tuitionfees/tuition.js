  
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


