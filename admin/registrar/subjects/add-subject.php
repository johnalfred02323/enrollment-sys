<form id="subject_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="subject_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
      <div id="subject_forms"></div> 
      <div id="subject_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Subjects</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">



 <div class="row"> <!-- ROW Start Here -->
      <div class="col-lg-6"> <!-- left column Start -->
    

<!-- Select Start Here --> 
<div class="box1 mt-4">
  <label class="select-label">Curriculum</label>
  <select name='' id="curriculum" required>
    <option hidden>Curriculum</option>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM curriculum");
    $rows = mysqli_num_rows($result);
    while ($rows = mysqli_fetch_array($result))
    {
    echo "<option  value='". $rows['curriculum_title'] ."'>" .$rows['curriculum_title'] ."</option>" ;
    }
    ?>
  </select>
</div>
<!-- Select End Here --> 

<!-- Input Start Here -->        
<div id="subj_code" class="form-group">
  <input id="subject_code" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="subject_code" class="float-label" style="font-family:Arial, FontAwesome">Course Code</label>
        <erroru>
          Course Code is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div>
<!-- Input End Here -->  



<!-- Input Start Here -->        
<div id="subj_title" class="form-group">
  <input id="subject_title" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="subject_title" class="float-label" style="font-family:Arial, FontAwesome">Course Title</label>
        <erroru>
          Course Title is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div>
<!-- Input End Here -->  





<!-- Select Start Here --> 
<div class="box1 mt-4">
  <label class="select-label">Year</label>
  <select name='' id="year" required>
   <option hidden>Choose Year</option>
    <option value="1styr">First Year</option>
    <option value="2ndyr">Second Year</option>
    <option value="3rdyr">Third Year</option>
    <option value="4thyr">Fourth Year</option>
    <option value="5thyr">Fifth Year</option>
  </select>
</div>
<!-- Select End Here --> 


<!-- Select Start Here --> 
<div class="box1 mt-4">
  <label class="select-label">Semester</label>
  <select name='' id="semester" required>
   <option hidden>Choose Semester</option>
    <option value="1stsem">First Semester</option>
    <option value="2ndsem">Second Semester</option>
  </select>
</div>
<!-- Select End Here --> 


</div> <!-- left column End -->

<!-- Select Start Here --> 
<!-- <div class="box1 mt-4">
  <label class="select-label">Semester</label>
  <input name='' id="semester" required >
</div> -->
<!-- Select End Here --> 


<div class="col-lg-6">  <!-- Right column Start -->

<!-- Select Start Here --> 
<div class="box1 mt-4">
  <label class="select-label">Pre-Req</label>
  <select name='' id="pre-req" required>
  </select>
</div>
<!-- Select End Here --> 





<!-- Input Start Here -->        
<div id="subj_lec" class="form-group">
  <input id="subject_lecture" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="subject_lecture" class="float-label" style="font-family:Arial, FontAwesome">Lecture</label>
        <erroru>
          Lecture is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div>
<!-- Input End Here -->  

<!-- Input Start Here -->        
<div id="subj_lab" class="form-group">
  <input id="subject_laboratory" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="subject_laboratory" class="float-label" style="font-family:Arial, FontAwesome">Laboratory</label>
        <erroru>
          Laboratory is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div>
<!-- Input End Here -->  


<!-- Input Start Here -->        
<div id="subj_units" class="form-group">
  <input id="subject_unit" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="subject_units" class="float-label" style="font-family:Arial, FontAwesome">Units</label>
        <erroru>
          Units is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div>
<!-- Input End Here -->  


            </div> <!-- Right column Start -->
</div> <!-- ROW End Here -->


              </div>


        </div> <!-- Modal Body End -->
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="save_btn" ripple><i class="fas fa-save"></i> Save</button>
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
function fetch_subjects(){
  var table = $('#subj_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "subj_fetch.php",

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
  $('#subject_form').trigger('reset');
  $('#subject_forms_new').show();
  $('#subject_forms').hide();
}

$(document).on('click','#curriculum', function(){

  var currtitle = $(this).val();
  //for subject pre-requsite selection
  $.ajax({  
    url:"process.php",  
    method:"post",  
    data:{"prereq":1,currtitle:currtitle},  
    success:function(data)
    {
      $('#pre-req').html(data);
    }
    });
  
});

  $('#save_btn').click(function(){
    
    var scdiv = $('#subj_code');
    var stdiv = $('#subj_title');
    var slediv = $('#subj_lec');
    var sladiv = $('#subj_lab');
    var sudiv = $('#subj_units');

    var umsg = $('errorun');

    var subjcode = $('#subject_code').val();
    var subjtitle = $('#subject_title').val();
    var subjlec = $('#subject_lecture').val();
    var subjlab = $('#subject_laboratory').val();
    var subjyear = $('#year').val();
    var subjsem = $('#semester').val();
    var subjpre = $('#pre-req').val();
    var subjunits = $('#subject_unit').val();
    var currtitle = $('#curriculum').val();;

    if(subjcode == '' || subjtitle == '' || subjlec == '' || subjlab == '' || subjunits == ''){
       if(subjcode == ''){
        scdiv.attr('errr','');
      }
      if(subjtitle == ''){
        stdiv.attr('errr','');
      }
      if(subjlec == ''){
        slediv.attr('errr','');
      }
      if(subjlab == ''){
        sladiv.attr('errr','');
      }
      if(subjunits == ''){
        sudiv.attr('errr','');
      }
    }
    else
    {
      
      $.ajax({
        url:'process.php',
        method:'POST',
        data:{"addsubject":1,subjcode:subjcode,subjtitle:subjtitle,subjlec:subjlec,subjlab:subjlab,subjyear:subjyear,subjsem:subjsem,subjpre:subjpre,subjunits:subjunits,currtitle:currtitle},
        success:function(data)
        {
          if(data == "0"){
            numdiv.attr('errr','');
            umsg.html('Subject is already exists.');
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Subject is already exists.');
          }
          else if(data == "1"){
            $('#subject_modal').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Subject added successfully.');
            $('#subj_table').DataTable().destroy();
            fetch_students();
            reset();
          }
        }
      });
    }
  });
</script>