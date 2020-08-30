<!-- Head -->
<?php 

require '../../src/layout/faculty-head/head.php'; 
include('../../config/config.php');
$course = $_SESSION['course'];
$major = $_SESSION['major'];

?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

<title>GRC System | Faculty Head</title>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/faculty-head/side-nav.php'; ?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

          <!-- Top Nav -->
          <?php require '../../src/layout/faculty-head/top-nav.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">View Schedule</li>
              </ol>
            </nav>

            <div class="card shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="box1" id="sydiv">
                      <label class="select-label">School year</label>
                      <select name='' id="schoolyear" required>
                      </select>
                    </div>                    
                  </div>
                  <div class="col-lg-3">
                    <div class="box1" id="semdiv">
                      <label class="select-label">Semester</label>
                      <select name='' id="semester" required>
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                        <option value="Summer">Summer</option>
                      </select>
                    </div>                    
                  </div>
                  <div class="col-lg-2">
                    <div class="box1">
                      <label class="select-label">Course</label>
                      <select list="courselist" name='' id="course" required>
                              <datalist id="courselist">
                              <?php 
                              $query = "SELECT DISTINCT course_abbreviation FROM course WHERE status = 'Active'";
                              $result = mysqli_query($conn, $query); 
                              if($count=mysqli_num_rows($result) > 0)  
                              {
                                echo "<option>ALL</option>";
                                while($rows=mysqli_fetch_array($result))
                                {
                                  echo "<option>".$rows['course_abbreviation']."</option>";
                                }
                              }
                              ?>
                              </datalist>
                      </select>
                    </div>                    
                  </div>
                  <div class="col-lg-2">
                    <div class="box1">
                      <label class="select-label">Major</label>
                      <select name='' id="major" required>
                      </select>
                    </div>                    
                  </div>
                   <div class="col-lg-2">
                    <div class="box1">
                      <label class="select-label">Year</label>
                      <select name='' id="yearlbl" required>
                        <option>ALL</option>
                        <option>First Year</option>
                        <option>Second Year</option>
                        <option>Third Year</option>
                        <option>Fourth Year</option>
                        <option id="fifthyr">Fifth Year</option>
                      </select>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>

              <div class="card mb-4 mt-3">
                <div class="card-header d-flex justify-content-between">
                  <h5>List of Schedule</h5>
                  <button type="button" class="delete-user pull-xs-right edit" data-toggle="modal" data-target="#search" ripple><i class="far fa-search"></i> Search</button>
                </div>
                <div class="card-body">
                    <table id="table" class="display nowrap" style="width:100%">
                      <thead>
                          <tr>
                              <th>Section</th>
                              <th>Course</th>
                              <th>Year</th>
                              <th>School Year</th>
                              <th>Semester</th>
                              <th>Action</th>                         
                          </tr>
                      </thead>
                    </table>
                </div>
              </div>



<!-- Modal -->
<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-end">
        <div class="input-group mb-2 mt-3 col-xl-6">
          <input type="text" class="form-controls" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-danger" type="button">Search</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">Subject&nbsp;Code</th>
                <th scope="col">Subject&nbsp;Title</th>
                <th scope="col">Units</th>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Room</th>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Room</th>
                <th scope="col">No.&nbsp;of&nbsp;Student</th>
                <th scope="col">Max&nbsp;Student</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Sample</th>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal"  ripple><i class="fas fa-times"></i> Close</button>
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
        <?php require 'view-schedule.php'; ?>
      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<?php require '../../src/layout/go-to-top.php'; ?>

<script src="../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../src/vendor/table/js/dataTables.responsive.min.js"></script>

<!-- Responsive core JavaScript -->
<script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript -->
<script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages -->
<script src="../../src/js/admin.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

            //for school year
            $.ajax({
              url:"process.php",
              type:"POST",
              data:{"sysem":1},
              success:function(data)
              {
                  var result = $.parseJSON(data);
                  $('#schoolyear').val(result.schoolyear);
                  $('#semester').val(result.semester);
              }
              }); 


