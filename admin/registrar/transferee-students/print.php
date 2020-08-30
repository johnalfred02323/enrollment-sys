<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require '../../../src/layout/registrar/head.php';
require '../../../config/config.php'; 
$sy = $_GET['data'];
$sem = $_GET['data2'];
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

<?php
$num = 0;

//for student basic information
$query1 = mysqli_query($conn, "SELECT student_info.sisnum, student_info.student_number, CONCAT(student_info.lastname,', ',student_info.firstname,' ', LEFT(student_info.middlename, 1),'. ', student_info.suffix) AS fullname, 
  student_info.gender,
  student_info.school_last_attended,
  course.course_abbreviation AS course,
  course.course_major AS major FROM student_info
    INNER JOIN course ON student_info.course_id = course.course_id
    WHERE student_info.school_year = '$sy' AND student_info.semester = '$sem'") or die(mysqli_error($conn));

   ?>
<center><h3 class="text-dark font-weight-bold">TRANSFEREE STUDENTS</h3></center>

<table class="table" id="table">

         <tr class="table-bordered">
                <th></th>
                <th colspan="3" nowrap>Student Details</th>
                <th colspan="2" nowrap>Course Details</th>
                <th colspan="2" nowrap></th></tr>

         <tr class="table-bordered">
                <th>No.</th>
                <th>Student Number</th>
                <th>Fullname</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Major</th>
                <th>Last School Attended</th>
                <th>Status</th></tr>
<?php
  if(mysqli_num_rows($query1) > 0)
    {

      while($rows=mysqli_fetch_array($query1))
      {

          //if student is enrolled
          $search = mysqli_query($conn, "SELECT * FROM student_enrollment_record 
          INNER JOIN schedule ON schedule.sched_id = student_enrollment_record.sched_id 
          INNER JOIN student_info ON student_info.student_number = student_enrollment_record.student_number 
          WHERE schedule.school_year = '$sy' AND schedule.semester = '$sem' AND student_info.sisnum = '".$rows['sisnum']."'") or die(mysqli_error($conn));
          if(mysqli_num_rows($search) > 0)
          {
            $status = 'Enrolled';
          }
          else
          {
            $status = 'Inquired';
          }
        $num++;
        ?>
        
                   <tr><td><?php echo $num; ?></td>
                    <td nowrap><?php echo $rows['student_number']; ?></td>
                    <td nowrap><?php echo $rows['fullname']; ?></td>
                    <td><?php echo $rows['gender']; ?></td>
                    <td><?php echo $rows['course']; ?></td>
                    <td><?php echo $rows['major']; ?></td>
                    <td><?php echo $rows['school_last_attended']; ?></td>
                    <td><?php echo $status; ?></td>
                    </tr>
<?php }
    }
  else
    { ?>
        <tr><td>0</td>
        <td colspan="7"><center>No Student Enrolled</center></td>
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
