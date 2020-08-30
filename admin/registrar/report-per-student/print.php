<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require '../../../src/layout/registrar/head.php';
require '../../../config/config.php'; 
$studnum = $_GET['data'];
$schoolyear = $_GET['data2'];
$sem = $_GET['data3'];
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Accounting</title>

</head>
 <style>
  body
  {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }
            @page { size: auto;  margin: 8mm; }
            @media print 
            {
              table { page-break-inside:auto }
              tr    { page-break-inside:avoid; page-break-after:auto }
              
              body:before {
              content:url('../../../src/img/bg-logo2.png');
              position: absolute;
              vertical-align: middle;
              width: 100%;
              z-index: -1;
      }
            }          
            #table {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #table td, #table th {
              border: 1px solid black;
              padding: 10px;
              font-size: 17px;
            }

            #table tr:hover {background-color: black;}

            #table th {
              padding-top: 6px;
              padding-bottom: 6px;
              text-align: left;
              color: black;
            }
        </style>

<body id="page-top" >


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


       <!-- Begin Page Content -->
        <div class="container-fluid">
              <div class="card mb-4">
                
<div class="card-body">
<center><img src="../../../src/img/logo-name.png"height="70" /></center>
<center><font size="2px">#454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City. Telefax No. 3616330 </font></center>
<br>
<?php
$num = 0;

$query1 =  mysqli_query($conn, "SELECT student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, course.course_abbreviation AS course, course.course_major AS major, student_enrollment_record.status FROM student_info 
  INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
  INNER JOIN course ON course.course_id = student_info.course_id
  WHERE student_enrollment_record.student_number = '$studnum'") or die(mysqli_error($conn));
  $rows1=mysqli_fetch_assoc($query1);

$query =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, subject.units, schedule.section FROM schedule 
  INNER JOIN student_enrollment_record ON student_enrollment_record.sched_id = schedule.sched_id
  INNER JOIN subject ON schedule.subj_id = subject.subj_id
  WHERE student_enrollment_record.student_number = '$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'") or die(mysqli_error($conn));
   ?>
<table width="100%">
        <tr><th align="left" colspan="3">Name : <?php echo $rows1['lastname']; ?> <?php echo $rows1['firstname']; ?> <?php echo $rows1['middlename']; ?> <?php echo $rows1['suffix']; ?></th>
        <th align="left" colspan="3">Course: <?php echo $rows1['course']; ?></th></tr>
        <tr><th align="left" colspan="3">Status: <?php echo $rows1['status']; ?></th>
        <th align="left" colspan="3">Major: <?php echo $rows1['major']; ?></th></tr>
</table><br>

<table class="table" id="table">

         <tr class="table-bordered">
                <th>No.</th>
                <th>Subject Code</th>
                <th>Subject Title</th>
                <th>Units</th>
                <th>Section</th></tr>
<?php
  if(mysqli_num_rows($query) > 0)
    {

      while($rows=mysqli_fetch_array($query))
      {
        $num++;
        ?>
        
                   <tr><td><?php echo $num; ?></td>
                    <td><?php echo $rows['subject_code']; ?></td>
                    <td><?php echo $rows['subject_title']; ?></td>
                    <td><?php echo $rows['units']; ?></td>
                    <td><?php echo $rows['section']; ?></td>
                    </tr>
<?php }
    }
  else
    { ?>
        <tr><td>0</td>
        <td colspan="5"><center>No Subject Enrolled</center></td>
        </tr>
<?php  }
                $query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = schedule.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'  ") or die(mysqli_error($conn));
                $rows1=mysqli_fetch_array($query1);
date_default_timezone_set("Asia/Manila");?>
<tr><th align="left" colspan="5">Total Units: <?php echo $rows1['Units']; ?></th></tr>

  </table>
<br><br>

<h6 align="right">Printed By: <?php echo $_SESSION['name']; ?></h6>
<h6 align="right">Date: <?php echo date('m/d/Y'); ?> - <?php echo date('h:i a'); ?></h6>
</div>
              </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
</body>
  <!-- End of Page Wrapper -->
<footer></footer>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>
<script type="text/javascript">
  
</script>
</body>

</html>
