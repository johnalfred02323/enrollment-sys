<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');  
$course =$_GET['course'];
$major = $_GET['major'];
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script> <!-- CKEditor textarea -->


<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">


<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">


  <title>GRC System | Registrar</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'layout/side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require 'layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="index">Schedule</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $course; ?></li>
    <li class="breadcrumb-item active" aria-current="page" id="major"><?php echo $major; ?></li>
  </ol>
</nav>



<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="d-flex justify-content-between">

    <div class="dropdown show d-inline">
    </div>


<div class="dropdown show d-inline">
  <div class="box1">
      <select name='' id="sy" required>
      </select>
    </div>
  <div class="box1">
      <select name='' id="sem" required>
        <option value="First Semester">First Semester</option>
        <option value="Second Semester">Second Semester</option>
      </select>
    </div>
    </div>
</div>

<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="d-flex justify-content-between">

    <div class="dropdown show d-inline">
      <a class="btn delete-user dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-plus"></i>  ADD SCHEDULE
      </a>


      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" id="Firstyr" href="create-schedule?course=<?php echo $course; ?>&major=<?php echo $major; ?>&year=First Year" id="addsched">First Year</a>
        <a class="dropdown-item" id="Secondyr" href="create-schedule?course=<?php echo $course; ?>&major=<?php echo $major; ?>&year=Second Year">Second Year</a>
        <a class="dropdown-item" id="Thirdyr" href="create-schedule?course=<?php echo $course; ?>&major=<?php echo $major; ?>&year=Third Year">Third Year</a>
        <a class="dropdown-item" id="Fourthyr" href="create-schedule?course=<?php echo $course; ?>&major=<?php echo $major; ?>&year=Fourth Year">Fourth Year</a>
        <a class="dropdown-item" id="Fifthyr" href="create-schedule?course=<?php echo $course; ?>&major=<?php echo $major; ?>&year=Fifth Year">Fifth Year</a>
      </div>
    </div>



    <div class="dropdown show d-inline">
      <a class="btn view-user dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-eye"></i>  Major
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" id="major1" href="#"></a>
        <a class="dropdown-item" id="major2" href="#"></a>
        <a class="dropdown-item" id="major3" href="#"></a>
        <a class="dropdown-item" id="major4" href="#"></a>
        <a class="dropdown-item" id="major5" href="#"></a>
      </div>
    </div>

</div>
    <!-- <div class="d-flex justify-content-center"><h2 ><?php echo $_GET['year']; ?></h2></div> -->


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>


<!-- <div class="card shadow-sm mb-4"> 


  <div class="card-header py-3">

      <h5 class="m-0">Schedule ( BSIT )</h5>

      <button type="button" class="add-user pull-xs-right" data-toggle="modal" data-target="#add-schedule-bsit" ripple><i class="fas fa-plus"></i> ADD SCHEDULE</button>

  </div>

    <div class="card-body" >
      


    </div>
</div>  -->





 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6" id="firstyrsection"> <!-- left column Start -->

            


              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">First Year</h5>
                </div>
                <div class="card-body">


<table class="table">
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="firstyearsched">
  
  </tbody>
</table>           

                </div>
              </div>



            </div> <!-- left column End -->




            <div class="col-lg-6" id="secondyrsection">  <!-- Right column Start -->



            
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Second Year</h5>
                </div>
                <div class="card-body">

<table class="table">
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="secondyearsched">

  </tbody>
</table>                  

                </div>
              </div>



            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->





<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>







 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6" id="thirdyrsection"> <!-- left column Start -->

            


              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Third Year</h5>
                </div>
                <div class="card-body">


<table class="table">
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="thirdyearsched">
 
  </tbody>
</table>      
                </div>
              </div>



            </div> <!-- left column End -->




            <div class="col-lg-6" id="fourthyrsection">  <!-- Right column Start -->



            
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Fourth Year</h5>
                </div>
                <div class="card-body">


<table class="table">
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="fourthyearsched">

  </tbody>
