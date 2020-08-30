<!-- Head -->
<?php 
require ('../../config/config.php'); 
require '../../src/layout/admission/head.php'; 
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables-dark.css">

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

            <!-- SPACER -->
            <div class="mx-auto" style="height: 20px;"></div>


      <div class="card shadow-sm mb-5"> <!-- card start -->

        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

          <h5 class="m-0">Freshmen credentials</h5>

            </div>

          <div class="card-body" >

            <table id="cred_table" class="display nowrap" style="width:100%">
              <thead>
                    <tr>
                      <th>S.I.S No.</th>
                      <th>Student Number</th>
                      <th>Fullname</th>
                      <th>Form 137A</th>
                      <th>Form 138A</th>
                      <th>Good Moral Character</th>
                      <th>TRF</th>
                      <th>2x2 Pictures</th>
                      <th>1x1 Picture</th>
                      <th>Barangay Clearance</th>
                      <th>Birth Certificate</th>
                      <th>GRC Admission Test</th>
                      <th>Marriage Certificate</th>
                      <th>Long Brown Envelope</th>
                      <th>Action</th>
                    </tr>
                  </thead>
            </table>

          </div>

          </div> <!-- card end -->

      <div class="card shadow-sm mb-5"> <!-- card start -->

        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

          <h5 class="m-0">Transferee credentials</h5>

            </div>

          <div class="card-body" >

            <table id="trans_table" class="display nowrap" style="width:100%">
              <thead>
                    <tr>
                      <th>S.I.S No.</th>
                      <th>Student Number</th>
                      <th>Fullname</th>
                      <th>Certificate of Grade</th>
                      <th>TOR</th>
                      <th>Honorable Dismissal</th>
                      <th>Good Moral Character</th>
                      <th>2x2 Pictures</th>
                      <th>1x1 Picture</th>
                      <th>Barangay Clearance</th>
                      <th>Birth Certificate</th>
                      <th>GRC Admission Test</th>
                      <th>Marriage Certificate</th>
                      <th>Long Brown Envelope</th>
                      <th>Action</th>
                    </tr>
                  </thead>
            </table>

          </div>

          </div> <!-- card end -->
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

<!-- Button Effect -->
<script src="../../src/js/button-effect.js"></script> 

<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Are you sure to delete this Student?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="confirmdelete_btn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function fetch_credentials(){
  var table = $('#cred_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "admission_credentials_fetch.php",

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

function fetch_transferee(){
  var table = $('#trans_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "admission_transferee_credentials_fetch.php",

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

$(document).ready(function() {
var sisnum;
fetch_credentials();
fetch_transferee();

});
</script>

  <!-- TABLE js -->
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

  <!-- Counter -->
  <script src="../../src/js/counter.js"></script>

</body>

</html>
