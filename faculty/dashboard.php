<!-- Head -->
<?php include('../config/config.php');
require 'src/layout/head.php'; 
$faculty_id = substr($_COOKIE['userid'],7,strlen($_COOKIE['userid']));
$classes = mysqli_query($conn, "SELECT faculty_user.id, schedule.sched_id, schedule.faculty_id, class_record.id as cr_id, class_record.downloaded, class_record.excel_file, class_record.submitted FROM schedule INNER JOIN faculty_user ON schedule.faculty_id = faculty_user.id INNER JOIN class_record ON schedule.sched_id = class_record.sched_id WHERE faculty_user.id = $faculty_id") or die(mysqli_error($conn));
$classes_num = mysqli_num_rows($classes);
$downloaded = 0;
$uploaded = 0;
$submitted = 0;
while($classes_data = mysqli_fetch_assoc($classes)) {
  if($classes_data['downloaded'] == 1) {
    $downloaded++;
  }

  if($classes_data['excel_file'] != '') {
    $uploaded++;
  }

  if($classes_data['submitted'] == 1) {
    $submitted++;
  }
}
$sched = mysqli_query($conn, "SELECT * FROM timeframe WHERE type = 'submission'");
$get_sched = mysqli_fetch_assoc($sched);
?>

<!-- jquery -->
<script src="src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Faculty Dashboard</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

        <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
          <img src="../src/img/grc-header.png" width="150px;">
        </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      <!-- Classes -->
      <li class="nav-item">
        <a class="nav-link" href="classes">
          <i class="fas fa-users"></i>
          <span>Classes</span></a>
      </li>

      <!-- Report of Grade -->
      <li class="nav-item">
        <a class="nav-link" href="grade_report">
          <i class="fas fa-list-ol"></i>
          <span>Report of Grade</span></a>
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
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>
        <?php if($get_sched['status'] == 'Active') : ?>
        <div class="card shadow-sm mb-4"> <!-- card start -->
          <!-- Card Header  -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold card-text-title-head">Announcement!!</h6>
          </div>
          
          <div class="card-body" >
            <center>
            <h4><i>Good Day! This is the schedule of the submission of grades.</i> <br><b><?php echo date('F d, Y', strtotime($get_sched['date_from']));?> to <?php echo date('F d, Y', strtotime($get_sched['date_to']));?>.</b></h4>
            </center>
          </div>
        </div>
        <?php endif; ?>
<!-- Cards Total Start Here 1 -->
        <div class="row">
          

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Sections Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Classes
                </div>
              <div class="student-color">
                <span class="float-left"><h4><?php echo $classes_num;?></h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>
              </div>
            </div>
          </div> <!-- Sections End Here -->


          <div class="col-xl-3 col-sm-6 mb-3"> <!-- New enrollees Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  Downloaded Class Record
                </div>
              <div class="new-enrollees-color">

                <span class="float-left"><h4><?php echo $downloaded.'/'.$classes_num;?></h4></span>
                <span class="float-right"><h4><i class="fas fa-file-download"></i></h4></span>
             
              </div>
            </div>
          </div> <!-- New enrollees End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Subjects Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Uploaded Class Record
                </div>
              <div class="subjects-color">

                <span class="float-left"><h4><?php echo $uploaded.'/'.$classes_num;?></h4></span>
                <span class="float-right"><h4><i class="fas fa-file-upload"></i></h4></span>

              </div>
            </div>
          </div> <!-- Subjects End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Instructor Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Submitted Grades
                </div>
              <div class="instructor-color ">

                <span class="float-left"><h4><?php echo $submitted.'/'.$classes_num;?></h4></span>
                <span class="float-right"><h4><i class="fas fa-paper-plane"></i></h4></span>

              </div>
            </div>
          </div>  <!-- Instructor End Here -->                   

        </div>
<!-- Cards Total End Here 1 -->







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