//for datatable of sections
function tabledata(){

        var cou = $('#course').val();
        var maj = $('#major').val();
        var yr = $('#yearlbl').val();

        if($("#sydiv").is(":hidden"))
        {
            //for school year
            $.ajax({
              url:"process.php",
              type:"POST",
              data:{"sysem":1},
              success:function(data)
              {
                  var result = $.parseJSON(data);
                  var sy = result.schoolyear;
                  var sem = result.semester;

                  $('#table').DataTable( {

                    "pagingType": "full_numbers",

                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

                    "pageLength": 10,

                    "order": [[ 1, 'desc' ]],

                    "processing" : true,
                    
                    "serverSide" : true,

                    "ajax" :{ 
                    "url":"sched_fetch.php", 
                    "data":{ 
                        "schoolyear":sy,
                        "semester":sem,
                        "course":cou,
                        "major":maj,
                        "year":yr,
                      }
                    },  

                    responsive: true,

                    searchPlaceholder: "Search records",

                    fixedHeader: {
                        header: true,
                        footer: true
                    },

                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search..."
                    }

                  });
              }
              }); 

        }
        else
        {
            var sy = $('#schoolyear').val();
            var sem = $('#semester').val();

            $('#table').DataTable( {

              "pagingType": "full_numbers",

              "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

              "pageLength": 10,

              "order": [[ 1, 'desc' ]],

              "processing" : true,
              
              "serverSide" : true,

              "ajax" :{ 
              "url":"sched_fetch.php", 
              "data":{ 
                  "schoolyear":sy,
                  "semester":sem,
                  "course":cou,
                  "major":maj,
                  "year":yr,
                }
              },  

              responsive: true,

              searchPlaceholder: "Search records",

              fixedHeader: {
                  header: true,
                  footer: true
              },

              language: {
                  search: "_INPUT_",
                  searchPlaceholder: "Search..."
              }

            });
        }

  }

      var course = '<?php echo $course; ?>';
      var major = '<?php echo $major; ?>';

       //for major
       $.ajax({
        url:"process.php",
        type:"POST",
        data:{"major":1,course:course},
        success:function(data){
          if(data == 0)
          {
              $('#major').html('<option value="Choose Major">Choose Major</option>'); 
              $('#course').val(course); 
          }
            else
            {
              $('#major').html(data); 
              $('#major').val(major); 
              $('#course').val(course); 
            }

              //for year display  
             $.ajax({
                url:"process.php",
                type:"POST",
                data:{"year":1,course:course},
                success:function(data){
                   if(data == 0)
                  {
                     $('#fifthyr').hide(); 
                  }
                  else
                  {
                     $('#fifthyr').show();
                  }


                  //for school year
                  $.ajax({
                      url:"process.php",
                      type:"POST",
                      data:{"schoolyear":1},
                      success:function(data)
                      {
                        $('#schoolyear').html(data);
                        $('#table').DataTable().destroy();
                        tabledata();
                      }
                      }); 
                }
                });  
                }
        });

          //for filtering of major
          $(document).on( 'change','#course', function (e) {
            var course = $(this).val();

          if(course == "ALL")
          {
              $('#sydiv').hide();
              $('#semdiv').hide();
              $('#major').html('<option>ALL</option>');
              $('#fifthyr').show();
              $('#table').DataTable().destroy();
              tabledata();
          }
          else
          { 
           //for year display  
           $.ajax({
                url:"process.php",
                type:"POST",
                data:{"year":1,course:course},
                success:function(data){
                   if(data == 0)
                  {
                     $('#fifthyr').hide(); 
                  }
                  else
                  {
                     $('#fifthyr').show();
                  }
                }
                });  
                 //for major
                 $.ajax({
                        url:"process.php",
                        type:"POST",
                        data:{"major":1,course:course},
                        success:function(data){
                          if(data == 0)
                          {
                              $('#major').html('<option value="Choose Major">Choose Major</option>'); 
                              $('#course').val(course); 
                          }
                            else
                            {
                              $('#major').html(data); 
                              $('#course').val(course); 
                            }
                              var major = $('#major').val();
                              var course2 = '<?php echo $course; ?>';
                              var major2 = '<?php echo $major; ?>';
                             if(course == course2 && major == major2)
                             {
                                $('#sydiv').show();
                                $('#semdiv').show();
                             }
                             else
                             {
                                $('#sydiv').hide();
                                $('#semdiv').hide();
                             }
                              $('#table').DataTable().destroy();
                              tabledata();
                        }
                      });
                }
               });


          //for filtering per school year
          $(document).on( 'change','#schoolyear', function (e) {
                $('#table').DataTable().destroy();
                tabledata();
               });

          //for filtering per school year
          $(document).on( 'change','#semester', function (e) {
                $('#table').DataTable().destroy();
                tabledata();
               });


          //for filtering of major
          $(document).on( 'change','#major', function (e) {
            var course = $('#course').val();
            var major = $(this).val();
            var course2 = '<?php echo $course; ?>';
            var major2 = '<?php echo $major; ?>';

            if(course == course2 && major == major2)
            {
                $('#sydiv').show();
                $('#semdiv').show();
            }
            else
            {
                $('#sydiv').hide();
                $('#semdiv').hide();
            }
                $('#table').DataTable().destroy();
                tabledata();
          });


          //for filtering of year
          $(document).on( 'change','#yearlbl', function (e) {
                $('#table').DataTable().destroy();
                tabledata();
          });


    //for viewin of schedule details
      $(document).on( 'click','.viewdetails', function (e) {
        var section = $(this).attr("id");
        $('#vsection').text(section);


        if($("#sydiv").is(":hidden"))
        {
            //for school year
            $.ajax({
              url:"process.php",
              type:"POST",
              data:{"sysem":1},
              success:function(data)
              {
                  var result = $.parseJSON(data);
                  var sy = result.schoolyear;
                  var sem = result.semester;
                  $.ajax({
                    url:"process.php",
                    method:"POST",
                    data:{"viewsched":1,section:section,sy:sy,sem:sem},
                    success:function(data){
                    $('#schedlist').html(data);
                    }
                  }); 
                  
              }
              }); 
        }
        else
        {
            var sy = $('#schoolyear').val();
            var sem = $('#semester').val();
            $.ajax({
                  url:"process.php",
                  method:"POST",
                  data:{"viewsched":1,section:section,sy:sy,sem:sem},
                  success:function(data){
                  $('#schedlist').html(data);
                  }
                }); 
          }
      });

    });
  </script>

</body>

</html>
