<!-- Head -->
<?php 
require ('../../config/config.php'); 
require '../../src/layout/admission/head.php'; 
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables-dark.css">

  <title>GRC System | Admission</title>

</head>
  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/admission/side-nav.php'; ?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        <!-- Top Nav -->
        <?php require '../../src/layout/admission/top-nav.php'; ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Students Information</li>
              </ol>
            </nav>

            <!-- SPACER -->
            <div class="mx-auto" style="height: 20px;"></div>

      <div class="card shadow-sm mb-5"> <!-- card start -->

        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

          <h5 class="m-0">Student List</h5>

          <a>
<button type="button" id="viewcred" class="delete-user pull-xs-right edit" ripple><i class="fas fa-eye"></i> View Credentials</button> &nbsp;&nbsp;&nbsp;
<button type="button" id="addstud" class="view-user pull-xs-right edit" ripple><i class="fas fa-plus"></i> Add Student</button>    
          </a>      

        </div>

      <div class="card-body" >

        <table id="stud_table" class="display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>S.I.S. No.</th>
              <th>Student No.</th>
              <th>Last name</th>
              <th>First name</th>
              <th>Middle name</th>
              <th>Contact Number</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>

      </div>

      </div> <!-- card end -->

          </div>
          <!-- /.container-fluid -->
   
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php require '../../src/layout/footer.php'; ?>
        <?php require 'admission-view-student-details.php'; ?>

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button -->
        <?php require '../../src/layout/go-to-top.php'; ?>

<!-- Button Effect -->
<script src="../../src/js/button-effect.js"></script> 

<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Are you sure to delete this Student?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="confirmdelete_btn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>

<form id="formcomp">
<!-- Modal -->
<div class="modal fade" id="subjects" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="table-responsive">
                <table class="table table-bordered mt-5">
                  <thead>
                    <tr>
                      <th scope="col">Subject</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Year&nbsp;Taken</th>
                      <th scope="col">Instructor</th>
                       <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="addsubject">
                    <tr id="1" class="tr1">
                      <th scope="row" id="code1">
                        <input list="data" type="text" class="input-table2 subcode" name="1" placeholder="Insert Subject Code" id="subcode1">
                        <datalist id="data">
                        </datalist>
                      </th>
                      <td id="sunit1"></td>
                      <td id="yrtaken1" nowrap></td>
                      <td id="instructor1" nowrap></td>
                      <td><button type="button" id="1" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i>  Remove</button></td>
                    </tr>    
                  </tbody>
                </table>       


    <button type="button" id="addrow" class="edit-user pull-xs-right mb-3" ripple><i class="fas fa-plus"></i> Add Row</button> 

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" ripple data-dismiss="modal"><i class="fas fa-times"></i> CANCEL</button>

        <button type="button" class="save" id="printcomp" ripple><i class="fas fa-print"></i> PRINT</button>        
      </div>
    </div>
  </div>
