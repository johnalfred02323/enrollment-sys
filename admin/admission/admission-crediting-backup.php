<!-- Head -->
<?php require '../../src/layout/admission/head.php'; 
$sisnum = $_GET['sisnum'];

?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">


  <title>GRC System | Admission</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Side Nav -->
    <?php require '../../src/layout/admission/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/admission/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="index.php">Dashboard </a></li>
                <li class="breadcrumb-item ">Student Information</li>
                <li class="breadcrumb-item ">Evaluation of Scores</li>
                <li class="breadcrumb-item ">Submission of Credentials</li>
              </ol>
            </nav>


<!-- BSIT -->
              <div class="card shadow-sm mb-4 mt-5">
                <div class="card-header">
                  <h5 class="m-0 font-weight-bold">B.S.I.T</h5>
                </div>
                <div class="card-body">
                <div class="row d-flex justify-content-between">
                  <div class="col-lg-12 mx-auto">
                <div class="row">

                  
                <!-- Start here -->  
                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> ITS - 101
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">FULL</span>
                    </div>
                    </div>
                  </div>         
                <!-- End here -->  



                       </div>  
                    </div>
                  </div>  
                </div>
              </div>




<!-- BSBA -->
              <div class="card shadow-sm mb-5 mt-5">
                <div class="card-header">
                  <h5 class="m-0 font-weight-bold">B.S.B.A</h5>
                </div>
                <div class="card-body">
                <div class="row d-flex justify-content-between">
                  <div class="col-lg-12 mx-auto">
                <div class="row">

                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> BSBA - 101
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">FULL</span>
                    </div>
                    </div>
                  </div>  


                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> BSBA - 102
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">30</span>
                    </div>
                    </div>
                  </div>


                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> BSBA - 103
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">20</span>
                    </div>
                    </div>
                  </div>                                     


                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> BSBA - 104
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">25</span>
                    </div>
                    </div>
                  </div> 


                    </div>  
                    </div>
                  </div>  
                </div>
              </div>




<!-- BSE -->
              <div class="card shadow-sm mb-5 mt-5">
                <div class="card-header">
                  <h5 class="m-0 font-weight-bold">B.S.E</h5>
                </div>
                <div class="card-body">
                <div class="row d-flex justify-content-between">
                  <div class="col-lg-12 mx-auto">
                <div class="row">

                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> BSE - 101
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">10</span>
                    </div>
                    </div>
                  </div>  


                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> BSE - 102
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">16</span>
                    </div>
                    </div>
                  </div>


                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> BSE - 103
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">20</span>
                    </div>
                    </div>
                  </div>                                     


                    </div>  
                    </div>
                  </div>  
                </div>
              </div>




<!-- BEEd -->
              <div class="card shadow-sm mb-5 mt-5">
                <div class="card-header">
                  <h5 class="m-0 font-weight-bold">B.E.E.d</h5>
                </div>
                <div class="card-body">
                <div class="row d-flex justify-content-between">
                  <div class="col-lg-12 mx-auto">
                <div class="row">

                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> Educ - 101
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">35</span>
                    </div>
                    </div>
                  </div>  


                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> Educ - 102
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">30</span>
                    </div>
                    </div>
                  </div>


                  <div class="col-lg-4 mt-3">
                    <div class="card">
                    <div class="card-body rounded bg-light border d-flex justify-content-between">
                    <label class="container-radio m-0"> Educ - 103
                      <input type="radio" name="radio">
                      <span class="checkmark-radio"></span>
                    </label>
                    <span class="" data-toggle="tooltip" data-placement="top" title="SLOT">30</span>
                    </div>
                    </div>
                  </div>                                     


                    </div>  
                    </div>
                  </div>  
                </div>
              </div>

<a href="admission-final-proccess.php">
            <div class="d-flex justify-content-end">
               <button type="button" id="add_stud_btn" class="add-user pull-xs-right mt-3 mb-5" ripple>Last Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
</a>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<!-- Footer -->
<?php require '../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">

// Tooltip Show Slot
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

    var student_number = '<?php echo $student_number;?>';
     $.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"displayfullname4":1,student_number:student_number},
      success:function(data){
        var result = $.parseJSON(data);
                $('#fullname').val(result.fname+" "+result.mname+" "+result.lname);
                $('#coursetb').val(result.course);
      }
    });

     $.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"showscore":1,student_number:student_number},
      success:function(data){
        var result = $.parseJSON(data);

        //$('#coursetb').val(result.math);

                if(result.math < '75'){
                  $('#mathtb').val(result.math);  
                }
                else if(result.english > '75'){
                  $('#englishtb').val(result.english);  
                }
                else if(result.math < '75' && result.english < '75'){
                  $('#mathtb').val(result.math);   
                  $('#englishtb').val(result.english);
                }
                
                
      }
    });

  </script>

  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>
  

</body>

</html>
