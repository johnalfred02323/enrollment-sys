<!-- Head -->
<?php include('../config/config.php');
require 'src/layout/head.php'; 
$faculty_id = $_SESSION['faculty_id'];
$classes = mysqli_query($conn, "SELECT user.id, schedule.sched_id, schedule.faculty_id, class_record.id as cr_id, class_record.downloaded, class_record.excel_file, class_record.submitted FROM schedule INNER JOIN user ON schedule.faculty_id = user.id INNER JOIN class_record ON schedule.sched_id = class_record.sched_id WHERE user.id = $faculty_id") or die(mysqli_error($conn));
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


?>

<!-- jquery -->
<script src="src/vendor/jquery/jquery-3.3.1.min.js"></script>

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
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>



<!-- Cards Total Start Here 1 -->
        <div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Students Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Classes
                </div>
              <div class="student-color">

                <span class="float-left"><h4><?php echo $classes_num;?></h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="classes">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Students End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- New enrollees Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  Downloaded Class Record
                </div>
              <div class="new-enrollees-color">

                <span class="float-left"><h4><?php echo $downloaded.'/'.$classes_num;?></h4></span>
                <span class="float-right"><h4><i class="fas fa-book"></i></h4></span>
             
              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 new-enrollees-bg" href="classes">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- New enrollees End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Subjects Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Uploaded Class Record
                </div>
              <div class="subjects-color">

                <span class="float-left"><h4><?php echo $uploaded.'/'.$classes_num;?></h4></span>
                <span class="float-right"><h4><i class="fas fa-book"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 subjects-bg " href="classes">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
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
              <a class="footer-count pt-1 pb-1 clearfix small z-1 instructor-bg" href="classes">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
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
