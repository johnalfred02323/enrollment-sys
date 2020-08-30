<!-- Head -->
<?php require '../../src/layout/grading/head.php';
include('../../config/config.php');
$sy = mysqli_query($conn, "SELECT DISTINCT school_year FROM timeframe ORDER BY school_year DESC");
?>

  <!-- jquery -->
  <script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

  <!-- Dark mode -->
  <link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables-dark.css">

  <title>GRC | Grading System | Grades Submitted</title>

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
      <li class="nav-item active">
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


      <!-- Grades Submitted -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="grades_submitted">
          <i class="fas fa-cabinet-filing"></i>
          <span>Grades Submitted</span></a>
      </li> -->

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
          <li class="breadcrumb-item active" aria-current="page">Grades Submitted</li>
        </ol>
      </nav>
      <!-- SPACER -->
      <div class="mx-auto" style="height: 10px;"></div>

      <div class="card shadow-sm md-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold card-text-title-head">Grades Submitted</h6>
        </div>
        <div class="card-body">
          <div class="box1" style="width: 13%;">
            <label class="select-label">School Year</label>
            <select name='' id="select_sy" required>
              <option hidden>Choose School Year</option>
              <?php while($row = mysqli_fetch_assoc($sy)) : ?>
                <option value="<?= $row['school_year'] ?>"><?= $row['school_year'] ?></option>
              <?php endwhile;?>
            </select>
          </div>
          <br>
          <table id="classrecords_table" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Faculty Name</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
          </table>
        </div>
      </div>

      </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>
    </div>

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
    fetch_class_records();

    $('#select_sy').change(function(){
      var val = $(this).val();
      $('#classrecords_table').DataTable().destroy();
      fetch_class_records(val);
    });

    function fetch_class_records(sy) {
      var table = $('#classrecords_table').DataTable( {
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "pageLength": 10,
      "order": [[ 5, 'desc' ]],
      "processing" : true,
      "serverSide" : true,
      "ajax" : {
          "url":"fetch_gradessubmitted.php",
          "data":{"sy":sy}
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
