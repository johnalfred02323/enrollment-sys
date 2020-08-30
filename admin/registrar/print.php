<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require '../../src/layout/registrar/head.php';
require '../../config/config.php'; 
$subjcode = $_GET['data'];
?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

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
              content:url('../../src/img/bg-logo.png');
              position: absolute;
              z-index: -1;
      }
            }          
            #studentmasterlist {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #studentmasterlist td, #studentmasterlist th {
              border: 1px solid black;
              padding: 10px;
              font-size: 17px;
            }

            #studentmasterlist tr:hover {background-color: black;}

            #studentmasterlist th {
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
<center><img src="../../src/img/logo-name.png"height="70" /></center>
<center><font size="2px">#454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City. Telefax No. 3616330 </font></center>
<br>
<?php
    //for getting the school year
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

    //for the subject details
    $query1 =  mysqli_query($conn, "SELECT subject.subject_code, subject.subject_title, subject.units FROM petition_request INNER JOIN subject ON petition_request.subject_code = subject.subject_code
      WHERE petition_request.subject_code='$subjcode' AND petition_request.school_year = '$schoolyear' AND petition_request.semester = '$semester' GROUP BY subject.subject_code") or die(mysqli_error($conn));
    $rows1=mysqli_fetch_assoc($query1);
    //for the student information
    $query =  mysqli_query($conn, "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, student_info.gender, petition_request.contact_number,  course.course_abbreviation AS course, course.course_major AS major FROM petition_request
      INNER JOIN student_info ON petition_request.student_number = student_info.student_number
      INNER JOIN course ON course.course_id = student_info.course_id
      INNER JOIN subject ON subject.subject_code = petition_request.subject_code
      WHERE petition_request.subject_code = '$subjcode' AND petition_request.school_year = '$schoolyear' AND petition_request.semester = '$semester' AND petition_request.status='Requested' GROUP BY student_info.student_number") or die(mysqli_error($conn));
   ?>
<table width="100%">
  <tr><th align="left"><h5>Subject Code: <?php echo $rows1['subject_code']; ?></h5></th>
  <th align="left"><h5>School Year: <?php echo $schoolyear; ?> </h5></th></tr>
  <tr><th align="left"><h5>Subject Title: <?php echo $rows1['subject_title']; ?></h5></th>
  <th><h5 align="left">Semester: <?php echo $semester; ?></h5></th></tr>
</table>

<table class="table" id="studentmasterlist">
      <tr>
        <th>No.</th>
        <th nowrap>Student Number</th>
        <th nowrap>Fullname</th>
        <th nowrap>Gender</th>
        <th nowrap>Course</th>
        <th nowrap>Major</th>
        <th nowrap>Contact Number</th>
      </tr>
<?php
  if(mysqli_num_rows($query) > 0)
    {
      $num = 0;
      while($rows=mysqli_fetch_array($query))
      { $num++; ?>
        
        <tr id="a"><td><?php echo $num; ?></td>
        <td nowrap><?php echo $rows['student_number']; ?></td>
        <td nowrap><?php echo $rows['lastname']; ?>, <?php echo $rows['firstname']; ?> <?php echo substr($rows['middlename'],0,1); ?>. <?php echo $rows['suffix']; ?></td>
        <td nowrap><?php echo $rows['gender']; ?></td>
        <td ><?php echo $rows['course']; ?></td>
        <td ><?php echo $rows['major']; ?></td>
        <td nowrap><?php echo $rows['contact_number']; ?></td>
        </tr>
<?php }
    }
  else
    { ?>
        <tr><td>0</td>
        <td colspan="5"><center>No Student Enrolled</center></td>
        </tr>
<?php  } 
date_default_timezone_set("Asia/Manila");?>
  </table>
<br><br><br><br>

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
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>
<script type="text/javascript">
  
</script>
</body>

</html>
