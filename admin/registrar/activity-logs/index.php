<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');  
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

  <title>GRC System | Registrar</title>

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'layout/side-nav.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Top Nav -->
        <?php require '../layout/top-nav.php'; ?>

       <!-- Begin Page Content -->
        <div class="container-fluid">

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Activity Logs</li>
  </ol>
</nav>


<div class="card shadow-sm mb-4"> <!-- card 5 start -->
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold d-inline">Activity List</h6>
  </div>
    <div class="card-body" >
      <table id="activitylogs" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>User</th>
                <th>Usertype</th>
                <th>Department</th>
                <th>Action</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>Mhel Jay Buenaflor</td>
              <td>Admin</td>
              <td>Registrar</td>
              <td>Added User</td>
              <td>May 20, 2020 | 10:00 PM</td>
            </tr>
        </tbody>
      </table>
    </div>
</div> <!-- card 5 end -->

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


  <script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
  <script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
  <script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>




  <script type="text/javascript">

  $(document).ready(function() {

      var table = $('#activitylogs').DataTable( {

        "pagingType": "full_numbers",

        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

        "pageLength": 10,

        "order": [[ 0, 'asc' ]],

        "processing" : true,
        
        // "serverSide" : true,

        // "ajax" : "fetch.php",

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

      } );

  } );

  </script>

</body>

</html>
