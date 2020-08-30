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




              <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                  <h5 class="m-0 font-weight-bold">Final Review</h5>
                  <h5 class="m-0 font-weight-bold" id="status" hidden></h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Lastname</small>
                        <input type="text" class="form-control" id="lname" size="18" value="" readonly>
                      </div>    
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Firstname</small>
                        <input type="text" class="form-control" id="fname" size="18" value="" readonly>
                      </div>    
                    </div>  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Middlename</small>
                        <input type="text" class="form-control" id="mname" size="18" value="" readonly>
                      </div>    
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">Suffix</small>
                        <input type="text" class="form-control" id="suffix" size="18" value="" readonly>
                      </div>    
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <small class="readonly">Gender</small>
                        <input type="text" class="form-control" id="gender" size="18" value="" readonly>
                      </div>    
                    </div>  
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Course</small>
                        <input type="text" class="form-control" id="course" size="18" value="" readonly>
                      </div>    
                    </div> 
                    <div class="col-lg-4">
                      <div class="form-group">
                        <small class="readonly">Major</small>
                        <input type="text" class="form-control" id="major" size="18" value="" readonly>
                      </div>    
                    </div>                                       
                  </div>
                </div>
              </div>

              <!-- FOR STUDENT SCORE DISPLAY -->
              <div class="card shadow-sm mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 text-gray-600">Evaluated Grades</h6>
                </a>

                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">

                  <div class="table-responsive">          
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Total Score</th>
                        <th scope="col">Average</th>
                      </tr>
                    </thead>
                    <tbody id="studentscore">
                    </tbody>
                    <tfoot class="table-borderless">
                      <tr>
                        <th scope="row" colspan="3">Total Average: <label id ="totave"><u>90</u></label></th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
            <div class="d-flex justify-content-end">
            <a href="admission-evaluation-of-scores?sisnum=<?php echo $sisnum; ?>">
               <button type="button" id="add_stud_btn" class="edit-user pull-xs-right mt-3 mb-5 no" ripple><i class="fas fa-edit"></i> EDIT</button>
            </div></a>

                  </div>
                </div>
              </div>

              <!-- FOR STUDENT REQUIREMENTS -->
              <div class="card shadow-sm mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                  <h6 class="m-0 text-gray-600">Requirements</h6>
                </a>

                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                  <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card shadow-sm mb-4">

                  <div id="freshmentbl">
                    <div class="card-header">
                      Freshmen
                    </div>
                    <div class="card-body">
                          <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Requirements</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody id="freshtr">
                          </tbody>
                          </table>          
                    </div>
                  </div>  



                  <div id="transfereetbl">
                    <div class="card-header">
                      Transferee
                    </div>
                    <div class="card-body">
                          <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Requirements</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody id="transtr">
                          </tbody>
                          </table>          
                    </div>
                  </div>  



                  </div>    
                </div>


                <div class="col-lg-6">
                  <div class="card shadow-sm mb-4">
                    <div class="card-header">
                      Must Have Requirements
                    </div>
                    <div class="card-body">
                    <div class="card-body">
                          <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Requirements</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody id="musthave">
                          </tbody>
                          </table>          
                    </div>
                    </div>
                  </div>    
                </div>
              </div>


            <div class="d-flex justify-content-end">
              <a href="admission-credentials?sisnum=<?php echo $sisnum; ?>"><button type="button" id="add_stud_btn" class="edit-user pull-xs-right mt-3 no" ripple><i class="fas fa-edit"></i> EDIT</button></a>
            </div>

                  </div>
                </div>
              </div>


              <!-- FOR STUDENT SCHEDULE -->
              <div class="card shadow-sm mb-4" id="studsched">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                  <h6 class="m-0 text-gray-600">SCHEDULE</h6>
                </a>

                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                  <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th colspan="3" style="color: red">Subject Details</th>
                          <th colspan="3"></th>
                          <th colspan="4" style="color: red">Lecture Details</th>
                          <th colspan="4" style="color: red">Other Details</th>
                        </tr>
                        <tr>
                          <th scope="col" nowrap>Sub Code</th>
                          <th scope="col">Sub Title</th>
                          <th scope="col">unit</th>  
                          <th scope="col">Section</th>  
                          <th scope="col">Course</th>  
                          <th scope="col">Major</th>  
                          <th scope="col">Day</th>  
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Room</th>
                          <th scope="col">Day</th>
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Room</th>
                        </tr>
                      </thead>
                      <tbody id="editstudentdata">

                      </tbody>
                    </table>
                    </div>  
                  </div>
                </div>
              </div>


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

    var sisnum = '<?php echo $sisnum;?>';

    //get student enrolled subjects
      $.ajax({  
        url:"process.php",  
        method:"post",  
        data:{"edit-stud-enrollment-data":1,sisnum:sisnum},  
        success:function(data)
        {
          if(data == 0)
          {
              $('#studsched').hide();
          } 
          else
          {  
              $('#editstudentdata').html(data);
          }
        }
      });

     $.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"displayfullname4":1,sisnum:sisnum},
      success:function(data){
        var result = $.parseJSON(data);
                $('#fname').val(result.fname);
                $('#lname').val(result.lname);
                $('#mname').val(result.mname);
                $('#suffix').val(result.suffix);
                $('#gender').val(result.gender);
                $('#major').val(result.major);
                $('#course').val(result.course);
                $('#status').text(result.status);

                 var status = $('#status').text();
                 $.ajax({
                  url:"admission-process.php",
                  method:"POST",
                  data:{"displayresult":1,sisnum:sisnum,status:status},
                  success:function(data){
                            var result = $.parseJSON(data);
                            $('#studentscore').html(result.tablescore);
                            $('#totave').text(result.totalave);     
                            if(status == 'Transferee')
                            {
                              $('#transtr').html(result.tablereq);
                              $('#transfereetbl').show();
                              $('#freshmentbl').hide();
                            }
                            else
                            {
                              $('#freshtr').html(result.tablereq);
                              $('#transfereetbl').hide();
                              $('#freshmentbl').show();
                            }

                              $('#musthave').html(result.musthavetbl);
                  }
                });
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
