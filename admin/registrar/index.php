<!-- Head -->
<?php 

  require '../../src/layout/registrar/head.php'; 
  include('../../config/config.php');
  date_default_timezone_set("Asia/Manila");
?>

  <!-- jquery -->
  <script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Registrar</title>

  <style type="text/css">
  table th .input-table {
    top:0;
    left:0;
    margin: 0;
    border: 1px solid #c9c9c9;
    padding: 5px;
    width: 45%;
    box-sizing: border-box;
    background-color: transparent;
  } 

  table th .select-table {
    top:0;
    left:0;
    margin: 0;
    border: none;
    padding: 10px;
    box-sizing: border-box;
    background-color: transparent;
    color: #777;
  }  
   </style>
</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/registrar/side-nav.php'; ?>

    <?php
    //timeframe for checking of school year and semester
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

    $result = mysqli_query($conn, "SELECT * FROM subject where status='Active'");
    $rows = mysqli_num_rows($result);

    $result2 = mysqli_query($conn, "SELECT DISTINCT student_enrollment_record.student_number FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id WHERE schedule.semester='$semester' AND schedule.school_year = '$schoolyear'");
    $rows2 = mysqli_num_rows($result2);

    $result3 = mysqli_query($conn, "SELECT * FROM curriculum");
    $rows3 = mysqli_num_rows($result3);

    $result5 = mysqli_query($conn, "SELECT * FROM user where usertype='Admin'");
    $rows5 = mysqli_num_rows($result5);

    $result6 = mysqli_query($conn, "SELECT DISTINCT faculty_id FROM schedule where semester='$semester' AND school_year = '$schoolyear'");
    $rows6 = mysqli_num_rows($result6);

    $result7 = mysqli_query($conn, "SELECT DISTINCT section FROM schedule WHERE semester='$semester' AND school_year='$schoolyear'");
    $rows7 = mysqli_num_rows($result7);

    $result8 = mysqli_query($conn, "SELECT student_number FROM student_info WHERE semester='$semester' AND school_year='$schoolyear' AND student_number != ''");
    $rows8 = mysqli_num_rows($result8);
    ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Top Nav -->
        <?php require '../../src/layout/registrar/top-nav.php'; ?>
         <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>
        <!-- Cards Total Start Here 1 -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Students Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Students
                </div>
              <div class="student-color">
                <span class="float-left"><h4 class="counts"><?php echo $rows2; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>
              </div>
            </div>
          </div> <!-- Students End Here -->
          <div class="col-xl-3 col-sm-6 mb-3"> <!-- New enrollees Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  New enrollees
                </div>
              <div class="new-enrollees-color">
                <span class="float-left"><h4 class="counts"><?php echo $rows8; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-user"></i></h4></span>
              </div>
            </div>
          </div> <!-- New enrollees End Here -->
          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Subjects Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Subjects
                </div>
              <div class="subjects-color">
                <span class="float-left"><h4 class="counts"><?php echo $rows; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-book"></i></h4></span>
              </div>
            </div>
          </div> <!-- Subjects End Here -->
          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Instructor Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Instructor
                </div>
              <div class="instructor-color ">
                <span class="float-left"><h4 class="counts"><?php echo $rows6; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-user-tie"></i></h4></span>
              </div>
            </div>
          </div>  <!-- Instructor End Here -->                   
        </div>
<!-- Cards Total End Here 1 -->

<!-- Cards Total Start Here 2 -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Sections Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 sections-bg">
                 Sections
                </div>
              <div class="sections-color">
                <span class="float-left"><h4 class="counts"><?php echo $rows7; ?></h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>
              </div>
            </div>
          </div> <!-- Sections End Here -->
          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Admins Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 admins-bg">
                  Admins
                </div>
              <div class="admins-color">
                <span class="float-left"><h4 class="counts"><?php echo $rows5; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-user-shield"></i></h4></span>
              </div>
            </div>
          </div> <!-- Admins End Here -->
          <div class="col-xl-3 col-sm-6 mb-3"> <!--  Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 none-bg">
                  Curriculum
                </div>
              <div class="none-color">
                <span class="float-left"><h4 class="counts"><?php echo $rows3; ?></h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>
              </div>
            </div>
          </div> <!--  End Here -->              
        </div>
