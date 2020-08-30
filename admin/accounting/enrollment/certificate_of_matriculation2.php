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
                
                <div class="card-body">
                  <center><img src="logo-name.png"height="100" /></center>
                </div>
                <p><center><font size="2px">454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City. Telefax No. 3616330 Website: www.grc.edu.ph<br><b>CERTIFICATE OF MATRICULATION</b></font></center></p>

  <?php

    include('../../../config/config.php');
    error_reporting(0);

    $studno = $_GET['studentnumber']; 
    $partial = $_GET['partial'];  
    $fees = $_GET['fees'];
    $totalunits = $_GET['totalunits'];
    $perunits = $_GET['perunits'];
    $amount = $_GET['amount'];
    $tunits1 = $_GET['tunits'];
    $disc = $_GET['discount'];
    $tdisc = $_GET['totaldiscount'];
    $ymd = $_GET['today'];
    $yrlvl = $_GET['yearlevel'];
    $reg = $_GET['regular'];


    $query = "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix,
      student_info.course, student_info.major, student_enrollment_record.date, schedule.semester, schedule.school_year
      FROM student_enrollment_record 
      Inner join student_info on student_info.student_number = student_enrollment_record.student_number
      Inner join schedule on schedule.sched_id = student_enrollment_record.sched_id WHERE student_info.student_number = '$studno'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

  ?>


<div class="p-5">
  <div class="row mx-md-n5">
  <div class="col px-md-5"><div>Student Numbers: <?php echo $_GET['studentnumber']; ?></div></div>
  <div class="col px-md-5"><div>Type of Scholar: <?php echo $_GET['partial']; ?></div></div>
</div>

<div class="row mx-md-n5">
 <div class="col px-md-5"><div>Name: <?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></div></div>
  <div class="col px-md-5"><div>Date: <?php echo $_GET['today']; ?></div></div>
</div>

<div class="row mx-md-n5">
 <div class="col px-md-5"><div>Suffix: <?php echo $row['suffix']; ?></div></div>
   <div class="col px-md-5"><div>School Year: <?php echo $row['school_year']; ?></div></div>
</div>

<div class="row mx-md-n5">
  <div class="col px-md-5"><div>Course: <?php echo $row['course']; ?></div></div>
  <div class="col px-md-5"><div>Semester: <?php echo $row['semester']; ?></div></div>
</div>

<div class="row mx-md-n5">
  <div class="col px-md-5"><div>Major: <?php echo $row['major']; ?></div></div>
 
</div>
</div>

<div class="row">
  <div class="col-sm-8">
<div class="table-responsive">
<table class="table table table-bordered table-dark" >
  <thead>
    <tr>
      <th scope="col"><center>Subject&nbsp;Code</center></th>
      <th scope="col"><center>Unit/s</center></th>
      <th scope="col"><center>Section</center></th>
      <th scope="col"><center>Time</center></th>
      <th scope="col"><center>Day/s</center></th>
      <th scope="col"><center>Room</center></th>
      <th scope="col"><center>Faculty</center></th>
    </tr>

  </thead>
  <tbody>
      <?php
      $query1 = "SELECT DISTINCT subject.subj_id, subject.subject_code,  subject.units, schedule.sched_id, schedule.section, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.lecture_day, schedule.laboratory_day, schedule.lec_room, subject.subject_title, user.firstname, user.lastname, user.middlename
        FROM student_enrollment_record 
        Inner join student_info on student_info.student_number = student_enrollment_record.student_number
        Inner join subject on subject.subj_id = student_enrollment_record.subj_id
        Inner Join schedule on schedule.sched_id = student_enrollment_record.sched_id
        Inner join user on user.id = schedule.faculty_id 
        WHERE student_info.student_number = '$studno'";
      $result1 = mysqli_query($conn, $query1);
      ?>
      <tr>
      <?php while($row1 = mysqli_fetch_assoc($result1)):?>
      <td><center><?php echo $row1['subject_code'];?></center></td>
      <td><center><?php echo $row1['units'];?></center></td>
      <td><center><?php echo $row1['section'];?></center></td>
      <td>
        <center>
          <?php echo $row1['lecturehr_from'];?> - <?php echo $row1['lecturehr_to'];?><br>
          <?php echo $row1['laboratoryhr_from'];?> - <?php echo $row1['laboratoryhr_to'];?>
        </center>
      </td>
      <td><center><?php echo $row1['lecture_day'];?></center></td>
      <td><center><?php echo $row1['lec_room'];?></center></td>
      <td><center><?php echo $row1['lastname'];?>, <?php echo $row1['firstname'];?> <?php echo $row1['middlename'];?></center></td>
      </tr>

      <?php endwhile; ?>

    
  </tbody>
</table>
</div>


<div class="p-5">
  <div class="row mx-md-n5">
  <div class="col px-md-5"><div><strong>Cashier:</strong></div></div>
  <div class="col px-md-5"><div><strong>Registrar:</strong></div></div>
</div>
</div>



</div>
  <div class="col-sm-4">
    <div class="table-responsive">
      <table class="table table table-bordered table-dark" >
        <thead>
          <tr>
            <th scope="col" colspan="2">Charges</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>Miscellanoeus</td>
              <td><?php echo $_GET['fees']; ?></td>
              <td><?php echo $_GET['fees']; ?></td>
            </tr>
            
            <tr>
              <td>Tuition Fees</td>
              <td><?php echo $_GET['totalunits']; ?> x <?php echo $_GET['perunits']; ?></td>
              <td><?php echo $_GET['tunits']; ?></td>
            </tr>

            <tr>
              <td>Total</td>
              <td></td>
              <td><?php echo $_GET['amount']; ?></td>
            </tr>

            <tr>
              <td>Other Fees</td>
              <td>10%</td>
              <td><?php echo $_GET['discount']; ?></td>
            </tr>

            <tr>
              <td>Total Amount</td>
              <td></td>
              <td><?php echo $_GET['totaldiscount']; ?></td>
            </tr>

        </tbody>
      </table>
    </div>
  <thead>
  </div>
</div>


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
