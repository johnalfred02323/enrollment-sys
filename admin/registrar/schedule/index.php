<!-- Head -->
<?php 
require '../layout/head.php'; 
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
        <?php require '../layout/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Schedule</li>
  </ol>
</nav>






<!-- modal button -->

<?php include 'view-schedule.php'; ?>

<div class="d-flex justify-content-end mb-4 mt-4">

<div class="row">
  <div class="col-xl-6 col-md-6 col-xs-12 mb-sm-0 mb-3">
    <select list="schoolyear" value="" id="sy" class="custom-select custom-select mr-3" placeholder="School Year">
    </select>
  </div>
  <div class="col-xl-6 col-md-6 col-xs-12">
    <select list="semester" value="" id="sem" class="custom-select custom-select" placeholder="Semester">
    <datalist id="semester">
        <option id="First">First Semester</option>
        <option id="Second">Second Semester</option>
        <option id="Summer">Summer</option>
    </datalist>
    </select>
  </div>
</div>
</div>






<div class="card shadow-sm mb-4"> <!-- card 5 start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3">

      <h6 class="m-0 font-weight-bold d-inline">Schedule ( ALL ) - All Courses</h6>


<div class="dropdown show d-inline float-right">
  <a class="btn delete-user dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-eye"></i>
    VIEW SCHEDULE
  </a>

<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
<?php 
  $query = "SELECT DISTINCT course_abbreviation FROM course";
   $result = mysqli_query($conn, $query); 
    if($count=mysqli_num_rows($result) > 0)  
    {
    while($rows=mysqli_fetch_array($result))
    {
      echo "<a class='dropdown-item' href='schedule?course=".$rows['course_abbreviation']."&major'>".$rows['course_abbreviation']."</a>";
    }
    }
?>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="petition.php">PETITION</a>
    <a class="dropdown-item" href="summer">SUMMER</a>
  </div>
</div>


  </div>

    <div class="card-body" >
      
      <table id="sched_table" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Section</th>
                      <th>Course</th>
                      <th>Year level</th>
                      <th>School Year</th>
                      <th>Semester</th>
                      <th>Action</th>
                  </tr>
              </thead>
      </table>

    </div>
</div> <!-- card 5 end -->





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

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>

<!-- TABLE -->
<script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>


  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

<script type="text/javascript">
$(document).ready(function() {
//for school year
  $.ajax({
      url:"process.php",
      type:"POST",
      data:{"schoolyear":1},
      success:function(data){
        $('#sy').html(data); 

var sy = $('#sy').val();
var sem = $('#sem').val();
  
  var table = $('#sched_table').DataTable( {

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


//for viewin of schedule details
$(document).on( 'click','.viewdetails', function (e) {

  var section = $(this).attr("id");
  var schoolyear = $('#sy').val();
  var sem = $('#sem').val();
  $('#vsection').text(section);
  $.ajax({
        url:"process.php",
        method:"POST",
        data:{"viewsched":1,section:section,schoolyear:schoolyear,sem:sem},
        success:function(data){
        $('#schedlist').html(data);
        }
      }); 
  });

 //auto search for school year
$(document).on( 'change','#sy', function (e) {
           $('#sched_table').DataTable().destroy();
           var sy = $(this).val();  
           var sem = $('#sem').val();  

           var table = $('#sched_table').DataTable( {

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
      });

  //auto search for semester
$(document).on( 'change','#sem', function (e) {

           $('#sched_table').DataTable().destroy();
           var sem = $(this).val();  
           var sy = $('#sy').val();  

           var table = $('#sched_table').DataTable( {

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
      });
});
        
</script>

</body>

</html>
