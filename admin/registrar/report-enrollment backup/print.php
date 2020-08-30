<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require '../../../src/layout/registrar/head.php';
require '../../../config/config.php'; 
$id = $_GET['data'];
$sy = $_GET['data2'];
$sem = $_GET['data3'];
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Enlistment Report</title>

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
    //for the subject details
    $query = "SELECT DISTINCT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.gender,student_info.suffix, course.course_abbreviation AS course, course.course_major AS major FROM student_info 
  INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number
  INNER JOIN course ON course.course_id = student_info.course_id
  INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id
  INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id
  WHERE schedule.school_year='$sy' AND schedule.semester = '$sem'";
    $result = mysqli_query($conn, $query); 
   ?>
<table width="100%">
 
         <tr><th align="left" colspan="4">School Year: <?php echo $sy; ?></th>
        <th align="left" colspan="4">Semester: <?php echo $sem; ?></th></tr>
</table><br>

<table class="table" id="table">

         <tr class="table-bordered">
                <th scope="col">No.</th>
                <th scope="col" style="white-space: nowrap;">Student No.</th>
                <th scope="col" style="white-space: nowrap;">Lastname</th>
                <th scope="col" style="white-space: nowrap;">Firstname</th>
                <th scope="col" style="white-space: nowrap;">Middlename</th>
                <th scope="col" style="white-space: nowrap;">Suffix</th>
                <th scope="col" style="white-space: nowrap;">Gender</th>
                <th scope="col" style="white-space: nowrap;">Course</th>
                <th scope="col" style="white-space: nowrap;">Major</th>
                <th scope="col" style="white-space: nowrap;">Units</th>
                </tr>
<?php
  if(mysqli_num_rows($result) > 0)
    {

      while($rows=mysqli_fetch_array($result))
      {
        $studnum = '';
        if($studnum == $rows['student_number'])
        {
              }
              else
              {
          $studnum = $rows['student_number'];
                $query1 =  mysqli_query($conn, "SELECT SUM(units) AS Units FROM student_info INNER JOIN student_enrollment_record ON student_enrollment_record.student_number = student_info.student_number INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id INNER JOIN subject ON subject.subj_id = student_enrollment_record.subj_id WHERE student_info.student_number='$studnum' AND schedule.school_year='$sy' AND schedule.semester = '$sem'  ") or die(mysqli_error($conn));
                $rows1=mysqli_fetch_array($query1);
          $num++;
        ?>
        
                   <tr>
                    <th scope="row"><?php echo $num; ?></th>
                    <td style="white-space: nowrap;"><?php echo $rows['student_number']; ?></td>
                    <td style="white-space: nowrap;"><?php echo $rows['lastname']; ?></td>
                    <td style="white-space: nowrap;"><?php echo $rows['firstname']; ?></td>
                    <td style="white-space: nowrap;"><?php echo $rows['middlename']; ?></td>
                    <td style="white-space: nowrap;"><?php echo $rows['suffix']; ?></td>
                    <td style="white-space: nowrap;"><?php echo $rows['gender']; ?></td>
                    <td style="white-space: nowrap;"><?php echo $rows['course']; ?></td>
                    <td style="white-space: nowrap;"><?php echo $rows['major']; ?></td>
                    <td><?php echo $rows1['Units']; ?></td>
                  </tr>
<?php }
      }
    }
  else
    { ?>
        <tr><td>0</td>
        <td colspan="9"><center>No Student Enrolled</center></td>
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
