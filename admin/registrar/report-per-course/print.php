<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require '../../../src/layout/registrar/head.php';
require '../../../config/config.php'; 
$id = $_GET['data'];
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
$query1 =  mysqli_query($conn, "SELECT curriculum.curriculum_title, course.course_abbreviation AS course, course.course_major AS major FROM curriculum INNER JOIN course ON course.course_id = curriculum.course_id WHERE course.course_id = '$id'") or die(mysqli_error($conn));
$rows1=mysqli_fetch_array($query1);

$query =  mysqli_query($conn, "SELECT DISTINCT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, student_info.gender, course.course_abbreviation AS course, course.course_major AS major, schedule.school_year, schedule.semester FROM student_info 
  INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
  INNER JOIN course ON course.course_id = student_info.course_id
  INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
  WHERE course.course_id = '$id' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'") or die(mysqli_error($conn));
   ?>
<table width="100%">
        <tr><th align="left" colspan="3">Course: <?php echo $rows1['course']; ?></th>
        <th align="left" colspan="2">School Year: <?php echo $schoolyear; ?></th></tr>
        <tr><th align="left" colspan="3">Major: <?php echo $rows1['major']; ?></th>
        <th align="left" colspan="2">Semester: <?php echo $sem; ?></th></tr>
</table><br>

<table class="table" id="table">

         <tr class="table-bordered">
                <th nowrap>No.</th>
                <th nowrap>Lastname</th>
                <th nowrap>Firstname</th>
                <th nowrap>Middlename</th>
                <th nowrap>Suffix</th>
                <th nowrap>Gender</th>
                <th nowrap>Units</th>
                </tr>
<?php
  if(mysqli_num_rows($query) > 0)
    {

      while($rows=mysqli_fetch_array($query))
      {
        $studnum = '';
        if($studnum == $rows['student_number'])
        {
              }
              else
              {
          $studnum = $rows['student_number'];
                $query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$schoolyear' AND schedule.semester = '$sem'  ") or die(mysqli_error($conn));
                $rows1=mysqli_fetch_array($query1);
          $num++;
        ?>
        
                   <tr><td nowrap><?php echo $num; ?></td>
                      <td nowrap><?php echo $rows['lastname']; ?></td>
                      <td nowrap><?php echo $rows['firstname']; ?></td>
                      <td nowrap><?php echo $rows['middlename']; ?></td>
                      <td nowrap><?php echo $rows['suffix']; ?></td>
                      <td nowrap><?php echo $rows['gender']; ?></td>
                      <td nowrap><?php echo $rows1['Units']; ?></td>
                      </tr>
<?php }
      }
    }
  else
    { ?>
        <tr><td>0</td>
        <td colspan="6"><center>No Student Enrolled</center></td>
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
