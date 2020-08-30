<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');
$course =$_GET['course'];  
$year =$_GET['year'];
$major =$_GET['major'];
?>


<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">


<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">


  <title>GRC System | Registrar</title>

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
        <?php require 'layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="../schedule/">Schedule</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Schedule ( <?php echo $course; ?>  </li>
    <li class="breadcrumb-item active" aria-current="page" id="major"><?php echo $major; ?> </h6></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $year; ?> )</li>
  </ol>
</nav>


<!-- <style type="text/css">

.input-section {
  top:0;
  left:0;
  margin: 0;
  border: none;
  padding: 5px;
  box-sizing: border-box;
  background-color: transparent;
}

table td .input-table {
  top:0;
  left:0;
  margin: 0;
  border: none;
  padding: 10px;
  box-sizing: border-box;
  background-color: transparent;
}

table td .select-table {
  top:0;
  left:0;
  margin: 0;
  border: none;
  padding: 10px;
  box-sizing: border-box;
  background-color: transparent;
  color: #777;
}


table td .time-table {
  top:0;
  left:0;
  margin: 0;
  border: none;
  box-sizing: border-box;
  background-color: transparent;
}


.table td, th {
   text-align: center;   
}

</style> -->


<style type="text/css">
.input-section {
  top:0;
  left:0;
  margin: 0;
  border: none;
  padding: 5px;
  box-sizing: border-box;
  background-color: transparent;
}


.select-table {
  top:0;
  left:0;
  margin: 0;
  border: none;
  padding: 4px;
  box-sizing: border-box;
  background-color: transparent;
  color: #777;
}

.input-table {
  top:0;
  left:0;
  margin: 0;
  width: 100px;
  border: 1px solid #ccc;
  padding: 4px;
  box-sizing: border-box;
  background-color: transparent;
}
.faculty_list_ss ul {  
    background-color: #fff;  
    cursor: pointer;  
  
}  

.faculty_list_ss li{  
    padding: 5px;  
    width: 100%;

}
</style>


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


              <!-- Example 2 -->
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex justify-content-start">
                  <h6 class="m-0 font-weight-bold mr-2">Section :<input id="sec" type="text" placeholder="Insert Section" class="input-section"></h6>

      <h6 class="m-0 font-weight-bold mr-4">School Year :  
        <input type="text" class="input-table" placeholder="" id="sy1">
        -
        <input type="text" class="input-table" placeholder="" id="sy2">
      </h6> 
      
        <select class="select-table" id="semesterlbl">
          <option selected disabled hidden>Choose Semester</option>
          <option value="fs">First Semester</option>
          <option value="ss">Second Semester</option>
        </select> 

                </div>
                <div class="card-body">


<!-- for courses with use of laboratory frequently -->
<div class="table-responsive" id="uselab">
<table class="table table-striped" id="subjects">
  <thead>
    <tr class="table-bordered">
      <th scope="col" colspan="3"></th>
      <th scope="col" colspan="4" >Lecture&nbsp;Details</th>
      <th scope="col" colspan="4" >Other&nbsp;Details</th>
      <th scope="col" colspan="2"></th>
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

  </tbody>
</table>
</div>
<button type="button" class="delete-user pull-xs-right float-right mt-5 pr-3 pl-3 d-inline mx-2" id="save" ripple><i class="fas fa-save" ></i> Save</button><button type="button" id="cancel" class="view-user pull-xs-right float-right mt-5 pr-3 pl-3 d-inline" ripple><i class="fas fa-times"></i> CANCEL</button>


                </div>
              </div>



<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Successful!</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="save" id="savesched" ripple><i class="fas fa-check"></i> Ok</button>
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
   
<!-- Modal Start For No Major Chosen -->
  <div class="modal fade" id="nomajor-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Please Select a Major First to Continue</h5>
        </div>
        <div class="modal-body">
        <img src="choose-major.jpg" width="100%">
<div class="modal-footer">

