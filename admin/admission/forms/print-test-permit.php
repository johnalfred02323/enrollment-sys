<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<!-- Head -->
<?php require 'layout/head-forms.php';
require '../../../src/layout/admission/head.php';
$sisnum = $_GET['sisnum'];
$place = $_GET['place'];
$date = $_GET['date'];
$time = $_GET['time'];
$date1 = date("F d Y", strtotime($date));
$time1 = date("h:i a", strtotime($time));

$user = $_SESSION['user'];
date_default_timezone_set("Asia/Manila");
require '../../../config/config.php'; 
?>

<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Student Information Sheet</title>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

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
<?php

    //for student data
    $query1 =  mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum = '$sisnum'") or die(mysqli_error($conn));
    $rows1=mysqli_fetch_assoc($query1);

    //for admin staff data
    $query2 =  mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'") or die(mysqli_error($conn));
    $rows2=mysqli_fetch_assoc($query2); ?>

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
<br><br>
<b>S.I.S No. :</b> <?php echo $rows1['sisnum']; ?></br>
<b>Name of Applicant :</b> <?php echo $rows1['lastname'].', '.$rows1['firstname']." ".substr($rows1['middlename'],0,1)."."; ?></br>
<b>Place of Exam     :</b> <?php echo $place; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<b>Date :</b> <?php echo $date1; ?> &nbsp&nbsp&nbsp
<b>Time :</b> <?php echo $time1; ?></br>
<b>Processed By      :</b> <?php echo $rows2['lastname'].', '.$rows2['firstname']." ".substr($rows2['middlename'],0,1)."."; ?></br>
<b>Examiner :</b> Admission</br></br><br><br>

<b>Test Agreement</b></br></br>
I hereby affix my signature to agree with the condition imposed by the Admission Office regarding my posible enrollment into any of the programs of GRC.</br></br><br><br><br>

<b>To wit :</b></br></br>
1. That, I will be allowed to take the exam but passing the exam doesn't guarantee that I will be admitted or be enrolled in the program I want to pursue;</br>
2. That my enrollment is subject to availability of slot as certified by the head of the department, by the dean, and by the school director, and</br>
3. For any instances that I may not continue my application for college admission payment of this test permit is non-refundable.</br></br>

<br><br><br><br>
<hr width = "25%" align = "left">
                  &nbsp&nbspSignature over Printed Name 
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
