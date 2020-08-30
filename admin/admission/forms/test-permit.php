<!-- Head -->
<?php require 'layout/head-forms.php';
$sisnum = $_GET['sisnum'];
?>

<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Student Information Sheet</title>

</head>
  <body id="page-top">

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Begin Page Content -->
          <div class="container">

            <div class="card my-shadow mb-4"> <!-- card start -->

              <!-- Card Header - Dropdown -->
              

                <h6 class="m-0 font-weight-bold card-text-title-head">Test Permit</h6>

              

              <div class="card-body">

                Name of Applicant : <input type="text" id="stu-name" readonly="readonly" /></br>
                Place of Exam     : _______________&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDate : __/__/____ Time : __:__ __</br>
                Processed By      : <input type="text" id="fac-name" readonly="readonly" /></br>Examiner : ______________________</br></br>

                Test Agreement</br></br>
                  I hereby affix my signature to agree with the condition imposed by the Admission Office regarding my posible enrollment into any of the programs of GRC.</br></br>

                  To wit :</br></br>
                  1. That, I will be allowed to take the exam but passing the exam doesn't guarantee that I will be admitted or be enrolled in the program I want to pursue;</br>
                  2. That my enrollment is subject to availability of slot as certified by the head of the department, by the dean, and by the school director, and</br>
                  3. For any instances that I may not continue my application for college admission payment of this test permit is non-refundable.</br></br>


                  <hr width = "25%" align = "left">
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbspSignature over Printed Name 


              </div>
              <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          </div>
          <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

    <script type="text/javascript">
      var sisnum = '<?php echo $sisnum;?>';
     $.ajax({
      url:"../admission-process.php",
      method:"POST",
      data:{"displayfullname":1,sisnum:sisnum},
      success:function(data){
        var result = $.parseJSON(data);
        $('#stu-name').val(result.fname+" "+result.mname+" "+result.lname);
      }
    });

    </script>

</body>
</html>
