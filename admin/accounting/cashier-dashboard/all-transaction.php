<!-- Transaction -->

<!-- Head -->
<?php
require 'layout/head.php'; 
require '../../../config/config.php'; 
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">


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
    <div class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard.php">Dashboard</a> / Transaction</div>
  </ol>
</nav>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4">

  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Transaction</h6>

  </div>

    <div class="card-body" >

      <table id="all-transaction" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Official&nbsp;Receipt</th>
                      <th>Amount</th>
                      <th>School&nbsp;Year</th>
                      <th>Semester</th>
                      <th>Date</th>
                  </tr>
              </thead>
              <tbody></tbody>
      </table>
</div>
</div>



        </div>
        <!-- /.container-fluid -->
   


      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->



<!-- Add Transaction Modal -->




  </div>
  <!-- End of Page Wrapper -->




  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script>


<script type="text/javascript">
$(document).ready(function() {
dashtrans_data();
function dashtrans_data(){
  var table = $('#all-transaction').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" : "all_transaction.php",

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
}
});
</script>


  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>



  <!-- TABLE js -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> -->
<script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

</body>

</html>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed" style="max-width: 500px;">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


