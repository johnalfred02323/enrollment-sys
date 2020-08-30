<!-- Head -->
<?php 
require 'layout/head.php'; 
include('../../../config/config.php');
$course = $_SESSION['course'];
$major = $_SESSION['major'];
?>


<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">


  <title>GRC System | Faculty Head</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'layout/side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require 'layout/top-nav.php';  ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="">Schedule</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Schedule ( <?php echo $course; ?> | <?php echo $major; ?> )</li>
  </ol>
</nav>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

  <div class="alert alert-info alert-dismissible" id ="nullerror" style="display:none">
    <button type="button" class="close" data-dismiss="alert" >&times;</button>
    <strong>Some data is null, Please check your data again.</strong>
  </div>


  <div class="alert alert-warning alert-dismissible" style="display:none">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Please Choose Day in ITS 113!</strong>
  </div>

  <div class="alert alert-danger alert-dismissible" style="display:none">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Ops! Conflict ITS 111 and ITS 112</strong>
  </div>



              <div class="card shadow-sm mb-5">
                <div class="card-header">
                  <h5>Settings</h5>
                </div>                
                <div class="card-body pt-0 pb-0">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for="">Section</label>
                        <input type="text" class="form-controls" id="sec" placeholder="Insert Section">
                      </div>                      
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for="">School Year</label>
                          <div class="form-row">
                            <div class="col">
                              <input type="text" class="form-controls" id="sy1" placeholder="">
                            </div>
                            <p>-</p>
                            <div class="col">
                              <input type="text" class="form-controls" id="sy2" placeholder="">
                            </div>
                          </div>
                      </div>                        
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for="">Semester</label>
                      <select class="form-controls" id="semesterlbl">
                        <option selected disabled hidden>Choose Semester</option>
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                        <option value="summer">Summer</option>
                      </select>                      
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for="">Year Level</label>
                      <select class="form-controls" id="yrlevel">
                        <option selected id="cy" value="Choose Year" disabled hidden>Choose Year</option>
                        <option id="firstyr" value="First Year">First Year</option>
                        <option id="secondyr" value="Second Year">Second Year</option>
                        <option id="thirdyr" value="Third Year">Third Year</option>
                        <option id="fourthyr" value="Fourth Year">Fourth Year</option>
                        <option id="fifthyr" value="Fifth Year">Fifth Year</option>
                      </select>                      
                      </div>                       
                    </div>
                  </div>
                </div>
              </div>
            
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold">Create Schedule</h5>
                    <button type="button" id="" class="add-user pull-xs-right" data-toggle="modal" data-target="#subject-other" ripple onclick="reset()"><i class="fas fa-plus"></i> Create Other Schedule</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="uselab">
                    <table class="table table-striped" id="subjects">
                      <thead>
                        <tr class="table-bordered">
                          <th scope="col" colspan="3"></th>
                          <th scope="col" colspan="4" >Lecture&nbsp;Details</th>
                          <th scope="col" colspan="4" >Other&nbsp;Details</th>
                          <th scope="col" colspan="3"></th>
                        </tr>

                        <tr class="table-bordered">
                          <th scope="col">Subject&nbsp;Code</th>
                          <th scope="col">Subject&nbsp;Title</th>
                          <th scope="col">Unit</th>
                          <th scope="col">Day</th>  
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Room</th>
                          <th scope="col">Day</th>
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Room</th>
                          <th scope="col">Use Lab?</th>
                          <th scope="col">Faculty</th>
                        </tr>
                      </thead>
                      <tbody id="subjectlistsched">
                        <tr><th colspan="13"><center>CHOOSE YEAR LEVEL</center></th></tr>
                      </tbody>
                    </table>
                  </div>

                  <!-- for courses with no use of laboratory frequently -->
                  <div class="table-responsive" id="nolab">
                  <table class="table table-striped" id="subjects">
                    <thead>
                      <tr class="table-bordered">
                        <th scope="col" colspan="3">Subject Details</th>
                        <th scope="col" colspan="5" >Time/Day/Room&nbsp;Details</th>
                        <th scope="col" colspan="2"></th>
                      </tr>

                      <tr class="table-bordered">
                        <th scope="col">Subject&nbsp;Code</th>
                        <th scope="col">Subject&nbsp;Title</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Day 1</th> 
                        <th scope="col">Day 2</th> 
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Room</th>
                        <th scope="col">Use Lab?</th>
                        <th scope="col">Faculty</th>
                      </tr>
                    </thead>
                    <tbody id="subjectlistsched2">
                        <tr><th colspan="10"><center>CHOOSE YEAR LEVEL</center></th></tr>
                    </tbody>
                  </table>
                  </div>
