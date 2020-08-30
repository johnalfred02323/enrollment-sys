<!-- Head -->
<?php require '../../src/layout/admission/head.php'; ?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Admission</title>

</head>
  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/admission/side-nav.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Top Nav -->
        <?php require '../../src/layout/admission/top-nav.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>

          <div class="row">

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- Students Start Here -->

              <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Officialy Enrolled Students
                </div>
              <div class="student-color">
                <span class="float-left"><h4 class="counts">2329</h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>
              </div>

              </div>
            </div> <!-- Students End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- New enrollees Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  Freshmen
                </div>
              <div class="new-enrollees-color">
                <span class="float-left"><h4 class="counts">398</h4></span>
                <span class="float-right"><h4><i class="fas fa-user"></i></h4></span>
              </div>
              
               </div>
            </div> <!-- New enrollees End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- Subjects Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Transferee
                </div>
              <div class="subjects-color">
                <span class="float-left"><h4 class="counts">49</h4></span>
                <span class="float-right"><h4><i class="fas fa-user"></i></h4></span>
              </div>
              
              </div>
            </div> <!-- Subjects End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- Instructor Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Cross-Enrollee
                </div>
              <div class="instructor-color ">
                <span class="float-left"><h4 class="counts">36</h4></span>
                <span class="float-right"><h4><i class="fas fa-user"></i></h4></span>
              </div>
              
              </div>
            </div>  <!-- Instructor End Here -->                   

          </div>
          <!-- Cards Total End Here 1 -->

          <div class="row">

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- Sections Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 bsit-color">
                 BS Information Technology
                </div>
              <div class="bsit-color">
                <span class="float-left"><h4 class="counts">68</h4></span>
                <span class="float-right"><h4><i class="fa fa-laptop" aria-hidden="true"></i></h4></span>
              </div>
              
              </div>
            </div> <!-- Sections End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- Admins Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 acc-color">
                  BS Accounting
                </div>
              <div class="acc-color">
                <span class="float-left"><h4 class="counts">31</h4></span>
                <span class="float-right"><h4><i class="fa fa-calculator" aria-hidden="true"></i></h4></span>
              </div>
              
              </div>
            </div> <!-- Admins End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!--  Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 ed-color">
                  BS Education
                </div>
              <div class="ed-color">
                <span class="float-left"><h4 class="counts">10</h4></span>
                <span class="float-right"><h4><i class="fa fa-book" aria-hidden="true"></i></h4></span>
              </div>
              
              </div>
            </div> <!--  End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- News Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 ba-color">
                  BS Business Administration
                </div>
              <div class="ba-color">
                <span class="float-left"><h4 class="counts">21</h4></span>
                <span class="float-right"><h4><i class="fa fa-briefcase" aria-hidden="true"></i></h4></span>
              </div>
              
              </div>
            </div>   <!-- News End Here -->                 

          </div>
          <!-- Cards Total Start Here 2 -->

          <div class="row">

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- Sections Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 sections-bg">
                  Released Credentials
                </div>
                <div class="sections-color">
                  <span class="float-left"><h4 class="counts">68</h4></span>
                  <span class="float-right"><h4><i class="fa fa-envelope-open" aria-hidden="true"></i></h4></span>
                </div>
                
              </div>
            </div> <!-- Sections End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!-- Admins Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 admins-bg">
                  Incomplete Requirements
                </div>
              <div class="admins-color">
                <span class="float-left"><h4 class="counts">31</h4></span>
                <span class="float-right"><h4><i class="fa fa-user-times" aria-hidden="true"></i></h4></span>
              </div>
              
              </div>
            </div> <!-- Admins End Here -->

            <div class="col-xl-3 col-sm-6 mb-3"> <!--  Start Here -->
              <div class="card total-count-card">
                <div class="pt-1 pb-1 none-bg">
                  Submitted Credentials
                </div>
                <div class="none-color">
                  <span class="float-left"><h4 class="counts">10</h4></span>
                  <span class="float-right"><h4><i class="fa fa-envelope" aria-hidden="true"></i></h4></span>
                </div>
                
              </div>
            </div> <!--  End Here -->

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<!-- Footer -->
<?php require '../../src/layout/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<?php require '../../src/layout/go-to-top.php'; ?>

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
