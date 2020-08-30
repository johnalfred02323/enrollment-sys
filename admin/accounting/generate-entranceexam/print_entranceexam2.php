<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require 'layout/head.php'; 
require '../../../config/config.php'; 
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Accounting</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


       <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php
          $from_date = $_GET['from_date'];
          $to_date = $_GET['to_date'];
          ?>

          <br>
              <div class="card mb-4">
                
<div class="card-body">
<img src="logo-name.png"height="70" /><br>
&nbsp;<font size="2px">#454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City. Telefax No. 3616330 Website: www.grc.edu.ph

<?php
    $querytm = "SELECT * FROM timeframe WHERE status = 'Active' AND type = 'Enrollment' ";
    $resulttm = mysqli_query($conn, $querytm);
    $rowtm = mysqli_fetch_assoc($resulttm);
   ?>

<h5 class="pull-right">School Year: <b><?php echo $rowtm['school_year']; ?></b></h5>
<h5><b><br>Entrance Exam</b> <p class="pull-right">From: <b><?php echo $from_date ?></b> To: <b><?php echo $to_date ?></b></p></h5>
</div>

<div class="col-xs-12 table-responsive">
          <table class="table table-hover table-striped" id="all_trans">
                                
              <thead> 
                  <tr>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Official&nbsp;Receipt</th>
                      <th>Date</th>
                  </tr>
              </thead>
                <tbody>  
                  <?php
                    $query= "SELECT * FROM entrance_exam where date_paid between '$from_date' and '$to_date' ORDER BY `entrance_exam`.`official_receipt` ASC " ;
                    $result = mysqli_query($conn, $query);
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                      <tr>
                        <td><?php echo $row['lastname'].',&nbsp;'.$row['firstname'].'&nbsp;'.$row['middlename']; ?></td>
                        <td><center><?php echo $row['price']; ?></center></td>
                        <td><center><?php echo $row['official_receipt']; ?></center></td>
                        <td><?php echo $row['date_paid']; ?></td>
                      </tr>
                        <?php } ?>
                </tbody>
      </table>
</div>

</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
