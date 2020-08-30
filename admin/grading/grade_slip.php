<!-- Head -->
<?php require '../../src/layout/grading/head.php';
include('../../config/config.php');
$sy = mysqli_query($conn, "SELECT DISTINCT school_year FROM timeframe ORDER BY school_year DESC");
$check_sy_sem = mysqli_query($conn, "SELECT * FROM timeframe WHERE type = 'enrollment' ORDER BY id DESC LIMIT 1");
$check_sy_sem_data = mysqli_fetch_assoc($check_sy_sem);
$all_students = mysqli_query($conn ,"SELECT DISTINCT student_enrollment_record.student_number FROM student_enrollment_record INNER JOIN schedule ON student_enrollment_record.sched_id = schedule.sched_id INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number");
$all_students_count = mysqli_num_rows($all_students);
$fetch_codes = mysqli_query($conn, "SELECT * FROM grade_viewing_code");
?>

  <!-- jquery -->
  <script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


  <link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

  <!-- Dark mode -->
  <link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables-dark.css">

  <title>GRC | Grading System | Grade Slip</title>

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
      </li>       -->

      <!-- Grade Change -->
      <li class="nav-item">
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
      <li class="nav-item active">
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
    <li class="breadcrumb-item active" aria-current="page">Grade Slip</li>
  </ol>
</nav>
  <!-- SPACER -->
  <div class="mx-auto" style="height: 10px;"></div>
