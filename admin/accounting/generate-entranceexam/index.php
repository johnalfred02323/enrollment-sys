<!-- Head -->
<?php
require '../layout/head.php'; 
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
    <?php require 'layout/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require 'layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><a href="../">Dashboard</a> / Reports / Generate Entrance Exam</li>
  </ol>
</nav>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

  <h6 class="m-0 font-weight-bold card-text-title-head">Reports</h6>

    <form class="form-horizontal" method="post">
        <div class="row"> <!-- ROW Start Here -->
            <div class="col-xs-3"> 
                <input type="date" name="from_date" placeholder="From :">
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-xs-3"> 
                <input type="date" name="to_date" placeholder="To :">
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-xs-3"> 
                <button type="submit" id="submit" name="submit" class="view-user pull-xs-right" ripple>Generate</button>
            </div>
        </div>
    </form>

  </div>

    <div class="card-body" >
      
      <table id="e_exam" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Official&nbsp;Receipt</th>
                      <th>School&nbsp;Year</th>
                      <th>Semester</th>
                      <th>Date</th>
                  </tr>
              </thead>
              <tbody>
                    <?php
                    if(isset($_POST['submit'])){
                    $from_date = $_POST['from_date'];
                    $to_date = $_POST['to_date'];
                    
                    $query= "SELECT * FROM entrance_exam where date_paid between '$from_date' and '$to_date' ";
                    $result = mysqli_query($conn, $query);
                    while($row=mysqli_fetch_assoc($result)){
                      $e_id = $row['e_id'];
                    ?>
                      <tr>
                        <td><?php echo $row['lastname'].',&nbsp;'.$row['firstname'].'&nbsp;'.$row['middlename']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['official_receipt']; ?></td>
                        <td><?php echo $row['school_yr']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td><?php echo $row['date_paid']; ?></td>
                      </tr>
                        <?php }} ?>
              </tbody>
      </table>

    <a href="print_entranceexam.php?from_date=<?php echo $_POST['from_date']; ?>&to_date=<?php echo $_POST['to_date']; ?>" target="new" class="btn btn-flat add-user pull-xs-right"><i class="fa fa-print"></i> Print</a>

    </div>
</div> <!-- card end -->


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


  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script>

<script type="text/javascript">
  
  $(function () {
    $('#e_exam').DataTable({
      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 2, 'desc' ]],

      "ordering": true,

      "info": true,

      "autoWidth": false,

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
  });
      
</script> 


  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>

  <!-- TABLE js -->
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