<a href="../schedule/schedule.php?course=<?php echo $course;?>&major"><button type="button" class="delete-user" ripple><i class="fas fa-times"></i> Close</button></a>

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->  

      <!-- News Modal -->




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

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>
  <script type="text/javascript">
  // $('.faculty').keyup(function(){
  //   var val = $(this).val();
  //   var id_with = $(this).attr('id');
  //   var id = id_with.substring(7, id_with.length);
  //   if(val != '') {
  //     $.ajax({
  //       url:"process.php",
  //       method:"POST",
  //       data:{"search_faculty":1,val:val},
  //       success:function(data) {
  //         $('#faculty_list'+id).fadeIn();
  //         $('#faculty_list'+id).html(data);
  //       }
  //     });
  //   }
  //   else{
  //     $('#faculty_list'+id).hide();
  //   }

  //   $(document).on('click', '#faculty_list'+id+' li', function(){  
  //     var fac_id = $(this).attr('id');
  //     var get_name = $('#full_name'+fac_id).html();
  //     $('.faculty[id="'+id_with+'"]').val(get_name);
  //     $('.faculty[id="'+id_with+'"]').attr('name',fac_id);
  //     $('#faculty_list'+id).hide();
  //   });
  // });
  var labstatus;

  //If no major chosen
  var major2 = "<?php echo $major ?>";
  var course = "<?php echo $course ?>";
  if(major2 == '')
  { 
      //getting major
    $.ajax({
          url:"process.php",
          type:"POST",
          data:{"majorsearch":1,course:course},
          success:function(data){
            if(data == 0)
            {
               $('#major').text('No Major');
               var course = '<?php echo $course; ?>';
                var year = '<?php echo $year; ?>';
                var major = $('#major').text();
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
                    }
                    else
                    {
                      $('#uselab').hide();
                      $('#nolab').show();
                    }
                    labstatus = data;
                    // for list of subjects 
                    $.ajax({
                      url:"process.php",
                      type:"POST",
                      data:{"subjectlistforsched":1,sem:sem,course:course,year:year,major:major,labstatus:labstatus},
                        cache:false,
                      success:function(data){
                        if(labstatus == 1)
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
            }
            else
            {              
                $('#nomajor-modal').modal('show');
            }
          }
          });

  }
  var d = new Date();
  var year1 = d.getFullYear();
  var month = d.getMonth();
  $("#sy1").val(year1);
  $("#sy2").val(year1+1);
  if(month <= 10 && month >= 4)
  {
    var sem1 = $("#semesterlbl").val("fs");
  }
  else
  {
    var sem1 = $("#semesterlbl").val("ss");
  }
    var sm = $("#semesterlbl").val();
    if(sm == 'fs'){var sem = 'First Semester';}
    else {var sem = 'Second Semester';}


    var course = '<?php echo $course; ?>';
    var year = '<?php echo $year; ?>';
    var major = $('#major').text();
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
                    }
                    else
                    {
                      $('#uselab').hide();
                      $('#nolab').show();
                    }
                    labstatus = data;
                    // for list of subjects 
                    $.ajax({
                      url:"process.php",
                      type:"POST",
                      data:{"subjectlistforsched":1,sem:sem,course:course,year:year,major:major,labstatus:labstatus},
                        cache:false,
                      success:function(data){
                        if(labstatus == 1)
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
        var get_labfrom = $('input[id=labfrom'+sn_get+']').val();
        var get_labto = $('input[id=labto'+sn_get+']').val();
        var get_labroom = $('input[id=labroom'+sn_get+']').val();
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

        if(labstatus == '1')
        {

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
            for (var ii=1; ii <= tablecount; ii++)
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
            for (var ii=1; ii <= tablecount; ii++)
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

    $('#savesched').click(function(){      
      window.location.href='../create-schedule';
    });

    $('#semesterlbl').change(function(){
    var val = $(this).val();
    var schoolyear = $('#sy1').val()+"-"+$('#sy2').val();
    var course = '<?php echo $course; ?>';
    var year = '<?php echo $year; ?>';
    var major = $('#major').text();
    var sem = '';
    if(val == 'fs')
    {
      sem = 'First Semester';
                    // for list of subjects 
                    $.ajax({
                      url:"process.php",
                      type:"POST",
                      data:{"subjectlistforsched":1,sem:sem,course:course,year:year,major:major,labstatus:labstatus},
                        cache:false,
                      success:function(data){
                        if(labstatus == 1)
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
    else if (val == 'ss')
    {
      sem = 'Second Semester';
                    // for list of subjects 
                    $.ajax({
                      url:"process.php",
                      type:"POST",
                      data:{"subjectlistforsched":1,sem:sem,course:course,year:year,major:major,labstatus:labstatus},
                        cache:false,
                      success:function(data){
                        if(labstatus == 1)
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

    $('#cancel').click(function(){      
      var major = $('#major').text();
      window.location.href='../schedule/schedule?course='+course+'&major='+major;
    });
  </script>

</body>

</html>
