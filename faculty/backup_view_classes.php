<!-- Head -->
<?php include('../config/config.php');
require 'src/layout/head.php'; 

if(isset($_GET['id'])){
  $cr_id = base64_decode($_GET['id']);

  $result = mysqli_query($conn, "SELECT class_record.id as cr_id, class_record.submitted, class_record.sched_id, class_record.excel_file, schedule.section, subject.subject_code FROM class_record INNER JOIN schedule ON class_record.sched_id = schedule.sched_id INNER JOIN subject ON schedule.subj_id = subject.subj_id WHERE class_record.id = $cr_id") or trigger_error(header('Location: ../404'));
  $row = mysqli_fetch_assoc($result);
  $sc_id = $row['sched_id'];
  $is_submitted = $row['submitted'];
    
  $fetch_students = mysqli_query($conn, "SELECT schedule.sched_id, student_info.student_number, student_info.firstname, student_info.lastname, student_info.middlename  
  FROM student_enrollment_record 
  INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id 
  INNER JOIN student_info ON student_enrollment_record.student_number = student_info.student_number 
  WHERE schedule.sched_id = ".$sc_id." AND status = 'Enrolled'") or trigger_error(header('Location: ../404'));

  $fetch_students_gr = mysqli_query($conn, "SELECT class_record.id, class_record.submitted, grade_report.student_number, grade_report.prelim_grade, grade_report.prelim_remarks, grade_report.midterm_grade, grade_report.midterm_remarks, grade_report.final_grade, grade_report.final_remarks 
  FROM grade_report 
  INNER JOIN class_record ON grade_report.cr_id = class_record.id 
  WHERE grade_report.cr_id = ".$cr_id." AND submitted = 1") or die(mysqli_error($conn));
}
else {
   header("Location: ../faculty/classes");
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

  <title>GRC System | Class | <?php echo $row['section'].' - '.$row['subject_code'];?></title>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
        <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/grc/faculty/dashboard">
        <div class="sidebar-brand-icon">
          <img src="../src/img/logo-white.png" width="50px;">
        </div>
        <div class="sidebar-brand-text mx-3">GRC <!-- <sup>admin</sup> --></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">  
      <!-- Heading -->
      <div class="sidebar-heading">
        Links
      </div>
      <!-- Classes -->
      <li class="nav-item active">
        <a class="nav-link" href="classes">
          <i class="fas fa-users"></i>
          <span>Classes</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
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
        <?php require 'src/layout/top-nav.php'; ?>
       <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="classes">Classes</a></li>
              <li class="breadcrumb-item active" aria-current="page">Class List (<?php echo $row['section'].' - '.$row['subject_code'];?>)</li>
            </ol>
          </nav>
<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>
<div class="card shadow-sm mb-4"> <!-- card start -->
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head"><?php echo $row['section'].' - '.$row['subject_code'];?></h6>
      <div style="float:right;">
        <button id="upload_excel" class="custom-ds" data-toggle="modal" data-target="#upload_modal"><i class="fas fa-file-import"></i> Upload Excel</button>&nbsp;&nbsp;
        <button id="submit_grades" class="custom-ds"><i class="fas fa-send"></i> Submit</button>&nbsp;&nbsp;<a href="#" id="submission_help" style="display: none; color:red;" data-toggle="tooltip" title="Upload Class Record First"><i class="far fa-question-circle"></i></a>
      </div>
  </div>
    <div class="card-body">
<div class="table-responsive">
<table class="table table-striped" id="student_table">
  <thead>
    <tr class="table-bordered">
      <th scope="col">Student&nbsp;Number</th>
      <th scope="col">Name</th>
      <th scope="col">Prelim Grade</th>
      <th scope="col">Remarks</th>
      <th scope="col">Midterm Grade</th>
      <th scope="col">Remarks</th>
      <th scope="col">Final Grade</th>
      <th scope="col">Remarks</th>
    </tr>
  </thead>
  <tbody>
<?php $ss = 0;
  if(mysqli_num_rows($fetch_students) > 0) :
  while ($row = mysqli_fetch_assoc($fetch_students)) : ?>
    <tr id="cc<?= $ss ?>">
      <th scope="row"><?= $row['student_number'] ?></th>
      <td><span class="gradess"><?= $row['lastname'] ?>, <?= $row['firstname'] ?> <?= substr($row['firstname'],0,1) ?>.</span></td>
      <td>     
        <select id="prelim<?= $row['student_number'] ?>" class="select-table grade">
          <option selected disabled hidden>Choose Grade</option>
          <option value="INC">INC</option>
          <option value="FA">FA</option>
          <option value="DRP">DRP</option>
          <option value="5.0">5.0</option>
          <option value="3.0">3.0</option>
          <option value="2.75">2.75</option>
          <option value="2.5">2.5</option>
          <option value="2.25">2.25</option>
          <option value="2.0">2.0</option>
          <option value="1.75">1.75</option>
          <option value="1.5">1.5</option>
          <option value="1.25">1.25</option>
          <option value="1.0">1.0</option>
        </select>  
      </td>
      <td>
        <div class="input-group">
          <input type="text" class="form-control w-100 prelim_remarks sample" name="<?= $row['student_number'] ?>" aria-label="Text input with dropdown button" id="prelim<?= $row['student_number'] ?>" disabled>
          <div class="input-group-append" style="display: none;" id="prelim<?= $row['student_number'] ?>">
            <button id="<?= $row['student_number'] ?>" class="inc-btn-dropdown prelim_inc" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-caret-down"></i></button>
            <ul class="dropdown-menu checkbox-menu allow-focus">
            <li>
                <label>Outstanding Balance
                  <input type="checkbox" class="prelim_outstanding_bal" name="<?= $row['student_number'] ?>">
                </label>
            </li>
            <li>
                <label>Lack of Requirements
                  <input type="checkbox" class="prelim_lack_req" name="<?= $row['student_number'] ?>">
                </label>
            </li>
          </ul>
          </div>
        </div>
      </td>
      <td>     
        <select id="midterm<?= $row['student_number'] ?>" class="select-table grade">
          <option selected disabled hidden>Choose Grade</option>
          <option value="INC">INC</option>
          <option value="FA">FA</option>
          <option value="DRP">DRP</option>
          <option value="5.0">5.0</option>
          <option value="3.0">3.0</option>
          <option value="2.75">2.75</option>
          <option value="2.5">2.5</option>
          <option value="2.25">2.25</option>
          <option value="2.0">2.0</option>
          <option value="1.75">1.75</option>
          <option value="1.5">1.5</option>
          <option value="1.25">1.25</option>
          <option value="1.0">1.0</option>
        </select>  
      </td>
      <td>
        <div class="inc-grp">
          <input type="text" class="form-control w-100 midterm_remarks" name="<?= $row['student_number'] ?>" aria-label="Text input with dropdown button" id="midterm<?= $row['student_number'] ?>" disabled>
          <div class="input-group-append" style="display: none;" id="midterm<?= $row['student_number'] ?>">
            <button id="<?= $row['student_number'] ?>" class="inc-btn-dropdown midterm_inc" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-caret-down"></i></button>
            <ul class="dropdown-menu checkbox-menu allow-focus">
            <li>
                <label>Outstanding Balance
                  <input type="checkbox" class="midterm_outstanding_bal" name="<?= $row['student_number'] ?>">
                </label>
            </li>
            <li>
                <label>Lack of Requirements
                  <input type="checkbox" class="midterm_lack_req" name="<?= $row['student_number'] ?>">
                </label>
            </li>
          </ul>
          </div>
        </div>
      </td>
      <td>     
        <select id="final<?= $row['student_number'] ?>" class="select-table grade">
          <option selected disabled hidden>Choose Grade</option>
          <option value="INC">INC</option>
          <option value="FA">FA</option>
          <option value="DRP">DRP</option>
          <option value="5.0">5.0</option>
          <option value="3.0">3.0</option>
          <option value="2.75">2.75</option>
          <option value="2.5">2.5</option>
          <option value="2.25">2.25</option>
          <option value="2.0">2.0</option>
          <option value="1.75">1.75</option>
          <option value="1.5">1.5</option>
          <option value="1.25">1.25</option>
          <option value="1.0">1.0</option>
        </select>  
      </td>
      <td>
        <div class="input-group">
          <input type="text" class="form-control w-100 final_remarks" name="<?= $row['student_number'] ?>" aria-label="Text input with dropdown button" id="final<?= $row['student_number'] ?>" disabled>
          <div class="input-group-append" style="display: none;" id="final<?= $row['student_number'] ?>">
            <button id="<?= $row['student_number'] ?>" class="inc-btn-dropdown final_inc" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-caret-down"></i></button>
            <ul class="dropdown-menu checkbox-menu allow-focus">
            <li>
                <label>Outstanding Balance
                  <input type="checkbox" class="final_outstanding_bal" name="<?= $row['student_number'] ?>">
                </label>
            </li>
            <li>
                <label>Lack of Requirements
                  <input type="checkbox" class="final_lack_req" name="<?= $row['student_number'] ?>">
                </label>
            </li>
          </ul>
          </div>
        </div>
      </td>
    </tr>
  <?php $ss++;
   endwhile; 
   else: ?>
    <tr><td colspan="8">No Students Enrolled in this Class</td></tr>
  <?php endif; ?>
  </tbody>
</table>
</div>
                </div>
</div> <!-- card end -->
<div class="alert-box success" style="max-width: 500px;">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed" style="max-width: 600px;">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box warning" style="max-width: 600px;">
  <i class="fas fa-exclamation-triangle"></i> <span id="warningmsg">Warning!</span>  
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
<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Upload Class Record in Excel File.</h6><br/>
        <input type="file" accept=".xlsx,.xls" id="upload_file" />
        <input type="hidden" id="cr_id" value="<?php echo $cr_id; ?>" onKeyPress="return checkSubmit(event)" />
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" ripple style="max-width: 100px !important;"><i class="fas fa-times"></i> Cancel</button>
        <button type="button" class="save" id="upload_btn" ripple><i class="fas fa-check"></i> Upload</button>
      </div>
    </div>
  </div>
</div>
<!-- Yes or No Modal-->
<div class="modal fade" id="submit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body">
  
  <h5>Do you want to submit now?</h5>
  <h6>Note: You cannot edit this upon submission.</h6>
  
      </div>
    <div class="modal-footer"> <!-- Footer -->
      <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> Cancel</button>
      <button type="button" class="save" id="confirm_submission" ripple><i class="fas fa-check"></i> Confirm</button>
    </div>
    </div>
  </div>
</div>

  <!-- Scroll to Top Button -->
  <?php require 'src/go-to-top.php'; ?>
  <script type="text/javascript">
    
    function check_excel() {
      <?php 
      $query = mysqli_query($conn, "SELECT excel_file FROM class_record WHERE id = ".$cr_id);
      $row = mysqli_fetch_assoc($query);
      if($row['excel_file'] == "") : ?>
      $('#submit_grades').addClass('disabled');
      $('#submit_grades').attr('disabled',true);     
      $('#submission_help').show(); 
      $('[data-toggle="tooltip"]').tooltip();
      <?php else:?>
      $('#upload_excel').addClass('disabled');
      $('#upload_excel').attr('disabled',true);
    <?php endif; ?>
    }
  $(document).ready(function(){
    
    <?php if(mysqli_num_rows($fetch_students_gr) > 0) { ?>
      $('#submit_grades').addClass('disabled');
      $('#submit_grades').attr('disabled',true); 
    <?php
     while($row = mysqli_fetch_assoc($fetch_students_gr)) { ?>
      $('select').prop('disabled',true);
      $('select[id=prelim<?= $row["student_number"] ?>]').val('<?= $row["prelim_grade"] ?>');
      $('input[id=prelim<?= $row["student_number"] ?>]').val('<?= $row["prelim_remarks"] ?>');
      $('select[id=midterm<?= $row["student_number"] ?>]').val('<?= $row["midterm_grade"] ?>');
      $('input[id=midterm<?= $row["student_number"] ?>]').val('<?= $row["midterm_remarks"] ?>');
      $('select[id=final<?= $row["student_number"] ?>]').val('<?= $row["final_grade"] ?>');
      $('input[id=final<?= $row["student_number"] ?>]').val('<?= $row["final_remarks"] ?>');
  <?php } 
  }?>




  $('.prelim_inc').click(function(){
    var stud_n = $(this).attr('id');
    var ob_val = 'Outstanding Balance';
    var lr_val = 'Lack of Requirements';
    $('.prelim_outstanding_bal[name='+stud_n+']').click(function(){
      var current = $('.prelim_remarks[name='+stud_n+']');
      if($(this).prop('checked') == true) {
        if(current.val() == '') {
          current.val(ob_val);
          current.prop('title', ob_val);
        }
        else if(current.val() == lr_val){
          current.val(current.val()+', '+ob_val);
          current.prop('title', lr_val+', '+ob_val);
        }
      }
      else{
          if($('.prelim_lack_req[name='+stud_n+']').prop('checked') == true) {
            current.val(lr_val);
            current.prop('title', lr_val);
          }
          else if($('.prelim_lack_req[name='+stud_n+']').prop('checked') == false){
            current.val('');
            current.prop('title', '');
          }
        }
    });

    $('.prelim_lack_req[name='+stud_n+']').click(function(){
      var current = $('.prelim_remarks[name='+stud_n+']');
      if($(this).prop('checked') == true) {
        if(current.val() == '') {
          current.val(lr_val);
          current.prop('title', lr_val);
        }
        else if(current.val() == ob_val){
          current.val(current.val()+', '+lr_val);
          current.prop('title', ob_val+', '+lr_val);
        }
      }
      else{
        if($('.prelim_outstanding_bal[name='+stud_n+']').prop('checked') == true) {
          current.val(ob_val);
          current.prop('title', ob_val);
        }
        else if($('.prelim_outstanding_bal[name='+stud_n+']').prop('checked') == false){
          current.val('');
          current.prop('title', '');
        }
      }
    });
  });

  $('.midterm_inc').click(function(){
    var stud_n = $(this).attr('id');
    var ob_val = 'Outstanding Balance';
    var lr_val = 'Lack of Requirements';
    $('.midterm_outstanding_bal[name='+stud_n+']').click(function(){
      var current = $('.midterm_remarks[name='+stud_n+']');
      if($(this).prop('checked') == true) {
        if(current.val() == '') {
          current.val(ob_val);
          current.prop('title', ob_val);
        }
        else if(current.val() == lr_val){
          current.val(current.val()+', '+ob_val);
          current.prop('title', lr_val+', '+ob_val);
        }
      }
      else{
          if($('.midterm_lack_req[name='+stud_n+']').prop('checked') == true) {
            current.val(lr_val);
            current.prop('title', lr_val);
          }
          else if($('.midterm_lack_req[name='+stud_n+']').prop('checked') == false){
            current.val('');
            current.prop('title', '');
          }
        }
    });
    $('.midterm_lack_req[name='+stud_n+']').click(function(){
      var current = $('.midterm_remarks[name='+stud_n+']');
      if($(this).prop('checked') == true) {
        if(current.val() == '') {
          current.val(lr_val);
          current.prop('title', lr_val);
        }
        else if(current.val() == ob_val){
          current.val(current.val()+', '+lr_val);
          current.prop('title', ob_val+', '+lr_val);
        }
      }
      else{
        if($('.midterm_outstanding_bal[name='+stud_n+']').prop('checked') == true) {
          current.val(ob_val);
          current.prop('title', ob_val);
        }
        else if($('.midterm_outstanding_bal[name='+stud_n+']').prop('checked') == false){
          current.val('');
          current.prop('title', '');
        }
      }
    });
  });

  $('.final_inc').click(function(){
    var stud_n = $(this).attr('id');
    var ob_val = 'Outstanding Balance';
    var lr_val = 'Lack of Requirements';
    $('.final_outstanding_bal[name='+stud_n+']').click(function(){
      var current = $('.final_remarks[name='+stud_n+']');
      if($(this).prop('checked') == true) {
        if(current.val() == '') {
          current.val(ob_val);
          current.prop('title', ob_val);
        }
        else if(current.val() == lr_val){
          current.val(current.val()+', '+ob_val);
          current.prop('title', lr_val+', '+ob_val);
        }
      }
      else{
          if($('.final_lack_req[name='+stud_n+']').prop('checked') == true) {
            current.val(lr_val);
            current.prop('title', lr_val);
          }
          else if($('.final_lack_req[name='+stud_n+']').prop('checked') == false){
            current.val('');
            current.prop('title', '');
          }
        }
    });
    $('.final_lack_req[name='+stud_n+']').click(function(){
      var current = $('.final_remarks[name='+stud_n+']');
      if($(this).prop('checked') == true) {
        if(current.val() == '') {
          current.val(lr_val);
          current.prop('title', lr_val);
        }
        else if(current.val() == ob_val){
          current.val(current.val()+', '+lr_val);
          current.prop('title', ob_val+', '+lr_val);
        }
      }
      else{
        if($('.final_outstanding_bal[name='+stud_n+']').prop('checked') == true) {
          current.val(ob_val);
          current.prop('title', ob_val);
        }
        else if($('.final_outstanding_bal[name='+stud_n+']').prop('checked') == false){
          current.val('');
          current.prop('title', '');
        }
      }
    });
  });


  $(".checkbox-menu").on("change", "input[type='checkbox']", function() {
     $(this).closest("li").toggleClass("active", this.checked);
  });
  $(document).on('click', '.allow-focus', function (e) {
    e.stopPropagation();
  });
  check_excel();  
  $('#upload_btn').click(function(){
    if(document.getElementById("upload_file").files[0] != null){
      var name = document.getElementById("upload_file").files[0].name;
      var form_data = new FormData();
      form_data.append("file", document.getElementById("upload_file").files[0]);
      form_data.append("cr_id", "<?php echo $cr_id; ?>");
      $.ajax({
        url:"upload_excel.php",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
          if(data == "0"){
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html("Please, upload Excel File.");
          }
          else {
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html(data);
            $("#upload_modal").modal('hide');
            $('#submission_help').hide();
            $('#submit_grades').attr('disabled', false);
            $('#submit_grades').removeClass('disabled');
            $('#upload_excel').addClass('disabled');
            $('#upload_excel').attr('disabled',true);
          }
        }
      });
    }
    else {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html("Please, choose Excel File.");
    }
  });
  
  });
  

  $('#student_table').on('change', '.grade', function(){
    var val = $(this).val();
    var id = $(this).attr('id');
    var prelimsn_only = id.substring(6,id.length);
    var midtermsn_only = id.substring(7,id.length);
    var finalsn_only = id.substring(5,id.length);
    var prelim_only = id.substring(0,6);
    var midterm_only = id.substring(0,7);
    var final_only = id.substring(0,5);
    if(val == 'DRP'){
      $('input[id='+id+']').val('Dropped');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == 'INC'){
      $('div[id='+id+']').show();
      $('input[id='+id+']').removeClass('w-100');
      $('input[id='+id+']').addClass('w-75');
      $('input[id='+id+']').val('');
    }
    else if(val == 'FA'){
      $('input[id='+id+']').val('Failed due to absences');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "5.0"){
      $('input[id='+id+']').val('Failed');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "3.0"){
      $('input[id='+id+']').val('Passed');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "2.75"){
      $('input[id='+id+']').val('Fair');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "2.5"){
      $('input[id='+id+']').val('Satisfactory');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "2.25"){
      $('input[id='+id+']').val('Very Satisfactory');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "2.0"){
      $('input[id='+id+']').val('Good');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "1.75"){
      $('input[id='+id+']').val('Very Good');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "1.5"){
      $('input[id='+id+']').val('with Distinction');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "1.25"){
      $('input[id='+id+']').val('High Distinction');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
    else if(val == "1.0"){
      $('input[id='+id+']').val('Excellent');
      $('input[id='+id+']').prop('disabled',true);
      $('div[id='+id+']').hide();
      $('input[id='+id+']').addClass('w-100');
      $('#outstanding_bal').prop('checked', false);
      $('#lack_req').prop('checked', false);
      $('.checkbox-menu li').removeClass('active');
      if(prelim_only == 'prelim'){
        $('.checkbox-menu li .prelim_outstanding_bal[name="'+prelimsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .prelim_lack_req[name="'+prelimsn_only+'"]').prop('checked',false);
      }
      if(midterm_only == 'midterm'){
        $('.checkbox-menu li .midterm_outstanding_bal[name="'+midtermsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .midterm_lack_req[name="'+midtermsn_only+'"]').prop('checked',false);
      }
      if(final_only == 'final'){
        $('.checkbox-menu li .final_outstanding_bal[name="'+finalsn_only+'"]').prop('checked',false);
        $('.checkbox-menu li .final_lack_req[name="'+finalsn_only+'"]').prop('checked',false);
      }
    }
  });


  // $('input[id=outstanding_bal2020-06-00001]').click(function(){ $('input[id=prelim2020-06-00001]').val('outstanding Balance'); });

  
  $('#submit_grades').click(function(){
    var all = {};
    all.stud_num = new Array();
    all.prelim_remarks = new Array();
    all.prelim_grades = new Array();
    all.midterm_remarks = new Array();
    all.midterm_grades = new Array();
    all.final_remarks = new Array();
    all.final_grades = new Array();
    var temp = 0;
    var counts = $('#student_table').find($('.gradess'));
    var i = 0;

    for(i = 0; i < counts.length; i++) {
      var sn_get = $('#cc'+i).closest('tr').find('th').text();
      var get_prelimremarks = $('input[name="'+sn_get+'"].prelim_remarks').val();
      var get_prelimgrades = $('select[id=prelim'+sn_get+']').val();
      var get_midtermremarks = $('input[name="'+sn_get+'"].midterm_remarks').val();
      var get_midtermgrades = $('select[id=midterm'+sn_get+']').val();
      var get_finalremarks = $('input[name="'+sn_get+'"].final_remarks').val();
      var get_finalgrades = $('select[id=final'+sn_get+']').val();
      if(get_prelimgrades == null || get_midtermgrades == null || get_finalgrades == null) {
        temp++;
        break;
      }
      else {
        all.stud_num.push(sn_get);
        all.prelim_remarks.push(get_prelimremarks);
        all.prelim_grades.push(get_prelimgrades);
        all.midterm_remarks.push(get_midtermremarks);
        all.midterm_grades.push(get_midtermgrades);
        all.final_remarks.push(get_finalremarks);
        all.final_grades.push(get_finalgrades);
      }
    }

    if(temp > 0) {
      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#failedmsg").html("Please, select grade in every student. Including Prelim, Midterm and Final Grade.");
    }
    else {
      $('#submit_modal').modal('show');
      $('#confirm_submission').click(function(){
        var ss = JSON.stringify(all);
        $.ajax({
          url:"process.php",
          type:"POST",
          data:{"submit":1,data:ss,cr_id:"<?php echo $cr_id;?>"},
          cache:false,
          success:function(data){
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html(data);
            $('#submit_modal').modal('hide');
          }
        });  
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