<!-- Head -->
<?php require '../../src/layout/grading/head.php';
include('../../config/config.php');

if(isset($_GET['id'])) {
  $cr_id = base64_decode($_GET['id']);
}
$result = mysqli_query($conn, "SELECT class_record.id as cr_id, class_record.submitted, class_record.sched_id, class_record.excel_file, schedule.section, subject.subject_code FROM class_record INNER JOIN schedule ON class_record.sched_id = schedule.sched_id INNER JOIN subject ON schedule.subj_id = subject.subj_id WHERE class_record.id = $cr_id") or trigger_error(header('Location: ../404'));
$row = mysqli_fetch_assoc($result);
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

  <!-- Dark mode -->
  <link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables-dark.css">
  <link rel="stylesheet" type="text/css" href="css/gc.css">

  <title>GRC | Grading System | Change of Grades</title>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Side Nav -->
        <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../grading">
        <div class="sidebar-brand-icon">
          <img src="../../src/img/grc-header.png" width="150px;">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../grading">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Student/Faculty
      </div>

      <!-- Faculty Users -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="faculty_users">
          <i class="fas fa-users"></i>
          <span>Faculty Users</span></a>
      </li> -->


      <!-- Grade Viewing -->
      <li class="nav-item">
        <a class="nav-link" href="grade_viewing">
          <i class="fas fa-code"></i>
          <span>Grade Viewing</span></a>
      </li>


      <!-- Class Records -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="class_records">
          <i class="fas fa-cabinet-filing"></i>
          <span>Class Records</span></a>
      </li>     -->

      <!-- Grade Change -->
      <li class="nav-item active">
        <a class="nav-link" href="grade_change">
          <i class="far fa-exchange"></i>
          <span>Grade Change</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading">
        Reports
      </div>

      <!-- Report of Grade -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="grade_report">
          <i class="fas fa-list-ol"></i>
          <span>Report of Grade</span></a>
      </li> -->

      <!-- Grade Slip -->
      <li class="nav-item">
        <a class="nav-link" href="grade_slip">
          <i class="fas fa-scroll"></i>
          <span>Grade Slip</span></a>
      </li>

      <!-- TOR -->
      <li class="nav-item">
        <a class="nav-link" href="transcript_of_records">
          <i class="fas fa-clipboard-user"></i>
          <span>Transcript of Records</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Top Nav -->
        <?php require '../../src/layout/grading/top-nav.php'; ?>
       <!-- Begin Page Content -->
      <div class="container-fluid">
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="grade_change">Grade Change</a></li>
    <li class="breadcrumb-item active" aria-current="page">Change of Grades</li>
  </ol>
