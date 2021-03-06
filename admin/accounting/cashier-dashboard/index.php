<!-- Head -->
<?php require 'layout/head.php'; ?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Accounting</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Side Nav -->
    <?php require 'layout/cashier-side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require 'layout/cashier-top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>

    <?php

    $query = "SELECT * FROM timeframe WHERE status = 'Active' AND type = 'Enrollment' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

   ?>

   <?php if(isset($_SESSION["username"])): ?>
   <label id="usercash" hidden=""><?php echo $_SESSION['username']; ?></label>
   <?php endif ?>

    <h6 class="m-0 font-weight-bold mr-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       School Year :  
        <label id="sy"> <?php echo $row['school_year']; ?> </label>
      </h6> 
      
      <h6 class="m-0 font-weight-bold mr-3">
        <label id="semester"> <?php echo $row['semester']; ?> </label>
      </h6>
   
  </ol>
</nav>


<?php require '../layout/cashier.php'; ?>


        </div>
        <!-- /.container-fluid -->

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

</body>

</html>