<!-- Cards Total End Here 2 -->


 <div class="row mt-2"> <!-- ROW Start Here -->
  <div class="col-lg-6"> <!-- left column Start -->
    <div class="card shadow-sm mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h5 class="m-0">Enlistment schedule</h5>
          <button id="start" class="add-user pull-xs-right edit" data-toggle="modal" data-target="#yesorno" ripple>
            <i class="fas fa-play"></i> START
          </button> 
          <button type="button" id="stop" data-toggle="modal" data-target="#yesorno" style="display: none" class="view-user pull-xs-right" ripple><i class="fas fa-stop"></i> STOP
          </button>
      </div>
      <div class="card-body">
      <?php 
        $query = "Select * from timeframe";
        $result1 = $conn-> query($query); 

          $rows1=mysqli_fetch_assoc($result1);
          if($rows1 > 0)
          {
            $sy = $rows1['date_from'];
            $sem = $rows1['date_to'];
          }
          else
          {
            $sy = "";
            $sem = "";
          }
       ?>

<div class="table-responsive" style="text-align: center;">
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="d-flex justify-content-between">
        <input type="text" class="input-table" placeholder="" id="sy1">
        -
        <input type="text" class="input-table" placeholder="" id="sy2">
      </th>

      <th scope="col">
        
        <select class="select-table" id="semesterlbl">
          <option selected disabled hidden>Choose Semester</option>
          <option value="fs">First Semester</option>
          <option value="ss">Second Semester</option>
          <option value="sm">Summer</option>
        </select> 

      </th>
    </tr>
    <tr>
      <th scope="col" class="start">Start</th></th>
      <th scope="col" class="end">End</th>
    </tr>
  </thead>
  <tbody id="daterange">
    <tr>
      <td><input type="date" class="date-table" id="datestart" value="<?php echo $sy; ?>"></td>
      <td><input type="date" class="date-table" id="datestop" value="<?php echo $sem; ?>"></td>
    </tr> 
  </tbody>
</table>
</div>
</div>
</div>
</div> <!-- left column End -->





<!-- ////////////////////////////////////////////   QUESTION ALERT START HERE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  <!-- Yes or No Modal-->
  <div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Are you sure?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="yes" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>
<!-- ////////////////////////////////////////////   QUESTION ALERT END HERE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->







            <div class="col-lg-6">  <!-- Right column Start -->

              <div class="card shadow-sm mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h5 class="m-0 text-muted">Petition request</h5>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">


<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Subject&nbsp;Title</th>
      <th scope="col">Student&nbsp;request</th>
      <th scope="col">Total</th>
      <th scope="col">&nbsp;&nbsp;Action&nbsp;&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $cou =0;
    $leadcount = 0;
    //getting semester and schoolyear
     $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];


    $query = "SELECT  petition_request.subject_code, petition_request.subj_id, subject.subject_title from petition_request 
    INNER JOIN subject ON petition_request.subject_code  = subject.subject_code where petition_request.status = 'Requested' AND school_year = '$schoolyear' AND semester='$semester' GROUP BY subject_code ";
    $result = mysqli_query($conn, $query); 
    if(mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
    $cou++;
    $subcode = $rows['subject_code'];
    $query1 = "SELECT subject_code from petition_request where subject_code ='$subcode' AND status='Requested'";
    $result1 = mysqli_query($conn, $query1); 
    $count1=mysqli_num_rows($result1);
    ?>
    <tr>
      <th scope="row" id="psid<?php echo $cou; ?>" hidden><?php echo $rows['subj_id']; ?></th>
      <th scope="row" id="ps<?php echo $cou; ?>"><?php echo $rows['subject_code']; ?></th>
      <td id="pst<?php echo $cou; ?>"><?php echo $rows['subject_title']; ?></td>
      <td id="psc<?php echo $cou; ?>" class="d-flex justify-content-center"><?php echo $count1; ?></td>
      <td><button id='<?php echo $cou; ?>' class="view-user pull-xs-right view" ripple><i class="fas fa-eye"></i>&nbsp;VIEW</button></td>
    </tr>
    <?php  } }
    else
    { ?>
      <tr><th colspan="4"><center>NO PETITION REQUESTED</center></th>
<?php } ?>
  </tbody>
