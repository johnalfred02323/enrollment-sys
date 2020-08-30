<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');  
$section = $_GET['section'];
$num = explode("&", $_SERVER['QUERY_STRING']);
$count = count($num)-1;
$i = 1;
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
  var all = {};
  all.subject = new Array();
</script>
<?php 
while($i <= $count)
{
  $subjcode = $_GET['data'.$i];
  ?>
        <!-- for saving subject code in an array -->
        <script type="text/javascript">
          var get_subject = '<?php echo $subjcode; ?>';
          all.subject.push(get_subject);
        </script>
        <?php
          $i++;
}
?>
<!-- for showing of subjects -->
<script type="text/javascript">
  var data = JSON.stringify(all);
  console.log(data);
  //for dislpaying
  $.ajax({
      url:"petition-summer-process.php",
      type:"POST",
      data:{"summersched":1,data:data},
        cache:false,
      success:function(data){
        $('#summerlist').html(data);
      }
    });
</script>


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
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="../schedule/">Schedule</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Schedule ( SUMMER )</li>
  </ol>
</nav>


<style type="text/css">

/*table td .input-table {
  top:0;
  left:0;
  margin: 0;
  border: none;
  padding: 10px;
  box-sizing: border-box;
  background-color: transparent;
}


table th .input-table {
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
}*/
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
</style>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

  <div class="alert alert-info alert-dismissible" hidden>
    <button type="button" class="close" data-dismiss="alert" >&times;</button>
    <strong>Ops! Conflic Room BSIT 101 and BSBA 203 </strong>
  </div>


  <div class="alert alert-warning alert-dismissible" hidden>
    <button type="button" class="close" data-dismiss="alert" >&times;</button>
    <strong>Please Choose Day in ITS 113!</strong>
  </div>

  <div class="alert alert-danger alert-dismissible" hidden>
    <button type="button" class="close" data-dismiss="alert" >&times;</button>
    <strong>Ops! Conflic ITS 111 and ITS 112</strong>
  </div>

              <!-- Example 2 -->
                 <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex justify-content-start">
                  <h6 class="m-0 font-weight-bold mr-2">Section : <input id="sec" type="text" placeholder="Section Here..." class="input-section m-0 font-weight-bold mr-2" ></h6>

      <h6 class="m-0 font-weight-bold mr-4">School Year :  
        <input type="text" class="input-table" placeholder="" id="sy1">
        -
        <input type="text" class="input-table" placeholder="" id="sy2">
      </h6> 
      
        <select class="select-table" id="semesterlbl">
          <option selected disabled hidden>Choose Semester</option>
          <option value="fs">First Semester</option>
          <option value="ss">Second Semester</option>
          <option value="sm">Summer</option>
        </select> 
                </div>
                <div class="card-body">



<div class="table-responsive">
<table class="table table-striped">
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
  <tbody id="summerlist">
  </tbody>
</table>
</div>

<button type="button" class="delete-user pull-xs-right float-right mt-5 pr-3 pl-3 d-inline mx-2" id="save"ripple><i class="fas fa-save"></i> Save</button><button type="button" id="cancel" class="view-user pull-xs-right float-right mt-5 pr-3 pl-3 d-inline" ripple><i class="fas fa-times"></i> CANCEL</button>


                </div>
              </div>




        </div>
        <!-- /.container-fluid -->

<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Successful!</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="save" id="savepetition" ripple><i class="fas fa-check"></i> Ok</button>
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
    //for section 
  var section = '<?php echo $section; ?>';
  $('#sec').val(section);
  //for school year
  var d = new Date();
  var year = d.getFullYear();
  var month = d.getMonth();
  $("#sy1").val(year);
  $("#sy2").val(year+1);
  $("#semesterlbl").val("sm");


  //save summer schedule
   $('#save').click(function(){
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
  
      var counts = '<?php echo $count; ?>';
      var i = 0;
      var cou = 0;
      var get = '';
      
      for(i = 1; i <= counts; i++) {
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
        
        if(get_section == ""  || get_lecfrom == "" || get_lecto == "" || get_lecroom == ""|| get_faculty == "" || get_lecday == null  || $('#sy1').val() == "" || $('#sy2').val() == ""){
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
          cou++;
        }
        else{
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

      if(cou > 0){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('All fields must have value and Must be in the correct Format.');
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

    $('#savepetition').click(function(){      
      window.location.href='summer';
    });


    $('#cancel').click(function(){      
      window.location.href='summer';
    });
  </script>

</body>

</html>
