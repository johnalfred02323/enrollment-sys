<!-- <script>
window.print();
setTimeout('window.close()', 1000);  
</script> -->

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


          <br>
              <div class="card mb-4">
                
             

  <?php

    include('../../../config/config.php');
    error_reporting(0);

    $studno = $_GET['studentnumber']; 
    $sy = $_GET['schoolyear'];  
    $names = $_GET['fullname']; 
    $fees = $_GET['unit'];
    $course = $_GET['course'];


    $query = "SELECT DISTINCT payment.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.course, payment.semester, payment.schoolyear, payment.tuition FROM payment 
    INNER JOIN student_info ON payment.student_number = student_info.student_number WHERE student_number = $studno";
      
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

  ?>

<div class="card-body">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="logo-name.png"height="70" /><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2px">#454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City. Telefax No. 3616330 Website: www.grc.edu.ph
</div> 
  
  <div class="col px-md-5"><div><b>Statement of Account</b></div></div>
  <div class="col px-md-5"><div><b>S.Y. <?php echo $_GET['schoolyear']; ?></b></div></div>
  <div class="col px-md-5"><div><b>Student Name: <?php echo $_GET['fullname']; ?></b></div></div>
  <div class="col px-md-5"><div><b>Student Number: <?php echo $_GET['studentnumber']; ?></b></div></div>
  <div class="col px-md-5"><div><b>Course: <?php echo $_GET['course']; ?></b></div></div>

<br>


<table style="margin-left:500px;">
<tr>
<td><h3><b>Schedule of Fees</b></h3></td>
</tr>
</table>

  <table style="margin-left: 200px;">
  <table style="margin-bottom: -40px;">
  <tr><td></td></tr>
  </table>
  </table>

<table style="margin-left:360px;">
<tr>
<td><center><h3><b>_________________________________________</b></h3></center></td>
</tr>
</table>

 <div class="col px-md-5">
 <table id="sao_table" class="display nowrap" style="width:750px">
              <thead>
                  <tr>
                      <th></th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;# Of Units<br>Enrolled for the<br>&nbsp;&nbsp;&nbsp;&nbsp;Semester</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Actual Fees</th>
                      <th>&nbsp;&nbsp;&nbsp;&nbsp;Total</th>
                  </tr>
              </thead>
               <tbody>
                <tr>
                <td><b>A. Tuition @ <?php echo $_GET['unit']; ?> (Per Unit)</b></td>
                <td></td>
                <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_GET['unit']; ?><b></td>
                <td></td>  
                </tr>
              <tr>
                <td><b>B. Miscellaneous Fees</b></td>
              </tr>
               <?php 
                $query2 = "SELECT * FROM current_fees";
                $result2 = $conn-> query($query2); 
                $total =0;
                while($rows2=mysqli_fetch_assoc($result2)) 
                { 
                ?>
                <td><b><?php echo $rows2['miscellaneous'];?></b></td>
                <td></td>
                <td></td>
                <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rows2['price'];?></b></td>
                </tr>

                <?php $total = $total + $rows2['price'];}?>
             
      </table>
      
            <table style="margin-left:310px;">
            <tr>
            <td><center><h3><b>_________________________________________</b></h3></center></td>
            </tr>
            </table>
      
      <table id="sao_table" class="display nowrap" style="width:820px">
         <tfoot class="table-borderless">
              <tr>
                <th>Total Fees Due</th>
                <td></td>
                <td></td>
                <td><b><?php echo $total; ?></b></td>
              </tr>
              <tr>
                <th>Less: Payment</th>
              </tr>

              <tr>
                <th><br><br>Add: Previous Tuition Fee Dues</th>
              </tr>

              <tr>
                <th><br>Add: Other Fees</th>
              </tr>
              
            </tbody>

      </table>

      <table id="sao_table" class="display nowrap" style="width:1025px">
         <tfoot class="table-borderless">
              <tr>
                <th>Total Amount Due</th>
                <td></td>
                <td></td>
                <td><b>Php <?php echo $total; ?></b></td>
              </tr>
                            
            </tbody>
      </table>


     <br>
     <p>Notes:</p>

      <p>1. The regulations governing the payment of tuition and other fees are issued from time to time by the Office of the Treasurer.
      <br>
      2. The GRC complics with all <font color='red'>CHED</font> requirements regarding increases in tuition and fees.
      <br>
      3. While check payments are encouraged, it is the responsibility of the drawer of the check to see that it is properly made<br> &nbsp;&nbsp;&nbsp;&nbsp;out. In the event that a check is returned for any reason, there is a service charge of P250.00. Should a check be dated after<br>&nbsp;&nbsp;&nbsp;&nbsp;the regular registration period, a late registration fee will be charged. Checks should be made payable to the <font color='red'>GLOBAL<br>&nbsp;&nbsp;&nbsp;&nbsp;RECIPROCAL COLLEGES, INC.</font>
      <br>
      4. No student shall be allowed to receive any degree, diploma, or certificate, nor be given a transcript of academic records,<br>&nbsp;&nbsp;&nbsp;&nbsp;unless all financial obligations to the GRC have been settled.</p>
     
     <br>
     <p><b>Estimated Cost of Graduate Studies<br><font color='red'>Based on Tuition & Fees for SY 2012-2013</font><br><font color='red'>Actual costs may be more or less than the figures given below;</font></b></p>
     <br>
     ___________________________________<br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Accounting Officer


</div>


</div>

<br>
<br>
<br>
<br>
<br>
<br>
<div class="card-body">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="logo-name.png"height="70" /><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2px">#454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City. Telefax No. 3616330 Website: www.grc.edu.ph
</div> 

<div class="col px-md-5"><div><b>S.Y. <?php echo $_GET['schoolyear']; ?></b></div></div>
<br>

<div class="col-sm-12">
<div class="table-responsive">
<table class="table table table-bordered table-dark" >
  <thead>
    <tr>
      <th scope="col"><center>Date</center></th>
      <th scope="col"><center>Official&nbsp;Receipt</center></th>
      <th scope="col"><center>Amount</center></th>
      <th scope="col"><center>Early Bird Promo Less 10%</center></th>
      <th scope="col"><center>Payment</center></th>
    </tr>

  </thead>
<tbody>     <?php

    include('../../../config/config.php');
    error_reporting(0);


        $queryfees = "SELECT * from transaction_fees where student_number = '$studno'; 
        ";
        $resultfees = $conn-> query($queryfees);
                
        while($rows1=mysqli_fetch_array($resultfees)) 
        { 
        ?>
      <tr>
      <td><?php echo $rows1['date']; ?></td>
      <td><?php echo $rows1['official_receipt']; ?></td>
      <td><?php echo $rows1['amount']; ?></td>
      <td><?php echo $rows1['discounted']; ?></td>
      <td><?php echo $rows1['cash_rendered']; ?></td>
      </tr>

      <?php } ?>

  </tbody>
</table>
</div>



  

  <br>



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