<button type="button" class="delete-user pull-xs-right float-right mt-5 pr-3 pl-3 d-inline mx-2" id="save" ripple><i class="fas fa-save" ></i> Save</button><button type="button" id="cancel" class="view-user pull-xs-right float-right mt-5 pr-3 pl-3 d-inline" ripple><i class="fas fa-times"></i> CANCEL</button>


                </div>
              </div>


<!-- Modal Start -->
  <div class="modal fade" id="subject-other" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" id="summer-details">
        <div class="modal-header">
          <h5 class="modal-title" >CREATE SCHEDULE</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
 <!-- Card Header - Dropdown -->
  <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold"><input type="text" class="input-table2" placeholder="Insert Section Here..." id="section"></th></h6>

      

  </div>
<div class="table-responsive">          
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="add-subject">
    <tr id="1" class="tr1">
      <th scope="col" id=""><input list="data" type="text" class="input-table2 code" name="1" placeholder="Insert Subject Code" id="subcode1"><datalist id="data"></datalist></th>
      <td id="stitle1" scope="col"></td>
      <td scope="col"><button id="1" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td>
    </tr>
  </tbody>
</table>
</div>

<button type="button" id="add-row" class="view-user pull-xs-right"><i class="fas fa-plus"></i> ADD ROW</button><br><br>

<div class="modal-footer">

<button type="button" class="delete-user" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> CLOSE</button>
<button type="button" class="view-user" id="acceptsubject" ripple><i class="fas fa-check"></i> ACCEPT</button>   


</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <center><h5>Schedule Created Successfully!</h5></center>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="save" id="" data-dismiss="modal" ripple><i class="fas fa-check"></i> Ok</button>
      </div>
      </div>
    </div>
</div>


        </div>
        <!-- /.container-fluid -->
 
<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>





      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>


  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>
