<script>
window.print();
setTimeout('window.close()', 1000);  
</script>

<!-- Head -->
<?php
require 'layout/head-forms.php';
require '../../../src/layout/admission/head.php';
$sisnum = $_GET['sisnum'];
$name = $_GET['name'];
$fr = $_GET['fr'];
$eb = $_GET['eb'];
$year = $_GET['year'];
$address = $_GET['address'];
$user = $_SESSION['user'];
date_default_timezone_set("Asia/Manila");
require '../../../config/config.php'; 
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Admission</title>

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
<br>
<center><h3 class="text-dark font-weight-bold">OFFICE OF ADMISSION</h3></center>
              </div>
              

                <h6 class="m-0 font-weight-bold card-text-title-head">Request Letter</h6>

                

              <div class="card-body">

               <br><label>The Principal / Registrar  Date: </label></br>
                <div class="form-inline">              
                  <div class="form-group m-0">
                    <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2" value="<?php echo $name; ?>" disabled>
                  </div>
                </div>

                <div class="form-inline">              
                  <div class="form-group m-0">
                    <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2" value="<?php echo $address; ?>" disabled>
                  </div>
                </div>

                <div class="form-inline">              
                  <div class="form-group m-0">
                    <input type="text" id="" class="form-controls resize bg-transparent rounded-0 border-top-0 border-left-0 border-right-0 border-bottom-2" value="<?php echo date('m/d/Y'); ?>" disabled>
                  </div>
                </div><br>


               Sir / Madam:</br></br>

               May we request the Form 137 / Transcript of Records of <u><?php echo $rows1['lastname'].', '.$rows1['firstname']." ".substr($rows1['middlename'],0,1)."."; ?></u>, a student of your school in Academic Year <u><?php echo $year; ?></u> who is temporarily enrolled in Global Reciprocal Colleges with pending receipt of this document.</br></br>

               For the best interest of the student, please send it as soon as possible.</br></br>

               Thank You.</br></br>

               <hr width = "15%" align = "left">
               &nbsp&nbsp&nbsp&nbspEivin B. Tolentino</br>
               &nbsp&nbsp&nbsp&nbspSchool Registrar</br></br>

               <?php 
               if($fr == 1)
               {
               ?>
                    ( <i class="fas fa-check"></i> ) First Request</br>
               <?php
               }
               else
               {
               ?>
                    ( ) First Request</br>
               <?php
               }
               ?>

               <?php 
               if($eb == 1)
               {
               ?>
                    ( <i class="fas fa-check"></i> ) Please entrust to bearer
               <?php
               }
               else
               {
               ?>
                    ( ) Please entrust to bearer
               <?php
               }
               ?>

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
