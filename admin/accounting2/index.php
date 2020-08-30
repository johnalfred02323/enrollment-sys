<!-- Head -->
<?php require '../../src/layout/accounting/head.php'; 
include('../../config/config.php');
?>


<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Accounting</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Side Nav -->
    <?php require '../../src/layout/accounting/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/accounting/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>


<?php require '../../admin/accounting/layout/accounting.php'; ?>


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
