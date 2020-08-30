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

  <title>GRC | Grading System | Class Records</title>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Side Nav -->
    <?php require '../../src/layout/grading/side-nav.php'; ?>
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
          <li class="breadcrumb-item active" aria-current="page">Class Records</li>
        </ol>
      </nav>
      <!-- SPACER -->
      <div class="mx-auto" style="height: 50px;"></div>

      <div class="card shadow-sm md-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <div class="box1">
            <label class="select-label">School Year</label>
            <select name='' id="select_sy" required>
              <option hidden>Choose School Year</option>
              <?php while($row = mysqli_fetch_assoc($sy)) : ?>
                <option value="<?= $row['school_year'] ?>"><?= $row['school_year'] ?></option>
              <?php endwhile;?>
            </select>
          </div>
        </div>
        <div class="card-body">
          <table id="classrecords_table" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Faculty Name</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>School Year</th>
                    <th>Semester</th>
                    <th>Action</th>
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

    $('#classrecords_table').on('click', '.download', function(e) {
      e.preventDefault();
      var file = $(this).attr('id');
      window.location.href = '../../faculty/src/excel_files/'+file;
    });

    function fetch_class_records(sy) {
      var table = $('#classrecords_table').DataTable( {
      "pagingType": "full_numbers",
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "pageLength": 10,
      "order": [[ 1, 'desc' ]],
      "processing" : true,
      "serverSide" : true,
      "ajax" : {
          "url":"fetch_classrecords.php",
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
  <script src="../../src/vendor/table/js/jquery.dataTables.columnFilter.js"></script>
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