</table>
</div>
                  

                </div>
              </div>

            </div> <!-- Right column Start -->
    </div>
</div> <!-- ROW End Here -->


<!-- Modal Start -->
<div class="modal fade" id="view-request-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vrm-subcode"></h5> - <h5 class="modal-title" id="vrm-subtitle"></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">

        

<div class="table-responsive">
<table class="table">
  <thead class="table-borderless">
    <tr><th colspan="3"></th></tr>
    <tr>
      <th scope="col">Student&nbsp;Name</th>
      <th scope="col">Course</th>
      <th scope="col">Major</th>
    </tr>
  </thead>
  <tbody id="adminpetitionview">
  </tbody>
  <caption id="totalpetitionrequest"></caption>
</table>
</div>



<div class="modal-footer">

<button type="button" class="view-user" id="acceptpetition" ripple><i class="fas fa-check"></i> ACCEPT</button>  

<button type="button" class="edit-user" id="printpetition" ripple><i class="fas fa-print"></i> PRINT</button>  

<button type="button" class="delete-user" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> CLOSE</button>

</div>

      </div>
    </div>
  </div>
</div> <!-- Modal End -->






        </div>
        <!-- /.container-fluid -->
   


      </div>
      <!-- End of Main Content -->


<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

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
  $(document).ready(function() {

  $.ajax({  
          url:"process.php",  
          method:"post",  
          data:{"enrollment":1},  
        success:function(data)
        {  
          $('#daterange').html(data); 
          $('#yesorno').modal('hide');
          if(data == 0)
          {
            $( "div.success" ).fadeIn( 300 ).delay( 5000 ).fadeOut( 400 );
            $("#successmsg").html('The Enrollment Ended!');
            $('#daterange').html('<tr><td><input type="date" class="date-table" id="datestart" value=""></td><td><input type="date" class="date-table" id="datestop" value=""></td></tr>'); 
            $('#start').show();
            $('#stop').hide();

            $.ajax({  
            url:"process.php",  
            method:"POST",  
            data:{"semesterinfo":1},  
            success:function(data)  
            {
                var result = $.parseJSON(data);
                $("#semesterlbl").val(result.sem);
                $("#sy1").val(result.sy1);
                $("#sy2").val(result.sy2);
            }  
            });  

          }
          else if($('#datestart').val() == "" || $('#datestop').val() == "" )
          {
            $('#start').show();
            $('#stop').hide();

            $.ajax({  
            url:"process.php",  
            method:"POST",  
            data:{"semesterinfo":1},  
            success:function(data)  
            {
                var result = $.parseJSON(data);
                $("#semesterlbl").val(result.sem);
                $("#sy1").val(result.sy1);
                $("#sy2").val(result.sy2);
            }  
            });  
          }
          else
          {
            $.ajax({  
            url:"process.php",  
            method:"POST",  
            data:{"semesterinfo":1},  
            success:function(data)  
            {
                var result = $.parseJSON(data);
                $("#semesterlbl").val(result.sem);
                $("#sy1").val(result.sy1);
                $("#sy2").val(result.sy2);
            }  
            });  
            document.getElementById("sy1").disabled = "true";
            document.getElementById("sy2").disabled = "true";
            document.getElementById("semesterlbl").disabled = "true";
            document.getElementById("datestart").disabled = "true";
            document.getElementById("datestop").disabled = "true";

            $('#start').hide();
            $('#stop').show();
          }
        }  
     });    


$('#start').click(function(){ a = '1'; });
$('#stop').click(function(){ a = '0'; });


//for the time frame of the incoming semester
  $('#yes').click(function(){
      var identifier = a;
      var startdate = $('#datestart').val();
      var stopdate = $('#datestop').val();
      var currentdate = '<?php echo date('Y-m-d'); ?>';
      var sem = $('#semesterlbl').val();
      var sy1 = $('#sy1').val();
      var sy2 = $('#sy2').val();
      var schoolyr = sy1+'-'+sy2;

        if (startdate == "" && stopdate == "")
        {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Start Date and Stop Date is required');
             $('#yesorno').modal('hide');
        }
        else if(startdate == "")
        {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Start Date is required');
            $('#yesorno').modal('hide');
        }
        else if (stopdate == "")
        {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Stop Date is required');
            $('#yesorno').modal('hide');
        }
        else if(startdate >= stopdate)
        {
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('Timeframe Error. Please check the Dates.');
          $('#yesorno').modal('hide');
        }
        else if (stopdate < currentdate)
        {
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('Stop Date must ahead to date today.');
          $('#yesorno').modal('hide');
        }
        else
        {
          $.ajax({  
            url:"process.php",  
            method:"post",  
            data:{"enrollmentstart":1,identifier:identifier,startdate:startdate,stopdate:stopdate,sem:sem,schoolyr:schoolyr},  
            success:function(data)
            {  
               $('#daterange').html(data); 
               $('#yesorno').modal('hide');
               if($('#datestart').val() == "" || $('#datestop').val() == "" )
               {
                document.getElementById("sy1").disabled = false;
                document.getElementById("sy2").disabled = false;
                document.getElementById("semesterlbl").disabled = false;
                document.getElementById("datestart").disabled = false;
                document.getElementById("datestop").disabled = false;
                $('#start').show();
                $('#stop').hide();
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html('Stop the Enrollment Successfully!');
                $('#yesorno').modal('hide');
               }
               else
               {
                document.getElementById("sy1").disabled = true;
                document.getElementById("sy2").disabled = true;
                document.getElementById("semesterlbl").disabled = true;
                document.getElementById("datestart").disabled = true;
                document.getElementById("datestop").disabled = true;
                $('#start').hide();
                $('#stop').show();
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html('Enrollment Date is now Set!');
                $('#yesorno').modal('hide');
               }
            }  
       });    
        }
  });

//viewing of petition subject
$(document).on('click', '.view', function(){  
  var id= $(this).attr("id");
  var subjcode = $('#ps'+id+'').text();
  window.subjcode2 = $('#ps'+id+'').text();
  window.subjid = $('#psid'+id+'').text();
  var subjtitle = $('#pst'+id+'').text();
  var total = $('#psc'+id+'').text();
  $('#vrm-subcode').text(subjcode);
  $('#vrm-subtitle').text(subjtitle);
  $('#totalpetitionrequest').text('Total of Students: '+ total);
  $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"getpetitionrequestdata":1,subjcode:subjcode},  
           success:function(data)  
           {  
                $('#adminpetitionview').html(data);  
                $('#view-request-modal').modal('show');
           }  
        });  
  });

// for printing
$(document).on( 'click','#printpetition', function (e) { 
  var subjcode = $('#vrm-subcode').text();
  var newWin = window.open('print.php?data='+subjcode);
        newWin.document.close();
        newWin.focus();
        newWin.print();
});
  
//for accepting of petiotion subjects
$(document).on('click', '#acceptpetition', function(){  
  window.location.href ='schedule/add-petition?subject='+window.subjcode2+'&subjid='+window.subjid;
 });


});

  </script>

</body>

</html>