<div class="card shadow-sm mb-4"> <!-- card start -->

   <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold card-text-title-head">Grade Slip</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Options</div>
          <a class="dropdown-item" href="#" id="by_student_btn">By Student</a>
          <a class="dropdown-item" href="#" id="by_section_btn" onclick="$('#by_student').hide();$('#by_section').show();">By Course</a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-header">Settings</div>
          <a class="dropdown-item" href="#" id="config_doc" data-toggle="modal" data-target="#config">Configure Document</a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div class="box1" style="width: 13%;">
        <label class="select-label">School Year</label>
        <select name='' id="select_sy" required>
          <?php while($row = mysqli_fetch_assoc($sy)) : ?>
            <option value="<?= $row['school_year'] ?>"><?= $row['school_year'] ?></option>
          <?php endwhile;?>
        </select>
      </div>

      <div id="by_student">
        <br>
        <div class="row" style="width: 100%;">
          <div class="col">
            <label class="container-check">All
              <input type="checkbox" id="checkall">
              <span class="checkmark-check"></span>
            </label>
          </div>
          <?php $course_stmt = $pdo_conn->prepare('SELECT DISTINCT course_abbreviation FROM course');
          $course_stmt->execute(); 

          while($row = $course_stmt->fetch(PDO::FETCH_ASSOC)) : ?>
          <div class="col">
            <label class="container-check"><?= $row['course_abbreviation'] ?>
              <input type="checkbox" class="checkItem" value="<?= $row['course_abbreviation'] ?>">
              <span class="checkmark-check"></span>
            </label>
          </div>
          <?php endwhile; ?>
          
        </div>
        <br>
        <table class="display no-wrap" id="student_table" style="width:100%">
          <thead>
            <tr>
              <th>Student&nbsp;Number</th>
              <th>Name</th>
              <th>Semester</th>
              <th class="align-items-center">Generate&nbsp;Grade&nbsp;SLip</th>
            </tr>
          </thead>
        </table>
      </div>
      <div id="by_section" style="display: none;">
        <br>
        <table class="display no-wrap" id="section_table" style="width:100%">
          <thead>
            <tr>
              <th>Course</th>
              <th>Semester</th>
              <th class="align-items-center">Generate&nbsp;Grade&nbsp;SLip</th>
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
    <div class="modal fade" id="config" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Grade Slip Configuration</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <label class="text-label">School Registrar</label>
            <input type="text" class="form-control" style="text-transform: uppercase;" id="gs_signee">
            <small>Note: Change the name in the textbox to change the document signee.</small>
          </div>
          <div class="modal-footer"> <!-- Footer -->
            <button type="button" class="btn btn-danger" data-dismiss="modal" ripple><i class="fas fa-times"></i> Cancel</button>
            <button type="button" class="btn btn-primary" id="add_signee" ripple><i class="fas fa-check"></i> Confirm</button>
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
      ret_selected_signee();
      $('#config_doc').click(function(){
        ret_selected_signee();
      });
      function ret_selected_signee() {
        $.ajax({
          url:"process.php",
          method:"POST",
          data:{"ret_gs_signee":1},
          success:function(data) {
            if(data == '0') {
              $('#gs_signee').attr('placeholder', 'No Available Signee');
            }
            else {
              $('#gs_signee').val(data);
            }

          }
        });
      }

      $('#add_signee').click(function(){
        var name = $('#gs_signee').val().toUpperCase();
        if(name != '') {
          $.ajax({
            url:"process.php",
            method:"POST",
            data:{"add_gs_signee":1,name:name},
            success:function(data) {
              if(data == "0") {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html("There is an error when executing your request.");
              }
              else {
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html(data);
                $('#config').modal('hide');
              }
            }
          });
        }
      });

      $('#select_sy').change(function(){
        var val = $(this).val();
        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
        $('#student_table').DataTable().destroy();
        get_data(get_all,val);
        get_all = [];
        $('#section_table').DataTable().destroy();
        get_section(val);
      });

      var get_all = [];
      var isRunning = true;

      get_data();
      get_section();
      function get_data(get_all,sy) {
        var all = JSON.stringify(get_all);

        var table = $('#student_table').DataTable({
          "pagingType": "full_numbers",
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
          "pageLength": 10,
          "order": [[ 1, 'desc' ]],
          "serverSide" : true,
          "ajax" : {
                "url":"fetch_students_2.php",
                "data":{
                  "course":all,
                  "school_year":sy}
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

      function get_section(sy) {
        var table = $('#section_table').DataTable({
          "pagingType": "full_numbers",
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
          "pageLength": 10,
          "order": [[ 1, 'desc' ]],
          "serverSide" : true,
          "ajax" : {
                "url":"fetch_course.php",
                "data":{
                  "school_year":sy}
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



      $('#by_student_btn').click(function(){
        $('#by_student').show();
        $('#by_section').hide();
        $('.checkItem').prop('checked', false);
        $('#student_table').DataTable().destroy();
        get_data();
      });

      $('#checkall').change(function(){
        $('.checkItem').prop('checked', $(this).prop('checked'));
        var sy = $('#select_sy').val();
        if($(this).prop('checked') == true) {
           $('.checkItem:checked').each(function(){
            get_all.push($(this).val());
          });
          $('#student_table').DataTable().destroy();
          get_data(get_all,sy);
          get_all = [];
        }
      });
      $('.checkItem').click(function(){
        var course = $(this).val();
        var sy = $('#select_sy').val();

        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
        $('#student_table').DataTable().destroy();
        get_data(get_all,sy);
        get_all = [];
      });


      $('.checkItem').change(function(){
        if($(this).prop('checked') == false) {
          $('#checkall').prop('checked', false);
        }
        if($('.checkItem:checked').length == $('.checkItem').length) {
          $('#checkall').prop('checked', true);
        }
      });


    });

    $('#student_table').on('click', '.generate-student', function(){
      var id = $(this).attr('id');
      window.open('view_gradeslip?id='+id+'&type=stdnt');
    });

    $('#section_table').on('click', '.generate-course', function(){
      var id = $(this).attr('id');
      window.open('view_gradeslip?id='+id+'&type=course');
    });
  </script>
  <script src="../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
  <script src="../../src/vendor/table/js/jquery.dataTables.min.js"></script>
  <script src="../../src/vendor/table/js/dataTables.responsive.min.js"></script>

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
