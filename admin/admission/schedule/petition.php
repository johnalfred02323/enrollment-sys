<!-- Head -->
<?php 
require 'layout/head.php'; 
require ('../../../config/config.php');  
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
    <li class="breadcrumb-item active" aria-current="page">Petition</li>
  </ol>
</nav>


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

    <div class="d-flex justify-content-center"><h2> PETITION SCHEDULE </h2></div>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>


<div class="card shadow-sm mb-4"> <!-- card 5 start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3">

      <h6 class="m-0 font-weight-bold">Schedule ( PETITION )</h6>

  </div>

    <div class="card-body" >
      
      <table id="news_table" class="display nowrap table" style="width:100%">
              <thead>
                  <tr>
                      <th>Subjects Code</th>
                      <th>Subjects Title</th>
                      <th>Section</th>
                      <th>Enrolled</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody id="petitionsched">
                
              </tbody>
      </table>

    </div>
</div> <!-- card 5 end -->


        </div>
        <!-- /.container-fluid -->
   

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>
   


      </div>
      <!-- End of Main Content -->

  <?php include 'view-petition.php'; ?>
      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>



    </div>
    <!-- End of Content Wrapper -->


  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>

<script type="text/javascript">

 $(document).on('click','.view', function(e)
    {
      var id = $(this).attr("id");
      var section = $('#section'+id).text();
      var subjcode = $('#code'+id).text();
      $('#vsection').text(section); 
          $.ajax({
          url:"petition-summer-process.php",
          method:"POST",
          data:{"viewpetsched":1,subjcode:subjcode},
          success:function(data){
            $('#schedlist').html(data);
          }
          });

    });

$.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyear":1},
      success:function(data){
        $('#sy').html(data);  
      }
      });  


            var sy = window.syear;
            var sem = window.sems;  

                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"firstyearsched":1,sy:sy,sem:sem},
                          success:function(data){
                            $('#petitionsched').html(data);
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

                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"petitionsched":1,sy:sy,sem:sem},
                          success:function(data){
                            $('#petitionsched').html(data);
                          }
                          });  
          }
          });

      }
      });

  $(document).on('change','#sy',function(){

    var sy = $('#sy').val();
    var sem = $('#sem').val();  
    
                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"petitionsched":1,sy:sy,sem:sem},
                          success:function(data){
                            $('#petitionsched').html(data);
                          }
                          });  

  });

  $(document).on('change','#sem',function(){

    var sy = $('#sy').val();
    var sem = $('#sem').val();  
    
                    //First Year Schedule
                     $.ajax({
                          url:"viewsched-process.php",
                          type:"POST",
                          data:{"petitionsched":1,sy:sy,sem:sem},
                          success:function(data){
                            $('#petitionsched').html(data);
                          }
                          });  

  });
});

</script>


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

</body>

</html>
