<!-- Head -->
<?php require 'layout/head-forms.php';
$sisnum = $_GET['sisnum'];?>

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

              <div class="container-fuel text-center p-3">
              <img class="" src="../../sample/logo-name-dark.png" height="90px" />
              <p class="text-dark">454 GRC Bldg., Rizal Ave., 9<sup>th</sup> Ave. <br/> Grace park, Caloocan City.  <br/> Telfax :361-6330 </p>
              <h3 class="text-dark font-weight-bold">OFFICE OF ADMISSION</h3>
              </div>
              

                <h6 class="m-0 font-weight-bold card-text-title-head">Request Letter</h6>

                

              <div class="card-body">

               The Principal / Registrar  Date: </br>
              __________________________________</br>
              __________________________________</br>
              __________________________________</br></br>


               Sir / Madam:</br></br>

               May we request the Form 137 / Transcript of Records of <input type="text" id="stu-name" readonly="readonly" />, a student of your school in Academic Year _____________________ who is temporarily enrolled in Global Reciprocal Colleges with pending receipt of this document.</br></br>

               For the best interest of the student, please send it as soon as possible.</br></br>

               Thank You.</br></br>

               <hr width = "15%" align = "left">
               &nbsp&nbsp&nbsp&nbspEivin B. Tolentino</br>
               &nbsp&nbsp&nbsp&nbspSchool Registrar</br></br>

               ( ) First Request</br>
               ( ) Please entrust to bearer




              <!-- /.container-fluid -->
              </div>

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