</table>                  

                </div>
              </div>



            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->






<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>







 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6" id="fifthyrsection"> <!-- left column Start -->

            


              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Fifth Year</h5>
                </div>
                <div class="card-body">


<table class="table">
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="fifthyearsched">
 
  </tbody>
</table>                

                </div>
              </div>



            </div> <!-- left column End -->




            <div class="col-lg-6" id="sampleyrsection">  <!-- Right column Start -->



            
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Sample Year</h5>
                </div>
                <div class="card-body">


<h3>NO DATA!</h3>
                  

                </div>
              </div>



            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->




        </div>
        <!-- /.container-fluid -->




      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

  <?php include 'view-schedule.php'; ?>
  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>



  <!-- TABLE -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>


  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

<script type="text/javascript">
  $.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyear":1},
      success:function(data){
        $('#sy').html(data);  
      }
      });  


            var sy ="";
            var sem ="";
            var major = '<?php echo $_GET['major']; ?>';
            var course = '<?php echo $course; ?>';

                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"firstyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#firstyearsched').html(data);
                          }
                          });  

                    //Second Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"secondyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#secondyearsched').html(data);
                          }
                          });  

                    //Third Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"thirdyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#thirdyearsched').html(data);
                          }
                          });  

                    //Fourth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fourthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fourthyearsched').html(data);
                          }
                          });  

                    //Fifth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fifthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fifthyearsched').html(data);
                          }
                          });  

  

$(document).ready(function() {
 //for getting the school year value
      $.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyearvalue":1},
      success:function(data){
      $('#sy').val(data);
      window.syear = data;
          //for semester    
          $.ajax({
          url:"process.php",
          type:"POST",
          data:{"semester":1},
          success:function(data){
            $('#sem').val(data);
            window.sems = data;
            
            var sy = window.syear;
            var sem = window.sems;  
            var major = '<?php echo $_GET['major']; ?>';
            var course = '<?php echo $course; ?>';

                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"firstyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#firstyearsched').html(data);
                          }
                          });  

                    //Second Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"secondyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#secondyearsched').html(data);
                          }
                          });  

                    //Third Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"thirdyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#thirdyearsched').html(data);
                          }
                          });  

                    //Fourth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fourthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fourthyearsched').html(data);
                          }
                          });  

                    //Fifth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fifthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fifthyearsched').html(data);
                          }
                          });  


          }
          });

      }
      });

  $(document).on('change','#sy',function(){

    var sy = $('#sy').val();
    var sem = $('#sem').val();  
    var major = '<?php echo $_GET['major']; ?>';
    var course = '<?php echo $course; ?>';
    
                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"firstyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#firstyearsched').html(data);
                          }
                          });  

                    //Second Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"secondyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#secondyearsched').html(data);
                          }
                          });  

                    //Third Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"thirdyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#thirdyearsched').html(data);
                          }
                          });  

                    //Fourth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fourthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fourthyearsched').html(data);
                          }
                          });  

                    //Fifth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fifthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fifthyearsched').html(data);
                          }
                          });  

  });

  $(document).on('change','#sem',function(){

    var sy = $('#sy').val();
    var sem = $('#sem').val();  
    var major = '<?php echo $_GET['major']; ?>';
    var course = '<?php echo $course; ?>';
    
                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"firstyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#firstyearsched').html(data);
                          }
                          });  

                    //Second Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"secondyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#secondyearsched').html(data);
                          }
                          });  

                    //Third Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"thirdyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#thirdyearsched').html(data);
                          }
                          });  

                    //Fourth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fourthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fourthyearsched').html(data);
                          }
                          });  

                    //Fifth Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"fifthyearsched":1,sy:sy,sem:sem,major:major,course:course},
                          success:function(data){
                            $('#fifthyearsched').html(data);
                          }
                          });  

  });

    var course = '<?php echo $course ?>'; 

    //dropdown menu view
    if(course == "BSIT")
    {
      $('#major1').html('Programming');$('#major2').hide();$('#major3').hide();$('#major4').hide();$('#major5').hide();
      $('#fifthyrsection').hide();$('#sampleyrsection').hide();$('#Fifthyr').hide();
    }
    if(course == "BSBA")
    {
      $('#major1').html('Human Resource');$('#major2').html('Marketing');$('#major3').hide();$('#major4').hide();$('#major5').hide();
      $('#fifthyrsection').hide();$('#sampleyrsection').hide();$('#Fifthyr').hide();
    }
    if(course == "BSEntrep")
    {
      $('#major1').html('Entrepreneurship');$('#major2').hide();$('#major3').hide();$('#major4').hide();$('#major5').hide();
      $('#fifthyrsection').hide();$('#sampleyrsection').hide();$('#Fifthyr').hide();
    }
    if(course == "BSEd")
    {
      $('#major1').html('English');$('#major2').html('Mathematics');$('#major3').html('Physical Education');$('#major4').hide();$('#major5').hide();
      $('#fifthyrsection').hide();$('#sampleyrsection').hide();$('#Fifthyr').hide();
    }
    if(course == "BEEd")
    {
      $('#major1').html('Elemetary');$('#major2').hide();$('#major3').hide();$('#major4').hide();$('#major5').hide();
      $('#fifthyrsection').hide();$('#sampleyrsection').hide();$('#Fifthyr').hide();
    }
    if(course == "BSA")
    {
       $('#major1').html('Accountancy');$('#major2').hide();$('#major3').hide();$('#major4').hide();$('#major5').hide();
       $('#sampleyrsection').hide();
    } 




    //First Major
    $(document).on('click','#major1', function(e)
    {
      var major1 = $('#major1').text();
      window.location.href = "schedule?course=<?php echo $course; ?>&major="+major1;
    });

    //Second Major
    $(document).on('click','#major2', function(e)
    {
      var major2 = $('#major2').text();
      window.location.href = "schedule?course=<?php echo $course; ?>&major="+major2;
    });

    //Third Major
    $(document).on('click','#major3', function(e)
    {
      var major3 = $('#major3').text();
      window.location.href = "schedule?course=<?php echo $course; ?>&major="+major3;
    });

    //Fourth Major 
    $(document).on('click','#major4', function(e)
    {
      var major1 = $('#major4').text();
      window.location.href = "schedule?course=<?php echo $course; ?>&major="+major4;
    });

    //Fifth Major
    $(document).on('click','#major5', function(e)
    {
      var major1 = $('#major5').text();
      window.location.href = "schedule?course=<?php echo $course; ?>&major="+major5;
    });