</div>
</form>
<!-- Modal Start -->
<div class="modal fade" id="shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shifting Form</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row"> <!-- ROW Start Here -->
            <div class="col-lg-6"> <!-- left column Start -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                <small class="readonly">Student Number</small>
                <input id="smstudentnumber" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                  <small class="readonly">Student Name</small>
              <input id="smfullname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->        
              <!-- Select Start Here --> 
              <div id="" class="form-group">
                    <small class="readonly">School Year</small>
                <input id="smsy" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Select End Here --> 
              <!-- Select Start Here --> 
              <div id="" class="form-group">
                    <small class="readonly">Semester</small>
                <input id="smsem" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Select End Here --> 
            </div> <!-- left column End -->
            <div class="col-lg-6">  <!-- Right column Start -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">Current Course And Major</small>
                <input id="smcourse" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->   
              <!-- Input Start Here -->        
              <div class="box1">
                <label class="select-label">New Course</label>
                <select name='' id="course" required>
                  <option hidden>Choose Course</option>
                  <option value="BSIT">BSIT</option>
                  <option value="BSBA">BSBA</option>
                  <option value="BSEntrep">BSEntrep</option>
                  <option value="BSA">BSA</option>
                  <option value="BSEd">BSEd</option>
                  <option value="BEED">BEEd</option>
                </select>
              </div>
              <br>
              <div class="box1">
                <label class="select-label">New Major</label>
                <select name='' id="major" required>
                  <option hidden>Choose Major</option>
                  <option id="prog" value="Programming" style="display: none">Programming</option>
                  <option id="hr" value="Human Resources" style="display: none">Human Resources</option>
                  <option id="mm" value="Marketing Management" style="display: none">Marketing Management</option>
                  <option id="entrep" value="Entrepreneurship" style="display: none">Entrepreneurship</option>
                  <option id="acc" value="Accountancy" style="display: none">Accountancy</option>
                  <option id="eng" value="English" style="display: none">English</option>
                  <option id="math" value="Mathematics" style="display: none">Mathematics</option>
                  <option id="pe" value="Physical Education" style="display: none">Physical Education</option>
                  <option id="ge" value="General Education" style="display: none">General Education</option>
                </select>
              </div>  <br>
              <!-- Input End Here -->   
              <textarea class="textarea-input" id="reason" name="subject" placeholder="Write your reason..." style="height:140px"></textarea>
            </div> <!-- Right column Start -->
          </div> <!-- ROW End Here -->
          <div class="modal-footer">
            <button type="button" class="edit-user" id="saveshift" ripple><i class="fas fa-check"></i> SAVE</button>
            <button type="button" class="delete-user" data-dismiss="modal" ripple><i class="fas fa-times"></i> CLOSE</button>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

<!-- Modal -->
<div class="modal fade" id="permit" tabindex="-1" role="dialog" aria-labelledby="requestlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="requestlabel">Test Permit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <small class="readonly">Place of Exam</small>
          <input type="text" class="form-control" id="tpplace" size="18" placeholder="" value="">
        </div>    

        <div class="form-group">
          <small class="readonly">Date</small>
          <input type="date" class="form-control" id="tpdate" size="18" placeholder="" value="">
        </div> 

        <div class="form-group">
          <small class="readonly">Time</small>
          <input type="time" class="form-control" id="tptime" size="18" placeholder="" value="">
        </div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="save" id="printpermit" ripple><i class="fas fa-print"></i> Print</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="requestlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="requestlabel">Request Letter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <small class="readonly">Principal or Registrar</small>
          <input type="text" class="form-control" id="principal" size="18" placeholder="" value="">
        </div>    

        <div class="form-group">
          <small class="readonly">Address</small>
          <input type="text" class="form-control" id="address" size="18" placeholder="" value="">
        </div>    

        <div class="form-group">
          <small class="readonly">Academic Year</small>
          <input type="text" class="form-control" id="acadyear" size="18" placeholder="0000-0000" value="">
        </div>   

        <label class="container-check">First Request
          <input type="checkbox" id="fr">
          <span class="checkmark-check"></span>
        </label>  

        <label class="container-check">Please Entrust to bearer
          <input type="checkbox" id="eb">
          <span class="checkmark-check"></span>
        </label>

      </div>
      <div class="modal-footer">
        <button type="button" class="save" id="printrequest" ripple><i class="fas fa-print"></i> Print</button>
      </div>
    </div>
  </div>
</div>
        <div class="alert-box success">
          <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

        <div class="alert-box failed">
          <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

<script type="text/javascript">