</nav>
  <!-- SPACER -->
  <div class="mx-auto" style="height: 10px;"></div>
  <div class="card shadow-sm mb-4"> <!-- card start -->

   <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold card-text-title-head">Class List (<?php echo $row['section'].' - '.$row['subject_code'];?>)</h6>
    </div>

    <div class="card-body" >
      <div class="table-responsive">
        <table class="display no-wrap" id="student_list" style="width:100%">
          <thead>
              <tr>
                  <th>Student Number</th>
                  <th>Student Name</th>
                  <th>Midterm Grade</th>
                  <th>Final Grade</th>
                  <th>TFG</th>
                  <th>Remarks</th>
                  <th>Action</th>
              </tr>
          </thead>
        </table>
      </div>
    </div>
  </div> <!-- card end -->
      </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>
    </div>

    <!-- Modal Start -->
    <div class="modal fade" id="change_grades_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_head">Serraon, John Alfred S.</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="$('#midterm_inc_opt').hide(); $('#final_inc_opt').hide();">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="sn">
            <input type="hidden" id="cr_id">
            <!-- <label for="contact_num" class="float-label" style="font-family:Arial, FontAwesome">Midterm Grade</label>
            <input class="form-control"> -->
            <div class="form-group mx-5 d-flex flex-row align-items-center justify-content-between">
              <input type="text" id="midterm_gr" spellcheck=false class="form-control perce" type="text" required="">
              <label for="midterm_gr" class="float-label" style="font-family:Arial, FontAwesome">Midterm Grade</label>

              <input type="text" id="midterm_gr_eq" spellcheck=false class="form-control" type="text" required="" disabled>

              <div style="display:none;"  id="midterm_inc_opt">
                <button id="midterm_inc" class="btn btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-caret-down"></i></button>
                <ul class="dropdown-menu checkbox-menu allow-focus">
                  <li>
                      <label>Outstanding Balance
                        <input type="checkbox" id="midterm_outstanding_bal">
                      </label>
                  </li>
                  <li>
                      <label>Lack of Requirements
                        <input type="checkbox" id="midterm_lack_req">
                      </label>
                  </li>
                </ul>
              </div>
            </div>

            <div class="form-group mx-5 d-flex flex-row align-items-center justify-content-between">
              <input type="text" id="final_gr" spellcheck=false class="form-control perce" type="text" required="">
              <label for="final_gr" class="float-label" style="font-family:Arial, FontAwesome">Final Grade</label>

              <input type="text" id="final_gr_eq" spellcheck=false class="form-control" type="text" required="" disabled>

              <div style="display:none;"  id="final_inc_opt">
                <button id="final_inc" class="btn btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-caret-down"></i></button>
                <ul class="dropdown-menu checkbox-menu allow-focus">
                  <li>
                      <label>Outstanding Balance
                        <input type="checkbox" id="final_outstanding_bal">
                      </label>
                  </li>
                  <li>
                      <label>Lack of Requirements
                        <input type="checkbox" id="final_lack_req">
                      </label>
                  </li>
                </ul>
              </div>
            </div>

            <div class="form-group mx-5">
              <input type="text" id="tfg" spellcheck=false class="form-control" type="text" required="">
              <label for="tfg" class="float-label" style="font-family:Arial, FontAwesome">TFG</label>
            </div>

            <div class="form-group mx-5">
              <input type="text" id="remarks" spellcheck=false class="form-control" type="text" required="">
              <label for="remarks" class="float-label" style="font-family:Arial, FontAwesome">Remarks</label>
            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="confirm_changes">Confirm</button>
          </div>
        </div>
      </div>
    </div> <!-- Modal End -->

    <div class="alert-box success" style="max-width: 500px;">
      <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <div class="alert-box failed" style="max-width: 500px;">
      <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span>
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">
  $(document).ready(function(){
    // $("input[id*='midterm_gr']").keydown(function (event) {
    //
    //
    //     if (event.shiftKey == true) {
    //         event.preventDefault();
    //     }
    //
    //     if ((event.keyCode >= 48 && event.keyCode <= 57) ||
    //         (event.keyCode >= 96 && event.keyCode <= 105) ||
    //         event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
    //         event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {
    //
    //     } else {
    //         event.preventDefault();
    //     }
    //
    //     if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
    //         event.preventDefault();
    //     //if a decimal has been added, disable the "."-button
    //
    //     // if($(this).val().toFixed() == 2)
    //     //     event.preventDefault();
    // });

    $('#confirm_changes').click(function(){
      var midterm_grade = $('#midterm_gr').val(), final_grade = $('#final_gr').val(), tfg = $('#tfg').val(), remarks = $('#remarks').val(), cr_id = $('#cr_id').val(), sn = $('#sn').val();

      if(midterm_grade == '' || final_grade == '' || tfg == '' || remarks == '') {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Please, fill up all fields before submitting grade changes.');
      }
      else {
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"change_grade":1,sn:sn,cr_id:cr_id,midterm_grade:midterm_grade,final_grade:final_grade,tfg:tfg,remarks:remarks},
          success:function(data) {
            $('#change_grades_modal').modal('hide');
            $('#midterm_inc_opt').hide();
            $('#final_inc_opt').hide();
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html(data);
            $('#student_list').DataTable().destroy();
            fetch_students_grd();
          }
        });
      }
    });

    function grade_converter(val,sn,term) {


      $('#'+term+'_inc_opt').hide();
      $('#'+term+'_outstanding_bal').prop('checked',false);
      $('#'+term+'_lack_req').prop('checked',false);

      if(val == '') {
          $('#'+term+'_gr_eq').val('');
      }
      else if (val.toUpperCase() == 'DRP') {
          $('#'+term+'_gr_eq').val('Officially Dropped');
      }
      else if (val.toUpperCase() == 'FA') {
          $('#'+term+'_gr_eq').val('Failed');
      }
      else if (val.toUpperCase() == 'INC') {
          $('#'+term+'_gr_eq').val('INC');
          $('#'+term+'_inc_opt').show();
          $('#'+term+'_inc').attr('name', sn);
      }
      else if(val.toUpperCase() == 'W') {
          $('#'+term+'_gr_eq').val('Withdrawn');
      }
      else if(parseFloat(val) > parseFloat(98)) {
          $('#'+term+'_gr_eq').val('1.00');
      }
      else if(parseFloat(val) >= parseFloat(96) && parseFloat(val) < parseFloat(99)) {
          $('#'+term+'_gr_eq').val('1.25');
      }
      else if(parseFloat(val) >= parseFloat(93) && parseFloat(val) < parseFloat(96)) {
          $('#'+term+'_gr_eq').val('1.50');
      }
      else if(parseFloat(val) >= parseFloat(90) && parseFloat(val) < parseFloat(93)) {
          $('#'+term+'_gr_eq').val('1.75');
      }
      else if(parseFloat(val) >= parseFloat(87) && parseFloat(val) < parseFloat(90)) {
          $('#'+term+'_gr_eq').val('2.00');
      }
      else if(parseFloat(val) >= parseFloat(84) && parseFloat(val) < parseFloat(87)) {
          $('#'+term+'_gr_eq').val('2.25');
      }
      else if(parseFloat(val) >= parseFloat(81) && parseFloat(val) < parseFloat(84)) {
          $('#'+term+'_gr_eq').val('2.50');
      }
      else if(parseFloat(val) >= parseFloat(78) && parseFloat(val) < parseFloat(81)) {
          $('#'+term+'_gr_eq').val('2.75');
      }
      else if(parseFloat(val) >= parseFloat(75) && parseFloat(val) < parseFloat(78)) {
          $('#'+term+'_gr_eq').val('3.00');
      }
      else if(parseFloat(val) < parseFloat(75)) {
          $('#'+term+'_gr_eq').val('5.00');
      }
      else {
          $('#'+term+'_gr_eq').val('INVALID INPUT');
      }
      $('#final_gr_eq').trigger('change');

    }

    $('.perce').keyup(function(){
      var val = $(this).val();
      var sn = $(this).attr('name');
      var id = $(this).attr('id');
      var term = '';
      if(id.substring(0,7) == 'midterm') {
        term = "midterm";
      }
      else if(id.substring(0,5) == 'final') {
        term = "final";
      }


      grade_converter(val,sn,term);
      //
      // if(val.toUpperCase() == "INC"){
      //   $('#'+term+'_inc_opt').show();
      //   $('#'+term+'_inc').attr('name', sn);
      // }
      // else if(val == ''){
      //
      // }
      // else if(val == ''){
      //   $('#midterm_inc_opt').hide();
      //   $('#midterm_inc').removeAttr('name');
      // }
    });

    function open_dropdown(term) {
      var sn = $('#'+term+'_inc').attr('name');
      var ob_val = 'Outstanding Balance';
      var lr_val = 'Lack of Requirements';

      $('#'+term+'_outstanding_bal').click(function(){
        var current = $('#'+term+'_gr_eq');
        if($(this).prop('checked') == true) {
          if(current.val() == '' || current.val() == 'INC') {
            current.val(ob_val);
            current.prop('title', ob_val);
            if(term == 'final')  $('#remarks').val('INCOMPLETE - '+ob_val);
          }
          else if(current.val() == lr_val){
            current.val(current.val()+', '+ob_val);
            current.prop('title', current.val());
            if(term == 'final') $('#remarks').val('INCOMPLETE - '+current.val()+', '+ob_val);
          }
        }
        else{
            if($('#'+term+'_lack_req').prop('checked') == true) {
              current.val(lr_val);
              current.prop('title', lr_val);
              if(term == 'final') $('#remarks').val('INCOMPLETE - '+lr_val);
            }
            else if($('#'+term+'_lack_req').prop('checked') == false){
              current.val('');
              current.prop('title', '');
              $('#'+term+'_inc_opt').hide();
              if(term == 'final') {$('#remarks').val('INCOMPLETE');}
            }
          }
      });

      $('#'+term+'_lack_req').click(function(){
        var current = $('#'+term+'_gr_eq');
        if($(this).prop('checked') == true) {
          if(current.val() == '' || current.val() == 'INC') {
            current.val(lr_val);
            current.prop('title', lr_val);
            if(term == 'final') $('#remarks').val('INCOMPLETE - '+lr_val);
          }
          else if(current.val() == ob_val){
            current.val(current.val()+', '+lr_val);
            current.prop('title', current.val());
            if(term == 'final') $('#remarks').val('INCOMPLETE - '+current.val()+', '+lr_val);
          }
        }
        else{
          if($('#'+term+'_outstanding_bal').prop('checked') == true) {
            current.val(ob_val);
            current.prop('title', ob_val);
            if(term == 'final') $('#remarks').val('INCOMPLETE - '+ob_val);
          }
          else if($('#'+term+'_outstanding_bal').prop('checked') == false){
            current.val('');
            current.prop('title', '');
            $('#'+term+'_inc_opt').hide();
            if(term == 'final') {$('#remarks').val('INCOMPLETE');}
          }
        }
      });
    }

    $('#midterm_inc').click(function(){
      open_dropdown('midterm');

      // alert(sn);
    });

    $('#final_inc').click(function(){
      open_dropdown('final');

      // alert(sn);
    });

    $('#final_gr_eq').on('change', function(){
      var val = $(this).val();
      if(val == "Withdrawn") {
        $('#remarks').val('WITHDRAWN');
      }
      else if(val == "Failed") {
        $('#remarks').val('FAILED');
      }
      else if(val == "Officially Dropped") {
        $('#remarks').val('DROPPED');
      }
      else if(val == "5.00") {
        $('#remarks').val('FAILED');
      }
      else if(val == "3.00") {
        $('#remarks').val('PASSED');
      }
      else if(val == "2.75") {
        $('#remarks').val('FAIR');
      }
      else if(val == "2.50") {
        $('#remarks').val('SATISFACTORY');
      }
      else if(val == "2.25") {
        $('#remarks').val('V. SATISFACTORY');
      }
      else if(val == "2.00") {
        $('#remarks').val('GOOD');
      }
      else if(val == "1.75") {
        $('#remarks').val('V. GOOD');
      }
      else if(val == "1.50") {
        $('#remarks').val('W. DISTINCTION');
      }
      else if(val == "1.25") {
        $('#remarks').val('H. DISTINCTION');
      }
      else if(val == "1.00") {
        $('#remarks').val('EXCELLENT');
      }
    });



    $('#student_list').on('click', '.change-st-gr', function() {
      var id = $(this).attr('id');
      var sn = $(this).attr('name');

      // $('#midterm_inc').hide();
      // $('#final_inc').hide();


      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"get_st_info":1,id:id,sn:sn},
        success:function(data) {
          var info = JSON.parse(data);

          $('#modal_head').html(info['full_name']+' ('+info['student_number']+')');
          $('#midterm_gr').attr('name', info['student_number']);
          $('#midterm_gr').val(info['midterm_grade']);
          $('#final_gr').val(info['final_grade']);
          $('#tfg').val(info['tfg']);
          $('#remarks').val(info['remarks']);
          $('#sn').val(info['student_number']);
          $('#cr_id').val(id);
          $('#midterm_outstanding_bal').prop('checked',false);
          $('#midterm_lack_req').prop('checked',false);
          $('#midterm_gr_eq').val('');
          $('#final_outstanding_bal').prop('checked',false);
          $('#final_lack_req').prop('checked',false);
          $('#final_gr_eq').val('');
        }
      });
    });

    fetch_students_grd();

    function fetch_students_grd() {
      var table = $('#student_list').DataTable( {
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "pageLength": 10,
      "order": [[ 1, 'desc' ]],
      "processing" : true,
      "serverSide" : true,
      "ajax" : {
          "url":"fetch_students_grd.php",
          "data":{"id":"<?php echo $cr_id; ?>"}
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
      });
    }
  });
  </script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>
</body>

</html>
