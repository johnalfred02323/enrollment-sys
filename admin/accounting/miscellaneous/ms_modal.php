<form id="fees_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="ms_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
      <div id="fees_forms"></div> 
      <div id="fees_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Miscellaneous Fees</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">
  <div id="d" class="form-group">
    <input id="miscellaneous" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="miscellaneous" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">Miscellaneous Fees</label>
          <erroru>
            Miscellaneous is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>



  <div id="p" class="form-group">
    <input id="price" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="price" onkeypress="return ValidateNumber(event);" autocomplete="off" maxlength="8">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="price" class="float-label" style="font-family:Arial, FontAwesome">Price</label>
          <erroru>
            Price is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

        </div> <!-- Modal Body End -->

      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()"><i class="far fa-times-circle"></i> Cancel</button>
        <button type="button" class="save" id="save_btn" ripple><i class="far fa-save"></i> Save</button>
      </div>

      </div>

</div>

    </div>
  </div>
</form>

<div class="alert-box success" >
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed" >
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


<script type="text/javascript">
function fetch_data(){
  var table = $('#misc').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 2, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "miscellaneous.php",

      responsive: true,

      searchPlaceholder: "Search records",

      fixedHeader: {
          header: true,
          footer: true
      },
      language: {
          search: "_INPUT_",
          searchPlaceholder: "Search..."
      }
  } );
}

function reset(){
  $('#fees_form').trigger('reset');
  $('#fees_forms_new').show();
  $('#fees_forms').hide();
}

$(document).ready(function(){

  $('#save_btn').click(function(){
    
    var ddiv = $('#d');
    var pdiv = $('#p');

    var umsg = $('errorun');


    var miscellaneous = $('#miscellaneous').val();
    var price = $('#price').val();


    if(miscellaneous == '' || price == ''){
      if(miscellaneous == ''){
        pdiv.attr('errr','');
      }
      if(price == ''){
        ddiv.attr('errr','');
      }
    }
    else{
       $.ajax({
        url:'ms_process.php',
        method:'POST',
        data:{"addfees":1,miscellaneous:miscellaneous,price:price},
        success:function(data){
           if(data == "0"){
           }else if(data){
             $('#ms_modal').modal('hide');
             $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
             $("#successmsg").html('Added Successfully.');
             $('#misc').DataTable().destroy();
             fetch_data();
             reset();
           }
        }
      });
  }
  });
});

     function ValidateNumber(event) {
        var regex = new RegExp("^[0-9]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }

</script> 