function fetch_students(){
  var table = $('#stud_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 0, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "admission-student-fetch.php",

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

$(document).ready(function() {
var student_number;
fetch_students();

$(document).on( 'click', '#viewcred', function (e) {
    window.location.href = 'admission-view-credentials';
});

$(document).on( 'click', '#addstud', function (e) {
    window.location.href = 'student/admission-student-information?sisnum=0';
});

$('#stud_table').on( 'click', 'button.proceed', function (e) {
    var id = $(this).attr('id');
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"proceedstudent":1,id:id},
      success:function(data){
          window.location.href = data+'?sisnum='+id;
        }
      });
});
var subid = '';
$(document).on( 'click', 'button.compform', function (e) {
    subid = $(this).attr('id');
    var id = $(this).attr('id');
    //for subject code  
    $.ajax({  
        url:"process.php",
        method:"POST",  
        data:{"searchsubject":1,id:id},  
        success:function(data)  
        {    
          $('#data').html(data);
        }  
        });
  });

    //add row for completion form
    $('#addrow').click(function() {
      var id = $(this).attr("id");
      var count = $('#addsubject tr').last().attr('id');
      if(typeof count == "undefined")
      {
        count = '0';
      }
      var trid = Number(count)+1;
      $('#addsubject').append('<tr id="'+trid+'" class="tr'+trid+'"><th scope="col" id="'+trid+'"><input type="text" list="data" class="input-table2 subcode" placeholder="Insert Subject Code" name="'+trid+'" id="subcode'+trid+'"><datalist id="data"></datalist></th><td scope="col" id="sunit'+trid+'"></td><td scope="col" id="yrtaken'+trid+'" nowrap></td><td scope="col" id="instructor'+trid+'" nowrap></td><td scope="col"><button id="'+trid+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');
    });

    //remove subject
    $(document).on('click', '.delete', function(){
      var id2 = $(this).attr("id");
      $('.tr'+id2).remove(); 
      var id = subid;
          //for subject code  
          $.ajax({  
              url:"process.php",
              method:"POST",  
              data:{"searchsubject":1,id:id},  
              success:function(data)  
              { 
                $('#data').html(data);
              }  
              });
    });

      //accepting summer sched
     $('#printcomp').click(function() {
      var c = 0;
      var dup = 0;
      var count = $('#addsubject tr').last().attr('id');
      var getsubject2 = 'forms/completion-form?';
      var get_subject = '';

            for(var i = 1; i <= count; i++)
            {
              var subjcode = $('#subcode'+i).val();
              var subjunit = $('#sunit'+i).text();
              if(typeof subjcode == 'undefined')
              {

              }
              else
              {
                  if(subjunit == '')
                  {
                    c++;
                    (function() {
                    var $el = $('.tr'+i),
                    originalColor = $el.css("background");
                    $el.css("background", "#ffc1bd");
                    setTimeout(function () {
                        $el.css("background", originalColor);
                    }, 3000); })(i);
                  }
                  else
                  {
                      var duplicate = 0;
                       //for checking if duplicate subject inputted
                        for(var ii = 1; ii <= count; ii++)
                          {
                              var subjcode2 = $('#subcode'+ii).val();
                              if(typeof subjcode2 == 'undefined')
                              {

                              }
                              else
                              {
                                if(subjcode == subjcode2)
                                  {
                                    duplicate++;
                                  }
                              }
                          }

                        if(duplicate == 1)
                        {
                                  (function() {
                                    var $el = $('.tr'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#1C00ff00");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);
                                   
                                  if( i == 1){get_subject = 'data'+i+'='+subjcode;}
                                  else{get_subject = '&data'+i+'='+subjcode;}
                                  getsubject2 = getsubject2+get_subject;
                        }
                        else
                        {
                                  (function() {
                                    var $el = $('.tr'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#a6c8ff");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);
                                  
                                  dup++; 
                        }
                    }
              }        
            }
              if(c > 0 && dup > 0)
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Invalid Subject Code and Duplicate Subject');
              }
              else if(c > 0)
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Invalid Subject Code');
              }
              else if (dup > 0)
              {
                 $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                 $("#failedmsg").html('Duplicate Subject Code');
              }
              else
              {
                  window.open(getsubject2+'&sisnum='+subid);
                  $('#subjects').modal('hide');
              }

     });
    //getting subjects details
         $(document).on('keyup', '.subcode', function(){
            var id = $(this).attr("name");
             var query = $(this).val();
              //subject details
               $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"searchsubjectdetails":1,query:query},  
               success:function(data)  
               { 
                  var result = $.parseJSON(data);
                  $('#sunit'+id).text(result.unit);
                  $('#yrtaken'+id).text(result.sem+'-'+result.year);
                  $('#instructor'+id).text(result.name);
               }  
            }); 
        });

$('#stud_table').on( 'click', 'button.edit', function (e) {
    var studnum = $(this).attr("id");
    $('#id_val').val(id);
    $.ajax({
      url:"process.php",
      method:"POST",
      data:{"edit":1,id:id},
      success:function(data){
        $('#student_forms').html(data);
        $('#student_forms').show();
        $('#student_forms_new').hide();
      }
    });
});

$('#stud_table').on( 'click', 'button.delete', function (e) {
    studnum = $(this).attr("id");
   
});

$('#confirmdelete_btn').click(function(){
  $('#yesorno').modal('hide');
  $.ajax({
    url:"process.php",
    method:"POST",
    data:{"deletestudent":1,studnum:studnum},
    success:function(data){
      $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#successmsg").html(data);
      $('#stud_table').DataTable().destroy();
      fetch_students();
    }
  }); 
});

//for shifting student
$('#stud_table').on( 'click', 'button.shift', function (e) {
    sisnum = $(this).attr("id");
     $.ajax({
        url:"process.php",
        method:"POST",
        data:{"shiftstudinfo":1,sisnum:sisnum},
        success:function(data){

          var result = $.parseJSON(data);
          $('#smstudentnumber').val(result.studnum);
          $('#smfullname').val(result.fullname);
          $('#smsy').val(result.schoolyear);
          $('#smsem').val(result.semester);
          $('#smcourse').val(result.course);

          if(result.studnum == '' || result.studnum == null)
          {
              $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $("#failedmsg").html('Student is not yet Enrolled in GRC');
          }
          else
          {
              $('#shift').modal('show');
          }
        }
      });
});

$(document).on( 'click', '.testpermit', function (e) {   
  var sisnum= $(this).attr('id');
  $('#permit').modal('show');
    $(document).on( 'click', '#printpermit', function (e) {
        var place = $('#tpplace').val();
        var date = $('#tpdate').val();
        var time = $('#tptime').val();
        if(place == '' || date == '' || time == '')
        {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('All field must have value');
        }
        else
        {
            window.open('forms/print-test-permit?sisnum='+sisnum+'&place='+place+'&date='+date+'&time='+time);
            $('#permit').modal('hide');
            $('#tpplace').val('');
            $('#tpdate').val('');
            $('#tptime').val('');
        }
    });
});

$(document).on( 'click', '.requestletter', function (e) {   
  var sisnum= $(this).attr('id');
  $('#request').modal('show');
    $(document).on( 'click', '#printrequest', function (e) {
        var year = $('#acadyear').val();
        var name = $('#principal').val();
        var add = $('#address').val();
        if($('#fr').is(':checked')) 
          { var fr = "1"; } else { var fr = "0"; }
        if($('#eb').is(':checked')) 
          { var eb = "1"; } else { var eb = "0"; }
        if(name == '' || year == '' || add == '')
        {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('All field must have value');
        }
        else
        {  
            window.open('forms/print-tor?sisnum='+sisnum+'&name='+name+'&year='+year+'&address='+add+'&fr='+fr+'&eb='+eb);
            $('#request').modal('hide');
            $('#acadyear').val('');
            $('#principal').val('');
            $('#address').val('');
            $('#fr').prop('checked', false);
            $('#eb').prop('checked', false);
        }
    });
});

//choosing of course in shift
  $('#course').change(function(){
    var val = $(this).val();
    var math = $('#mathave').val();
    var english = $('#engave').val();
    if(val == 'BSIT'){
      $('#prog').show();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BSBA'){
      $('#prog').hide();
      $('#hr').show();
      $('#mm').show();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BSA'){
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').show();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BSEd'){
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').show();
      $('#math').show();
      $('#pe').show();
      $('#ge').hide();
      if (math < 85){
        $('#math').hide();
      }
      if (english < 85){
        $('#eng').hide();
      }
    }
    else if(val == 'BSEntrep'){
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').show();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BEED'){
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').show();
    }
    else{
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
  });
});
</script>

  <!-- TABLE js -->
<script src="../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../src/vendor/table/js/dataTables.responsive.min.js"></script>


  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Counter -->
  <script src="../../src/js/counter.js"></script>

</body>

</html>
