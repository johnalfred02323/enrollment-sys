<!-- Head -->
<?php 
require '../../src/layout/enlistment/head.php'; 
require ('../../config/config.php');  
?>


<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


  <title>GRC System | Registrar</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/enlistment/side-nav.php'; ?>


<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/enlistment/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Enrollment Record</li>
  </ol>
</nav>



<!-- viewing by student of Section -->
<div class="card shadow-sm mb-4" id="bystudentview">
        <a href="#bystudentenlistcollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h5 class="m-0 text-muted">Student Enlisted</h5>
      </a>
      <!-- Card Content - Collapse -->
       <div class="collapse show" id="bystudentenlistcollapse">

 <div class="card-body">

<div class="card-body">
<table id="new_enlistedtbl" class="table display nowrap">
  <thead>
    <tr>
      <th scope="col">Student Number</th>
      <th scope="col">Fullname</th>
      <th scope="col">Course</th>
      <th scope="col">Major</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
</table>
</div>

        </div>

        <!-- /.container-fluid -->
      </div>
      </div>
      <!-- End of Main Content (viewing by student of Enlisted)-->

<div class="card shadow-sm mb-4" id="bystudentview">
        <a href="#bystudentenrolledcollapse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h5 class="m-0 text-muted">Student Enrolled</h5>
      </a>
      <!-- Card Content - Collapse -->
       <div class="collapse show" id="bystudentenrolledcollapse">

<div class="card-body">

<div class="card-body">
<table id="new_enrolledtbl" class="table display nowrap">
  <thead>
    <tr>
      <th scope="col">Student Number</th>
      <th scope="col">Fullname</th>
      <th scope="col">Course</th>
      <th scope="col">Major</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
</table>
</div>
 </div>
      <!-- End of Main Content (viewing by student Enrolled)-->
        </div>
    </div><!-- End of Card Content - Collapse -->



  <!-- Modal Start for viewing of student data-->
  <div class="modal fade" id="student-modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subject</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">


<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Title</th>
      <th scope="col">Units</th>
      <th scope="col">Section</th>
    </tr>
  </thead>
  <tbody id="enrolldatalist"> 
  </tbody>
</table>
</div>


          <div class="modal-footer">

<button type="button" class="save" data-dismiss="modal" ripple><i class="fas fa-times"></i> Exit</button>

          </div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

        <!-- /.row -->
   

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

<!-- TABLE -->
<script src="../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../src/vendor/table/js/dataTables.responsive.min.js"></script>


  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../src/js/counter.js"></script>
  <script type="text/javascript">

function reset()
{
}

var course = '<?php echo $_SESSION['course']; ?>';
var major = '<?php echo $_SESSION['major']; ?>';
 //for searching of subject for petition
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"schoolyear":1},
      success:function(data)
      {
          var result = $.parseJSON(data);
          var sy = result.schoolyear;
          var sem = result.semester;

  var table = $('#new_enlistedtbl').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

       "serverSide" : true,
            "ajax" :{ 
              "url":"studentenlist_fetch.php", 
              "data":{ 
                "course":course,
                "major":major,
                "sy":sy,
                "sem":sem,
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
  } );


  var table = $('#new_enrolledtbl').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,
            "ajax" :{ 
              "url":"studentenrolled_fetch.php", 
              "data":{ 
                "course":course,
                "major":major,
                "sy":sy,
                "sem":sem,
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
  } );


        }
      });


// view only
$('#new_enlistedtbl').on('click','button.viewdata', function(){
var id = $(this).attr("id");
 $.ajax({  
    url:"add-drop-process.php",  
    method:"post",  
    data:{"viewstudentenrolleddata":1,id:id},  
    success:function(data)
    {   
      $('#enrolldatalist').html(data);
      $('#student-modal').modal('toggle');
      $('#student-modal').modal('show');
    }
    });
});  

// view only
$('#new_enrolledtbl').on('click','button.viewdata', function(){
var id = $(this).attr("id");
 $.ajax({  
    url:"add-drop-process.php",  
    method:"post",  
    data:{"viewstudentenrolleddata2":1,id:id},  
    success:function(data)
    {   
      $('#enrolldatalist').html(data);
      $('#student-modal').modal('toggle');
      $('#student-modal').modal('show');
    }
    });
});  

//edit including adding, dropping and change of schedule for enlisted student
$('#new_enlistedtbl').on('click','button.editdata', function(){
var id = $(this).attr("id");
var encodedstudnum = window.btoa(id);
window.open('edit_student_data?studentnumber='+encodedstudnum,'_self');  
});

//edit including adding, dropping and change of schedule for enrolled student
$('#new_enrolledtbl').on('click','button.editdata', function(){
var id = $(this).attr("id");
var encodedstudnum = window.btoa(id);
window.open('edit_student_data?studentnumber='+encodedstudnum,'_self');  
});
</script>

</body>

</html>
