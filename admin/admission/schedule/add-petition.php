<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');  
$subjcode = $_GET['subject'];
$subjid = $_GET['subjid'];
$query = "SELECT DISTINCT * FROM subject where subject_code = '$subjcode'";
    $result = mysqli_query($conn, $query); 
    if(mysqli_num_rows($result) > 0)  
    {
      $rows=mysqli_fetch_assoc($result);
      $subjtitle = $rows['subject_title'];
      $units = $rows['units'];
    }
    else
    {
      $subjcode="No Data";
      $subjtitle="No Data";
      $units="No Data";
    }
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
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="../schedule/">Schedule</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Schedule ( PETITION )</li>
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
                  <h6 class="m-0 font-weight-bold mr-2">Section : <input id="sec" type="text" value="Petition" class="input-section m-0 font-weight-bold mr-2" disabled="true"></h6>

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
      <th scope="col" colspan="4" >Lecture \ Laboratory&nbsp;Details</th>
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
      <th scope="col">Faculty</th>
    </tr>
  </thead>
  <tbody>



    <tr>

      <th scope="row" id="subjectcode"><?php echo $subjcode; ?></th>

      <td id="subjecttitle"><?php echo $subjtitle; ?></td>

      <td id="subjectunits"><?php echo $units; ?></td>

      <td>     
        <select class="select-table" id="lecday">
          <option selected disabled hidden>Choose Day</option>
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select>    
      </td>

      <td><input type="time" class="time-table" id="lechr_from"></td>

      <td><input type="time" class="time-table" id="lechr_to"></td>

      <td><input type="text" class="input-table" placeholder="Insert Room" id="lecroom"></td>

      <td>     
        <select class="select-table" id="labday">
          <option selected disabled hidden>Choose Day</option>
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select>    
      </td>

      <td><input type="time" class="time-table" id="labhr_from"></td>

      <td><input type="time" class="time-table" id="labhr_to"></td>

      <td><input type="text" class="input-table" placeholder="Insert Room" id="labroom"></td>

      <td><input type="text" class="input-table" placeholder="Faculty Name" id="faculty"></td>
    </tr>



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

  var d = new Date();
  var year = d.getFullYear();
  var month = d.getMonth();
  $("#sy1").val(year);
  $("#sy2").val(year+1);
  if(month <= 8)
  {
    $("#semesterlbl").val("fs");
  }
  else
  {
    $("#semesterlbl").val("ss");
  }

   $('#save').click(function(){
    var subid = '<?php echo $subjid; ?>';
    var subcode = $('#subjectcode').text();
    var lecday = document.getElementById("lecday").value;
    var lecfrom = $('#lechr_from').val();
    var lecto = $('#lechr_to').val();
    var labday = document.getElementById("labday").value;
    var labfrom = $('#labhr_from').val();
    var labto = $('#labhr_to').val();
    var lecroom = $('#lecroom').val();
    var labroom = $('#labroom').val();
    var faculty = $('#faculty').val();
    var schoolyear = $('#sy1').val()+"-"+$('#sy2').val();
    var semid = document.getElementById("semesterlbl").value;
    if(semid == "fs"){var semester = "First Semester";}
    else if(semid == "ss"){var semester = "Second Semester";}
    else{var semester = "Summer";}

    if(subcode == "" || lecday == "Choose Day" || labday == "Choose Day" || lecfrom == "" || lecto == ""  || lecroom == "" || faculty == ""  || $('#sy1').val() == ""  || $('#sy2').val() == "" )
    {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html("All Textbox must have value and Must be in the correct Format.");
    }
    else
    {
     $.ajax({  
          url:"petition-summer-process.php",  
          method:"post",  
          data:{"createpetitionsched":1,subid:subid,subcode:subcode,lecday:lecday,lecfrom:lecfrom,lecto:lecto,labday:labday,labfrom:labfrom,labto:labto,lecroom:lecroom,labroom:labroom,faculty:faculty,schoolyear:schoolyear,semester:semester},  
          success:function(data)
          { 
              $("#success").modal("show");
          }
          }); 
    }
    
   });

    $('#savepetition').click(function(){      
      window.location.href='petition';
    });


    $('#cancel').click(function(){      
      window.location.href='../';
    });
  </script>

</body>

</html>
