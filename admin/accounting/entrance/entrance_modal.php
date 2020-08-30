<form id="exam_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="entrance_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
      <div id="exam_forms"></div> 
      <div id="exam_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Entrance Exam</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        
  <div id="p" class="form-group">
    <input id="desc" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="description" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="fees" class="float-label" style="font-family:Arial, FontAwesome">Description</label>
          <erroru>
            Description is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

  <div id="d" class="form-group">
    <input id="price" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="price" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">Price</label>
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

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


<script type="text/javascript">
  function fetch_data(){
  var table = $('#entrance').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "entrance-exam.php",

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
  $('#exam_form').trigger('reset');
  $('#exam_forms_new').show();
  $('#exam_forms').hide();
}

</script> 

<script type="text/javascript">
  $(document).ready(function(){

  $('#save_btn').click(function(){
    
    var pdiv = $('#p');
    var ddiv = $('#d');

    var umsg = $('errorun');

    var des = $('#desc').val();
    var srp = $('#price').val();


    if(des == '' || srp == ''){
      if(des == ''){
        pdiv.attr('errr','');
      }
      if(price == ''){
        ddiv.attr('errr','');
      }
    }
    else{
       $.ajax({
        url:'exam_process.php',
        method:'POST',
        data:{"addfees":1,des:des,srp:srp},
        success:function(data){
           if(data == "0"){
           }else if(data){
             $('#entrance_modal').modal('hide');
             $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
             $("#successmsg").html('Added Successfully.');
             $('#entrance').DataTable().destroy();
             fetch_data();
             reset();
           }
        }
      });
  }
  });
});
</script>