<script type="text/javascript">

    var course = '<?php echo $_SESSION['course']; ?>';
    var major = '<?php echo $_SESSION['major']; ?>';
    var useoflab;
    //for auto schoolyear and semester
   var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth();
    $("#sy1").val(year);
    $("#sy2").val(year+1);
    if(month <= 8)
    {
      $("#semesterlbl").val("First Semester");
    }
    else
    {
      $("#semesterlbl").val("Second Semester");
    }
  //for year display  
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"year":1,course:course},
      success:function(data){
         if(data == 0)
        {
           $('#fifthyr').hide(); 
        }
        else
        {
           $('#fifthyr').show();
        }
      }
      });  

    //for getting subjects
      $(document).on('change', '#yrlevel', function(){  
        var sem = $('#semesterlbl').val();
        var year = $(this).val();
        var labuse = useoflab;
          $.ajax({
          url:"process.php",
          type:"POST",
          data:{"subjectlistforsched":1,sem:sem,course:course,year:year,major:major,labuse:labuse},
            cache:false,
          success:function(data){
            if(useoflab == 'yes')
            {
                $('#subjectlistsched').html(data);
            }
            else
            {
                $('#subjectlistsched2').html(data);
            }
          }
          }); 
      });   

      //for getting subjects
      $(document).on('change', '#semesterlbl', function(){  
        var year = $('#yrlevel').val();
        var sem = $(this).val();
          if(year == 'Choose Year' || year == null)
          {

          }
          else
          {
              var labuse = useoflab;
              $.ajax({
              url:"process.php",
              type:"POST",
              data:{"subjectlistforsched":1,sem:sem,course:course,year:year,major:major,labuse:labuse},
                cache:false,
              success:function(data){
                if(useoflab == 'yes')
                {
                    $('#subjectlistsched').html(data);
                }
                else
                {
                    $('#subjectlistsched2').html(data);
                }
              }
              }); 
          }
      });   

                //if subject use lab frequently
                $.ajax({
                  url:"process.php",
                  type:"POST",
                  data:{"useoflab":1,course:course,major:major},
                    cache:false,
                  success:function(data)
                  {
                    if(data == 1)
                    {
                      $('#uselab').show();
                      $('#nolab').hide();
                      useoflab = 'yes';
                    }
                    else
                    {
                      $('#uselab').hide();
                      $('#nolab').show();
                      useoflab = 'no';
                    }
                  }
                });
  //for saving the schedule

  $(document).on('click','#save', function(e){

  var schoolyear = $('#sy1').val()+"-"+$('#sy2').val();
  var semid = document.getElementById("semesterlbl").value;
  if(semid == "fs"){var semester = "First Semester";}
  else if(semid == "ss"){var semester = "Second Semester";}
  else{var semester = "Summer";}
  var all = {};
  all.section = new Array();
  all.code = new Array();
  all.lecfrom = new Array();
  all.lecto = new Array();
  all.lecroom = new Array();
  all.labfrom = new Array();
  all.labto = new Array();
  all.labroom = new Array();
  all.faculty = new Array();
  all.lecday = new Array();
  all.labday = new Array();
  all.lab = new Array();
  
      var counts = $('#count').text();
      var i = 0;
      var cou = 0;
      var get = '';
      var conflict = 0;

      for(i = 0; i < counts; i++) {
        var maxstudent;
        var get_section = $('#sec').val();
        var sn_get = $('.ccc'+i).closest('tr').find('th').attr("id");
        var get_lecfrom = $('input[id=lecfrom'+sn_get+']').val();
        var get_lecto = $('input[id=lecto'+sn_get+']').val();
        var get_lecroom = $('input[id=lecroom'+sn_get+']').val();
        var get_faculty = $('input[id=faculty'+sn_get+']').attr('name');
        var get_lecday = $('select[id=lecday'+sn_get+']').val();
        var get_labday = $('select[id=labday'+sn_get+']').val();
        var get_lab = document.getElementById("check"+sn_get);
        if(get_lab.checked == true)
        {
          maxstudent = '30';
        }
        else
        {
          maxstudent = '40';
        }

        if(useoflab == 'yes')
        {
          var get_labfrom = $('input[id=labfrom'+sn_get+']').val();
          var get_labto = $('input[id=labto'+sn_get+']').val();
          var get_labroom = $('input[id=labroom'+sn_get+']').val();

          var table = document.getElementById("subjectlistsched");
          var tablecount = table.rows.length;

          if(get_section == ""  || get_lecfrom == "" || get_lecto == "" || get_lecroom == ""|| typeof get_faculty == 'undefined' || get_faculty == '' || get_lecday == null  || $('#sy1').val() == "" || $('#sy2').val() == "" || (get_labday != null && (get_labfrom =='' || get_labto == '' || get_labroom == ''))){
          var all = {};
          all.section = new Array();
          all.code = new Array();
          all.lecfrom = new Array();
          all.lecto = new Array();
          all.lecroom = new Array();
          all.labfrom = new Array();
          all.labto = new Array();
          all.labroom = new Array();
          all.faculty = new Array();
          all.lecday = new Array();
          all.labday = new Array();
          all.lab = new Array();
          if(get_section == '')
          {
            (function() {
            var el = $('#sec'),
            originalColor = el.css("background");
            el.css("background", "#f27979");
            setTimeout(function () {
            el.css("background", '#f2eded');
            }, 3000); })(i);
          }
          else
          {

          (function() {
          var el = $('.ccc'+i),
            originalColor = el.css("background");
            el.css("background", "#ffb3b3");
            setTimeout(function () {
            el.css("background", originalColor);
            }, 3000); })(i);
          }
          
          cou++;
        }
        else
        {
            //for conflict shchedule
            for (var ii=0; ii < tablecount; ii++)
                  {
                    var sn_get2 = $('.ccc'+ii).closest('tr').find('th').attr("id");

                    var lecdaynew = $('select[id=lecday'+sn_get+']').val();
                    var labdaynew = $('select[id=labday'+sn_get+']').val();
                    var lecfromnew = $('input[id=lecfrom'+sn_get+']').val();
                    var lectonew = $('input[id=lecto'+sn_get+']').val();
                    var labfromnew = $('input[id=labfrom'+sn_get+']').val();
                    var labtonew = $('input[id=labto'+sn_get+']').val();
                    var lecday2 = $('select[id=lecday'+sn_get2+']').val();
                    var labday2 = $('select[id=labday'+sn_get2+']').val();
                    var lecfrom2 = $('input[id=lecfrom'+sn_get2+']').val();
                    var lecto2 = $('input[id=lecto'+sn_get2+']').val();
                    var labfrom2 = $('input[id=labfrom'+sn_get2+']').val();
                    var labto2 = $('input[id=labto'+sn_get2+']').val();

                    //for duplicate subject
                    if(sn_get == sn_get2)
                    {
                    }
                    else
                    {
                       
                        if ((lecdaynew == lecday2 && lecfrom2 <= lectonew && lecto2 >= lectonew) || (lecdaynew == labday2 && labfrom2 < lectonew && labto2 > lectonew))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        } 
                        else if ((lecdaynew == lecday2 && lecfrom2 >= lecfromnew && lecto2 <= lectonew) || (lecdaynew == labday2 && (labfrom2 >= lecfromnew && labto2 <= lectonew)))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        }
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 <= labfromnew && labto2 >= labfromnew) || (labdaynew == lecday2 && lecfrom2 <= labfromnew && lecto2 >= labfromnew))
                          {
                            conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                          } 
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 <= labtonew && labto2 >= labtonew) || (labdaynew == lecday2 && lecfrom2 <= labtonew && lecto2 >= labtonew))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        } 
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 >= labfromnew && labto2 <= labtonew)|| (labdaynew == lecday2 && lecfrom2 >= labfromnew && lecto2 <= labtonew))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        }

                      }
                  }
            if(conflict == 0)
            {
                all.section.push(get_section);
                all.code.push(sn_get);
                all.lecfrom.push(get_lecfrom);
                all.lecto.push(get_lecto);
                all.lecroom.push(get_lecroom);
                all.labfrom.push(get_labfrom);
                all.labto.push(get_labto);
                all.labroom.push(get_labroom);
                all.faculty.push(get_faculty);
                all.lecday.push(get_lecday);
                all.labday.push(get_labday);
                all.lab.push(maxstudent);
            }
        }
      }
      else
      {

          var table = document.getElementById("subjectlistsched2");
          var tablecount = table.rows.length;

        if(get_section == ""  || get_lecfrom == "" || get_lecto == "" || get_lecroom == ""|| typeof get_faculty == 'undefined' || get_faculty == '' || get_lecday == null  || $('#sy1').val() == "" || $('#sy2').val() == ""){
          var all = {};
          all.section = new Array();
          all.code = new Array();
          all.lecfrom = new Array();
          all.lecto = new Array();
          all.lecroom = new Array();
          all.labfrom = new Array();
          all.labto = new Array();
          all.labroom = new Array();
          all.faculty = new Array();
          all.lecday = new Array();
          all.labday = new Array();
          all.lab = new Array();
          if(get_section == '')
          {
            (function() {
            var el = $('#sec'),
            originalColor = el.css("background");
            el.css("background", "#f27979");
            setTimeout(function () {
            el.css("background", '#f2eded');
            }, 3000); })(i);
          }
          else
          {

          (function() {
          var el = $('.ccc'+i),
            originalColor = el.css("background");
            el.css("background", "#ffb3b3");
            setTimeout(function () {
            el.css("background", originalColor);
            }, 3000); })(i);
          }
          
          cou++;
        }
        else
        {
          //for conflict shchedule
            for (var ii=0; ii < tablecount; ii++)
                  {
                    var sn_get2 = $('.ccc'+ii).closest('tr').find('th').attr("id");

                    var lecdaynew = $('select[id=lecday'+sn_get+']').val();
                    var labdaynew = $('select[id=labday'+sn_get+']').val();
                    var lecfromnew = $('input[id=lecfrom'+sn_get+']').val();
                    var lectonew = $('input[id=lecto'+sn_get+']').val();
                    var labfromnew = $('input[id=labfrom'+sn_get+']').val();
                    var labtonew = $('input[id=labto'+sn_get+']').val();
                    var lecday2 = $('select[id=lecday'+sn_get2+']').val();
                    var labday2 = $('select[id=labday'+sn_get2+']').val();
                    var lecfrom2 = $('input[id=lecfrom'+sn_get2+']').val();
                    var lecto2 = $('input[id=lecto'+sn_get2+']').val();
                    var labfrom2 = $('input[id=labfrom'+sn_get2+']').val();
                    var labto2 = $('input[id=labto'+sn_get2+']').val();

                    //for duplicate subject
                    if(sn_get == sn_get2)
                    {
                    }
                    else
                    {
                       
                        if ((lecdaynew == lecday2 && lecfrom2 <= lectonew && lecto2 >= lectonew) || (lecdaynew == labday2 && labfrom2 < lectonew && labto2 > lectonew))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        } 
                        else if ((lecdaynew == lecday2 && lecfrom2 >= lecfromnew && lecto2 <= lectonew) || (lecdaynew == labday2 && (labfrom2 >= lecfromnew && labto2 <= lectonew)))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        }
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 <= labfromnew && labto2 >= labfromnew) || (labdaynew == lecday2 && lecfrom2 <= labfromnew && lecto2 >= labfromnew))
                          {
                            conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                          } 
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 <= labtonew && labto2 >= labtonew) || (labdaynew == lecday2 && lecfrom2 <= labtonew && lecto2 >= labtonew))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        } 
                        else if (((labdaynew == labday2 && (labdaynew != '' || labday2 !='')) && labfrom2 >= labfromnew && labto2 <= labtonew)|| (labdaynew == lecday2 && lecfrom2 >= labfromnew && lecto2 <= labtonew))
                        {
                           conflict ++;
                           //for changing of color
                            (function() {
                            var $el = $('.ccc'+ii),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(ii);
                            //for changing of color
                            (function() {
                            var $el = $('.ccc'+i),
                            originalColor = $el.css("background");
                            $el.css("background", "#a6c8ff");
                            setTimeout(function () {
                                $el.css("background", originalColor);
                            }, 4000); })(i);
                        }

                      }
                  }
          if(conflict == 0)
          {
            if(get_labday != null)
            {
                all.section.push(get_section);
                all.code.push(sn_get);
                all.lecfrom.push(get_lecfrom);
                all.lecto.push(get_lecto);
                all.lecroom.push(get_lecroom);
                all.labfrom.push(get_lecfrom);
                all.labto.push(get_lecto);
                all.labroom.push(get_lecroom);
                all.faculty.push(get_faculty);
                all.lecday.push(get_lecday);
                all.labday.push(get_labday);
                all.lab.push(maxstudent);
            }
            else
            {
                all.section.push(get_section);
                all.code.push(sn_get);
                all.lecfrom.push(get_lecfrom);
                all.lecto.push(get_lecto);
                all.lecroom.push(get_lecroom);
                all.labfrom.push('');
                all.labto.push('');
                all.labroom.push('');
                all.faculty.push(get_faculty);
                all.lecday.push(get_lecday);
                all.labday.push(get_labday);
                all.lab.push(maxstudent);
            }
          }
        }
      }
      }

      if(cou > 0)
      {
        if($('#sec').val() == '')
        {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Section Field Required.');
        }
        else
        {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('All fields must have value and Must be in the correct Format.');
        }
      }
      else if(conflict > 0)
      {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Conflict Schedule');
      }
      else {
      var data = JSON.stringify(all);
      console.log(data);
      $.ajax({
      url:"process.php",
      type:"POST",
      data:{"createsched":1,data:data,schoolyear,semester},
        cache:false,
      success:function(data){
        var all = {};
        all.section = new Array();
        all.code = new Array();
        all.lecfrom = new Array();
        all.lecto = new Array();
        all.lecroom = new Array();
        all.labfrom = new Array();
        all.labto = new Array();
        all.labroom = new Array();
        all.faculty = new Array();
        all.lecday = new Array();
        all.labday = new Array();
          all.lab = new Array();
        $('#success').modal('show');
      }
      });  
    }
  });
             //for subject code  
             $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"searchsubject":1,course:course,major:major},  
               success:function(data)  
               {    
                  $('#data').html(data);
               }  
              });
      //add new subject for summer
    $('#add-row').click(function() {
      var id = $(this).attr("id");
      var count = $('#add-subject tr').last().attr('id');
      if(isNaN(count))
      {
        var trid = 1;
      }
      else
      {
        var trid = Number(count)+1;
      }
      
      $('#add-subject').append('<tr id="'+trid+'" class="tr'+trid+'"><th scope="col" id="'+trid+'"><input type="text" list="data" class="input-table2 code" placeholder="Insert Subject Code" name="'+trid+'" id="subcode'+trid+'"><datalist id="data"></datalist></th><td scope="col" id="stitle'+trid+'"></td><td scope="col"><button id="'+trid+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');
             //for subject code  
             $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"searchsubject":1,course:course,major:major},  
               success:function(data)  
               {    
                  $('#data').html(data);
               }  
              });
    });
    //remove subject
    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      $('.tr'+id).remove(); 
             //for subject code  
             $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"searchsubject":1,course:course,major:major},  
               success:function(data)  
               {    
                  $('#data').html(data);
               }  
              });
    });
      //accepting summer sched
     $('#acceptsubject').click(function() {
      var c = 0;
      var dup = 0;
      var count = $('#add-subject tr').last().attr('id');
      var section = $('#section').val();
      if(section == '')
      {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Please Input Section');
      }
      else
      {
            for(var i = 1; i <= count; i++)
            {
              var subjcode = $('#subcode'+i).val();
              var subjtitle = $('#stitle'+i).text();
              if(typeof subjcode == 'undefined' || subjcode == '')
              {

              }
              else
              {
                  if(subjtitle == '')
                  {
                    c++;
                    (function() {
                    var $el = $('#'+i),
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
                                    var $el = $('#'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#1C00ff00");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);
                        }
                        else
                        {
                                  dup++; 
                                  (function() {
                                    var $el = $('#'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#a6c8ff");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);
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
                  var count1 = 1; 
                  var all = {};
                  all.subject = new Array();
                  while(count1 <= count)
                  {
                      var get_subject = $('#subcode'+count1).val();

                    if(typeof get_subject == 'undefined' || get_subject == '')
                    {

                    }
                    else
                    {
                      all.subject.push(get_subject);
                    }
                      count1++;
                  }

                    // for showing of subjects
                    var data = JSON.stringify(all);
                    console.log(data);
                    //for dislpaying
                  var uselab = useoflab;
                  $.ajax({
                      url:"process.php",
                      type:"POST",
                      data:{"othersched":1,data:data,uselab:uselab},
                        cache:false,
                      success:function(data){
                        if(useoflab == 'yes')
                        {
                            $('#subjectlistsched').html(data);
                        }
                        else
                        {
                            $('#subjectlistsched2').html(data);
                        }
                        var all = {};
                        all.subject = new Array();
                      }
                    });
                  $('#subject-other').modal('hide');
                  $('#yrlevel').val($('#cy').val());
                  $('#sec').val(section);
              }
      }
     });

    //getting subjects details
         $(document).on('keyup', '.code', function(){
            var id = $(this).attr("name");
             var query = $(this).val();
              //subject details
               $.ajax({  
                url:"process.php",
               method:"POST",  
               data:{"searchsubjectdetails":1,query:query},  
               success:function(data)  
               { 
                  $('#stitle'+id).text(data);
               }  
            }); 
        });
</script>

</body>

</html>
