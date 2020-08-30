<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require '../../../src/layout/registrar/head.php';
require '../../../config/config.php'; 
$gender = $_GET['data'];
$sy = $_GET['data2'];
$sem = $_GET['data3'];
$course = $_GET['data4'];
$major = $_GET['data5'];
$year = $_GET['data6'];
$date = $_GET['data7'];

 if($course != 'ALL')
  {
    $query2 =  mysqli_query($conn, "SELECT * FROM course WHERE course_abbreviation = '$course' AND course_major = '$major'") or die(mysqli_error($conn));
    $row2=mysqli_fetch_assoc($query2);
    $course2 = $row2['course_name']."(".$row2['course_abbreviation'].")";
    $major2 = $row2['course_major'];
  }
  else
  {
    $course2 = 'ALL';
    $major2 = 'ALL';
  }
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
if($gender == 'ALL'){ $genderq = " AND student_info.gender != ''"; }
else{ $genderq = " AND student_info.gender = '$gender'"; }
if($course == 'ALL') {$courseq = "";}
else {$courseq = " AND course.course_abbreviation = '$course' AND course.course_major = '$major'";}
if($year == 'ALL') { $yearq = "";}
else{ $yearq = "AND year_and_semester.year = '$year'";}
if($date == 'ALL'){$dateq = "";}
else{ $dateq = "AND DATE(student_enrollment_record.date) = '$date'"; }

  $query =  mysqli_query($conn, "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, student_info.gender, course.course_abbreviation, course.course_major, subject.subject_code, subject.subject_title, subject.units FROM student_info 
  INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
  INNER JOIN course ON course.course_id = student_info.course_id
  INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
  INNER JOIN subject ON subject.subj_id = schedule.subj_id
  INNER JOIN year_and_semester ON subject.yrsem_id = year_and_semester.yrsem_id
  WHERE schedule.school_year='$sy' AND schedule.semester = '$sem' $genderq $courseq $yearq $dateq ") or die(mysqli_error($conn));

   ?>
<table width="100%">
        <tr>
        <td align="left"><b>School Year:</b> <?php echo $sy; ?></td>
        <td align="left"><b>Semester:</b> <?php echo $sem; ?></td></tr>
        <tr>
        <td align="left"><b>Course:</b> <?php echo $course2; ?></td>
        <td align="left"><b>Major:</b> <?php echo $major2; ?></td>
        </tr>
        <tr>
        <td align="left"><b>Year Level:</b> <?php echo $year; ?></td>
        <td align="left"><b>Gender:</b> <?php echo $gender; ?></td>
        </tr>
</table><br>

<table class="table" id="table">

         <tr class="table-bordered">
                <th nowrap>No.</th>
                <th nowrap>Student Number</th>
                <th nowrap>Full Name</th>
                <th nowrap>Gender</th>
                <th nowrap>Subject Code</th>
                <th nowrap>Subject Title</th>
                <th nowrap>Units</th>
                </tr>
<?php
  if(mysqli_num_rows($query) > 0)
    {
      while($rows=mysqli_fetch_array($query))
      { $num++; ?>
        
                   <tr><td nowrap><?php echo $num; ?></td>
                      <td ><?php echo $rows['student_number']; ?></td>
                      <td ><?php echo $rows['lastname']; ?>, <?php echo $rows['firstname']; ?> <?php echo substr($rows['middlename'],0,1); ?>. <?php echo $rows['suffix']; ?></td>
                      <td ><?php echo $rows['gender']; ?></td>
                      <td ><?php echo $rows['subject_code']; ?></td>
                      <td ><?php echo $rows['subject_title']; ?></td>
                      <td ><?php echo $rows['units']; ?></td>
                      </tr>
<?php 
      }
    }
  else
    { ?>
        <tr><td>0</td>
        <td colspan="8"><center>No Student Enrolled</center></td>
        </tr>
<?php  } 
date_default_timezone_set("Asia/Manila");?>
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
