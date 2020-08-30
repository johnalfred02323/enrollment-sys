<!-- Head -->
<?php include('../config/config.php');
require 'src/layout/head.php'; 
if(isset($_GET['cr_id'])){
$cr_id = $_GET['cr_id'];
$result = mysqli_query($conn, "SELECT class_record.id as cr_id, class_record.sched_id, schedule.section FROM class_record INNER JOIN schedule ON class_record.sched_id = schedule.sched_id WHERE class_record.id = $cr_id") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$sc_id = $row['sched_id'];


}
?>

<!-- jquery -->
<script src="../src/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

<link rel="stylesheet" type="text/css" href="../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../src/table/css/jquery.dataTables-dark.css">

  <title>GRC System | Faculty</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'src/layout/side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require 'src/layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="classes">Classes</a></li>
              <li class="breadcrumb-item active" aria-current="page">Class List (<?php echo $row['section'];?>)</li>
            </ol>
          </nav>

<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>



<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head"><?php echo $row['section'];?></h6>

      <div class="pull-xs-right">
        <button type="button" id="save_draft" class="save" ripple><i class="fas fa-save"></i> Save to Draft</button>&nbsp;&nbsp;&nbsp;
        <button type="button" id="submit" class="save" ripple><i class="fas fa-send"></i> Submit</button>
      </div>

  </div>

    <div class="card-body" >
      
      <table id="student_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Student Number</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Final Grade</th>
                      <th>Remarks</th>
                  </tr>
              </thead>
      </table>

    </div>
</div> <!-- card end -->
<div class="alert-box success" style="max-width: 500px !important;">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
        </div>
        <!-- /.container-fluid -->
   


      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require 'src/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require 'src/go-to-top.php'; ?>

  <script type="text/javascript">
    fetch_students();
    function fetch_students(){
      var table = $('#student_table').DataTable( {

          "pagingType": "full_numbers",

          "lengthChange" : false,

          "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html('<span id="ccc'+(index + 1)+'">'+(index + 1)+'</span>');
          },

          "order": [[ 0, 'asc' ]],

          "processing" : true,
          
          "serverSide" : true,

          "ajax" : {
            "url": "fetch_students.php",
            "data":{
              "cr_id":"1",
              "sc_id":"<?php echo $sc_id;?>"
            }
          },
          "searching" : false,
          responsive: true,
          "columnDefs": [
            { className: "cc", "targets": [ 1 ] }
          ]
          
      } );
    }

    
    var temp = 0;
    var all = {};
    all.stud_num = new Array();
    all.grades = new Array();
    all.remarks = new Array();

    $('#student_table').on('change', '.grade', function(){
      var val = $(this).val();
      var id = $(this).attr('id');
      if(val == 'DRP'){
        $('input[id='+id+']').val('Dropped');
        $('input[id='+id+']').prop('disabled',true);
        //grades[id] = val;
        //all.stud_num.push(id);    
      }
      else if(val == 'INC'){
        $('input[id='+id+']').val('Incomplete');
        $('input[id='+id+']').prop('disabled',true);
        //all.stud_num.push(id);
      }
      else if(val == 'FA'){
        $('input[id='+id+']').val('Failed due to absences');
        $('input[id='+id+']').prop('disabled',true);
        //all.stud_num.push(id);
      }
      else if(val == ''){
        $('input[id='+id+']').val('');
        $('input[id='+id+']').prop('disabled',false);
        //all.stud_num.push(id);
      }
      else if(parseInt(val) > 4){
        $('input[id='+id+']').val('Failed');
        $('input[id='+id+']').prop('disabled',true);
        //all.stud_num.push(id);
      }
      else if(parseInt(val) < 4){
        $('input[id='+id+']').val('Passed');
        $('input[id='+id+']').prop('disabled',true);
        //all.stud_num.push(id);
      }
      temp = temp + 1;
    });

    $('#save_draft').click(function(){
      var counts = $('#student_table').find($('.counts'));
      var i = 0;
      var cou = 0;
      var get = '';
      
      for(i = 0; i < temp; i++) {
        var sn_get = $('#ccc'+(i+1)).closest('td').next('.cc').text();
        var get_remarks = $('input[id='+sn_get+']').val();
        var get_grades = $('select[id='+sn_get+']').val();
        if(get_remarks == ""){
          cou++;
        }
        else {
          all.stud_num.push(sn_get);
          all.remarks.push(get_remarks);
          all.grades.push(get_grades);
        }
      }

      if(cou > 0){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Input all remarks field');
      }
      else {
        var ss = JSON.stringify(all);
        console.log(ss);
        $.ajax({
        url:"draft_save.php",
        type:"POST",
        data:{data:ss,cr_id:"<?php echo $cr_id;?>"},
        cache:false,
        success:function(data){
          if(parseInt(data) == counts.length){
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Saved to draft');
          }
          else {
            var left = counts.length - parseInt(data);
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html("Saved to draft. "+left+" student/s doesn't have grades.");
          }
          all = {};
          all.stud_num = new Array();
          all.grades = new Array();
          all.remarks = new Array();
          temp = 0;
        }
      });   
      }
    });
    
  </script>
  <!-- Responsive core JavaScript -->
  <script src="src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../src/js/dark-mode-switch.min.js"></script>

</body>

</html>
