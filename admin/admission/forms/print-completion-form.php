<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
// require '../../../src/layout/registrar/head.php';
require '../../../config/config.php'; 
$sisnum = $_GET['sisnum'];
date_default_timezone_set("Asia/Manila");
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
<center><img src="../../../src/img/logo-name.png"height="70" /></center>
<center><font size="2px">#454 GRC Bldg. Rizal Ave. Cor 9th Ave. Grace Park Caloocan City. Telefax No. 3616330 </font></center>
<center><h3 class="text-dark font-weight-bold">OFFICE OF THE REGISTRAR</h3></center><br>
<?php

    //for the student details
    $query1 =  mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = '$sisnum'") or die(mysqli_error($conn));
    $rows1=mysqli_fetch_assoc($query1);
    //for the student information
    // $query =  mysqli_query($conn, "SELECT student_info.student_number, student_info.lastname, student_info.firstname, student_info.middlename, student_info.suffix, student_info.gender, petition_request.contact_number,  course.course_abbreviation AS course, course.course_major AS major FROM petition_request
    //   INNER JOIN student_info ON petition_request.student_number = student_info.student_number
    //   INNER JOIN course ON course.course_id = student_info.course_id
    //   INNER JOIN subject ON subject.subject_code = petition_request.subject_code
    //   WHERE petition_request.subject_code = '$subjcode' AND petition_request.school_year = '$schoolyear' AND petition_request.semester = '$semester' AND petition_request.status='Requested' GROUP BY student_info.student_number") or die(mysqli_error($conn));
   ?>
<div class="card mt-3 mb-4">
                <div class="card-header bg-transparent border-0">
                  <h4 class="m-0">Completion Form</h4>
                </div>
                <div class="card-body">
<table width="100%">
  <tr><th align="left" colspan="2"><h5>Student Name: <?php echo $rows1['lastname']; ?>, <?php echo $rows1['firstname']; ?>, <?php echo $rows1['middlename']; ?></h5></th></tr>
  <tr><th align="left" colspan="2"><h5>Course & Major: <?php echo $rows1['course']; ?> - <?php echo $rows1['major']; ?>  </h5></th></tr>
  <tr><th align="left"><h5>Student Number: <?php echo $rows1['student_number']; ?></h5></th>
  <th><h5 align="left">Date: <?php echo date('m/d/Y'); ?></h5></th></tr>
</table>

<table class="table" id="studentmasterlist">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Unit</th>
                      <th>Year&nbsp;Taken</th>
                      <th>Instructor</th>
                      <th>Grade&nbsp;Upon&nbsp;Completion</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">ENG 1</th>
                      <td>3</td>
                      <td>2019-2020</td>
                      <td>Mr. Sample Lang</td>
                      <td>2</td>
                      <td>Passed</td>
                    </tr>
                    <tr>
                      <th scope="row">FIL 1</th>
                      <td>3</td>
                      <td>2019-2020</td>
                      <td>Mr. Sample Lang</td>
                      <td>2</td>
                      <td>Passed</td>
                    </tr>    
                  </tbody>
                </table>
<table>
<tr><th colspan="2" width="100%" align="left">
<br><br>
      ________________________________________<br>
      Signature over Printed Name of Faculty In-Charge </th></tr>
<tr><th align="left">
<br><br>
<label for="">Noted :</label> ___________________</th>
<th align="left">
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="">Received :</label> ___________________</th></tr>
<tr><th align="left">
<br><br>
<label for="">Program Head / Dean :</label> ___________________</th>
<th align="left">
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="">Registrar :</label> ___________________</th></tr>
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
