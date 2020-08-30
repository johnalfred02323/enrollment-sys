<form id="exam_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="exam_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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

        
  <div id="l" class="form-group">
    <input id="lname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="fees1" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="fees" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
          <erroru>
            Last Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

  <div id="f" class="form-group">
    <input id="fname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="remarks1" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
          <erroru>
            First Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

    <div id="m" class="form-group">
    <input id="mname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="remarks1" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
          <erroru>
            Middle Name is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

    <div id="o" class="form-group">
    <input id="orid" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="remarks1" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">Official Receipt</label>
          <erroru>
            Official Receipt is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

    <div id="s" class="form-group">
    <input id="schlyr" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" name="remarks1" autocomplete="off">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="desc" class="float-label" style="font-family:Arial, FontAwesome">School Year</label>
          <erroru>
            School Year is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>

              <div class="box1">
              
                      <select name='exam2' id="exam2" required>
                            <option hidden>--Semester--</option>
                            <option>1st Sem</option>
                            <option>2nd Sem</option>
                      </select>
            </div>

            <div class="box1">
              
                      <select name='exam2' id="exam2" required>
                            <option hidden>--Semester--</option>
                            <option>1st Sem</option>
                            <option>2nd Sem</option>
                      </select>
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
  var table = $('#fees').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "entrance_exam.php",

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
    
    var ln = $('#l');
    var fn = $('#f');
    var mn = $('#m');
    var or = $('#o');
    var schl = $('#s');

    var umsg = $('errorun');

    var ln1 = $('#lname').val();
    var fn1 = $('#fname').val();
    var mn1 = $('#mname').val();
    var or1 = $('#orid').val();
    var schlyr1 = $('#schlyr').val();
    var sem = $('#sem2').val();


    if(ln1 == '' || fn1 == '' || mn1 == '' || or1 == '' || schlyr1 == ''){
      if(ln1 == ''){
        ln.attr('errr','');
      }
      if(fn1 == ''){
        fn.attr('errr','');
      }
      if(mn1 == ''){
        mn.attr('errr','');
      }
      if(or1 == ''){
        or.attr('errr','');
      }
      if(schlyr1 == ''){
        schl.attr('errr','');
      }
    }
    else{
       $.ajax({
        url:'tuition_process.php',
        method:'POST',
        data:{"addfees":1,tfees:tfees,remarks:remarks},
        success:function(data){
           if(data == "0"){
           }else if(data){
             $('#tuitionfees_modal').modal('hide');
             $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
             $("#successmsg").html('Added Successfully.');
             $('#fees').DataTable().destroy();
             fetch_data();
             reset();
           }
        }
      });
  }
  });
});
</script>