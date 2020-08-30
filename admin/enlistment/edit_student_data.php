<!-- Head -->
<?php 
require '../../src/layout/enlistment/head.php'; 
require ('../../config/config.php');  
$studnum = base64_decode($_GET['studentnumber']);
?>


<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


  <title>GRC System | Registrar</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/enlistment/side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/enlistment/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Enrollment Record</li>
  </ol>
</nav>


<div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->

      
<!-- Input Start Here -->        
<div id="" class="form-group">
  <small class="readonly">Last Name</small>
  <input id="lastname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  
      

<!-- Input Start Here -->        
<div id="" class="form-group">
  <small class="readonly">First Name</small>
  <input id="firstname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  


<!-- Input Start Here -->        
<div id="" class="form-group">
  <small class="readonly">Middle Name</small>
  <input id="middlename" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readolny>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
 </div>
<!-- Input End Here -->  


            </div> <!-- left column End -->


            <div class="col-lg-6">  <!-- Right column Start -->

            
<!-- Input Start Here -->        
<div id="" class="form-group">
  <small class="readonly">StudentNo.</small>
  <input id="studentnum" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  

<!-- Input Start Here -->        
<div id="" class="form-group">
  <small class="readonly">Course</small>
  <input id="course" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  

<!-- Input Start Here -->        
<div id="" class="form-group">
  <small class="readonly">Major</small>
  <input id="major" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
</div>
<!-- Input End Here -->  

      <?php require 'available-sched-adc.php'; ?> 

            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->
<!-- For viewing by subject -->
<!-- viewing by student of Section -->
<div class="card shadow-sm mb-4" id="bysubjectview">
        <a href="#bysubjectcollapse2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h5 class="m-0 text-muted">Subjects</h5>
      </a>
      <!-- Card Content - Collapse -->
       <div class="collapse show" id="bysubjectcollapse2">
      
 <div class="card-body">

<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
  <caption><button  class="view-user pull-xs-right addsubj" ripple><i class="fas fa-plus"></i> ADD SUBJECT</button> </caption>
  <thead>
    <tr>
      <th colspan="3" style="color: red">Subject Details</th>
      <th colspan="3"></th>
      <th colspan="4" style="color: red">Lecture Details</th>
      <th colspan="4" style="color: red">Other Details</th>
      <th></th>
    </tr>
    <tr>
      <th scope="col" nowrap>Sub Code</th>
      <th scope="col">Sub Title</th>
      <th scope="col">unit</th>  
      <th scope="col">Section</th>  
      <th scope="col">Course</th>  
      <th scope="col">Major</th>  
      <th scope="col">Day</th>  
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Room</th>
      <th scope="col">Day</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Room</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="editstudentdata">

  </tbody>
  <tfoot class="table-borderless">
    <tr>
      <th scope="row" colspan="2">Max Unit: <label id ="maxunits">24</label></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <th colspan="2">Total Unit : <label id ="totalunit">0</label></th>
      <td></td>
    </tr>
  </tfoot>
</table>
</div>

<div class="modal-footer">

<button type="button" class="cancel" data-toggle="modal" data-target="#cancelnotif"  ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="savenew" ripple><i class="fas fa-save"></i> SAVE</button>

</div>
        <!-- /.container-fluid -->
</div>
      <!-- End of Main Content (viewing by subject) -->
 </div><!-- End of Card Content - Collapse -->


      </div>
        <!-- /.container-fluid -->
<!------------------------------------------------------------------------------------------------------------>
   
<!-- viewing by student of Section -->
<div class="card shadow-sm mb-4" id="othersubjects" style="display: none;">
        <a href="#bysubjectcollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h5 class="m-0 text-muted">Other Subjects</h5>
      </a>
      <!-- Card Content - Collapse -->
       <div class="collapse show" id="bysubjectcollapse">
      
 <div class="card-body">

<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Sub Code</th>
      <th scope="col">Sub Title</th>
      <th scope="col">Year Level</th>  
      <th scope="col">Lec</th>  
      <th scope="col">Lab</th>  
      <th scope="col">Unit</th>  
      <th scope="col">Pre-Req</th>
      <th scope="col">Available</th>
    </tr>
  </thead>
  <tbody id="schedule">

  </tbody>
</table>

  <div class="modal-footer">
</div>

</div>
        <!-- /.container-fluid -->
</div>
      <!-- End of Main Content (viewing by subject) -->
 </div><!-- End of Card Content - Collapse -->

