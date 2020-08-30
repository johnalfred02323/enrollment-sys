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



<!-- modal button -->

<?php include 'view-schedule.php'; ?>

<div class="d-flex justify-content-end mb-4 mt-4">

<div class="row">
  <div class="col-xl-6 col-md-6 col-xs-12 mb-sm-0 mb-3">
    <select value="" id="sy" class="custom-select custom-select mr-3" placeholder="School Year"></select>
  </div>
  <div class="col-xl-6 col-md-6 col-xs-12">
    <select list="semester" value="" id="sem" class="custom-select custom-select" placeholder="Semester">
    <datalist id="semester">
        <option id="First">First Semester</option>
        <option id="Second">Second Semester</option>
    </datalist>
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
      <a id="majorbutton" class="btn view-user dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-eye"></i>  Major
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="majorlist">
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




            <div class="col-lg-6" id="sampleyrsection" hidden>  <!-- Right column Start -->



            
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



 <!-- TABLE js -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> -->
<script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>


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

  course = '<?php echo $course; ?>';

  //for major
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"majorsearch":1,course:course},
      success:function(data){
        if(data == 0)
        {
           $('#majorbutton').hide();  
           $('#major').text('No Major');
        }
        else
        {
           $('#majorlist').html(data);  
        }
      }
      });
  //for year display  
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"year":1,course:course},
      success:function(data){
         if(data == 0)
        {
           $('#Fifthyr').hide();  
           $('#fifthyrsection').hide();  
        }
        else
        {
           $('#fifthyrsection').show(); 
           $('#Fifthyr').show();  
        }
      }
      });  
 //schoolyear
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
            var major = $('#major').text();
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
            var major = $('#major').text();
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

     $(document).on( 'change','#sy', function (e) {

    var sy = $('#sy').val();
    var sem = $('#sem').val();  
    var major = $('#major').text();
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

     $(document).on( 'change','#sem', function (e) {

    var sy = $('#sy').val();
    var sem = $('#sem').val();  
    var major = $('#major').text();
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


  // view button for schedules per year
      $(document).on('click','.view1', function(e)
      {
        var id = $(this).attr("id");
        var sem = $("#sem").val();
        var schoolyear = $('#sy').val();
        var section = $('#section1'+id).text();
        $('#vsection').text(section);
         $.ajax({
        url:"process.php",
        method:"POST",
        data:{"viewsched":1,section:section,sem:sem,schoolyear:schoolyear},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view2', function(e)
      {
        var id = $(this).attr("id");
        var sem = $("#sem").val();
        var schoolyear = $('#sy').val();
        var section = $('#section2'+id).text();
        $('#vsection').text(section);
         $.ajax({
        url:"process.php",
        method:"POST",
        data:{"viewsched":1,section:section,sem:sem,schoolyear:schoolyear},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view3', function(e)
      {
        var id = $(this).attr("id");
        var sem = $("#sem").val();
        var schoolyear = $('#sy').val();
        var section = $('#section3'+id).text();
        $('#vsection').text(section);
         $.ajax({
        url:"process.php",
        method:"POST",
        data:{"viewsched":1,section:section,sem:sem,schoolyear:schoolyear},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view4', function(e)
      {
        var id = $(this).attr("id");
        var sem = $("#sem").val();
        var schoolyear = $('#sy').val();  
        var section = $('#section4'+id).text();
        $('#vsection').text(section);
        $.ajax({
        url:"process.php",
        method:"POST",
        data:{"viewsched":1,section:section,sem:sem,schoolyear:schoolyear},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
      });

      $(document).on('click','.view5', function(e)
      {
        var id = $(this).attr("id");
        var sem = $("#sem").val();
        var schoolyear = $('#sy').val();
        var section = $('#section5'+id).text();
        $('#vsection').text(section);
         $.ajax({
        url:"process.php",
        method:"POST",
        data:{"viewsched":1,section:section,sem:sem,schoolyear:schoolyear},
        success:function(data){
          $('#schedlist').html(data);
        }
      });
    });

});
</script>


</body>

</html>
