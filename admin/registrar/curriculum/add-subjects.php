<?php 
require '../../../config/config.php';
$cur_title = $_GET['curriculumtitle'];
$cur_year = $_GET['year'];
?>

<form id="subject_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="subject_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
      <div id="subject_forms"></div> 
      <div id="subject_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="addsubjectlbl">Add New Subject</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

        

 <div class="row"> <!-- ROW Start Here -->
            <div class="col-lg-6"> <!-- left column Start -->        

<label id="subject_id" hidden></label>
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

    <div class="sample-lines" style=" overflow: auto;">
      <div class="show-result-searchs">
        <span id="searchsubject"></span>
      </div>              
    </div>
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





  <div class="form-group" id="yrinput">
    <small class="readonly">Year</small>
    <input type="email" list="list" class="form-control" id="year" size="18" aria-describedby="emailHelp" value="" readonly="true" placeholder="Choose Year Level">
    <datalist id="list">
      <option value="First Year">First Year</option>
      <option value="Second Year">Second Year</option>
      <option value="Third Year">Third Year</option>
      <option value="Fourth Year">Fourth Year</option>
      <option id="yrfifth" value="Fifth Year" style="display: none">Fifth Year</option>
    </datalist>
  </div>



<!-- Input Start Here -->        
<!-- <div id="subj_title" class="form-group">
  <input id="year" spellcheck=false class="form-control" type="text" size="18" alt="login" required="true" value="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="subject_title" class="float-label" style="font-family:Arial, FontAwesome">Year</label>
        <erroru>
          Year is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div> -->
<!-- Input End Here -->  



  <div class="form-group">
    <small class="readonly">Semester</small>
    <input type="email" class="form-control" id="semester" size="18" aria-describedby="emailHelp" value="" readonly>
  </div>



<!-- Input Start Here -->        
<!-- <div id="subj_title" class="form-group">
  <input id="semester" spellcheck=false class="form-control" type="text" size="18" alt="login" required="true" value="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="subject_title" class="float-label" style="font-family:Arial, FontAwesome">Semester</label>
        <erroru>
          Semester is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div> -->
<!-- Input End Here --> 



</div> <!-- left column End -->



<!-- Select Start Here --> 
<!-- <div class="box1">
  <label class="select-label">Year</label>
  <input type="text" name='' id="year" required>
    <option hidden>Choose Year</option>
    <option value="1styr">First Year</option>
    <option value="2ndyr">Second Year</option>
    <option value="3rdyr">Third Year</option>
    <option value="4thyr">Fourth Year</option>
    <option value="5thyr">Fifth Year</option>
  </select>
</div> -->
<!-- Select End Here --> 




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
  <input class="list" id="pre-reqlbl" list="pre-req" placeholder="Choose Pre-Requisite">
  <datalist class="list" name='' id="pre-req" required></datalist>
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

        <button type="button" class="save" id="save_btn" ripple><i class="fas fa-save"></i> <span id="save_btnlbl">Save</span></button>
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

      "ajax" : { 
            "url":"subj_fetch.php", 
            "data":{ 
              "title":"<?php echo $cur_title; ?>",
              "year":"<?php echo $cur_year; ?>"
            }
          },  


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

var table = $('#subj_table2').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : { 
            "url":"subj2_fetch.php", 
            "data":{ 
              "title":"<?php echo $cur_title; ?>",
              "year":"<?php echo $cur_year; ?>"
            }
          },  


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
function fetch_summer()
{
var table = $('#subj_summer').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : { 
            "url":"summer_fetch.php", 
            "data":{ 
              "title":"<?php echo $cur_title; ?>",
            }
          },  


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
  $('#searchsubject').hide();
  $('#save_btnlbl').text('Save');
  $('#subject_form').trigger('reset');
  $('#subject_forms_new').show();
  $('#subject_forms').hide();
}
 //para sa paglagay ng text sa ibang file  
  $('#add_sub').click(function  (){
      var y = $('#year_p').html();
      $('#year').val(y);
       var y = $('#fsem').html();
      $('#semester').val(y);
  });


  $('#add_sub2').click(function  (){
      var y = $('#year_p').html();
      $('#year').val(y);
       var y = $('#ssem').html();
      $('#semester').val(y);
  });

  $('#add_sub3').click(function  (){
      var y = $('#year_p').html();
      $('#semester').val(y);
  });

function Firstyrlbl() 
{
   var fyear = document.getElementById('year_p');
   var firstyear = 'First Year';
   fyear.innerText = firstyear;    
   window.history.pushState("", "", "curriculum-subjects?curriculumtitle=<?php echo $_GET['curriculumtitle']; ?>&year=First Year");
   $('#subj_table2').DataTable().destroy();
   $('#subj_table').DataTable().destroy();
   fetch_subjects();
}

