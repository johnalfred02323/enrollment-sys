<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require '../../../src/layout/registrar/head.php';
require '../../../config/config.php'; 
$section = $_GET['data'];
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
              content:url('../../../src/img/bg-logo.png');
              position: absolute;
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
    //for getting the school year
    $sy = "SELECT * FROM timeframe ORDER BY id DESC";
    $sysem = mysqli_query($conn, $sy); 
    $syrow = mysqli_fetch_assoc($sysem); 
    $schoolyear = $syrow['school_year'];
    $semester = $syrow['semester'];

    //for the subject details
    $query = "SELECT subject.subject_code, schedule.lecture_day, schedule.lecturehr_from, schedule.lecturehr_to, schedule.laboratory_day, schedule.laboratoryhr_from, schedule.laboratoryhr_to, schedule.semester, schedule.lec_room, schedule.lab_room, CONCAT(user.lastname,', ',user.firstname,' ', LEFT(user.middlename, 1),'. ') AS fullname, subject.subject_title,subject.units,year_and_semester.year,course.course_abbreviation AS course, course.course_major AS major  from schedule 
    INNER JOIN subject ON schedule.subj_id = subject.subj_id 
    INNER JOIN user ON user.id = schedule.faculty_id
    INNER JOIN curriculum ON curriculum.curriculum_title = subject.curriculum_title
    INNER JOIN course ON course.course_id = curriculum.course_id
    INNER JOIN year_and_semester ON year_and_semester.yrsem_id = subject.yrsem_id
    where schedule.section ='$section' AND schedule.semester = '$sem' AND schedule.school_year = '$schoolyear'";
    $result = mysqli_query($conn, $query); 
   ?>
<table width="100%">
 
  <tr><th align="left" colspan="5"><h5>Section: <?php echo $section; ?></h5></th>
  <th align="left" colspan="5"><h5>School Year & Semester: <?php echo $schoolyear; ?> - <?php echo $sem; ?></h5></th></tr>
</table>

<table class="table" id="table">
       <tr>
        <th colspan="3">Subject Details</th><th colspan="3">Lecture Details</th><th colspan="3">Other Details</th><th></th>
      </tr>
          <tr>
            <th scope="col">Subject Code</th>
            <th scope="col">Subject Title</th>
            <th scope="col">Unit</th>
            <th scope="col">Day</th>
            <th scope="col">Time</th>
            <th scope="col">Room</th>
            <th scope="col">Day</th>
            <th scope="col">Time</th>
            <th scope="col">Room</th>
            <th scope="col">Faculty</th>
          </tr>
<?php
  if(mysqli_num_rows($result) > 0)  
    {
      while($rows=mysqli_fetch_array($result))
      {
        $lechrfrom = new DateTime($rows['lecturehr_from']);
        $lechrto = new DateTime($rows['lecturehr_to']);
        $labhrfrom = new DateTime($rows['laboratoryhr_from']);
        $labhrto = new DateTime($rows['laboratoryhr_to']);

        if( $labhrto->format('h:ia') == '12:00am' && $labhrfrom->format('h:ia') == '12:00am')
        {
          $labhr = '';
        }
        else
        {
          $labhr = $labhrto->format('h:ia')."-<br>".$labhrfrom->format('h:ia');
        }

         if( $lechrto->format('h:ia') == '12:00am' && $lechrfrom->format('h:ia') == '12:00am')
        {
          $lechr = '';
        }
        else
        {
          $lechr = $lechrto->format('h:ia')."-<br>".$lechrfrom->format('h:ia');
        }
        ?>
        
        <tr>
        <th scope="row" style="white-space: nowrap;"><?php echo $rows['subject_code']; ?></th>
        <td ><?php echo $rows['subject_title']; ?></td> 
        <td style="white-space: nowrap;"><?php echo $rows['units']; ?></td>
        <td style="white-space: nowrap;"><?php echo $rows['lecture_day']; ?></td>
        <td nowrap><?php echo $lechr; ?></td>
        <td style="white-space: nowrap;"><?php echo $rows['lec_room']; ?></td>
        <td style="white-space: nowrap;"><?php echo $rows['laboratory_day']; ?></td>
        <td nowrap><?php echo $labhr; ?></td>
        <td style="white-space: nowrap;"><?php echo $rows['lab_room']; ?></td>
        <td style="white-space: nowrap;"><?php echo $rows['fullname']; ?></td>     
        </tr>
<?php }
    }
  else
    { ?>
        <tr><td>0</td>
        <td colspan="10"><center>No Subject Available</center></td>
        </tr>
<?php  }
date_default_timezone_set("Asia/Manila"); ?>
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