<!------------------------------------------------------------------------------------------------------------>

  <!-- Modal Start -->
  <div class="modal fade" id="student-modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subject</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">


<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Student Number</th>
      <th scope="col">Student Name</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Sample</th>
      <td>Sample</td>
      <td>Sample</td>
    </tr>
  </tbody>
</table>
</div>


          <div class="modal-footer">

<button type="button" class="cancel" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="" ripple><i class="fas fa-save"></i> SAVE</button>

          </div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->


      </div>
        <!-- /.container-fluid -->
 
      </div>
      <!-- End of Main Content -->



      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>


  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
<!-- Button Effect -->
<script src="../../src/js/button-effect.js"></script> 
<!-- drop notif -->
<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Drop this Subject?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="drop_btn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- cancel notif -->
<div class="modal fade" id="cancelnotif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Are you sure you want to Cancel?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" ripple><i class="fas fa-times"></i> No</button>
        <a href="enrollment-record-by-student"><button type="button" class="save" ripple><i class="fas fa-check"></i> Yes</button></a>
      </div>
    </div>
  </div>
</div>

  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>





  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../src/js/counter.js"></script>
  <script type="text/javascript">
  var id = '<?php echo $studnum; ?>';
  var subid;
//for student's information
$.ajax({  
    url:"process.php",  
    method:"post",  
    data:{"studentname":1,id:id},  
    success:function(data)
    {   
       var result = $.parseJSON(data);
       $('#studentnum').val(result.student_number);
       $('#firstname').val(result.firstname);
       $('#lastname').val(result.lastname);
       $('#middlename').val(result.middlename);
       $('#course').val(result.course);
       $('#major').val(result.major);
    }
  });

  //get student enrolled subjects
  $.ajax({  
    url:"process.php",  
    method:"post",  
    data:{"edit-stud-enrollment-data":1,id:id},  
    success:function(data)
    {   
      $('#editstudentdata').html(data);
    var un = 0; var totunits = 0; var total = 0;
    var table = document.getElementById("editstudentdata");
    var totalrowcount = table.rows.length;
    for(var i = 1; i <= totalrowcount; i++)
    {
      var un = $('#unit'+i+'').text();
      var total = Number(total) + Number(un);
    }
      $('#totalunit').text(total); 
    }
  });

  
// adding of schedule
  $(document).on('click','button.scheddetail', function(){
  var id= $(this).attr("id");
    $('#savebtn2').show();
    $('#savebtn').hide();
    var subjectcode= $('#sc'+id).text();
    var subjtitle= $('#st'+id+'').text();
    var units = $('#un'+id+'').text();
    var rowid = id;
    $('#savelbl2').text(' SAVE');
    $('#subjectcode').html(subjectcode);
    $('#subjecttitle').html(" - "+subjtitle);
    $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"getscheddata":1,subjectcode:subjectcode,subjtitle:subjtitle,units:units,rowid:rowid},  
           success:function(data)  
           {    
                $('#getsched').fadeIn();  
                $('#getsched').html(data);
                $('#available-modal').modal('toggle');    
                $('#available-modal').modal('show');    
           }  
        });  
  });

//drop subject
$(document).on('click','button.drop', function(){
  subid= $(this).attr("id");  
  });
$(document).on('click','#drop_btn', function(){
  var un = $('#unit'+subid+'').text();
  var totunits = $('#totalunit').text();
  var total = Number(totunits) - Number(un);
  $('#totalunit').text(total); 
  $('#hide'+subid+'').show(); 
  $('#hide2'+subid+'').show(); 
  $("#cs"+subid+" th").eq(1).nextUntil("tr").hide();
  $('#yesorno').modal('hide');
  });


//view other subjects
$(document).on('click','.addsubj', function(){
   $('#othersubjects').show();
   $(this).hide();
  var studnum = $('#studentnum').val();
  $.ajax({  
           url:"add-drop-process.php",  
           method:"POST",  
           data:{"getstudsubj":1,studnum:studnum},  
           success:function(data)  
           {  
                $('#schedule').html(data);  
           }  
        });  
});


//save new subjects
$(document).on('click','#savenew', function(){

    var table = $('#editstudentdata td').last().attr('id');
    for(var i = 1; i <= table;i++)
    {
        if($('#scode'+i+'').is(':hidden') || typeof $('#scode'+i+'').text() == 'undefined' || $('#scode'+i+'').text() == '')
        {
        }
        else
        {
            alert($('#scode'+i+'').text());
        }
    }

});
  </script>

</body>

</html>