function Secondyrlbl() 
{
   var syear = document.getElementById('year_p');
   var secyear = 'Second Year';
   syear.innerText = secyear;       
   window.history.pushState("", "", "curriculum-subjects?curriculumtitle=<?php echo $_GET['curriculumtitle']; ?>&year=Second Year");
   $('#subj_table').DataTable().destroy();
   $('#subj_table2').DataTable().destroy();
   fetch_subjects();
}
function Thirdyrlbl() 
{
   var tyear = document.getElementById('year_p');
   var thirdyear = 'Third Year';
   tyear.innerText = thirdyear;   
   window.history.pushState("", "", "curriculum-subjects?curriculumtitle=<?php echo $_GET['curriculumtitle']; ?>&year=Third Year");  
   $('#subj_table2').DataTable().destroy();
   $('#subj_table').DataTable().destroy();
   fetch_subjects();  
}
function Fourthyrlbl() 
{
   var foyear = document.getElementById('year_p');
   var fourthyear = 'Fourth Year';
   foyear.innerText = fourthyear;   
   window.history.pushState("", "", "curriculum-subjects?curriculumtitle=<?php echo $_GET['curriculumtitle']; ?>&year=Fourth Year");  
   $('#subj_table2').DataTable().destroy();
   $('#subj_table').DataTable().destroy();
   fetch_subjects();  
}
function Fifthyrlbl() 
{
   var fiyear = document.getElementById('year_p');
   var fifthyear = 'Fifth Year';
   fiyear.innerText = fifthyear;     
   window.history.pushState("", "", "curriculum-subjects?curriculumtitle=<?php echo $_GET['curriculumtitle']; ?>&year=Fifth Year");  
   $('#subj_table2').DataTable().destroy();
   $('#subj_table').DataTable().destroy();
   fetch_subjects();
}

//save subject
  $('#save_btn').click(function(){
    
    var scdiv = $('#subj_code');
    var stdiv = $('#subj_title');
    var slediv = $('#subj_lec');
    var sladiv = $('#subj_lab');
    var sudiv = $('#subj_units');

    var umsg = $('errorun');


    var buttonlbl = $('#save_btn').text();
    var subjid = $('#subject_id').text();
    var subjcode = $('#subject_code').val();
    var subjtitle = $('#subject_title').val();
    var subjlec = $('#subject_lecture').val();
    var subjlab = $('#subject_laboratory').val();
    var subjyear1 = $('#year').val();
    var subjsem1 = $('#semester').val();
    var subjpre = $('#pre-reqlbl').val();
    var subjunits = $('#subject_unit').val();
    var currtitle = "<?php echo $_GET['curriculumtitle']; ?>";
    if(subjyear1 == 'First Year') { var subjyear = '1styr'; }
    if(subjyear1 == 'Second Year') { var subjyear = '2ndyr'; }
    if(subjyear1 == 'Third Year') { var subjyear = '3rdyr'; }
    if(subjyear1 == 'Fourth Year') { var subjyear = '4thyr'; }
    if(subjyear1 == 'Fifth Year') { var subjyear = '5thyr'; }
    if(subjsem1 == 'First Semester') { var subjsem = '1stsem'; }
    if(subjsem1 == 'Second Semester') { var subjsem = '2ndsem'; }
    if(subjsem1 == 'Summer') { var subjsem = 'summer'; }

    if(subjcode == '' || subjtitle == '' || subjlec == '' || subjlab == '' || subjunits == '' || subjpre == '' || subjyear1 == ''){
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
      if(subjpre == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Pre-Requisite is Required.');
      }
      if(subjyear1 == '')
      {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Year Level is Required.');
      }
    }
    else{
      $.ajax({
        url:'process.php',
        method:'POST',
        data:{"addsubject":1,subjcode:subjcode,subjtitle:subjtitle,subjlec:subjlec,subjlab:subjlab,subjyear:subjyear,subjsem:subjsem,subjpre:subjpre,subjunits:subjunits,currtitle:currtitle,buttonlbl:buttonlbl,subjid:subjid},
        success:function(data)
        {
          if(data == "0"){
            scdiv.attr('errr','');
            umsg.html('Course Code is already exists.');
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Course Code is already exists.');
          }
          else if(data == "1"){
            $('#subject_modal').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Subject added successfully.');
            if($('#year_p').html() == 'Summer')
            {
              $('#subj_summer').DataTable().destroy();
              fetch_summer();
            }
            else
            {
              $('#subj_table').DataTable().destroy();
              $('#subj_table2').DataTable().destroy();
              fetch_subjects();
            }
            
            reset();
          }
          else if(data == "updated"){
            $('#subject_modal').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Subject updated successfully.');
            if($('#year_p').html() == 'Summer')
            {
              $('#subj_summer').DataTable().destroy();
              fetch_summer();
            }
            else
            {
              $('#subj_table').DataTable().destroy();
              $('#subj_table2').DataTable().destroy();
              fetch_subjects();
            }
            reset();
          }
          else
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html(data);
          }
        }
      });
    }
  });
 //auto search for subject
      $('#subject_code').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"autosearch":1,query:query},  
                     success:function(data)  
                     {  
                          $('#searchsubject ').fadeIn();  
                          $('#searchsubject').html(data);  
                     }  
                });  
           } 

          document.getElementById("searchsubject").style.display = "none";
      });  

       $(document).on('click', '#searchsubject li', function(){  
        var id = $(this).attr("id");
         $('#subject_code').val($('#ascode'+id).text());  
         $('#subject_title').val($('#astitle'+id).text());  
         $('#pre-reqlbl').val($('#aspre'+id).text());  
         $('#subject_lecture').val($('#aslec'+id).text());  
         $('#subject_laboratory').val($('#aslab'+id).text());  
         $('#subject_unit').val($('#asunit'+id).text());  
         $('#searchsubject').fadeOut(); 
       });

</script>