// view button for schedules per year
    $(document).on('click','.view1', function(e)
    {
      var id = $(this).attr("id");
      var section = $('#section1'+id).text();
      $('#vsection').text(section);
       $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,section:section},
      success:function(data){
        $('#schedlist').html(data);
      }
    });
    });

    $(document).on('click','.view2', function(e)
    {
      var id = $(this).attr("id");
      var section = $('#section2'+id).text();
      $('#vsection').text(section);
       $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,section:section},
      success:function(data){
        $('#schedlist').html(data);
      }
    });
    });

    $(document).on('click','.view3', function(e)
    {
      var id = $(this).attr("id");
      var section = $('#section3'+id).text();
      $('#vsection').text(section);
       $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,section:section},
      success:function(data){
        $('#schedlist').html(data);
      }
    });
    });

    $(document).on('click','.view4', function(e)
    {
      var id = $(this).attr("id");
      var section = $('#section4'+id).text();
      $('#vsection').text(section);

      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,section:section},
      success:function(data){
        $('#schedlist').html(data);
      }
    });
    });

    $(document).on('click','.view5', function(e)
    {
      var id = $(this).attr("id");
      var section = $('#section5'+id).text();
      $('#vsection').text(section);
       $.ajax({
      url:"process.php",
      method:"POST",
      data:{"viewsched":1,section:section},
      success:function(data){
        $('#schedlist').html(data);
      }
    });
    });

});
</script>


</body>

</html>
